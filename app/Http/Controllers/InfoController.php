<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Info;
use Session;

class InfoController extends Controller
{
    public function data(){
        $title = 'Data Informasi';
        $info = DB::table('info')
        -> select('info.id','info.judul','info.konten','info.created_at')
        -> orderBy('info.judul', 'asc')
        -> get();
        // -> paginate(5);
        return view('Info.data', compact('info', 'title'));
    }

    public function cari(Request $request){
        $cari = $request->cari;

        $info = DB::table('info')
        -> select('info.id','info.judul','info.konten','info.created_at')
        -> where('judul','like',"%".$cari."%")
        -> get();
        // -> paginate(5);

        Session::flash('info', 'Data berhasil ditemukan !!');

        return view('Info.data', compact('info'));
    }

    public function form(){
        $title = 'Form Data Informasi';
        return view('Info.form', compact('title'));
    }

    public function tambah(Request $request){
        $request->validate([
            'judul'          => 'required|unique:info,judul',
            'konten'         => 'required',
        ]);

        $info = new Info;
        $info->judul        = $request->judul;
        $info->konten       = $request->konten;
        $info->id_kper      = '1';

        $info->save();

        Session::flash('sukses', 'Data berhasil disimpan !!');

        return redirect('/dataInformasi');
    }

    public function edit($id)
    {
        $title = 'Edit Data Informasi';
        $info = DB::table('Info')
        -> select('info.id','info.judul','info.konten')
        -> where('info.id','=',$id)
        -> first();

        return view('Info.edit', compact('info', 'title'));
    }

    public function update(Request $request, $id)
    {
        $info = Info::findOrFail($id);

        $request->validate([
            'judul'          => 'required|unique:info,judul,'.$info->id,
            'konten'         => 'required',
        ]);

        $info = Info::where('id', $request->id)->first();
        $info->judul         = $request->judul;
        $info->konten        = $request->konten;
        $info->id_kper      = '1';

        $info->update();

        Session::flash('sukses', 'Data berhasil diupdate !!');

        return redirect('/dataInformasi');
    }

    public function hapus($id){
        $info = Info::find($id);
        $info->delete();

        Session::flash('info', 'Data berhasil dihapus !!');

        return redirect('/dataInformasi');
    }
}
