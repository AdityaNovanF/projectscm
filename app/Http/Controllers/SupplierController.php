<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Session;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function data(){
        $title = 'Data Supplier';
        $supplier = DB::table('users')
        -> select('users.id','users.name','users.email')
        -> orderBy('users.name', 'asc')
        -> where('users.role', '=', 'supplier')
        -> paginate(5);
        return view('Supplier.data', compact('supplier', 'title'));
    }

    public function form(){
        $title = 'Form Data Supplier';
        return view('Supplier.form', compact('title'));
    }

    public function tambah(Request $request){
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:users',
        ]);


        $users = new User;
        $users->name           = $request->name;
        $users->email          = $request->email;
        $users->role           = "supplier";
        $users->password       = bcrypt('rahasia');

        $users->save();

        Session::flash('success', 'Data berhasil disimpan !!');

        return redirect('/dataSupplier');
    }

    public function edit($id)
    {
        $title = 'Edit Data Supplier';
        $supplier = DB::table('users')
        -> select('users.id','users.name','users.email')
        -> where('users.id','=',$id)
        -> first();

        return view('Supplier.edit', compact('supplier', 'title'));
    }

    public function update(Request $request, $id)
    {
        $supplier = User::findOrFail($id);

        $request->validate([
            'nama'          => 'required',
            'email'         => 'required|email|unique:users,email,'.$supplier->id,
        ]);

        $supplier = User::where('id', $request->id)->first();
        $supplier->name           = $request->nama;
        $supplier->email          = $request->email;

        $supplier->update();

        Session::flash('success', 'Data berhasil diupdate !!');

        return redirect('/dataSupplier');
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

    public function detail($id){
        $supplier = User::all();

        $dataBarang = DB::table('dataBarang')
        -> join('users','users.id', '=', 'dataBarang.id_user')
        -> select('dataBarang.id','dataBarang.nama','dataBarang.jumlah','dataBarang.satuan','dataBarang.harga','dataBarang.deskripsi','dataBarang.gambar', 'dataBarang.id_user')
        -> orderBy('dataBarang.nama', 'asc')
        -> where('dataBarang.id_user', '=', $id)
        -> paginate(5);
        return view('Supplier.dataBarang', compact('dataBarang', 'supplier'));
    }
}
