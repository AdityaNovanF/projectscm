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
        -> select('rumah.id','rumah.nama','rumah.tipe')
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

        return view('RUmah.data', compact('rumah'));
    }

    public function form(){
        $title = 'Form Data Rumah';
        return view('Rumah.form', compact('title'));
    }

    public function tambah(Request $request){
        $request->validate([
            'nama'          => 'required|unique:rumah,nama',
            'tipe'          => 'required',
        ]);

        $rumah = new Rumah;
        $rumah->nama           = $request->nama;
        $rumah->tipe           = $request->tipe;

        $rumah->save();

        Session::flash('success', 'Data berhasil disimpan !!');

        return redirect('/dataRumah');
    }

    public function edit($id)
    {
        $title = 'Form Data Rumah';
        $rumah = DB::table('Rumah')
        -> select('rumah.id','rumah.nama','rumah.tipe')
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
        ]);

        $rumah = Rumah::where('id', $request->id)->first();
        $rumah->nama         = $request->nama;
        $rumah->tipe         = $request->tipe;

        $rumah->update();

        Session::flash('success', 'Data berhasil diupdate !!');

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
