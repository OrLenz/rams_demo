@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Barang</h1>
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
            <form action="{{ route('good.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="categories_id">Kategori</label>
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
                    <label for="sub_categories_id">Sub Kategori</label>
                    <select name="sub_categories_id" class="form-control">
                        <option value="">Pilih Sub Kategori</option>
                        @foreach ($sub_categories as $sub_category)
                        <option value="{{ $sub_category->id }}">
                            {{ $sub_category->name_subcategory }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="code_num">No Barang</label>
                    <input type="text" name="code_num" class="form-control" placeholder="No Barang"
                        value="{{ old('code_num') }}">
                </div>
                <div class="form-group">
                    <label for="stuff">Nama Barang</label>
                    <input type="text" name="stuff" class="form-control" placeholder="Nama Barang"
                        value="{{ old('stuff') }}">
                </div>
                <div class="form-group">
                    <label for="unit">Satuan</label>
                    <input type="text" name="unit" class="form-control" placeholder="Satuan" value="{{ old('unit') }}">
                </div>
                <div class="form-group">
                    <label for="price">Harga/unit</label>
                    <input type="text" name="price" class="form-control" placeholder="Harga/unit"
                        value="{{ old('price') }}">
                </div>
                <div class="form-group">
                    <label for="source_of_funds">Sumber Dana</label>
                    <input type="text" name="source_of_funds" class="form-control" placeholder="Sumber Dana"
                        value="{{ old('source_of_funds') }}">
                </div>
                <div class="form-group">
                    <label for="employees_id">Nama Karyawan</label>
                    <select name="employees_id" class="form-control">
                        <option value="">Pilih Karyawan</option>
                        @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">
                            {{ $employee->employee_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="chart_of_accounts_id">Nama Akun</label>
                    <select name="chart_of_accounts_id" class="form-control">
                        <option value="">Pilih Nama Akun</option>
                        @foreach ($chart_of_accounts as $chart_of_account)
                        <option value="{{ $chart_of_account->id }}">
                            {{ $chart_of_account->account_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="detail">Detail Barang</label>
                    <textarea name="detail" class="form-control" cols="30" rows="10" value="{{ old('detail') }}"
                        placeholder="Detail Barang"></textarea>
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