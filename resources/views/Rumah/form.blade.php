@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{$title}}</h4>
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

                <form role="form" action="{{ url('/Rumah/tambah') }}" method='post' enctype="multipart/form-data">
                @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name='nama' class="form-control" id="exampleInputEmail1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipe</label>
                            <select class="form-control @error('tipe') is-invalid @enderror" name="tipe" id="tipe" value="{{old('tipe')}}">
                                <option value="{{old('id_kecamatan')}}">-- Pilih Tipe Rumah --</option>
                                @foreach ($tipe as $k)
                                    <option 
                                        value="{{ $k->id }}">{{ $k->nama_kecamatan}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <input type="text" name='deskripsi' class="form-control" id="exampleInputEmail1" placeholder="Deskripsi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gambar</label>
                            <input type="file" name='gambar' class="form-control" id="exampleInputEmail1" placeholder="Gambar" value="{{ old('gambar') }}">
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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