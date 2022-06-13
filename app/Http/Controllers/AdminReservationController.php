<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReservationController extends Controller
{
    public function index()
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        $reservations = DB::Table('reservations')
            ->where('reservations.status', '!=', 'Pending')
            ->get();

        return view('admin.reservations.index', ['reservations' => $reservations]);
    }

    public function detail($id)
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        $reservation = DB::Table('reservations')
            ->where('reservations.status', '!=', 'Pending')
            ->where('reservations.id', $id)
            ->first();

        return view('admin.reservations.detail', ['reservation' => $reservation]);
        
    }
}
