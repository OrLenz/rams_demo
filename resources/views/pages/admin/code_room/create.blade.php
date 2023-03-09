@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kode Ruangan</h1>
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
            <form action="{{ route('code_room.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="code">Nama Kode Ruangan</label>
                    <input type="text" name="code" class="form-control" placeholder="Nama Kode Ruangan"
                        value="{{ old('code') }}">
                </div>
                <div class="form-group">
                    <label for="detail">Keterangan</label>
                    <input type="text" name="detail" class="form-control" placeholder="Keterangan"
                        value="{{ old('detail') }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection