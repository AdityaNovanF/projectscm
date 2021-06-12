<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pilihan Tipe Rumah</title>
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
          <h3>Sistem Rumah Terpadu</h3>
          <p>Choose Your Own Dream House</p>
          <a class="cta-btn" href="/KPR/form">Ajukan KPR</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= More Services Section ======= -->
    <section class="more-services section-bg">
      <div class="container">
        <div class="row">
          @foreach($rumah as $r)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="card">
              <img src="{{ asset('guest/images/demo') }}/{{ $r->gambar }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><a href="">{{$r->nama}}</a></h5>
                <p class="card-text">{{$r->deskripsi}}</p>
                <a href="/rumah/detail/{{$r->id}}" class="btn">View Detail</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End More Services Section -->

  <!-- Vendor JS Files -->
  <!-- <script src="{{asset('home/assets/vendor/jquery/jquery.min.js')}}"></script> -->
  <script src="{{asset('type/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>