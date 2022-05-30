<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAuthControlller extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $login = DB::table('users')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->count();
        
        if ($login > 0) {
            $user = DB::table('users')
                ->where('email', $request->email)
                ->first();
            
            if ($user->status == 'Tidak Aktif') {
                return back()
                ->withInput()
                ->with([
                        'warning' => 'Akun anda telah dinonaktifkan.'
                ]);
            }

            session([
                'login' => 'true',
                'id_user' => $user->id,
                'name' => $user->name, 
                'email' => $user->email,
                'phone' => $user->phone,
            ]);
            
            return redirect()
            ->route('home');

        } else {
            return back()
            ->withInput()
            ->with([
                    'warning' => 'Email/Password Salah.'
            ]);
        }
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        
        $emailCek = DB::table('users')
            ->where('email', $request->email)
            ->count();

        if ($emailCek > 0) {
            return back()
            ->withInput()
            ->with([
                    'warning' => 'Email telah digunakan! Silahkan login menggunakan email tersebut atau mengganti email.'
            ]);
        }
        
        if ($request->password != $request->password_confirmation) {
            return back()
            ->withInput()
            ->with([
                    'warning' => 'Password dan Konfirmasi Password Tidak Cocok.',
            ]);
        }

        $post = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
            'avatar' => 'user.jpg',
            'status' => 'Aktif',
        ]);
        

        return redirect()
        ->route('login')
        ->withInput()
        ->with([
                'success' => 'Akun telah berhasil dibuat.',
        ]);
    }

    public function logout()
    {       
        session()->flush();
        
        return redirect()
        ->route('login');
    }
}
