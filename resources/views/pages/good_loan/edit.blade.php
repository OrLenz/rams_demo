@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data good_loan</h1>
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
            <form action="{{ route('good_loan.update', $filter_items->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="warehouses_id">Nama Barang</label>
                    <select name="warehouses_id" class="form-control">
                        <option value="{{ $filter_items->warehouses_id }}">Jangan Ubah Barang</option>
                        @foreach ($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">
                            {{ $warehouse->good->stuff }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="room_source">Ruangan Asal</label>
                    <select name="room_source" class="form-control">
                        <option value="{{ $filter_items->room_source }}">Jangan Ubah Ruangan Asal</option>
                        @foreach ($warehouses as $warehouse)
                        <option value="{{ $warehouse->rooms_id }}">
                            {{ $warehouse->room->room_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="rooms_id">Ruangan Tujuan</label>
                    <select name="rooms_id" class="form-control">
                        <option value="{{ $filter_items->rooms_id }}">Jangan ubah ruangan tujuan</option>
                        @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">
                            {{ $room->room_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="borrower_name">Nama Peminjam</label>
                    <input type="text" name="borrower_name" class="form-control" placeholder="Nama Peminjam"
                        value="{{ $filter_items->borrower_name }}">
                </div>
                <div class="form-group">
                    <label for="loan_stock">Jumlah Barang</label>
                    <input type="text" name="loan_stock" class="form-control" placeholder="Jumlah Barang"
                        value="{{ $filter_items->loan_stock }}" readonly>
                </div>
                <div class="form-group">
                    <label for="date_borrow">Tanggal Pinjam</label>
                    <input type="date" name="date_borrow" class="form-control" placeholder="Tanggal Pinjam"
                        value="{{ $filter_items->date_borrow }}">
                </div>
                <div class="form-group">
                    <label for="date_return">Tanggal Kembali</label>
                    <input type="date" name="date_return" class="form-control" placeholder="Tanggal Kembali"
                        value="{{ $filter_items->date_return }}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" required class="form-control">
                        <option value="{{ $filter_items->status }}">
                            Jangan ubah status
                        </option>
                        <option value="DIKEMBALIKAN">Dikembalikan</option>
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