<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\KPR;

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

    public function dataKPR(){
        $title = 'Data Pengajuan KPR';
        $kpr = DB::table('kpr')
        -> join('rumah','rumah.id', '=', 'kpr.id_rumah')
        -> select('kpr.id', 'kpr.name', 'kpr.alamat', 'kpr.gaji', 'kpr.status', 'rumah.nama', 'rumah.tipe')
        -> paginate(5);

        return view('KPR.data', compact('title', 'kpr'));
    }

    public function detail($id){
        $title = 'Detail Data Pengajuan KPR';
        $kpr = DB::table('kpr')
        -> join('rumah','rumah.id', '=', 'kpr.id_rumah')
        -> select('kpr.id', 'kpr.name', 'kpr.alamat', 'kpr.gaji', 'kpr.gaji', 'kpr.status', 'kpr.fotoKK', 'kpr.fotoKTP', 'rumah.nama', 'rumah.tipe')
        -> first();

        return view('KPR.detail', compact('title', 'kpr'));
    }

    public function konfirm(Request $request, $id){
        $kpr = KPR::findOrFail($id);

        $kpr = KPR::where('id', $request->id)->first();
        $kpr->status    = 'Diterima';

        $kpr->update();

        $title = 'Data Pengajuan KPR';
        $kpr = DB::table('kpr')
        -> join('rumah','rumah.id', '=', 'kpr.id_rumah')
        -> select('kpr.id', 'kpr.name', 'kpr.alamat', 'kpr.gaji', 'kpr.status', 'rumah.nama', 'rumah.tipe')
        -> paginate(5);

        return view('KPR.data', compact('title', 'kpr'));
    }
}
