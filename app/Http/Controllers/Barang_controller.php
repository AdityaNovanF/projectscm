<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class Barang_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Barang';
        $data = Barang::orderBy('nama', 'asc')->get();

        return view('barang.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $title = 'Tambah Data barang';
        return view('barang.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:30',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
            'stock' => 'required|integer|min:1',
            'harga' => 'required|integer|min:3000',
        ]);

        Barang::insert([
            'nama' => $request->nama,
            'gambar' => $request->gambar->store('gambar'),
            'stock' => $request->stock,
            'harga' => $request->harga,
            'created_at' => date('Y-m-d H:1:s'),
        ]);

        \Session::flash('sukses', 'Data berhasil ditambah');
        return redirect('barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data Barang';
        $dt = Barang::find($id);

        return view('barang.edit', compact('title', 'dt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:30',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
            'stock' => 'required|integer|min:1',
            'harga' => 'required|integer|min:3000',
        ]);

        Barang::where('id', $id)->update([
            'nama' => $request->nama,
            'gambar' => $request->gambar->store('gambar'),
            'stock' => $request->stock,
            'harga' => $request->harga,
            'updated_at' => date('Y-m-d H:1:s'),
        ]);

        \Session::flash('sukses', 'Data berhasil diupdate');
        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            Barang::where('id', $id)->delete();

            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', 'Tidak boleh dihapus, karena Data Jenis Kue ini Sedang digunakan');
        }
        return redirect()->back();
    }
}
