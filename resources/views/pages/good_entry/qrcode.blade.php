@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">QR Code Barang</h1>
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

    <div class="card shadow text-center justify-content-center">
        <div class="card-body ">
            <div id="qrcode">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
                        ->size(150)->errorCorrection('H')
                        ->generate($qrcode->code_goods)) !!} ">
            </div>
            <br>
            <input type="button" value="Print" class="btn btn-primary" onclick="printDiv(qrcode);" />
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@push('addon_script')
<script>
    function printDiv(qrcode) {
    var printContents = document.getElementById("qrcode").innerHTML;    
    var originalContents = document.body.innerHTML;      
    document.body.innerHTML = printContents;     
    window.print();     
    document.body.innerHTML = originalContents;
    }
</script>
@endpush