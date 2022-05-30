<?php

namespace App\Http\Controllers;

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

        return view('invoice', ['reservation' => $reservation, 'user' => $user, 'room' => $room, 'villa' => $villa, 'duration' => $duration]);
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
}
