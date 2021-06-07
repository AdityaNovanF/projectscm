<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Rumah;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Sistem Rumah Terpadu';
        return view('home', compact('title'));
    }

    public function landing(){
        $rumah = Rumah::all();
        return view('Guest.index', compact('rumah'));
    }

    public function detailRumah($id){
        $rumah = DB::table('rumah')
        -> select('rumah.id','rumah.nama','rumah.tipe', 'rumah.gambar', 'rumah.deskripsi')
        -> where('rumah.id', '=', $id)
        -> get();

        return view('Rumah.detail', compact('rumah'));
    }
}
