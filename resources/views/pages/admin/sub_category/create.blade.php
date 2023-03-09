@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Sub Kategori</h1>
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
            <form action="{{ route('sub_category.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="categories_id">Nama Kategori</label>
                    <select name="categories_id" class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="code">Kode</label>
                    <input type="text" name="code" class="form-control" placeholder="Kode" value="{{ old('code') }}">
                </div>
                <div class="form-group">
                    <label for="name_subcategory">Nama Sub Kategori</label>
                    <input type="text" name="name_subcategory" class="form-control" placeholder="Nama Sub Kategori"
                        value="{{ old('name_subcategory') }}">
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