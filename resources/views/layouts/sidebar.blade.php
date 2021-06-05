<section class="sidebar">

  <ul class="sidebar-menu" data-widget="tree">

    <li><img src="{{asset('images/logoscm.png')}}" height="220px" style=""></li>

    <li class="menu-sidebar"><a href="{{ url('/home') }}"><span class="fa fa-calendar-minus-o"></span> Beranda Dashboard</span></a></li>
    <li class="menu-sidebar"><a href="{{ url('/barang') }}"><span class="fa fa-calendar-minus-o"></span>Data Barang</span></a></li>

    @if(\Auth::user()->role == 'kper')
    <li class="menu-sidebar"><a href="{{ url('/verifpesanan') }}"><span class="fa fa-calendar-minus-o"></span>Daftar Pesanan</span></a></li>
    @elseif(\Auth::user()->role == 'kpem')
    <li class="menu-sidebar"><a href="{{ url('/pesanan') }}"><span class="fa fa-calendar-minus-o"></span>Daftar Pesanan</span></a></li>
    @elseif(\Auth::user()->role == 'supplier')
    <li class="menu-sidebar"><a href="{{ url('/pesanan') }}"><span class="fa fa-calendar-minus-o"></span>Daftar Pesanan</span></a></li>
    @endif

    <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>

  </ul>
</section>