<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserHomeCotroller extends Controller
{
    public function index()
    {
        
        $villa = DB::Table('villas')
            ->where('id', 1)
            ->first();
        
        $rooms = DB::Table('rooms')
            ->where('status', 'Disewakan')
            ->get();
        
        $reviews = DB::Table('reviews')
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return view('welcome', ['villa' => $villa, 'rooms' => $rooms, 'reviews' => $reviews]);
    }
}
