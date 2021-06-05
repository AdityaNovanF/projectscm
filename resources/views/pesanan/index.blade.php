@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    @if(\Auth::user()->role == 'kpem')
                    <a href='{{ url('pesanan/add') }}' class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Buat Pesanan</a>
                    @endif
                </p>
            </div>
            <div class="box-body">

                <div class='table-responsive'>
                    <table class='table table-hover myTable'>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Status</th>
                                @if(\Auth::user()->role == 'kpem')
                                <th>action</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            @if(\Auth::user()->role == 'supplier')
                            @foreach($data2 as $e=>$dt)
                            <tr>
                                <td>{{ $e+1 }}</td>
                                <td>
                                    {{ $dt->barang_r->nama }} <br>
                                    <img src="{{asset('storage/'.$dt->barang_r->gambar)}}" height="150px">
                                </td>
                                <td>{{ $dt->jumlah }}</td>
                                <td>{{ $dt->barang_r->harga }}</td>
                                <td>{{ $dt->total }}</td>
                                <td>
                                    @if($dt->status != 'Sudah Terverifikasi')
                                    <button type="button" class="btn btn-danger" disabled>{{$dt->status}}</button>
                                    @elseif($dt->status != 'Belum Terverifikasi')
                                    <button type="button" class="btn btn-success" disabled>{{$dt->status}}</button>
                                    @endif
                                </td>
                                <td>
                                    <div style="width:80px">
                                        @if(\Auth::user()->role == 'kpem')
                                        <a href='{{url('pesanan/'.$dt->id)}}' class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <button href='{{url('pesanan/'.$dt->id)}}' class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            @elseif(\Auth::user()->role == 'kper')
                            @foreach($data3 as $e=>$dt)
                            <tr>
                                <td>{{ $e+1 }}</td>
                                <td>
                                    {{ $dt->barang_r->nama }} <br>
                                    <img src="{{asset('storage/'.$dt->barang_r->gambar)}}" height="150px">
                                </td>
                                <td>{{ $dt->jumlah }}</td>
                                <td>{{ $dt->barang_r->harga }}</td>
                                <td>{{ $dt->total }}</td>
                                <td>
                                    @if($dt->status != 'Sudah Terverifikasi')
                                    <button type="button" class="btn btn-danger" disabled>{{$dt->status}}</button>
                                    @elseif($dt->status != 'Belum Terverifikasi')
                                    <button type="button" class="btn btn-success" disabled>{{$dt->status}}</button>
                                    @endif
                                </td>
                                <td>
                                    <div style="width:80px">
                                        @if(\Auth::user()->role == 'kpem')
                                        <a href='{{url('pesanan/'.$dt->id)}}' class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <button href='{{url('pesanan/'.$dt->id)}}' class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            @elseif(\Auth::user()->role == 'kpem')
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>{{ $e+1 }}</td>
                                <td>
                                    {{ $dt->barang_r->nama }} <br>
                                    <img src="{{asset('storage/'.$dt->barang_r->gambar)}}" height="150px">
                                </td>
                                <td>{{ $dt->jumlah }}</td>
                                <td>{{ $dt->barang_r->harga }}</td>
                                <td>{{ $dt->total }}</td>
                                <td>
                                    @if($dt->status != 'Sudah Terverifikasi')
                                    <button type="button" class="btn btn-danger" disabled>{{$dt->status}}</button>
                                    @elseif($dt->status != 'Belum Terverifikasi')
                                    <button type="button" class="btn btn-success" disabled>{{$dt->status}}</button>
                                    @endif
                                </td>
                                <td>
                                    <div style="width:80px">
                                        @if(\Auth::user()->role == 'kpem')
                                        <a href='{{url('pesanan/'.$dt->id)}}' class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <button href='{{url('pesanan/'.$dt->id)}}' class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>

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