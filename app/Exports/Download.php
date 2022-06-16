<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;

class Download implements FromArray 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        $date_start = session()->get('date_start');
        $date_end = session()->get('date_end');

        $reservations = DB::Table('reservations')
            ->where('created_at', '>=', $date_start)
            ->where('created_at', '<', $date_end)
            ->where('status', '!=', 'Pending')
            ->get();
    
        $download = [];
        foreach ($reservations as $reservation) {
            $room = DB::Table('rooms')
                ->where('id', $reservation->room_id)
                ->first();
                    
            $user = DB::Table('users')
                ->where('id', $reservation->user_id)
                ->first();

            $download[] = [
                'created_at' => $reservation->created_at,
                'id' =>  $reservation->id,
                'room' => $room->name,
                'check_in' => $reservation->check_in,
                'check_out' => $reservation->check_out,
                'user' => $user->name,
                'adult' => $reservation->adult,
                'child' => $reservation->child,
                'total' => $reservation->total,
                'status' => $reservation->status,
            ];
        }
        
        return $download;
    }
}
