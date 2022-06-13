<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    
    public function forgotPassword()
    {
        return view('forgot-password');
    }
    
    public function resetPassword(Request $request)
    {

        $token = Str::random(60);

        $emailCek = DB::table('users')
            ->where('email', $request->email)
            ->first();
        
        if ($emailCek) {
            $post = PasswordReset::insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now()
            ]);
            
            $details = [
                'email' => $request->email,
                'token' => $token,
                'name' => $emailCek->name
            ];
            
            \Mail::to($request->email)->send(new \App\Mail\ForgotPasswordMail($details));

            return back()
            ->with([
                'success' => 'Reset password berhasil! Periksa email Anda.'
            ]);

        } else {
            return back()
            ->with([
                'warning' => 'Email tidak terdaftar!'
            ]);

        }
    }

    public function changePasswordIndex($token)
    {
        $tokenCek = DB::table('password_resets')
            ->where('token', $token)
            ->first();
                                
        if ($tokenCek) {
            $alert = true;
                
            $user = DB::table('users')
            ->where('email', $tokenCek->email)
            ->first();
            
            return view('reset-password', ['token' => $tokenCek, 'alert' => $alert, 'user_id' => $user->id]);
        } else {
            $alert = false;
            
            return view('reset-password', ['token' => $tokenCek, 'alert' => $alert]);
        }
    }

    public function changePassword(Request $request)
    {
        if ($request->password == $request->password_confirmation) {
            $update = DB::table('users')
                ->where('id', $request->user_id)
                ->update([
                    'password' => $request->password,
                    'updated_at' =>now()
                ]);

            return redirect()
                ->route('login')
                ->with([
                    'success' => 'Password berhasil dirubah! Silahkan login.'
                ]);
                
        } else {
            return back()
            ->with([
                'warning' => 'Konfirmasi Password Tidak Sesuai.'
            ]);
        }
    }
}
