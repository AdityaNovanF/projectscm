<?php

namespace App\Http\Controllers;

use \App\Faktur;
use \App\Pesanan;
use Illuminate\Http\Request;

class Faktur_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Konfirmasi Faktur';

        $data = Faktur::get();
        return view('faktur.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $title = 'Kirim Faktur';
        $pesanan_id = Pesanan::where('status', '=', 'Sudah Terverifikasi')->where('fakturnya', '=', 'Belum')->get();

        return view('faktur.add', compact('title', 'pesanan_id'));
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
            'pesanan_id' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $pesanan = Pesanan::find($request->pesanan_id)->first();
        Faktur::insert([
            'pesanan_id' => $request->pesanan_id,
            'gambar' => $request->gambar->store('gambar'),
            'created_at' => date('Y-m-d H:1:s'),
        ]);
        Pesanan::whereId($request->pesanan_id)->update([
            'fakturnya' => ('Sudah'),
        ]);

        \Session::flash('sukses', 'Data berhasil ditambah');
        return redirect('faktur');
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
        $title = 'Edit Data Faktur';
        $dt = Faktur::find($id);

        return view('faktur.edit', compact('title', 'dt'));
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        Faktur::where('id', $id)->update([
            'gambar' => $request->gambar->store('gambar'),
            'updated_at' => date('Y-m-d H:1:s'),
        ]);

        \Session::flash('sukses', 'Data berhasil diupdate');
        return redirect('faktur');
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
            Faktur::where('id', $id)->delete();

            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', 'Tidak boleh dihapus, karena Data Jenis Kue ini Sedang digunakan');
        }
        return redirect()->back();
    }
}
