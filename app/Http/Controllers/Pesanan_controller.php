<?php

namespace App\Http\Controllers;

use App\Pesanan;
use App\Barang;
use Illuminate\Http\Request;
use Auth;

class Pesanan_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Pesanan';
        $data = Pesanan::get();
        $data2 = Pesanan::where('status', '=', 'Sudah Terverifikasi')->get();
        $data3 = Pesanan::where('status', '=', 'Belum Terverifikasi')->get();

        return view('pesanan.index', compact('title', 'data', 'data2', 'data3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $title = 'Buat Pesanan';
        $barang_id = Barang::get();

        return view('pesanan.add', compact('title', 'barang_id'));
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
            'barang_id' => 'required',
            'nama' => 'required|string|max:50',
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = Barang::find($request->barang_id)->first();
        if (($barang->stock - $request->jumlah) < 0) {
            \Session::flash('gagal', 'Stock tidak cukup');
            return redirect()->back();
        } else {
            Pesanan::insert([
                'barang_id' => $request->barang_id,
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
                'total' => ($request->jumlah * $barang->harga),
                'created_at' => date('Y-m-d H:1:s'),
                'id_kpem' => Auth::user()->id,
            ]);
            Barang::whereId($request->barang_id)->update([
                'stock' => ($barang->stock - $request->jumlah),
            ]);

            \Session::flash('sukses', 'Data berhasil ditambah');
            return redirect('pesanan');
        }
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
        $title = 'Edit Data Pesanan';
        $dt = Pesanan::find($id);
        $barang_id = Barang::get();

        return view('pesanan.edit', compact('title', 'dt', 'barang_id'));
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
            'barang_id' => 'required',
            'nama' => 'required|string|max:50',
            'jumlah' => 'required|integer|min:1',
        ]);

        $pesanan = Pesanan::find($id);
        $barang = Barang::find($request->barang_id)->first();
        if (($barang->stock - $request->jumlah) < 0) {
            \Session::flash('gagal', 'Stock tidak cukup');
            return redirect()->back();
        } else {
            Pesanan::where('id', $id)->update([
                'barang_id' => $request->barang_id,
                'nama   ' => $request->nama,
                'jumlah' => $request->jumlah,
                'total' => ($request->jumlah * $barang->harga),
                'updated_at' => date('Y-m-d H:1:s'),
            ]);

            Barang::whereId($request->barang_id)->update([
                'stock' => ($barang->stock + $pesanan->jumlah - $request->jumlah),
            ]);

            \Session::flash('sukses', 'Data berhasil diupdate');
            return redirect('pesanan');
        }
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
            Pesanan::where('id', $id)->delete();
            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', 'Tidak boleh dihapus, karena Data Jenis Kue ini Sedang digunakan');
        }
        return redirect()->back();
    }
}
