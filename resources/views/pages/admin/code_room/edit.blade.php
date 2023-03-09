@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Kode Ruangan</h1>
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
            <form action="{{ route('code_room.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="code">Kode Ruangan</label>
                    <input type="text" name="code" class="form-control" placeholder="Kode Ruangan"
                        value="{{ $item->code }}">
                </div>
                <div class="form-group">
                    <label for="detail">Keterangan</label>
                    <input type="text" name="detail" class="form-control" placeholder="Keterangan"
                        value="{{ $item->detail }}">
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