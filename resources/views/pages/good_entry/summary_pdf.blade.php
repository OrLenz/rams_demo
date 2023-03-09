<h1 class="display-4">Laporan Rangkuman Barang</h1>
<table class="table" border="1">
    <thead>
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Ruangan</th>
            <th>Jumlah</th>
            <th>Supplier</th>
            <th>Tanggal Masuk</th>
            <th>Kondisi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($get_all_entries as $get_all_entry)
        <tr>
            <td>{{ $get_all_entry->code_goods }}</td>
            <td>{{ $get_all_entry->good->stuff }}</td>
            <td>{{ $get_all_entry->room->room_name }}</td>
            <td>{{ $get_all_entry->stock }}</td>
            <td>{{ $get_all_entry->supplier->supplier_name }}</td>
            <td>{{ $get_all_entry->date_of_entry }}</td>
            <td>{{ $get_all_entry->condition }}</td>
        </tr>
        @endforeach
    </tbody>
</table>