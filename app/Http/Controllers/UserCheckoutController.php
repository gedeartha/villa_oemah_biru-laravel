<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserCheckoutController extends Controller
{
    public function index()
    {       
        if (session()->get('login') == null) {
            return redirect('login');
        }
        
        $invoice = session()->get('invoice');
        
        $reservation = DB::Table('reservations')
            ->where('id', $invoice)
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

        return view('checkout', ['reservation' => $reservation, 'user' => $user, 'room' => $room, 'villa' => $villa, 'duration' => $duration]);
    }

    public function update(Request $request)
    {
        $invoice = session()->get('invoice');

        $update = DB::table('reservations')->where('id', $invoice)->update([
            'adult' => $request->adult,
            'child' => $request->child,
            'status' => 'Belum Dibayar',
            'updated_at' =>now()
        ]);

        return redirect()
            ->route('invoice', $invoice);
    }
}
