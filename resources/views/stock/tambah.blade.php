@extends('layout')

@section('konten')

<h4>Tambah Barang</h4>

<form action="{{ route('stock.submit') }}" method="post">
    <!-- Di laravel method post wajib menggunakan @csrf -->
    @csrf 
    <label>Nama Barang </label>
    <input type="text" name="namabarang" class="form-control mb-2">
    <label>Jumlah</label>
    <input type="number" name="jumlah" class="form-control mb-2">
    <label>Satuan</label>
    <input type="text" name="satuan" class="form-control mb-2">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control mb-2">

    <button class="btn btn-primary">Tambah</button>
</form>

@endsection