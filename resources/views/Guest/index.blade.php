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
        </div>
        <div class="more">
            <button type="button" class="btn btn-info" href="/dataRumah">Tipe Rumah Lainnya</button>
        </div>
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
                    <h6 class="heading">Mauris eu enim quisque</h6>
                    <p class="btmspace-30">Dignissim neque et consectetuer dapibus magna elit vehicula libero vel interdum dolor neque in lacus pellentesque.</p>
                    <footer><a class="btn inverse" href="#">View Details</a></footer>
                </article>
            </li>
            <li class="one_third">
                <article><i class="btmspace-30 fa-6x fas fa-gem"></i>
                    <h6 class="heading">Lectus magna laoreet</h6>
                    <p class="btmspace-30">Sit amet tincidunt vel cursus a dui suspendisse in ante cras pede sed et erat cum sociis natoque penatibus et magnis.</p>
                    <footer><a class="btn inverse" href="#">View Details</a></footer>
                </article>
            </li>
            <li class="one_third">
                <article><i class="btmspace-30 fa-6x fas fa-volleyball-ball"></i>
                    <h6 class="heading">Dis parturient montes</h6>
                    <p class="btmspace-30">Nascetur ridiculus mus integer congue elit non semper laoreet lectus orci posuere nisl id tempor lacus felis ac.</p>
                    <footer><a class="btn inverse" href="#">View Details</a></footer>
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
        <div class="col-lg-4 col-md-6">
        @foreach($info as $i)
        <ul class="nospace group latest " >
            <li class="one_third first">
                <article>
                    <h6 class="heading"><a href="#">{{$i->judul}}</a></h6>
                    <p>{{ substr($i->konten, 0, 120) }}</p>
                    <ul class="nospace meta">
                        <!-- <li><i class="fas fa-user rgtspace-5"></i> <a href="#">Admin</a></li> -->
                        <!-- <li><i class="fas fa-tags rgtspace-5"></i> <a href="#">Category Tag</a></li> -->
                        <li>
                            <time datetime="2045-04-05T08:15+00:00"><i class="far fa-calendar-alt rgtspace-5"></i> {{$i->tanggal}}</time>
                        </li>
                    </ul>
                    <footer><a class="btn" href="/info/detail/{{$i->id}}">View Details</a></footer>
                </article>
            </li>
        </ul>
        @endforeach</div>
    </section>
</div>

<div class="wrapper bgded" style="background-image:url('{{asset('images/tipea.jpg')}}');" id="kritik">
    <section id="callback" class="hoc clear">
        <div>
            <h6 class="heading">Kritik dan Saran</h6>
            <p class="btmspace-30">Kirimkan kritik dan saran anda kepada kami</p>
            <form role="form" action="{{ url('/kritikSaran/tambah') }}" method='post' enctype="multipart/form-data">
            @csrf
                <fieldset>
                    <input type="text" name="nama" value="" placeholder="Nama">
                    <input type="text" name="isi" value="" placeholder="Kritik dan Saran">
                    <button type="submit" value="submit">Submit</button>
                </fieldset>
            </form>
        </div>

    </section>
</div>
@endsection