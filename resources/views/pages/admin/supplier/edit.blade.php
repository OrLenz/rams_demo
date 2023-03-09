@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Supplier</h1>
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
            <form action="{{ route('supplier.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="supplier_name">Nama Supplier</label>
                    <input type="text" name="supplier_name" class="form-control" placeholder="Nama Kategori"
                        value="{{ $item->supplier_name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $item->email }}">
                </div>
                <div class="form-group">
                    <label for="phone">No Telpon</label>
                    <input type="text" name="phone" class="form-control" placeholder="No Telpon"
                        value="{{ $item->phone }}">
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" name="address" class="form-control" placeholder="Alamat"
                        value="{{ $item->address }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection