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

                <form role="form" accept='{{url('konfirmfaktur/'.$dt->id)}}' method='post' enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pesanan</label>
                            <input type="text" name='nama' class="form-control" id="exampleInputEmail1" placeholder="Jumlah" value='{{$dt->pesanan_r->nama}}' disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Faktur</label><br>
                            <img src="{{asset('storage/'.$dt->gambar)}}" height="250px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah</label>
                            <input type="number" name='jumlah' class="form-control" id="exampleInputEmail1" placeholder="Jumlah" value='{{$dt->pesanan_r->jumlah}}' disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Total</label>
                            <input type="number" name='total' class="form-control" id="exampleInputEmail1" placeholder="Total" value='{{$dt->pesanan_r->total}}' disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status :</label>
                            <select name="status" class="form-control" id="exampleFormControlSelect1" value="{{old('status')}}" style="width: 20%">
                                <option value="Belum Konfirmasi" {{(old('status') == 'Belum Konfirmasi') ? ' selected' : ''}}>Belum Konfirmasi</option>
                                <option value="Konfirmasi" {{(old('status') == 'Konfirmasi') ? ' selected' : ''}}>Konfirmasi</option>
                            </select>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Ok</button>
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