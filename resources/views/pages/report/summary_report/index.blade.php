@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Rangkuman Barang</h1>
        <a href="#" class="btn btn-primary">PDF</a>
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
            <form action="/summary_report" method="get">
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
                                    <th>Supplier</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Kondisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($queries as $query)
                                <tr>
                                    <td>{{ $query->code_goods }}</td>
                                    <td>{{ $query->good->stuff }}</td>
                                    <td>{{ $query->room->room_name }}</td>
                                    <td>{{ $query->stock }}</td>
                                    <td>{{ $query->supplier->supplier_name }}</td>
                                    <td>{{ $query->date_of_entry }}</td>
                                    <td>{{ $query->condition }}</td>
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