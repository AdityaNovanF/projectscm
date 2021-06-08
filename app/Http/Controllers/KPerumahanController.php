<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KPerumahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function home(){
        return view('KPerumahan.home');
    }

    public function kritikSaran(){
        $title = 'Data Kritik Saran';
        $ks = DB::table('kritikSaran')
        -> select('kritikSaran.id','kritikSaran.nama', 'kritikSaran.isi', 'kritikSaran.created_at')
        -> paginate(5);

        return view('Guest.kritikSaran', compact('ks', 'title'));
    }
}
