<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminFacilitiesController extends Controller
{
    public function index()
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }

        $facilities = DB::Table('facilities')
            ->get();

        return view('admin.facilities.index', ['facilities' => $facilities, 'name' => '']);
    }
    
    public function add()
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }

        return view('admin.facilities.add');
    }
    
    public function store(Request $request)
    {  
        if ($request->status != null) {
            $status = 'Aktif';
        } else {
            $status = 'Tidak Aktif';
        }
        
        $image = $request->file('image');
        $image->storeAs('public/facilities/', $image->hashName());

        $post = Facilities::create([
            'name' => $request->name,
            'icon' => $request->image->hashName(),
            'status' => $status,
        ]);
            
        return back()
        ->withInput()
        ->with([
                'success' => 'Fasilitas berhasil ditambahkan.'
        ]);
    }
    
    public function edit($id)
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        $facility = DB::table('facilities')
                ->where('id', $id)
                ->first();
        
        return view('admin.facilities.edit', ['facility' => $facility]);
    }
    
    public function update(Request $request, $id)
    {
        if ($request->status != null) {
            $status = 'Aktif';
        } else {
            $status = 'Tidak Aktif';
        }

        if ($status == 'Tidak Aktif') {
            $deleteRoomFacilities = DB::table('room_facilities')
                ->where('facilities_id', $id)
                ->delete();
        }

        $facility = DB::table('facilities')
            ->where('id', $id)
            ->first();
        
            if ($request->image != null) {
                $image = $request->file('image');
                $image->storeAs('public/facilities/', $image->hashName());
                $image = $request->image->hashName();
            } else {
                $image = $facility->icon;
            }

        $update = DB::table('facilities')->where('id', $id)->update([
            'name' => $request->name,
            'icon' => $image,
            'status' => $status,
            'updated_at' =>now()]);

        return back()
        ->withInput()
        ->with([
                'success' => 'Fasilitas berhasil diperbarui.'
        ]);
    }

    public function delete($id)
    {       
        $delete = DB::table('facilities')
            ->where('id', $id)
            ->delete();
        
        return redirect()
            ->route('admin.facilities.index')
            ->with([
                'success' => 'Fasilitas berhasil dihapus.'
        ]);
    }
    
    public function search(Request $request)
    {
        if ($request->name) {
            $facilities = DB::table('facilities')
                ->where('name', 'like', '%'.$request->name.'%')
                ->get();
        } else {
            $facilities = DB::Table('facilities')
                ->get();
        }

        return view('admin.facilities.index', ['facilities' => $facilities, 'name' => $request->name]);
    }
}
