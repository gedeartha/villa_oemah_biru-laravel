<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function index()
    {
        if (session()->get('login') == null) {
            return redirect('login');
        }
        
        $id = session()->get('id_user');
        
        $user = DB::Table('users')
            ->where('id', $id)
            ->first();

        return view('profile.index', ['user' => $user]);
    }

    public function update(Request $request)
    { 
        $id = session()->get('id_user');

        if ($request->image != null) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/avatar/', $image->hashName());
                        
            $update = DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->fullname,
                'email' => $request->email,
                'phone' => $request->phone,
                'updated_at' =>now(),
                'avatar' => $request->image->hashName(),
            ]);
        } else {
            $update = DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->fullname,
                'email' => $request->email,
                'phone' => $request->phone,
                'updated_at' =>now()
            ]);
        }
        
        session([
            'name' => $request->fullname, 
        ]);
        
        return back()
        ->withInput()
        ->with([
                'success' => 'Perubahan Informasi Akun Berhasil.'
        ]);
    }

    public function password()
    {
        $id = session()->get('id_user');
        
        $user = DB::Table('users')
            ->where('id', $id)
            ->first();

        return view('profile.password', ['user' => $user]);
    }

    public function passwordChange(Request $request)
    {
        $id = session()->get('id_user');

        if ($request->password == $request->password_confirmation) {

            $update = DB::table('users')
            ->where('id', $id)
            ->update([
                'password' => $request->password,
                'updated_at' =>now()
            ]);

            return back()
            ->withInput()
            ->with([
                    'success' => 'Perubahan Password Berhasil.'
            ]);

        } else {
            return back()
            ->withInput()
            ->with([
                    'warning' => 'Password dan Konfirmasi Password tidak sesuai.'
            ]);
        }
    }
}
