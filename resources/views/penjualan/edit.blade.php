@extends('layout')
@section('konten')

<h4>Edit Penjualan</h4>

<form action="{{ route('penjualan.update', $penjualan->id) }}" method="post">
    @csrf
    <label>Nama Barang</label>
    <select name="stock_id" class="form-control mb-2" required>
        <option value="">-- Pilih Barang --</option>
        @foreach($stock as $stock)
            <option value="{{ $stock->id }}" {{ $penjualan->stock_id == $stock->id ? 'selected' : '' }}>
                {{ $stock->namabarang }}
            </option>
        @endforeach
    </select>

    <label>Jumlah Terjual</label>
    <input type="number" name="jumlah" value="{{ $penjualan->jumlah }}" class="form-control mb-2" min="1" required>

    <button class="btn btn-primary">Edit</button>
</form>

@endsection
