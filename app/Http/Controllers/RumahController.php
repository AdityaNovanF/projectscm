<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Rumah;
use Session;

class RumahController extends Controller
{
    public function data(){
        $title = 'Data Rumah';
        $rumah = DB::table('rumah')
        -> select('rumah.id','rumah.nama','rumah.tipe','rumah.deskripsi')
        -> orderBy('rumah.nama', 'asc')
        -> paginate(5);
        return view('Rumah.data', compact('rumah', 'title'));
    }

    public function cari(Request $request){
        $cari = $request->cari;

        $rumah = DB::table('Rumah')
        -> select('rumah.id','rumah.nama','rumah.tipe')
        -> where('nama','like',"%".$cari."%")
        -> paginate(5);

        Session::flash('info', 'Data berhasil ditemukan !!');

        return view('Rumah.data', compact('rumah'));
    }

    public function form(){
        $title = 'Form Data Rumah';
        $rumah = DB::table('Rumah')
        -> select('rumah.id','rumah.nama','rumah.tipe')
        -> get();

        return view('Rumah.form', compact('title', 'rumah'));
    }

    public function tambah(Request $request){
        $request->validate([
            'nama'          => 'required|unique:rumah,nama',
            'tipe'          => 'required',
            'gambar'        => 'required|mimes:jpg,jpeg,png',
            'deskripsi'     => 'required',
        ]);

        $rumah = new Rumah;
        $rumah->nama            = $request->nama;
        $rumah->tipe            = $request->tipe;
        $rumah->deskripsi       = $request->deskripsi;
        $rumah->id_kper         = '1';

        if ($request->hasfile('gambar')) {
            $foto         = $request->file('gambar');
            $new_foto     = rand().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('guest/images/demo'), $new_foto);
            $rumah->gambar = $new_foto;
        }

        $rumah->save();

        Session::flash('sukses', 'Data berhasil disimpan !!');

        return redirect('/dataRumah');
    }

    public function edit($id)
    {
        $title = 'Edit Data Rumah';
        $rumah = DB::table('Rumah')
        -> select('rumah.id','rumah.nama','rumah.tipe','rumah.deskripsi','rumah.gambar')
        -> where('rumah.id','=',$id)
        -> first();

        return view('Rumah.edit', compact('rumah', 'title'));
    }

    public function update(Request $request, $id)
    {
        $rumah = Rumah::findOrFail($id);

        $request->validate([
            'nama'          => 'required|unique:rumah,nama,'.$rumah->id,
            'tipe'          => 'required',
            'deskripsi'     => 'required',
            'gambar'        => 'required|mimes:jpg,jpeg,png',
        ]);

        $rumah = Rumah::where('id', $request->id)->first();
        $rumah->nama        = $request->nama;
        $rumah->tipe        = $request->tipe;
        $rumah->deskripsi   = $request->deskripsi;
        $rumah->id_kper     = '1';

        if ($request->hasfile('gambar')) {
            $foto         = $request->file('gambar');
            $new_foto     = rand().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('guest/images/demo'), $new_foto);
            $rumah->gambar = $new_foto;
        }

        $rumah->update();

        Session::flash('sukses', 'Data berhasil diupdate !!');

        return redirect('/dataRumah');
    }

    public function hapus($id)
    {
        $rumah = Rumah::find($id);
        $rumah->delete();

        Session::flash('info', 'Data berhasil dihapus !!');

        return redirect('/dataRumah');
    }
}