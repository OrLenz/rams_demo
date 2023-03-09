@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Barang</h1>
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
            <form action="{{ route('gallery.update', $items->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="categories_id">Kategori</label>
                    <select name="categories_id" class="form-control" required>
                        <option value="{{ $items->categories_id }}">Pilih Kategori</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="stuff">Nama Barang</label>
                    <input type="text" name="stuff" class="form-control" placeholder="Nama Barang"
                        value="{{ $items->stuff }}">
                </div>
                <div class="form-group">
                    <label for="unit">Satuan</label>
                    <input type="text" name="unit" class="form-control" placeholder="Satuan" value="{{ $items->unit }}">
                </div>
                <div class="form-group">
                    <label for="count_normal">Jumlah Barang Normal</label>
                    <input type="text" name="count_normal" class="form-control" placeholder="Jumlah"
                        value="{{ $items->count_normal }}">
                </div>
                <div class="form-group">
                    <label for="count_damaged">Jumlah Barang Rusak</label>
                    <input type="text" name="count_damaged" class="form-control" placeholder="Jumlah Rusak"
                        value="{{ $items->count_damaged }}">
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