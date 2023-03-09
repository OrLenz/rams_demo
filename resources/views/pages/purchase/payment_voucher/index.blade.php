@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Payment Voucher</h1>
        <a href="{{ route('request.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Voucher
        </a>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>No. PV</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Supplier</th>
                            <th>Jumlah Pesanan</th>
                            <th>Total Harga</th>
                            @if (Auth::user()->roles === 'ADMIN')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($filter_items as $filter_item)
                        <tr>
                            {{-- <td>{{ $filter_item->id }}</td>
                            <td>{{ $filter_item->code_goods }}</td>
                            <td>{{ $filter_item->good->stuff }}</td>
                            <td>{{ $filter_item->room->room_name }}</td>
                            <td>{{ $filter_item->stock }}</td> --}}
                            <td>
                                @if (Auth::user()->roles === 'ADMIN')
                                <a href="{{ route('good_entry.edit', $filter_item->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                @endif
                                <a href="{{ route('good_entry.show', $filter_item->id) }}" class="btn btn-primary">
                                    Detail Request
                                </a>
                                @if (Auth::user()->roles === 'ADMIN')
                                <form action="{{ route('good_entry.destroy', $filter_item->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $filter_items->links() }}
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection