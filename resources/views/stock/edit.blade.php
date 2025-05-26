@extends('layout')

@section('konten')

<h4>Edit Barang</h4>

<form action="{{ route('stock.update', $stock->id) }}" method="post">
    <!-- Di laravel method post wajib menggunakan @csrf -->
    @csrf 
    <label>Nama Barang </label>
    <input type="text" name="namabarang" value="{{ $stock->namabarang }}"class="form-control mb-2">
    <label>Jumlah</label>
    <input type="number" name="jumlah" value="{{ $stock->jumlah }}" class="form-control mb-2">
    <label>Satuan</label>
    <input type="text" name="satuan" value="{{ $stock->satuan }}" class="form-control mb-2">
    <label>Harga</label>
    <input type="number" name="harga" value="{{ $stock->harga }}" class="form-control mb-2">

    <button class="btn btn-primary">Edit</button>
</form>

@endsection