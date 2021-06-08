<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Rumah;
use App\Info;
use App\KritikSaran;
use Session;

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
        $rumah = DB::table('rumah')
        -> select('rumah.id','rumah.nama', 'rumah.gambar', 'rumah.deskripsi')
        -> paginate(2);

        $info = DB::table('info')
        -> select('info.id','info.judul','info.tanggal', 'info.konten')
        -> paginate(3);
        return view('Guest.index', compact('rumah', 'info'));
    }

    public function detailRumah($id){
        $rumah = DB::table('rumah')
        -> select('rumah.id','rumah.nama','rumah.tipe', 'rumah.gambar', 'rumah.deskripsi')
        -> where('rumah.id', '=', $id)
        -> get();

        return view('Rumah.detail', compact('rumah'));
    }

    public function detailInfo($id){
        $info = DB::table('info')
        -> select('info.id','info.judul','info.tanggal', 'info.konten')
        -> where('info.id', '=', $id)
        -> get();

        return view('Info.detail', compact('info'));
    }

    public function tambahKS(Request $request){
        $request->validate([
            'nama'          => 'required',
            'isi'           => 'required',
        ]);

        $ks = new KritikSaran;
        $ks->nama      = $request->nama;
        $ks->isi       = $request->isi;

        $ks->save();

        Session::flash('success', 'Data berhasil disimpan !!');

        return redirect('/landing');
    }

    public function logout(){
        return redirect('/landing');
    }

    public function tambahKPR(Request $request){
        $request->validate([
            'nama'          => 'required',
            'isi'           => 'required',
        ]);

        $ks = new KritikSaran;
        $ks->nama      = $request->nama;
        $ks->isi       = $request->isi;

        $ks->save();

        Session::flash('success', 'Data berhasil disimpan !!');

        return redirect('/landing');
    }

    public function logout(){
        return redirect('/landing');
    }
    }
}
