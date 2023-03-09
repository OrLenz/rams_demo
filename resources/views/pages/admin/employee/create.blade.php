@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Karyawan</h1>
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
            <form action="{{ route('employee.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" class="form-control" placeholder="NIP" value="{{ old('nip') }}">
                </div>
                <div class="form-group">
                    <label for="employee_name">Nama Karyawan</label>
                    <input type="text" name="employee_name" class="form-control" placeholder="Nama Karyawan"
                        value="{{ old('employee_name') }}">
                </div>
                <div class="form-group">
                    <label for="unit">Unit</label>
                    <input type="text" name="unit" class="form-control" placeholder="Nama Karyawan"
                        value="{{ old('unit') }}">
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