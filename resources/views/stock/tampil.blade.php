@extends('layout')

@section('konten')
<div class="d-flex">
    <div class="ms-auto">
        <a class="btn btn-success" href="{{ route('stock.tambah') }}">Tambah</a>
    </div>
</div>

<table class="table">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    @foreach($stock as $no=>$data)
    <tr>
        <td>{{ $no+1 }}</td>
        <td>{{ $data->namabarang }}</td>
        <td>{{ $data->jumlah }}</td>
        <td>{{ $data->satuan }}</td>
        <td>{{ $data->harga }}</td>
        <td>
            <a href="{{ route('stock.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('stock.delete', $data->id) }}" method="post" style="display:inline;">
                @csrf
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<!-- Tombol Logout -->
<form action="{{ route('logout') }}" method="POST" class="mt-3">
    @csrf
    <button class="btn btn-danger">Logout</button>
</form>

@endsection
