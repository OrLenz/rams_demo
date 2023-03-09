@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Pemesanan Barang</h1>
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

    <div class="card card-outline card-info">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('request.store') }}" id="po_form" method="POST">
                @csrf
                <input type="hidden" name="id" value="">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="suppliers_id">Supplier</label>
                        <select name="suppliers_id" id="suppliers_id"
                            class="custom-select custom-select-sm rounded-0 select2">
                            <option value="">Pilih Supplier</option>
                            @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">
                                {{ $supplier->supplier_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="no_request">PR # <span class="po_err_msg text-danger"></span></label>
                        <input type="text" class="form-control form-control-sm rounded-0" id="no_request"
                            name="no_request" value="">
                        <small><i>Kosongkan karena dibuat secara otomatis.</i></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered" name="chart">
                            <colgroup>
                                <col width="5%">
                                <col width="20%">
                                <col width="30%">
                                <col width="5%">
                                <col width="10%">
                                <col width="15%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                                <tr class="bg-navy disabled">
                                    <th class="px-1 py-1 text-center"></th>
                                    <th class="px-1 py-1 text-center">Barang</th>
                                    <th class="px-1 py-1 text-center">Deskripsi</th>
                                    <th class="px-1 py-1 text-center">Qty</th>
                                    <th class="px-1 py-1 text-center">Unit</th>
                                    <th class="px-1 py-1 text-center">Price</th>
                                    <th class="px-1 py-1 text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="line_items">
                                    <td class="align-middle p-1 text-center">
                                        <button class="row-remove btn btn-sm btn-danger py-0" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                    <td class="align-middle p-1">
                                        <input type="text" class="text-center w-100 border-0" value="{{ old('stuff') }}"
                                            name="stuff">
                                    </td>
                                    <td class="align-middle p-0 text-center">
                                        <input type="text" class="text-center w-100 border-0"
                                            value="{{ old('description') }}" name="description">
                                    </td>
                                    <td class="align-middle p-1">
                                        <input type="text" class="text-center w-100 border-0" name="qty"
                                            value="{{ old('qty') }}">
                                    </td>
                                    <td class=" align-middle p-1">
                                        <input type="text" class="text-center w-100 border-0" name="unit"
                                            value="{{ old('unit') }}">
                                    </td>
                                    <td class="align-middle p-1">
                                        <input type="text" class="text-right w-100 border-0" name="price"
                                            value="{{ old('price') }}">
                                    </td>
                                    <td class="align-middle p-1 text-right">
                                        <input type="text" class="text-right w-100 border-0" name="total"
                                            value="{{ old('total') }}" jAutoCalc="{qty} * {price}">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>

                                <tr>
                                    <th class="p-1 text-right" colspan="6"><span><button
                                                class="row-add btn btn btn-sm btn-flat btn-primary py-0 mx-1"
                                                type="button">Add Row</button></span> Sub Total</th>
                                    <th class="p-1 text-right" id="sub_total">
                                        <input type="text" class="text-right w-100 border-0" name="subtotal"
                                            value="{{ old('subtotal') }}" jAutoCalc="SUM({total})">
                                    </th>
                                </tr>
                                <tr>
                                    <th class="p-1 text-right" colspan="6">Discount (%)
                                        <input type="text" name="disc" class="border-light text-right" value="">
                                    </th>
                                    <th class="p-1"><input type="text" class="w-100 border-0 text-right"
                                            value="{{ old('discount') }}" name="discount"
                                            jAutoCalc="{subtotal} * {disc} / 100"></th>
                                </tr>
                                <tr>
                                    <th class="p-1 text-right" colspan="6">Tax Inclusive (%)
                                        <input type="text" name="taxI" class="border-light text-right" value="">
                                    </th>
                                    <th class="p-1"><input type="text" class="w-100 border-0 text-right"
                                            value="{{ old('tax') }}" name="tax" jAutoCalc="{subtotal} * {taxI} / 100">
                                    </th>
                                </tr>
                                <tr>
                                    <th class="p-1 text-right" colspan="6">Grand Total</th>
                                    <th class="p-1 text-right" id="total">
                                        <input type="text" class="text-right w-100 border-0" name="grand_total"
                                            value="{{ old('grand_total') }}"
                                            jAutoCalc="{subtotal} + {tax} - {discount}">
                                    </th>
                                </tr>

                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="note" class="control-label">Note</label>
                                <textarea name="note" id="note" cols="10" rows="4"
                                    class="form-control rounded-0"></textarea>
                            </div>
                            @if (Auth::user()->roles === 'ADMIN')
                            <div class="col-md-6">
                                <label for="status" class="control-label">Status</label>
                                <select name="status" id="status" class="form-control form-control-sm rounded-0">
                                    <option value="0">Pending</option>
                                    <option value="1">Approved</option>
                                    <option value="2">Denied</option>
                                </select>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-flat btn-primary" form="po_form">Save</button>
            <a class="btn btn-flat btn-default" href="{{ route('request.index') }}">Cancel</a>
        </div>
    </div>
</div>

@push('request_script')
<script>
    function autoCalcSetup() {
    $('#po_form').jAutoCalc('destroy');
    $('#po_form .line_items').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
    $('#po_form').jAutoCalc({decimalPlaces: 2, keyEventsFire: true, emptyAsZero: true});
    }
    autoCalcSetup();

    $('button.row-remove').on("click", function(e) {
        e.preventDefault();

        var form = $(this).parents('form')
        $(this).parents('tr').remove();
        autoCalcSetup();
    });

    $('button.row-add').on("click", function(e) {
        e.preventDefault();

        var $table = $(this).parents('table');
        var $top = $table.find('.line_items').first();
        var $new = $top.clone(true);

        $new.jAutoCalc('destroy');
        $new.insertAfter($top);
        $new.find('input[type=text]').val('');
        autoCalcSetup();

    });
</script>
@endpush
<!-- /.container-fluid -->
@endsection