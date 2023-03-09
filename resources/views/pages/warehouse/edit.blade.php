@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Warehouse</h1>
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
            <form action="{{ route('warehouse.update', $items->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="goods_id">Nama Barang</label>
                    <select name="goods_id" class="form-control">
                        <option value="{{ $items->goods_id }}">Tidak Diubah</option>
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
                        <option value="{{ $items->rooms_id }}">Tidak Diubah</option>
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
                        value="{{ $items->stock }}">
                </div>
                <div class="form-group">
                    <label for="condition">Kondisi</label>
                    <input type="text" name="condition" class="form-control" placeholder="Kondisi"
                        value="{{ $items->condition }}">
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