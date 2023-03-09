@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Isi data Penyusutan</h1>
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
                    <input type="text" name="goods_id" class="form-control" placeholder="Nama Ruangan"
                        value="{{ $filter_items->goods_id }}" readonly hidden>
                </div>
                <div class="form-group">
                    <input type="text" name="suppliers_id" class="form-control" placeholder="Nama Supplier"
                        value="{{ $filter_items->suppliers_id }}" readonly hidden>
                </div>
                <div class="form-group">
                    <input type="text" name="condition" class="form-control" placeholder="Kondisi"
                        value="{{ $filter_items->condition }}" readonly hidden>
                </div>
                <div class="form-group">
                    <input type="text" name="rooms_id" class="form-control" placeholder="Nama Ruangan"
                        value="{{ $filter_items->rooms_id }}" readonly hidden>
                </div>
                <div class="form-group">
                    <label for="goods_name">Nama Barang</label>
                    <input type="text" name="goods_name" class="form-control" placeholder="Nama Ruangan"
                        value="{{ $filter_items->good->stuff }}" readonly>
                </div>
                <div class="form-group">
                    <label for="rooms_name">Nama Ruangan</label>
                    <input type="text" name="rooms_name" class="form-control" placeholder="Nama Ruangan"
                        value="{{ $filter_items->room->room_name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="stock">Jumlah</label>
                    <input type="text" name="stock" class="form-control" placeholder="Jumlah"
                        value="{{ $filter_items->stock }}" readonly>
                </div>
                <div class="form-group">
                    <label for="price">Harga Beli</label>
                    <input type="text" name="price" class="form-control" placeholder="Harga Beli"
                        value="{{ $filter_items->good->price }}" readonly>
                </div>
                <div class="form-group">
                    <label for="date_of_entry">Tanggal Masuk</label>
                    <input type="date" name="date_of_entry" class="form-control" placeholder="Tanggal Masuk"
                        value="{{ $filter_items->date_of_entry }}" readonly>
                </div>
                <div class="form-group">
                    <label for="useful_life">Umur Ekonomis</label>
                    <input type="text" name="useful_life" class="form-control" placeholder="Umur Ekonomis"
                        value="{{ $filter_items->useful_life }}">
                </div>
                <div class="form-group">
                    <label for="residual_value">Nilai Sisa</label>
                    <input type="text" name="residual_value" class="form-control" placeholder="Nilai Sisa"
                        value="{{ $filter_items->residual_value }}">
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