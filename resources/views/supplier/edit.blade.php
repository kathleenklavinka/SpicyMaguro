@extends('layout')
@section('konten')

<h4>Edit Supplier</h4>

<form action="{{ route('supplier.update', $supplier->id) }}" method="post">
    @csrf
    <label>Nama Supplier</label>
    <input type="text" name="nama" value="{{ $supplier->nama }}" class="form-control mb-2">

    <label>Alamat</label>
    <textarea name="alamat" class="form-control mb-2">{{ $supplier->alamat }}</textarea>

    <label>Telepon</label>
    <input type="text" name="telepon" value="{{ $supplier->telepon }}" class="form-control mb-2">

    <button class="btn btn-primary">Edit</button>
</form>

@endsection
