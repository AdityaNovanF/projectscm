<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Session;

class KPembangunanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function home(){
        return view('KPembangunan.home');
    }

    public function data(){
        $title = 'Data Kepala Pembangunan';
        $kPembangunan = DB::table('users')
        -> select('users.id','users.name','users.email')
        -> orderBy('users.name', 'asc')
        -> where('users.role', '=', 'kpem')
        -> paginate(5);
        return view('KPembangunan.data', compact('kPembangunan', 'title'));
    }

    public function form(){
        $title = "Form Data Kepala Pembangunan";
        return view('KPembangunan.form', compact('title'));
    }

    public function tambah(Request $request){
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:users',
        ]);


        $users = new User;
        $users->name           = $request->name;
        $users->email          = $request->email;
        $users->role           = "kpem";
        $users->password       = bcrypt('rahasia');

        $users->save();

        Session::flash('sukses', 'Data berhasil disimpan !!');

        return redirect('dataKPembangunan');
    }

    public function edit($id)
    {
        $title = "Edit Data Kepala Pembangunan";
        $users = DB::table('users')
        -> select('users.id','users.name','users.email')
        -> where('users.id','=',$id)
        -> first();

        return view('KPembangunan.edit', compact('users', 'title'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email,'.$users->id,
        ]);

        $users = User::where('id', $request->id)->first();
        $users->name           = $request->name;
        $users->email          = $request->email;

        $users->update();

        Session::flash('sukses', 'Data berhasil diupdate !!');

        return redirect('/dataKPembangunan');
    }

    public function hapus($id)
    {
        try {
            User::where('id', $id)->delete();

            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', 'Tidak boleh dihapus, karena Data ini Sedang digunakan');
        }
        return redirect()->back();
    }
    
}
