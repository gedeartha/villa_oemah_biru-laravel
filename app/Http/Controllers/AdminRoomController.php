<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use App\Models\Room;
use App\Models\RoomFacilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRoomController extends Controller
{
    public function index()
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        $rooms = DB::Table('rooms')
            ->get();

        return view('admin.villa.rooms.index', ['rooms' => $rooms]);
    }

    public function add()
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        return view('admin.villa.rooms.add');
    }

    public function store(Request $request)
    {  
        if ($request->status != null) {
            $status = 'Disewakan';
        } else {
            $status = 'Tidak Disewakan';
        }

        $id = rand(100, 9999);
        
        // dd($request->facilities);

        $facilitiesCount = count($request->facilities);

        for ($i=0; $i < $facilitiesCount; $i++) {
            $post = RoomFacilities::insert([
                'facilities_id' => $request->facilities[$i],
                'room_id' => $id,
            ]);
        }
        
        $image1 = $request->file('image1');
        $image1->storeAs('public/rooms/', $image1->hashName());
        
        $image2 = $request->file('image2');
        $image2->storeAs('public/rooms/', $image2->hashName());

        $post = Room::insert([
            'id' => $id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image1' => $request->image1->hashName(),
            'image2' => $request->image2->hashName(),
            'status' => $status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            
        return back()
        ->withInput()
        ->with([
                'success' => 'Kamar Villa berhasil ditambahkan.'
        ]);
    }

    public function edit($id)
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        $villa = DB::table('villas')
            ->where('id', 1)
            ->first();

        $room = DB::table('rooms')
                ->where('id', $id)
                ->first();
        
        return view('admin.villa.rooms.edit', ['villa' => $villa, 'room' => $room]);
    }
    
    public function update(Request $request, $id)
    {
        if ($request->status != null) {
            $status = 'Disewakan';
        } else {
            $status = 'Tidak Disewakan';
        }
        
        $clearRoomFacilities = DB::table('room_facilities')
            ->where('room_id', $id)
            ->delete();

        $facilitiesCount = count($request->facilities);

        for ($i=0; $i < $facilitiesCount; $i++) {
            $post = RoomFacilities::insert([
                'facilities_id' => $request->facilities[$i],
                'room_id' => $id,
            ]);
        }

        $room = DB::table('rooms')
            ->where('id', $id)
            ->first();
        
            if ($request->image1 != null) {
                $image1 = $request->file('image1');
                $image1->storeAs('public/rooms/', $image1->hashName());
                $image1 = $request->image1->hashName();
            } else {
                $image1 = $room->image1;
            }

            if ($request->image2 != null) {
                $image2 = $request->file('image2');
                $image2->storeAs('public/rooms/', $image2->hashName());
                $image2 = $request->image2->hashName();
            } else {
                $image2 = $room->image2;
            }

        $update = DB::table('rooms')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image1' => $image1,
            'image2' => $image2,
            'status' => $status,
            'updated_at' =>now()]);

        return back()
        ->withInput()
        ->with([
                'success' => 'Kamar Villa berhasil diperbarui.'
        ]);
    }
}
