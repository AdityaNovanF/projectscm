<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dataBahan;
use DB;
use Session;

class BahanController extends Controller
{
    public function data(){
        $dataBahan = DB::table('dataBahan')
        -> select('dataBahan.id','dataBahan.nama','dataBahan.jumlah','dataBahan.satuan')
        -> orderBy('dataBahan.nama', 'asc')
        -> paginate(5);
        return view('BahanBangunan.data', compact('dataBahan'));
    }

    public function cari(Request $request){
        $cari = $request->cari;

        $dataBahan = DB::table('dataBahan')
        -> select('dataBahan.id','dataBahan.nama','dataBahan.jumlah','dataBahan.satuan')
        -> where('nama','like',"%".$cari."%")
        -> paginate(10);

        Session::flash('info', 'Data berhasil ditemukan !!');

        return view('BahanBangunan.data', compact('dataBahan'));
    }
    public function tambah(){
        $dataBahan = dataBahan::all();
        return view('BahanBangunan.form', compact('dataBahan'));
    }
}
