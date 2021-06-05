@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    @if(\Auth::user()->role == 'supplier')
                    <a href='{{ url('barang/add') }}' class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data Barang</a>
                    @endif
                </p>
            </div>
            <div class="box-body">

                <div class='table-responsive'>
                    <table class='table myTable'>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Stock</th>
                                <th>Harga</th>
                                @if(\Auth::user()->role == 'supplier')
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>{{$e+1}}</td>
                                <td>{{$dt->nama}}</td>
                                <td><img src="{{asset('storage/'.$dt->gambar)}}" height="150px"></td>
                                <td>{{$dt->stock}}</td>
                                <td>{{$dt->harga}}</td>
                                @if(\Auth::user()->role == 'supplier')
                                <td>
                                    <div style="width:60px">
                                        <a href='{{ url('barang/'.$dt->id) }}' class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <button href='{{ url('barang/'.$dt->id) }}' class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
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