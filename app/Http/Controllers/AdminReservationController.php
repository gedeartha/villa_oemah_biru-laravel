<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReservationController extends Controller
{
    public function index()
    {

        $reservations = DB::Table('reservations')
            ->where('reservations.status', '!=', 'Pending')
            ->get();

        return view('admin.reservations.index', ['reservations' => $reservations]);
    }

    public function detail($id)
    {
        
        $reservation = DB::Table('reservations')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->where('reservations.id', $id)
            ->first();

        return view('admin.reservations.detail', ['reservation' => $reservation]);
        
    }
}
