<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProfileController extends Controller
{
    public function index()
    {
        $id = session()->get('id_admin');
        
        $admin = DB::Table('admins')
            ->where('id', $id)
            ->first();

        return view('admin.profile', ['admin' => $admin]);
    }

    public function update(Request $request)
    {        
        $id = session()->get('id_admin');

        if ($request->image != null) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/avatar/', $image->hashName());
                        
            $update = DB::table('admins')
            ->where('id', $id)
            ->update([
                'name' => $request->fullname,
                'updated_at' =>now(),
                'avatar' => $request->image->hashName(),
            ]);

        } else {
            $update = DB::table('admins')
            ->where('id', $id)
            ->update([
                'name' => $request->fullname,
                'updated_at' =>now()
            ]);
        }
        
        return back()
        ->withInput()
        ->with([
                'successInfo' => 'Perubahan Informasi Akun Berhasil.'
        ]);
    }

    public function password(Request $request)
    {
        $id = session()->get('id_admin');

        if ($request->password == $request->password_confirmation) {

            $update = DB::table('admins')
            ->where('id', $id)
            ->update([
                'password' => $request->password,
                'updated_at' =>now()
            ]);

            return back()
            ->withInput()
            ->with([
                    'successPassword' => 'Perubahan Password Berhasil.'
            ]);

        } else {
            return back()
            ->withInput()
            ->with([
                    'warningPassword' => 'Password dan Konfirmasi Password tidak sesuai.'
            ]);
        }
    }
}
