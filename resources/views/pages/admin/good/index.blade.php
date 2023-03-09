@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang</h1>
        <a href="{{ route('good.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Barang
        </a>
    </div>

    <form action="/good" method="get">
        <div class="row filter-row mb-4">
            <div class="col-sm-6 col-md-3">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" required>
                    <label for="search">Nama Barang</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <button class="btn btn-success btn-block" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kategori</th>
                            <th>Sub Kategori</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Harga/unit</th>
                            <th>Sumber Dana</th>
                            <th>Nama Karyawan</th>
                            <th>Nama Akun</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category->category_name }}</td>
                            <td>{{ $item->sub_category->name_subcategory }}</td>
                            <td>{{ $item->code_good }}</td>
                            <td>{{ $item->stuff }}</td>
                            <td>{{ $item->unit }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->source_of_funds }}</td>
                            <td>{{ $item->employee->employee_name }}</td>
                            <td>{{ $item->chart_of_account->account_name }}</td>
                            <td>
                                <a href="{{ route('good.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                {{-- <a href="{{ route('good.show', $item->id) }}" class="btn btn-primary">
                                    QR Code
                                </a> --}}
                                <a href="{{ route('good.show', $item->id) }}" class="btn btn-secondary">
                                    Detail
                                </a>
                                <form action="{{ route('good.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $items->links() }}
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection