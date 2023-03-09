<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon n-15">
            <img src="{{ url('assets/img/logo-recis-blue.png') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">INVENTORY DEMO</div>
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

    @if (Auth::user()->roles === 'ADMIN')
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Master</h6>
                <a class="collapse-item" href="{{ route('category.index') }}">Kategori</a>
                <a class="collapse-item" href="{{ route('sub_category.index') }}">Sub Kategori</a>
                <a class="collapse-item" href="{{ route('good.index') }}">Barang</a>
                {{-- <a class="collapse-item" href="{{ route('gallery.index') }}">Gambar Barang</a> --}}
                <a class="collapse-item" href="{{ route('code_room.index') }}">Kode Ruangan</a>
                <a class="collapse-item" href="{{ route('room.index') }}">Ruangan</a>
                <a class="collapse-item" href="{{ route('supplier.index') }}">Supplier</a>
                <a class="collapse-item" href="{{ route('employee.index') }}">Data Karyawan</a>
                <a class="collapse-item" href="{{ route('chart_of_account.index') }}">Bagan Akun</a>
            </div>
        </div>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Data User</span></a>
    </li> --}}
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Inventory
    </div>

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

    {{-- <div class="sidebar-heading">
        Purchase
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('request.index') }}">
            <i class="fas fa-fw fa-warehouse"></i>
            <span>Purchase Request</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('purchase.order') }}">
            <i class="fas fa-fw fa-warehouse"></i>
            <span>Purchase Order</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-warehouse"></i>
            <span>Payment Voucher</span></a>
    </li> --}}

    <!-- Divider -->
    {{--
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
                <a class="collapse-item" href="{{ route('summary_report') }}">Rangkuman Barang</a>
                <a class="collapse-item" href="{{ route('depreciation_report') }}">Penyusutan Barang</a>
            </div>
        </div>
    </li> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->