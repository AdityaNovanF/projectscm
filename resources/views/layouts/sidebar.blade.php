<section class="sidebar">

  <ul class="sidebar-menu" data-widget="tree">

    <li><img src="{{asset('images/logoscm.png')}}" height="220px" style=""></li>

    <li class="menu-sidebar"><a href="{{ url('/home') }}"><span class="fa fa-calendar-minus-o"></span> Beranda Dashboard</span></a></li>

    @if(\Auth::user()->role == 'kper')
    <li class="menu-sidebar"><a href="{{ url('/dataSupplier') }}"><span class="fa fa-calendar-minus-o"></span>Data Supplier</span></a></li>
    <li class="menu-sidebar"><a href="{{ url('/dataKPembangunan') }}"><span class="fa fa-calendar-minus-o"></span>Data Kepala Pembangunan</span></a></li>
    <li class="menu-sidebar"><a href="{{ url('/dataRumah') }}"><span class="fa fa-calendar-minus-o"></span>Data Rumah</span></a></li>
    <li class="menu-sidebar"><a href="{{ url('/barang') }}"><span class="fa fa-calendar-minus-o"></span>Data Barang</span></a></li>
    <li class="menu-sidebar"><a href="{{ url('/dataInformasi') }}"><span class="fa fa-calendar-minus-o"></span>Data Informasi</span></a></li>
    <li class="menu-sidebar"><a href="{{ url('/verifpesanan') }}"><span class="fa fa-calendar-minus-o"></span>Data Pemesanan Barang</span></a></li>
    <li class="menu-sidebar"><a href="{{ url('/pengajuanKPR') }}"><span class="fa fa-calendar-minus-o"></span>Pengajuan KPR</span></a></li>
    <li class="menu-sidebar"><a href="{{ url('/konfirmfaktur') }}"><span class="fa fa-calendar-minus-o"></span>Konfirmasi Faktur</span></a></li>
    <li class="menu-sidebar"><a href="{{ url('/kritikSaran') }}"><span class="fa fa-calendar-minus-o"></span>Data Kritik Saran</span></a></li>
    @elseif(\Auth::user()->role == 'kpem')
    <li class="menu-sidebar"><a href="{{ url('/barang') }}"><span class="fa fa-calendar-minus-o"></span>Data Barang</span></a></li>
    <li class="menu-sidebar"><a href="{{ url('/pesanan') }}"><span class="fa fa-calendar-minus-o"></span>Daftar Pesanan</span></a></li>
    @elseif(\Auth::user()->role == 'supplier')
    <li class="menu-sidebar"><a href="{{ url('/barang') }}"><span class="fa fa-calendar-minus-o"></span>Data Barang</span></a></li>
    <li class="menu-sidebar"><a href="{{ url('/pesanan') }}"><span class="fa fa-calendar-minus-o"></span>Daftar Pesanan</span></a></li>
    <li class="menu-sidebar"><a href="{{ url('/faktur') }}"><span class="fa fa-calendar-minus-o"></span>Data Faktur</span></a></li>
    @endif

    <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>

  </ul>
</section>