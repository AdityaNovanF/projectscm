<?php

namespace App\Http\Controllers;

use \App\Pesanan;
use \App\Barang;
use Illuminate\Http\Request;

class Verifpesanan_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Verifikasi Pesanan';
        $data = Pesanan::where('status', '=', 'Belum Terverifikasi')->get();

        return view('verifpesanan.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $title = 'Verifikasi Pemesanan';
        $dt = Pesanan::find($id);
        $barang_id = Barang::get();

        return view('verifpesanan.edit', compact('title', 'dt', 'barang_id'));
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
            'status' => 'required',
        ]);

        Pesanan::where('id', $id)->update([
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:1:s'),
        ]);

        \Session::flash('sukses', 'Data berhasil diupdate');
        return redirect('verifpesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
