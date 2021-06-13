<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Rumah;
use App\Info;
use App\KritikSaran;
use App\KPR;
use Session;
use Auth;
use App\User;

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
        -> select('info.id','info.judul','info.konten','info.created_at')
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
        -> select('info.id','info.judul','info.konten','info.created_at')
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
        $ks->id_user   = '1';

        $ks->save();

        Session::flash('sukses', 'Data berhasil disimpan !!');

        return redirect('/landing');
    }

    public function logout(){
        Auth::logout();
        return redirect('/landing');
    }

    public function formKPR(){
        $title = 'Form Data KPR';
        $rumah =  DB::table('rumah')
        -> select('rumah.id','rumah.nama')
        -> get();
        return view('KPR.form', compact('title', 'rumah'));
    }

    public function tambahKPR(Request $request){
        $request->validate([
            'nama'          => 'required',
            'alamat'        => 'required',
            'gaji'          => 'required|mimes:jpg,jpeg,png',
            'fotoKK'        => 'required|mimes:jpg,jpeg,png',
            'fotoKTP'       => 'required|mimes:jpg,jpeg,png',
        ]);

        $kpr = new KPR;
        $kpr->name      = $request->nama;
        $kpr->alamat    = $request->alamat;
        $kpr->id_rumah  = $request->id_rumah;
        $kpr->status    = 'Pengajuan';
        // $kpr->gaji      = $request->gaji;
        // $kpr->fotoKK    = $request->fotoKK;
        // $kpr->fotoKTP   = $request->fotoKTP;
        if ($request->hasfile('gaji')) {
            $foto         = $request->file('gaji');
            $new_foto     = rand().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('guest/images/demo'), $new_foto);
            $kpr->gaji = $new_foto;
        }
        if ($request->hasfile('fotoKK')) {
            $foto         = $request->file('fotoKK');
            $new_foto     = rand().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('guest/images/demo'), $new_foto);
            $kpr->fotoKK = $new_foto;
        }
        if ($request->hasfile('fotoKTP')) {
            $foto         = $request->file('fotoKTP');
            $new_foto     = rand().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('guest/images/demo'), $new_foto);
            $kpr->fotoKTP = $new_foto;
        }
        $kpr->save();

        \Session::flash('sukses', 'Data berhasil disimpan !!');

        return redirect('/landing');
    }

    public function tipe(){
        $rumah = DB::table('rumah')
        -> select('rumah.id','rumah.nama','rumah.tipe', 'rumah.gambar', 'rumah.deskripsi')
        -> get();

        return view('Rumah.tipe', compact('rumah'));
    }
}
