<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAdminsController extends Controller
{
    public function index()
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }

        $admins = DB::Table('admins')
            ->where('role', '!=', 'owner')
            ->get();

        return view('admin.admins.index', ['admins' => $admins]);
    }

    public function add()
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        return view('admin.admins.add');
    }

    public function edit($id)
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        $admin = DB::table('admins')
            ->where('id', $id)
            ->first();

        return view('admin.admins.edit', ['admin' => $admin]);
    }

    public function update(Request $request, $id)
    {
           
        if ($request->status != null) {
            $status = 'Aktif';
        } else {
            $status = 'Tidak Aktif';
        }

        $update = DB::table('admins')->where('id', $id)->update([
            'name' => $request->fullname,
            'email' => $request->email,
            'status' => $status,
            'updated_at' =>now()]);

        return back()
        ->withInput()
        ->with([
                'success' => 'Akun Admin berhasil diperbarui.'
        ]);
    }

    public function store(Request $request)
    {
        if ($request->status != null) {
            $status = 'Aktif';
        } else {
            $status = 'Tidak Aktif';
        }

        $email = $request->email . '@villa-oemah-biru.com';

        $emailCek = DB::table('admins')
            ->where('email', $email)
            ->count();

        if ($emailCek > 0) {
            return back()
            ->withInput()
            ->with([
                    'warning' => 'Email telah digunakan.'
            ]);
        }

        $post = Admin::create([
            'name' => $request->fullname,
            'email' => $email,
            'status' => $status,
            'password' => 'villaoemahbiru',
            'avatar' => 'admin.jpg',
            'role' => 'admin']);

        return back()
        ->withInput()
        ->with([
                'success' => 'Akun Admin berhasil dibuat.',
                'account_name' => $request->fullname,
                'account_email' => $email,
                'account_status' => $status,
        ]);
    }
    
    public function delete($id)
    {       
        $delete = DB::table('admins')
            ->where('id', $id)
            ->delete();
        
        return redirect()
            ->route('admin.admins.index')
            ->with([
                'success' => 'Admin berhasil dihapus.'
        ]);
    }
}
