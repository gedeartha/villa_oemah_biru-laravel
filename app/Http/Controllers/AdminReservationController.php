<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ReservationsExport;
use Maatwebsite\Excel\Facades\Excel;

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
    
    public function export(Request $request)
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        if (isset($request->date_start) && isset($request->date_end)) {
            $req_date_start = str_replace('/', '-', $request->date_start);
            $req_date_end = str_replace('/', '-', $request->date_end);
            
            $date_start = date("Y-m-d", strtotime($req_date_start));
            $date_end = date("Y-m-d", strtotime($req_date_end));
            
            session([
                'date_start' => $date_start,
                'date_end' => $date_end,
            ]);

            $reservations = DB::Table('reservations')
                ->where('created_at', '>=', $date_start)
                ->where('created_at', '<', $date_end)
                ->where('status', '!=', 'Pending')
                ->get();
        } else {
            $req_date_start = '';
            $req_date_end = '';
            
            session([
                'date_start' => $req_date_start,
                'date_end' => $req_date_end,
            ]);

            $reservations = DB::Table('reservations')
                ->where('status', '!=', 'Pending')
                ->get();
        }
        
        return view('admin.reservations.export', ['reservations' => $reservations, 'date_start' => $req_date_start, 'date_end' => $req_date_end]);
    }
    
    public function download()
    {
        
        if (session()->get('date_start') == '') {
            return back()
            ->with([
                    'warning' => 'Silahkan pilih tanggal terlebih dahulu!'
            ]);
        } else {
            return Excel::download(new ReservationsExport, 'history-reservasi.xlsx');
        }
    }
}
