@extends('navbar')
@section('title', 'Data Barang Supplier')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <center><h1>Data Barang Supplier</h1></center>
    </section>

    <section class="content">
        <div class="col-md-12">
            <!-- <div class="col-ml-6" style="float: left;">
                <a href="/Supplier/formDataBarang" class="btn btn-primary mb-4">Tambah Data</a>
            </div> -->
            <div class="col-mr-6" style="float: right;">
                <form action="/cariBarang" method="GET" class="col-md-12">
                    @csrf
                    <input type="text" name="cari" placeholder="Cari Nama Barang" value="{{ old('Cari') }}" required oninvalid="this.setCustomValidity('Nama harap diisi')" oninput="setCustomValidity('')">
                    <input type="submit" value="Cari">
                </form>
            </div>
        </div>

        <div class="card-body">
            @if(Session::has('success'))
            @include('layouts.flash-success',[ 'message'=> Session('success') ])
            @endif
            <div class="row">
                @foreach ($dataBarang as $br)
                <div class="col-sm-3">
                    <div class="card mb-3">
                        <div class="view overlay">
                            <img class="card-img-top gambar" src="{{ $br->gambar }}" alt="Card image cap">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center font-weight-bold"
                                style="text-transform: capitalize;">
                                {{ Str::words($br->nama,6) }}</h5>
                            <p class="card-text text-center">Rp. {{ number_format($br->harga,2,',','.') }}
                            </p>
                            <a href="/detailBarang/{{$br->id}}"
                                class="btn btn-primary btn-block btn-sm">Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <div class="d-block col-12">
            {{ $dataBarang->links() }}
        </div>
    </section>
</div>
     
@endsection