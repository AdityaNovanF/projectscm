@extends('Guest.layouts.master')

@section('content')
<div class="wrapper row3" id="tipe">
    <main class="hoc container clear">
        <div class="sectiontitle">
            <h6 class="heading font-x3">Tipe Rumah</h6>
            <p>Ini merupakan daftar tipe rumah yang dapat anda pilih</p>
        </div>
        <div class="posts">
            @foreach($rumah as $r)
            <figure class="group">
                <div><a class="imgover" href="#"><img src="{{ asset('guest/images/demo') }}/{{ $r->gambar }}" alt=""></a></div>
                <figcaption>
                    <h6 class="heading">{{$r->nama}}</h6>
                    <p>{{$r->deskripsi}}</p>
                    <footer><a class="btn" href="/rumah/detail/{{$r->id}}">View Details</a></footer>
                </figcaption>
            </figure>
            @endforeach
        </div><br><br>
        @if(count($rumah) >= 2)
        <div class="more">
            <center><a href="/tipeRumah"><button type="button" class="btn btn-primary">Tipe Rumah Lainnya</button></a></center>
        </div>
        @endif
        <div class="clear"></div>
    </main>
</div>

<div class="wrapper bgded overlay" style="background-image:url('{{asset('guest/images/demo/backgrounds/home2.jpg')}}');" id="keuntungan">
    <section class="hoc container clear">
        <div class="sectiontitle">
            <h6 class="heading font-x3">Keuntungan yang Anda Dapatkan</h6>
            <p>Berbagai kemudahan dan keuntungan yang bisa anda dapatkan</p>
        </div>
        <ul class="nospace group center">
            <li class="one_third first">
                <article><i class="btmspace-30 fa-6x fas fa-hands-helping"></i>
                    <h6 class="heading">Dibangun Dengan Bahan Yang Berkualitas Tinggi</h6>
                    <p class="btmspace-30">Dengan bekerjasama bersama perusahaan property terbaik di daerah Jember dan sekitarnya.</p>
                </article>
            </li>
            <li class="one_third">
                <article><i class="btmspace-30 fa-6x fas fa-gem"></i>
                    <h6 class="heading">Memudahkan Anda Memiliki Rumah Impian</h6>
                    <p class="btmspace-30">Dengan banyak tipe rumah yang kami sediakan dengan berbagai model yang elegan dan modern.</p>
                </article>
            </li>
            <li class="one_third">
                <article><i class="btmspace-30 fa-6x fas fa-volleyball-ball"></i>
                    <h6 class="heading">Menjadi Hunian Ternyaman Untuk Keluarga anda</h6>
                    <p class="btmspace-30">Didesign dengan sesuai kebutuhan Anda dan keluarga sehingga menjadi hunian ternyaman.</p>
                </article>
            </li>
        </ul>

    </section>
</div>

<div class="wrapper row2" id="informasi">
    <section class="hoc container clear">

        <div class="sectiontitle">
            <h6 class="heading font-x3">More Information</h6>
            <p>Lebih mengenal kami tentang informasi lebih lanjut</p>
        </div>

        <ul class="nospace group latest" style="margin-left: 15%;">
            @foreach($info as $i)
            <li class="one_quarter">
                <article>
                    <h6 class="heading"><a href="#">{{$i->judul}}</a></h6>
                    <p>{{$i->konten}}</p>
                    <ul class="nospace meta">
                        <li>
                            <time datetime="2045-04-05T08:15+00:00"><i class="far fa-calendar-alt rgtspace-5"></i>{{$i->created_at}}</time>
                        </li>
                    </ul>
                </article>
            </li>
            @endforeach
        </ul>
    </section>
</div>



<div class="wrapper bgded" style="background-image:url('{{asset('images/tipea.jpg')}}');" id="kritik">
    <section id="callback" class="hoc clear">
        <div>
            <h6 class="heading">Kritik dan Saran</h6>
            <p class="btmspace-30">Kirimkan kritik dan saran anda kepada kami</p>
            @if(session('sukses'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <i class="fa fa-check-circle"></i> Kritik dan saran anda berhasil terkirim
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
            <form role="form" action="{{ url('/kritikSaran/tambah') }}" method='post' enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <input type="text" name="nama" value="" placeholder="Nama">
                    <textarea type="text" name="isi" id="" cols="60%" rows="10" placeholder="Kritik dan Saran"></textarea>
                    <button type="submit" value="submit">Submit</button>
                </fieldset>
            </form>
        </div>

    </section>
</div>
@endsection