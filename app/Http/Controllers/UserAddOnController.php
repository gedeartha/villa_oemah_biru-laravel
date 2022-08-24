<?php

namespace App\Http\Controllers;

use App\Models\ReservationAddOn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAddOnController extends Controller
{
    public function index()
    {
        if (session()->get('login') == null) {
            return redirect('login');
        }
        
        $addons = DB::Table('add_ons')
            ->where('status', 'Aktif')
            ->get();

        // dd($addons);

        return view('add-ons', ['addons' => $addons]);
    }
    
    public function post(Request $request)
    {
        $invoice = session()->get('invoice');

        $totalAddOns = count($request->addon_id);

        $delete = DB::table('reservation_add_ons')
            ->where('reservation_id', $invoice)
            ->delete();

        for ($i=0; $i < $totalAddOns; $i++) {

            $addon_id = $request->addon_id[$i];

            $valueQuantity = $request->quantity[$addon_id];

            if ($valueQuantity) {

                $addon = DB::table('add_ons')
                ->where('id', $addon_id)
                ->first();
            
                $quantity = $request->quantity[$addon_id];
                
                ReservationAddOn::insert([
                    'reservation_id' => $invoice,
                    'name' => $addon->name,
                    'price' => $addon->price,
                    'quantity' => $quantity,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        
        return redirect()
            ->route('checkout');
    }
}
