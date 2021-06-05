@extends('layouts.master')

@section('content')
<div class="container">
    <div class="table-responsive">
        <h4>{{ $title }}</h4>
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead">
                <tr class="danger">
                    <th>Id</th>
                    <th>Pemesan</th>
                    <th>Kue</th>
                    <th>Jumlah</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    @if(\Auth::user()->role == 'pegawai')
                    <th>Edit</th>
                    <th>Delete</th>
                    @endif
                </tr>
            </thead>
            @foreach($events as $event)
            <tbody>
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->pemesanan_r->nama }}</td>
                    <td>{{ $event->pemesanan_r->kue_r->nama }}</td>
                    <td>{{ $event->pemesanan_r->jumlah }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
                    @if(\Auth::user()->role == 'pegawai')
                    <th>
                        <a href='{{ url('displaydata/'.$event->id) }}' class="btn btn-success" id="edit"> Edit </a>
                    </th>
                    <th>
                        <form method='post' action='{{url('deletedata/'.$event->id)}}'>
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </th>
                    @endif
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection