<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUsersController extends Controller
{
    public function index()
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        $users = DB::Table('users')
            ->get();

        return view('admin.users.index', ['users' => $users, 'name' => '']);
    }

    public function edit($id)
    {        
        $user = DB::Table('users')
            ->where('id', $id)
            ->first();

        return view('admin.users.edit', ['user' => $user]);
    }
    
    public function update(Request $request, $id)
    {
        if ($request->status != null) {
            $status = 'Aktif';
        } else {
            $status = 'Tidak Aktif';
        }

        $update = DB::table('users')->where('id', $id)->update([
            'name' => $request->fullname,
            'email' => $request->email,
            'status' => $status,
            'updated_at' =>now()]);

        return back()
        ->withInput()
        ->with([
                'success' => 'Akun User berhasil diperbarui.'
        ]);
    }
    
    public function search(Request $request)
    {
        if ($request->name) {
            $users = DB::table('users')
                ->where('name', 'like', '%'.$request->name.'%')
                ->get();
        } else {
            $users = DB::Table('users')
            ->get();
        }
        
        return view('admin.users.index', ['users' => $users, 'name' => $request->name]);
    }
}
