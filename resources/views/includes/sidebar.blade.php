<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ url('assets/img/logo-recis-blue.png') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">RAMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link " href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data - data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    {{-- <li class="nav-item {{ (request()->is('user*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('user')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span></a> --}}
    </li>
    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{url('peminjaman')}}">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Peminjaman</span></a>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('warehouse.index') }}">
            <i class="fas fa-fw fa-warehouse"></i>
            <span>Warehouse</span></a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Transaksi Barang</span>
        </a>
        <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Transaksi Barang</h6>
                <a class="collapse-item" href="{{ route('good_loan.index') }}">Peminjaman Barang</a>
                <a class="collapse-item" href="{{ route('good_entry.index') }}">Barang Masuk</a>
                <a class="collapse-item" href="{{ route('good_out.index') }}">Barang Keluar</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{url('input_ruangan')}}">
            <i class="fas fa-fw fa-university"></i>
            <span>Barang Ruangan</span></a>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{url('keluar')}}">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>Barang Keluar</span></a>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>Barang Keluar</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Barang Keluar</h6>
                <a class="collapse-item" href="#">Keranjang Keluar</a>
                <a class="collapse-item" href="#">Data
                    Keluar</a>
            </div>
        </div>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{url('masuk')}}">
            <i class="fas fa-fw fa-rocket"></i>
            <span>Barang Masuk</span></a>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-rocket"></i>
            <span>Barang Masuk</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Barang Masuk</h6>
                <a class="collapse-item" href="#">Keranjang Masuk</a>
                <a class="collapse-item" href="#">Data Masuk</a>
            </div>
        </div>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsec" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Data Barang</span>
        </a>
        <div id="collapsec" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Barang</h6>
                <a class="collapse-item" href="{{ route('damaged_good.index') }}">Barang Rusak</a>
                <a class="collapse-item" href="{{ route('issued_good.index') }}">Barang Bermasalah</a>
                <a class="collapse-item" href="{{ route('returned_good.index') }}">Barang Diretur</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Lain - Lain
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan</span>
        </a>
        <div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Laporan</h6>
                <a class="collapse-item" href="#">Barang Masuk</a>
                <a class="collapse-item" href="#">Barang Keluar</a>
                <a class="collapse-item" href="#">Data Peminjaman</a>
                <a class="collapse-item" href="#">Barang Ruangan</a>
                <a class="collapse-item" href="#">Barang Rusak Luar</a>
                <a class="collapse-item" href="#">Barang Rusak Dalam</a>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->