<?php

namespace App\Http\Controllers;

use App\Faktur;
use App\Pesanan;
use Illuminate\Http\Request;

class Konfirmfaktur_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Konfirmasi Faktur';
        $data = Faktur::where('status', '=', 'Belum Konfirmasi')->get();

        return view('konfirmfaktur.index', compact('title', 'data'));
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
        $title = 'Konfirmasi Faktur';
        $dt = Faktur::find($id);
        $pesanan_id = Pesanan::get();

        return view('konfirmfaktur.edit', compact('title', 'dt', 'pesanan_id'));
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

        Faktur::where('id', $id)->update([
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
