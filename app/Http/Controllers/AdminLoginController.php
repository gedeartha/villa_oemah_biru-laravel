<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function index()
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        } else {
            return redirect()
            ->route('dashboard');
        }
    }
    
    public function auth(Request $request)
    {        
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $login = DB::table('admins')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->count();
        
        if ($login > 0) {
            $admin = DB::table('admins')
                ->where('email', $request->email)
                ->first();
            
            if ($admin->status == 'Tidak Aktif') {
                return back()
                ->withInput()
                ->with([
                        'warning' => 'Akun anda telah dinonaktifkan.'
                ]);
            }

            session([
                'login' => 'true',
                'id_admin' => $admin->id,
                'name' => $admin->name, 
                'email' => $admin->email,
                'role' => $admin->role,
            ]);
            
            return redirect()
            ->route('dashboard');

        } else {
            return back()
            ->withInput()
            ->with([
                    'warning' => 'Email/Password Salah.'
            ]);
        }
    }

    public function logout()
    {       
        session()->flush();
        
        return redirect()
        ->route('admin.login.index');
    }
}
