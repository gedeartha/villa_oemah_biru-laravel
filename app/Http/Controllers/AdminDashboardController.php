<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if (session()->get('login') == null) {
            return redirect('admin/login');
        }

        return view('admin.profile.index');
    }
}
