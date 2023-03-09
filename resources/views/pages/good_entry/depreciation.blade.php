@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Penyusutan Barang</h1>
        <a href="{{ route('summary_pdf') }}" class="btn btn-primary">PDF</a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Search Filter -->
            <form action="/depreciation_report" method="get">
                <div class="row filter-row mb-4">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <div class="cal-icon">
                                <input class="form-control" type="date" name="start_date">
                            </div>
                            <label class="focus-label">From</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <div class="cal-icon">
                                <input class="form-control" type="date" name="end_date">
                            </div>
                            <label class="focus-label">To</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" required>
                            <label for="search">Kode Barang</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <select name="department" required class="form-control">
                                <option value="">Pilih Department</option>
                                <option value="R01">TK</option>
                                <option value="R02">SD</option>
                                <option value="R03">SMP</option>
                                <option value="R04">SMA</option>
                                <option value="R05">Yayasan</option>
                                <option value="R06">Yayasan Lama</option>
                                <option value="R07">Kantin</option>
                                <option value="R08">Toko Sekolah</option>
                                <option value="R09">Markom</option>
                            </select>
                            <label for="department">Department</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button class="btn btn-success btn-block" type="submit">Cari</button>
                    </div>
                </div>
            </form>
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Ruangan</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Beli</th>
                                    <th>Harga Beli</th>
                                    <th>Umur Barang</th>
                                    <th>Penyusutan</th>
                                    <th>Nilai Buku</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($filter_items as $filter_item)
                                <tr>
                                    <td>{{ $filter_item->code_goods }}</td>
                                    <td>{{ $filter_item->good->stuff }}</td>
                                    <td>{{ $filter_item->room->room_name }}</td>
                                    <td>{{ $filter_item->stock }}</td>
                                    <td>{{ $filter_item->date_of_entry }}</td>
                                    <td>{{ $filter_item->good->price }}</td>
                                    <td>{{ $filter_item->useful_life }}</td>
                                    <td>{{ $filter_item->accumulated_depreciation }}</td>
                                    <td>{{ $filter_item->net_book_value }}</td>
                                    <td>
                                        <a href="{{ route('depreciation_edit', $filter_item->id) }}"
                                            class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->


</div>

<!-- /.container-fluid -->
@endsection