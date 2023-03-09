@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Barang Masuk</h1>
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

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('good_entry.update', $filter_items->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="goods_id">Nama Barang</label>
                    <select name="goods_id" class="form-control">
                        <option value="{{ $filter_items->goods_id }}">Jangan Diganti</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rooms_id">Nama Ruangan</label>
                    <select name="rooms_id" class="form-control">
                        <option value="{{ $filter_items->rooms_id }}">Jangan Diganti</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock">Jumlah</label>
                    <input type="text" name="stock" class="form-control" placeholder="Jumlah"
                        value="{{ $filter_items->stock }}">
                </div>
                <div class="form-group">
                    <label for="suppliers_id">Nama Supplier</label>
                    <select name="suppliers_id" class="form-control">
                        <option value="{{ $filter_items->suppliers_id }}">Pilih Supplier</option>
                        @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">
                            {{ $supplier->supplier_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_of_entry">Tanggal Masuk</label>
                    <input type="date" name="date_of_entry" class="form-control" placeholder="Tanggal Masuk"
                        value="{{ $filter_items->date_of_entry }}">
                </div>
                <div class="form-group">
                    <label for="condition">Kondisi</label>
                    <input type="text" name="condition" class="form-control" placeholder="Kondisi"
                        value="{{ $filter_items->condition }}" readonly>
                </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">
            Ubah
        </button>
        </form>
    </div>
</div>

<!-- /.container-fluid -->
@endsection