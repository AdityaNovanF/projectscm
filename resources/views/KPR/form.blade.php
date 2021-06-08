
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

                <form role="form" action="{{ url('/KPR/tambah') }}" method='post' enctype="multipart/form-data">
                @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name='nama' class="form-control" id="exampleInputEmail1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" name='alamat' class="form-control" id="exampleInputEmail1" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipe Rumah</label>
                                <select class="form-control @error('id_rumah') is-invalid @enderror" name="id_rumah" id="id_rumah" value="{{old('id_rumah')}}">
                                    <option value="{{old('id_rumah')}}">-- Pilih Tipe Rumah --</option>
                                    @foreach ($rumah as $r)
                                        <option 
                                            value="{{ $r->id }}">{{ $r->nama}}
                                        </option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slip Gaji</label>
                            <input type="file" name='gaji' class="form-control" id="exampleInputEmail1" placeholder="Deskripsi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Foto KK</label>
                            <input type="file" name='fotoKK' class="form-control" id="exampleInputEmail1" placeholder="Foto KK" value="{{ old('fotoKK') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Foto KTP</label>
                            <input type="file" name='fotoKTP' class="form-control" id="exampleInputEmail1" placeholder="Foto KTP" value="{{ old('gambar') }}">
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>

            </div>

        </div>
    </div>
</div>


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