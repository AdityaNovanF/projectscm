@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href='{{ url('faktur/add') }}' class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Kirim Faktur</a>
                </p>
            </div>
            <div class="box-body">

                <div class='table-responsive'>
                    <table class='table table-hover myTable'>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Faktur</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>{{ $e+1 }}</td>
                                <td>
                                    {{ $dt->pesanan_r->nama }} <br>
                                    <img src="{{asset('storage/'.$dt->gambar)}}" height="150px">
                                </td>
                                <td>{{ $dt->pesanan_r->jumlah }}</td>
                                <td>{{ $dt->pesanan_r->total }}</td>
                                <td>
                                    @if($dt->status != 'Konfirmasi')
                                    <button type="button" class="btn btn-danger" disabled>{{$dt->status}}</button>
                                    @elseif($dt->status != 'Belum Konfirmasi')
                                    <button type="button" class="btn btn-success" disabled>{{$dt->status}}</button>
                                    @endif
                                </td>
                                <td>
                                    <div style="width:80px">
                                        @if($dt->status == 'Belum Konfirmasi')
                                        <a href='{{url('faktur/'.$dt->id)}}' class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                        @elseif($dt->status == 'Konfirmasi')
                                        <button href='{{url('faktur/'.$dt->id)}}' class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i> Hapus</button>
                                        @endif
                                    </div>
                                </td>
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