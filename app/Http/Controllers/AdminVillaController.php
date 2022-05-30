<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminVillaController extends Controller
{
    public function index()
    {
        $villa = DB::Table('villas')
            ->where('id', 1)
            ->first();

        return view('admin.villa.index', ['villa' => $villa]);
    }

    public function update(Request $request)
    {              
        $update = DB::table('villas')
        ->where('id', 1)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'tagline' => $request->tagline,
            'address' => $request->address,
            'updated_at' =>now(),
        ]);
        
        return back()
        ->withInput()
        ->with([
                'success' => 'Perubahan Informasi Villa Berhasil.'
        ]);
    }
}
