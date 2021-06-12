@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    @if(\Auth::user()->role == 'kper')
                    <a href='{{ url('/Info/form') }}' class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data Informasi</a>
                    @endif
                </p>
            </div>
            <div class="box-body">

                <div class='table-responsive'>
                    <table class='table myTable'>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Tanggal Dibuat</th>
                                <th>Konten</th>
                                @if(\Auth::user()->role == 'kper')
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($info as $e=>$i)
                            <tr>
                                <td>{{$e+1}}</td>
                                <td>{{$i->judul}}</td>
                                <td>{{$i->created_at}}</td>
                                <td>{{substr($i->konten,0,50)}}...</td>
                                @if(\Auth::user()->role == 'kper')
                                <td>
                                    <div style="width:100px">
                                        <!-- <a href="/KPembangunan/detail/{{$i->id}}" class="btn btn-primary btn-sm">Data Barang</a> -->
                                        <a href="/Info/edit/{{$i->id}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <button href='{{ url('Info/hapus/'.$i->id) }}' class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
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