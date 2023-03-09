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
            <form action="{{ route('good.update', $items->id) }}" method="POST">
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
                    <label for="code">No Barang</label>
                    <input type="text" name="code_num" class="form-control" placeholder="No Barang"
                        value="{{ $items->code_num }}" readonly>
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
                    <label for="price">Harga/unit</label>
                    <input type="text" name="price" class="form-control" placeholder="Harga/unit"
                        value="{{ $items->price }}">
                </div>
                <div class="form-group">
                    <label for="source_of_funds">Sumber Dana</label>
                    <input type="text" name="source_of_funds" class="form-control" placeholder="Sumber Dana"
                        value="{{ $items->source_of_funds }}">
                </div>
                <div class="form-group">
                    <label for="employees_id">Nama Karyawan</label>
                    <select name="employees_id" class="form-control">
                        <option value="{{ $items->employees_id }}">Tidak Ubah nama karyawan</option>
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
                        <option value="{{ $items->chart_of_accounts_id }}">Pilih Nama Akun</option>
                        @foreach ($chart_of_accounts as $chart_of_account)
                        <option value="{{ $chart_of_account->id }}">
                            {{ $chart_of_account->account_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="detail">Detail Barang</label>
                    <textarea name="detail" class="form-control" cols="30" rows="10" value="{{ $items->detail }}"
                        placeholder="Detail Barang"></textarea>
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