@extends('layout')

@section('konten')

<h4>Tambah Supplier</h4>

<form action="{{ route('supplier.submit') }}" method="post">
    @csrf 
    <label>Nama Supplier</label>
    <input type="text" name="nama" class="form-control mb-2">
    
    <label>Alamat</label>
    <textarea name="alamat" class="form-control mb-2"></textarea>
    
    <label>Telepon</label>
    <input type="text" name="telepon" class="form-control mb-2">

    <button class="btn btn-primary">Tambah</button>
</form>

@endsection
