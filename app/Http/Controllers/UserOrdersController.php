<?php

namespace App\Http\Controllers;

use App\Models\Midtrans;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserOrdersController extends Controller
{
    public function index()
    {
        if (session()->get('login') == null) {
            return redirect('login');
        }

        $user_id = session()->get('id_user');
        
        $reservations = DB::Table('reservations')
            ->where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('orders', ['reservations' => $reservations]);
    }

    public function invoice($id)
    {
        $reservation = DB::Table('reservations')
            ->where('id', $id)
            ->first();
    
        $user = DB::Table('users')
            ->where('id', $reservation->user_id)
            ->first();
        
        $room = DB::Table('rooms')
            ->where('id', $reservation->room_id)
            ->first();
        
        $villa = DB::Table('villas')
            ->where('id', 1)
            ->first();
        
        $getCheckIn = $reservation->check_in;
        $getCheckOut = $reservation->check_out;
            
        $checkIn = date_create($getCheckIn);
        $checkOut = date_create($getCheckOut);
        $diff = date_diff($checkIn, $checkOut);
        
        $duration = $diff->format('%a');
                
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-IK-LC0zAW-djydF887uRncFK';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $curl = curl_init();

        if ($reservation->status == 'Belum Dibayar' && $reservation->midtrans_order_id != null) {
            $AUTH_STRING = base64_encode("SB-Mid-server-IK-LC0zAW-djydF887uRncFK:");
    
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $reservation->midtrans_order_id . "/status",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    // Set Here Your Requesred Headers
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization: Basic ' . $AUTH_STRING,
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
    
            if ($err) {
                echo "cURL Error #:" . $err;
            }
            // else {
            //     print_r($response);
            // }

            $json = json_decode($response);

            // dd($json->payment_type);

            if ($json->payment_type == 'bank_transfer' && $json->transaction_status == 'settlement') {

                $update = DB::table('reservations')->where('id', $reservation->id)
                ->update([
                    'status' => 'Sudah Dibayar',
                ]);
            }

        }

        $midtrans_order_id = rand(1000, 9999999);
            
        $params = array(
            'transaction_details' => array(
                'order_id' => $midtrans_order_id,
                'gross_amount' => $reservation->total,
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'last_name' => '',
                'email' => $user->email,
                'phone' => '',
            ),
        );
            
        $snapToken = \Midtrans\Snap::getSnapToken($params);
            
        return view('invoice', [
            'reservation' => $reservation, 
            'user' => $user, 
            'room' => $room, 
            'villa' => $villa, 
            'duration' => $duration,
            'snap_token' => $snapToken
        ]);
    }
    
    public function payment(Request $request)
    {
        $json = json_decode($request->get('json'));
        
        $order_id = $json->order_id;
        $transaction_status = $json->transaction_status;

        if ($transaction_status == 'pending') {
            $status = 'Belum Dibayar';
        } else if ($transaction_status == 'settlement') {
            $status = 'Sudah Dibayar';
        } else {
            $status = 'Error';
        }
        
        Midtrans::create([
            'order_id' => $order_id,
            'transaction_status' => $transaction_status,
        ]);

        $update = DB::table('reservations')->where('id', $request->invoice)
                ->update([
                    'midtrans_order_id' => $order_id,
                    'status' => $status,
                ]);

        // return $json;

        return redirect()
        ->route('invoice', $request->invoice);
    }

    public function update(Request $request, $id)
    {    
        $image = $request->file('image');
        $image->storeAs('public/proof/', $image->hashName());
                        
        $update = DB::table('reservations')
            ->where('id', $id)
            ->update([
                'updated_at' =>now(),
                'status' => 'Sudah Dibayar',
                'proof' => $request->image->hashName(),
        ]);
        
        return back()
            ->withInput()
            ->with([
                    'success' => 'Bukti Transfer Berhasil Diupload.'
        ]);
    }

    public function cancel($id)
    {                     
        $update = DB::table('reservations')
            ->where('id', $id)
            ->update([
                'updated_at' =>now(),
                'status' => 'Cancel',
        ]);
        
        return back()
            ->with([
                    'success' => 'Pesanan berhasil di cancel'
        ]);
    }

    public function rating(Request $request, $id)
    {        
        $post = Review::create([
            'reservation_id' => $id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);     

        $update = DB::table('reservations')
            ->where('id', $id)
            ->update([
                'updated_at' =>now(),
                'status' => 'Selesai',
        ]);
        
        return back();
    }
}
