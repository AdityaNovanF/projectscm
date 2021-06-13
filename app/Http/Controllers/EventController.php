<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Pemesanan;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function full()
    {
        return view('fullcalendar');
    }

    public function index()
    {
        $title = 'Jadwal Pembuatan Kue';
        $daysToAdd = 1;
        $events = Event::all();
        $event = [];
        foreach ($events as $row) {
            $enddate = $row->end_date . "24:00:00";
            $event[] = \Calendar::event(
                $row->name,
                true,
                Carbon::parse($row->start_date),
                Carbon::parse($row->end_date)->addDay($daysToAdd),
                $row->id,
                [
                    'color' => $row->color,
                ]
            );
        }

        $calendar = \Calendar::addEvents($event);
        return view('eventpage', compact('events', 'calendar', 'title'));
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

    public function showform()
    {
        $title = 'Tambah Jadwal Pembuatan Kue';
        $pemesanan_id = Pemesanan::get();

        return view('addevent', compact('title', 'pemesanan_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'pemesanan_id' => 'required',
                'name' => 'required|max:100',
                'color' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ]
        );
        $events = new event;
        if (($events->start_date = $request->input('start_date')) > ($events->end_date = $request->input('end_date'))) {
            return redirect()->back()->with('error', 'Tanggal selesai harus setelah Tanggal Mulai');
        } else {

            $events->pemesanan_id = $request->input('pemesanan_id');
            $events->name = $request->input('name');
            $events->color = $request->input('color');
            $events->start_date = $request->input('start_date');
            $events->end_date = $request->input('end_date');

            $events->save();

            return redirect('events')->with('sukses', 'Data Berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $title = 'Daftar Jadwal Pembuatan Kue';
        $events = Event::all();
        return view('display', compact('title'))->with('events', $events);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Ubah Jadwal Pembuatan Kue';
        $event = Event::findOrFail($id);
        $dt = Event::find($id);
        $pemesanan_id = Pemesanan::get();
        return view('editform', compact('event', 'id', 'title', 'pemesanan_id', 'dt'));
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
        $this->validate(
            $request,
            [
                'pemesanan_id' => 'required',
                'name' => 'required|max:100',
                'color' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ]
        );

        $events = Event::find($id);

        $events->pemesanan_id = $request->input('pemesanan_id');
        $events->name = $request->input('name');
        $events->color = $request->input('color');
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');

        $events->save();

        return redirect('events')->with('sukses', 'Jadwal Pembuatan Kue diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = Event::find($id);
        $events->delete();

        return redirect('events')->with('sukses', 'Data dihapus');
    }
}
