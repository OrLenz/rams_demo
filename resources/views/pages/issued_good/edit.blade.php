@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Barang Bermasalah</h1>
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
            <form action="{{ route('issued_good.update', $filter_items->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="warehouses_id">Nama Barang</label>
                    <select name="warehouses_id" class="form-control">
                        <option value="{{ $filter_items->warehouses_id }}">Jangan Ubah Barang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rooms_id">Ruangan Asal</label>
                    <select name="rooms_id" class="form-control">
                        <option value="{{ $filter_items->rooms_id }}">Jangan Ubah Ruangan Asal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name_pic">Nama Penanggungjawab</label>
                    <input type="text" name="name_pic" class="form-control" placeholder="Nama Penanggungjawab"
                        value="{{ $filter_items->name_pic }}">
                </div>
                <div class="form-group">
                    <label for="quantity">Jumlah Barang</label>
                    <input type="text" name="quantity" class="form-control" placeholder="Jumlah Barang"
                        value="{{ $filter_items->quantity }}" readonly>
                </div>
                <div class="form-group">
                    <label for="detail">Keterangan</label>
                    <input type="text" name="detail" class="form-control" placeholder="Jumlah Barang"
                        value="{{ $filter_items->detail }}" readonly>
                </div>
                <div class="form-group">
                    <label for="date_issued">Tanggal Rusak</label>
                    <input type="date" name="date_issued" class="form-control" placeholder="Tanggal Rusak"
                        value="{{ $filter_items->date_issued }}">
                </div>
                <div class="form-group">
                    <label for="date_fixed">Tanggal Diperbaiki</label>
                    <input type="date" name="date_fixed" class="form-control" placeholder="Tanggal Diperbaiki"
                        value="{{ $filter_items->date_fixed }}">
                </div>
                <div class="form-group">
                    <label for="condition">Kondisi</label>
                    <select name="condition" required class="form-control">
                        <option value="{{ $filter_items->condition }}">
                            Jangan ubah Kondisi
                        </option>
                        <option value="DIPERBAIKI">Diperbaiki</option>
                    </select>
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