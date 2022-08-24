<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReviewController extends Controller
{
    public function index()
    {
        if (session()->get('login') == null) {
            return view('admin.login.index');
        }
        
        $reviews = DB::Table('reviews')
            ->get();

        return view('admin.reviews.index', ['reviews' => $reviews, 'id' => '']);
    }
    
    public function search(Request $request)
    {
        if ($request->id) {
            $reviews = DB::table('reviews')
                ->where('id', $request->id)
                ->get();
        } else {
            $reviews = DB::Table('reviews')
                ->get();
        }

        return view('admin.reviews.index', ['reviews' => $reviews, 'id' => $request->id]);
    }
    
    public function delete($id)
    {       
        $delete = DB::table('reviews')
            ->where('id', $id)
            ->delete();
        
        return redirect()
            ->route('admin.reviews.index')
            ->with([
                'success' => 'Ulasan berhasil dihapus.'
        ]);
    }
}
