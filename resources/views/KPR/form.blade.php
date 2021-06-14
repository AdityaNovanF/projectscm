<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{$title}}</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="{{asset('home/img/favicon.png')}}" rel="icon"> -->
    <!-- <link href="{{asset('home/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('type/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('type/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Shuffle - v2.2.0
  * Template URL: https://bootstrapmade.com/bootstrap-3-one-page-template-free-shuffle/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Cta Section ======= -->
    <section class="cta">
        <div class="container">

            <div class="text-center">
                <h1>Form Pengajuan KPR</h1>
                <p>Choose Your Own Dream House</p>
                <!-- <a class="cta-btn" href="/KPR/form">Ajukan KPR</a> -->
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= More Services Section ======= -->
    <section class="more-services section-bg">
        <div class="container">
            @if(session('sukses'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <i class="fa fa-check-circle"></i> Pengajuan KPR anda berhasil dikirim
            </div><br>
            @endif
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
                        <option value="{{ $r->id }}">{{ $r->nama}}
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
                </div><br>
                <div class="box-footer">
                    <center><button type="submit" class="btn btn-secondary">Submit</button></center>
                </div>
            </form>
        </div>
    </section><!-- End More Services Section -->

    <!-- Vendor JS Files -->
    <!-- <script src="{{asset('home/assets/vendor/jquery/jquery.min.js')}}"></script> -->
    <script src="{{asset('type/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>