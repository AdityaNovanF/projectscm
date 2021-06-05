@extends('layouts.master')

@section('content')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />
<div class='container'>
    <div class='col-md-12'>
        <h3>{{ $title }}</h3>


        <div class='row col-md-offset-9'>
            @if(\Auth::user()->role == 'pegawai')
            <a href="/addevent" class="btn btn-success">Tambah Jadwal</a>
            @endif
            <a href="/displaydata" class="btn btn-primary">Detail Jadwal</a>
        </div><br>

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif

        <div class='row'>
            <div class='col-md-11 col-md-offset-0'>
                <div class='panel panel-default'>
                    <div class='panel-heading text-white bg-aqua-active'>
                        <strong>Sesuaikan Jadwal Pembuatan kue dengan Pemesanan</strong>
                    </div>
                    <div class='panel-body'>
                        {!! $calendar->calendar()!!}
                        {!! $calendar->script()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />
@endsection