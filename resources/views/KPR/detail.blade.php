@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>

            <div class="box-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form role="form" action="{{ url('/kpr/konfirm') }}/{{ $kpr->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name='nama' class="form-control" id="exampleInputEmail1" placeholder="Nama" value="{{$kpr->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" name='tipe' class="form-control" id="exampleInputEmail1" placeholder="Tipe" value="{{$kpr->alamat}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Rumah Pilihan</label>
                            <input type="text" name='deskripsi' class="form-control" id="exampleInputEmail1" placeholder="Deskripsi" value="{{$kpr->nama}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipe Rumah</label>
                            <input type="text" name='deskripsi' class="form-control" id="exampleInputEmail1" placeholder="Tipe Rumah" value="{{$kpr->tipe}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <input type="text" name='status' class="form-control" id="exampleInputEmail1" placeholder="Status" value="{{$kpr->status}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slip Gaji</label>
                            <div>
                                <img src="{{ asset('guest/images/demo') }}/{{ $kpr->gaji }}" height="300px" width="400px" alt="" srcset="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Foto KK</label>
                            <div>
                                <img src="{{ asset('guest/images/demo') }}/{{ $kpr->fotoKK }}" height="300px" width="400px" alt="" srcset="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Foto KTP</label>
                            <div>
                                <img src="{{ asset('guest/images/demo') }}/{{ $kpr->fotoKTP }}" height="300px" width="400px" alt="" srcset="">
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {

        // btn refresh
        $('.btn-refresh').click(function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

    })
</script>

@endsection