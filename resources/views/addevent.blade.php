@extends('layouts.master')

@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-11 col-md-offset-0'>
            <h4>{{ $title }}</h4>
            <div class='panel panel-default'>

                <div class='panel-heading' style='background: #2e6da4; color: white;'>
                    Form Jadwal Pembuatan Kue
                </div><br>

                <div class=' panel-body'>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div>
                    @elseif(\Session::has('error'))
                    <div class="alert alert-danger">
                        <p>{{ \Session::get('error') }}</p>
                    </div>
                    @endif

                    <form method="POST" action="{{url('events')}}">
                        @csrf

                        <label for="">Pilih Pemesanan untuk dibuat kuenya</label>
                        <select name="pemesanan_id" class='form-control select2'>
                            @foreach($pemesanan_id as $ps)
                            <option value="{{ $ps->id }}">{{$ps->nama}}</option>
                            @endforeach
                        </select><br><br><br>

                        <label for="">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Kegiatan"><br><br>

                        <label for="">Pilih Warna Penanda</label>
                        <input type="color" class="form-control" name="color" placeholder="Pilih warna penanda"><br><br>

                        <label for="">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="start_date" placeholder="Tanggal Mulai"><br><br>

                        <label for="">Tanggal Selesai</label>
                        <input type="date" class="form-control" name="end_date" placeholder="Tanggal Selesai"><br><br>

                        <input type="submit" name="submit" class="btn btn-primary" value="Tambahkan Jadwal Pembuatan Kue">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection