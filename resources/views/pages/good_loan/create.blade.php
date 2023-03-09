@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Peminjaman Barang</h1>
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
            <form action="{{ route('good_loan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="warehouses_id">Nama Barang</label>
                    <select name="warehouses_id" class="form-control">
                        <option value="">Pilih Barang</option>
                        @foreach ($good_entries as $good_entry)
                        <option value="{{ $good_entry->id }}">
                            {{ $good_entry->good->stuff }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="room_source">Ruangan Asal</label>
                    <select name="room_source" class="form-control">
                        <option value="">Pilih Ruangan Asal</option>
                        @foreach ($good_entries as $good_entry)
                        <option value="{{ $good_entry->rooms_id }}">
                            {{ $good_entry->room->room_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="rooms_id">Ruangan Tujuan</label>
                    <select name="rooms_id" class="form-control">
                        <option value="">Pilih Ruangan Tujuan</option>
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
                        value="{{ old('borrower_name') }}">
                </div>
                <div class="form-group">
                    <label for="loan_stock">Jumlah Barang</label>
                    <input type="text" name="loan_stock" class="form-control" placeholder="Jumlah Barang"
                        value="{{ old('loan_stock') }}">
                </div>
                <div class="form-group">
                    <label for="date_borrow">Tanggal Pinjam</label>
                    <input type="date" name="date_borrow" class="form-control" placeholder="Tanggal Pinjam"
                        value="{{ old('date_borrow') }}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" required class="form-control">
                        <option value="">
                            Status
                        </option>
                        <option value="DIPINJAM">Dipinjam</option>
                    </select>
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