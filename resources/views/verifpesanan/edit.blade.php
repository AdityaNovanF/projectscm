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

                <form role="form" accept='{{url('verifpesanan/'.$dt->id)}}' method='post' enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gambar</label><br>
                            <img src="{{asset('storage/'.$dt->barang_r->gambar)}}" height="250px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Barang</label>
                            <select name="barang_id" class='form-control select2' disabled>
                                @foreach($barang_id as $ba)
                                <option value="{{ $ba->id }}" {{ ($dt->barang_id == $ba->id)?'selected' : '' }}>{{$ba->nama}}, stock = {{$ba->stock}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah</label>
                            <input type="number" name='jumlah' class="form-control" id="exampleInputEmail1" placeholder="Jumlah" value='{{$dt->jumlah}}' disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="number" name='barang_id' class="form-control" id="exampleInputEmail1" placeholder="Harga" value='{{$dt->barang_r->harga}}' disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Total</label>
                            <input type="number" name='total' class="form-control" id="exampleInputEmail1" placeholder="Total" value='{{$dt->total}}' disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status :</label>
                            <select name="status" class="form-control" id="exampleFormControlSelect1" value="{{old('status')}}" style="width: 20%">
                                <option value="Belum Terverifikasi" {{(old('status') == 'Belum Terverifikasi') ? ' selected' : ''}}>Belum Terverifikasi</option>
                                <option value="Sudah Terverifikasi" {{(old('status') == 'Sudah Terverifikasi') ? ' selected' : ''}}>Sudah Terverifikasi</option>
                            </select>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
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