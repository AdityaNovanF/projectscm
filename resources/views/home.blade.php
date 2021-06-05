@extends('layouts.master')

@section('content')
<!-- Intro settings -->
<style>
    /* Default height for small devices */
    #intro-example {
        height: 400px;
    }

    /* Height for devices larger than 992px */
    @media (min-width: 992px) {
        #intro-example {
            height: 600px;
        }
    }
</style>

<!-- Background image -->
<div id="intro-example" class="p-5 text-center bg-gray" style="">
    <div class="mask" style="">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white"><br><br><br><br><br><br><br>
                <h1 class="mb-3 text-primary" style=""><strong><b>SELAMAT DATANG</b></strong></h1>
                <h2 class="mb-4 text-black" style=""> <strong>~{{\Auth::user()->name}}~</strong><br> Sistem Manajement Perumahan "Rumah Terpadu"</h2>
                @if(\Auth::user()->role == 'admin')
                <a class="btn btn-outline-light btn-lg m-2 bg-primary" style="color: white;" href="{{ url('/kue') }}">DATA KUE</a>
                @elseif(\Auth::user()->role == 'pegawai')
                <a class="btn btn-outline-light btn-lg m-2 bg-primary" style="color: white;" href="{{ url('/pemesanan') }}">PEMESANAN</a>
                @endif

            </div>
        </div>
    </div>
</div>
<!-- Background image -->
@endsection