<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRoomController extends Controller
{
    public function index($id)
    {
        
        $user_id = session()->get('id_user');

        $reservation = DB::Table('reservations')
            ->where('user_id', $user_id)
            ->where('status', 'Pending')
            ->first();
        
        if ($reservation != null) {
            
            DB::Table('reservation_dates')
                ->where('reservation_id', $reservation->id)
                ->delete();
    
            DB::Table('reservations')
                ->where('user_id', $user_id)
                ->where('status', 'Pending')
                ->delete();
        }

        $villa = DB::Table('villas')
            ->where('id', 1)
            ->first();

        $room = DB::table('rooms')
                ->where('id', $id)
                ->first();

        return view('rooms', ['villa' => $villa, 'room' => $room]);
    }

    
    public function checkout(Request $request, $id)
    {
        $user_id = session()->get('id_user');

        $getCheckIn = $request->check_in;
        $getCheckOut = $request->check_out;

        $dateNow = date('Y-m-d');
        
        $checkIn = date_create($getCheckIn);
        $checkOut = date_create($getCheckOut);
        $dateCheckIn = date_format($checkIn, 'Y-m-d');
        $dateCheckOut = date_format($checkOut, 'Y-m-d');

        // dd($dateCheckIn, $dateCheckOut, $dateNow);
        
        if ($dateCheckIn >= $dateCheckOut) {
            return back()
                ->with([
                    'warning' => 'Mohon pilih tanggal checkout lebih besar dari tanggal checkin'
                ]);
        }

        if ($dateCheckIn <= $dateNow) {
            return back()
                ->with([
                    'warning' => 'Mohon pilih tanggal checkin lebih dari hari ini'
                ]);
        }
        
        if ($checkIn == $checkOut) {
            return back()
                ->with([
                    'warning' => 'Tanggal tidak tersedia'
                ]);
        }

        if (!$user_id) {
            return redirect()
                ->route('login')
                ->with([
                        'success' => 'Tanggal tersedia, silahkan login untuk melanjutkan',
            ]);
        } else {
            $diff = date_diff($checkIn, $checkOut);

            $days = $diff->format('%a');

            for ($i=0; $i < $days; $i++) {
                $day = date('Y-m-d',strtotime($getCheckIn . "+$i days"));
                
                $reservation_date[] = DB::Table('reservation_dates')
                    ->where('room_id', $id)
                    ->where('reservation_date', $day)
                    ->count();
                
                if ($reservation_date[$i] != 0) {
                    return back()
                        ->with([
                                'warning' => 'Tanggal ' . $day . ' Tidak Tersedia'
                        ]);
                }
            }

            if ($days == count($reservation_date)) {

                $invoice = rand(100, 9999);
                
                $room = DB::table('rooms')
                    ->where('id', $id)
                    ->first();

                $total = $days * $room->price;
                
                $post = Reservation::insert([
                    'id' => $invoice,
                    'room_id' => $id,
                    'check_in' => date('Y-m-d',strtotime($getCheckIn)),
                    'check_out' => date('Y-m-d',strtotime($getCheckOut)),
                    'user_id' => $user_id,
                    'adult' => '0',
                    'child' => '0',
                    'total' => $total,
                    'status' => 'Pending',
                    'proof' => '-',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                for ($i=0; $i < $days; $i++) {
                    $day = date('Y-m-d',strtotime($getCheckIn . "+$i days"));

                    ReservationDate::insert([
                        'reservation_id' => $invoice,
                        'room_id' => $id,
                        'reservation_date' => $day,
                    ]);
                }
                
                session([
                    'invoice' => $invoice,
                ]);

                return redirect()
                ->route('checkout');
                
            } else {
                return back()
                    ->with([
                        'warning' => "Something went wrong!"
                ]);
            }
        }
    }
}
