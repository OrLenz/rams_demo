@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Ruangan</h1>
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
            <form action="{{ route('room.update', $items->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="code_rooms_id">Kode Ruangan</label>
                    <select name="code_rooms_id" class="form-control" required>
                        <option value="{{ $items->code_rooms_id }}">Pilih Kode Ruangan</option>
                        @foreach ($code_rooms as $code_room)
                        <option value="{{ $code_room->id }}">
                            {{ $code_room->code }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="floor">Lantai</label>
                    <input type="text" name="floor" class="form-control" placeholder="Lantai"
                        value="{{ $items->floor }}">
                </div>
                <div class="form-group">
                    <label for="num_code">No Ruangan</label>
                    <input type="text" name="num_code" class="form-control" placeholder="No Ruangan"
                        value="{{ $items->num_code }}">
                </div>
                <div class="form-group">
                    <label for="room_name">Nama Ruangan</label>
                    <input type="text" name="room_name" class="form-control" placeholder="Ruangan"
                        value="{{ $items->room_name }}">
                </div>
                <div class="form-group">
                    <label for="description">Keterangan</label>
                    <input type="text" name="description" class="form-control" placeholder="Keterangan"
                        value="{{ $items->description }}">
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