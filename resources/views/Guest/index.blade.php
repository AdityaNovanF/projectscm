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
            <a class="btn center-block" href="/dataRumah" style="align:center">Tipe Rumah Lainnya</a>
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
        <ul class="nospace group latest">
            <li class="one_third first">
                <article>
                    <h6 class="heading"><a href="#">Hendrerit venenatis</a></h6>
                    <p>Malesuada ut eleifend sed odio class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos pellentesque ut est vitae orci ultrices posuere cras ornare arcu vivamus a leo vestibulum venenatis erat non arcu proin risus tellus bibendum.</p>
                    <ul class="nospace meta">
                        <li><i class="fas fa-user rgtspace-5"></i> <a href="#">Admin</a></li>
                        <li><i class="fas fa-tags rgtspace-5"></i> <a href="#">Category Tag</a></li>
                        <li>
                            <time datetime="2045-04-05T08:15+00:00"><i class="far fa-calendar-alt rgtspace-5"></i> 05 April 2045</time>
                        </li>
                    </ul>
                    <footer><a class="btn" href="#">View Details</a></footer>
                </article>
            </li>
            <li class="one_third">
                <article>
                    <h6 class="heading"><a href="#">Sed volutpat sit amet</a></h6>
                    <p>Ultrices vitae ante fusce tellus quam placerat id bibendum eget pharetra at velit maecenas ut eros vel tortor viverra auctor phasellus ligula mauris erat suspendisse vitae sapien eu mi placerat tincidunt proin semper lorem in urna vivamus suscipit est vitae nisi.</p>
                    <ul class="nospace meta">
                        <li><i class="fas fa-user rgtspace-5"></i> <a href="#">Admin</a></li>
                        <li><i class="fas fa-tags rgtspace-5"></i> <a href="#">Category Tag</a></li>
                        <li>
                            <time datetime="2045-04-04T08:15+00:00"><i class="far fa-calendar-alt rgtspace-5"></i> 04 April 2045</time>
                        </li>
                    </ul>
                    <footer><a class="btn" href="#">View Details</a></footer>
                </article>
            </li>
            <li class="one_third">
                <article>
                    <h6 class="heading"><a href="#">Suspendisse suscipit</a></h6>
                    <p>Nibh et interdum varius orci lacus pretium pede non malesuada ligula nibh ut tortor aenean tincidunt turpis vel ante donec tortor neque placerat eget aliquam id imperdiet nec odio ut ligula suspendisse praesent aliquet facilisis tortor donec posuere accumsan pede.</p>
                    <ul class="nospace meta">
                        <li><i class="fas fa-user rgtspace-5"></i> <a href="#">Admin</a></li>
                        <li><i class="fas fa-tags rgtspace-5"></i> <a href="#">Category Tag</a></li>
                        <li>
                            <time datetime="2045-04-03T08:15+00:00"><i class="far fa-calendar-alt rgtspace-5"></i> 03 April 2045</time>
                        </li>
                    </ul>
                    <footer><a class="btn" href="#">View Details</a></footer>
                </article>
            </li>
        </ul>
    </section>
</div>

<div class="wrapper bgded" style="background-image:url('{{asset('images/tipea.jpg')}}');" id="kritik">
    <section id="callback" class="hoc clear">
        <div>
            <h6 class="heading">Kritik dan Saran</h6>
            <p class="btmspace-30">Kirimkan kritik dan saran anda kepada kami</p>
            <form method="post" action="#">
                <fieldset>
                    <input type="text" value="" placeholder="Nama">
                    <input type="text" value="" placeholder="Kritik dan Saran">
                    <button type="submit" value="submit">Submit</button>
                </fieldset>
            </form>
        </div>

    </section>
</div>
@endsection