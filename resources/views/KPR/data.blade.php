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

                <div class='table-responsive'>
                    <table class='table myTable'>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nama Rumah</th>
                                <th>Tipe Rumah</th>
                                <th>Status</th>
                                @if(\Auth::user()->role == 'kper')
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kpr as $e=>$r)
                            <tr>
                                <td>{{$e+1}}</td>
                                <td>{{$r->name}}</td>
                                <td>{{$r->alamat}}</td>
                                <td>{{$r->nama}}</td>
                                <td>{{$r->tipe}}</td>
                                <td>{{$r->status}}
                                @if(\Auth::user()->role == 'kper')
                                <td>
                                    <div style="width:100px">
                                        <a href="/kpr/detail/{{$r->id}}" class="btn btn-primary btn-sm">Detail</a>
                                        <!-- <a href="/Rumah/edit/{{$r->id}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a> -->
                                        <!-- <button href='{{ url('Rumah/hapus/'.$r->id) }}' class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button> -->
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