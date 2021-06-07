<head>
    <title>Detail Tipe Rumah</title>
    <link rel="shortcut icon" href="{{asset('images/logoscm.png')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{asset('guest/layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
        .content{
            background-color:white;
            text-align:center;
        }
        .title{
            margin-top: 50px;
            margin-bottom: 30px;
            font-size: 40px !important;
            font-weight:bold;
        }    
    </style>
</head>
<div class="content">
    <div class="wrapper row0">
        <header id="header" class="hoc clear center">
            <h1 id="logo"><a href="{{url('landing')}}"><img src="{{asset('images/logo2.png')}}" style="width: 17%; margin-top: -4%; margin-bottom: -4%;" alt=""></a></h1>
        </header>
    </div>
    @foreach($rumah as $r)
    <div class="title">
      {{$r->nama}}
    </div>
    <div>
        <img src="{{ asset('guest/images/demo') }}/{{ $r->gambar }}" height="70%" width="50%" alt="" srcset="">
    </div>
    <div class="col-lg-6 pt-4 pt-lg-0 content">
        <h4>Tipe:{{$r->tipe}}</h4>
        <p>
            {{$r->deskripsi}}
        </p>
    </div>
    @endforeach
</div>