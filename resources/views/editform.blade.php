@extends('layouts.master')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form role="form" method='post' action='{{url('events/'.$event->id)}}'>
    @csrf
    {{ method_field('put') }}
    <div class="container">
        <div class='col-md-11 col-md-offset-0'>

            <h4>{{ $title }}</h4>
            <hr>

            <label for="">Pilih Pemesan</label>
            <select name="pemesanan_id" class='form-control select2'>
                @foreach($pemesanan_id as $ps)
                <option value="{{ $ps->id }}" {{ ($dt->pemesanan_id == $ps->id)?'selected' : '' }}>{{$ps->nama}}</option>
                @endforeach
            </select><br><br>

            <label for="">Nama Kegiatan</label>
            <input type="text" class="form-control" name="name" placeholder="Enter The Name" value="{{$event->name}}"><br><br>

            <label for="">Pilih Warna Penanda</label>
            <input type="color" class="form-control" name="color" placeholder="Enter The Color" value="{{$event->color}}"><br><br>

            <label for="">Tanggal Mulai</label>
            <input type="date" class="form-control" name="start_date" placeholder="Enter Start Date" value="{{$event->start_date}}"><br><br>

            <label for="">Tanggal Selesai</label>
            <input type="date" class="form-control" name="end_date" placeholder="Enter End Date" value="{{$event->end_date}}"><br><br>

            <button type="submit" name="submit" class="btn btn-success">Update Data</button>

        </div>
    </div>
</form>
@endsection