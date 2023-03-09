@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Warehouse</h1>
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
            <form action="{{ route('warehouse.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="goods_id">Nama Barang</label>
                    <select name="goods_id" class="form-control">
                        <option value="">Pilih Barang</option>
                        @foreach ($goods as $good)
                        <option value="{{ $good->id }}">
                            {{ $good->stuff }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="rooms_id">Nama Ruangan</label>
                    <select name="rooms_id" class="form-control">
                        <option value="">Pilih Ruangan</option>
                        @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">
                            {{ $room->room_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock">Stok Barang</label>
                    <input type="text" name="stock" class="form-control" placeholder="Stok Barang"
                        value="{{ old('stock') }}">
                </div>
                <div class="form-group">
                    <label for="condition">Keadaan</label>
                    <input type="text" name="condition" class="form-control" placeholder="Keadaan"
                        value="{{ old('condition') }}">
                </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">
            Simpan
        </button>
        </form>
    </div>
</div>

<!-- /.container-fluid -->
@endsection