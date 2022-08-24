<?php

namespace App\Http\Controllers;

use App\Models\AddOn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAddOnController extends Controller
{
    public function index()
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }

        $addons = DB::Table('add_ons')
            ->get();

        return view('admin.addons.index', ['addons' => $addons, 'name' => '']);
    }

    public function add()
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        return view('admin.addons.add');
    }
    
    public function store(Request $request)
    {  
        if ($request->status != null) {
            $status = 'Aktif';
        } else {
            $status = 'Tidak Aktif';
        }

        $id = rand(100, 9999);
        
        $post = AddOn::insert([
            'id' => $id,
            'name' => $request->name,
            'price' => $request->price,
            'status' => $status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            
        return back()
        ->withInput()
        ->with([
                'success' => 'Fasilitas Extra berhasil ditambahkan.'
        ]);
    }

    public function edit($id)
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        $addons = DB::table('add_ons')
                ->where('id', $id)
                ->first();
        
        return view('admin.addons.edit', ['addons' => $addons]);
    }
    
    public function update(Request $request, $id)
    {
        if ($request->status != null) {
            $status = 'Aktif';
        } else {
            $status = 'Tidak Aktif';
        }
        
        $update = DB::table('add_ons')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $status,
            'updated_at' =>now()]);

        return back()
        ->withInput()
        ->with([
                'success' => 'Fasilitas Extra berhasil diperbarui.'
        ]);
    }
    
    public function delete($id)
    {       
        $delete = DB::table('add_ons')
            ->where('id', $id)
            ->delete();
        
        return redirect()
            ->route('admin.addons.index')
            ->with([
                'success' => 'Fasilitas Extra berhasil dihapus.'
        ]);
    }
    
    public function search(Request $request)
    {
        if ($request->name) {
            $addons = DB::table('add_ons')
                ->where('name', 'like', '%'.$request->name.'%')
                ->get();
        } else {
            $addons = DB::Table('add_ons')
            ->get();
        }

        return view('admin.addons.index', ['addons' => $addons, 'name' => $request->name]);
    }
}
