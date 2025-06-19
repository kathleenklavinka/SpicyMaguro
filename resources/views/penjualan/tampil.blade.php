@extends('layout')

@section('konten')

@if (Auth::user()->role === 'admin')

    {{-- Notifikasi Success --}}
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Notifikasi Error --}}
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">List Penjualan</h5>
            <a class="btn btn-success btn-sm" href="{{ route('penjualan.tambah') }}">+ Tambah Penjualan</a>
        </div>

        <div class="card-body">
            @php $totalKeseluruhan = 0; @endphp

            <table class="table table-bordered table-striped" id="penjualanTable">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah Terjual</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualan as $no => $data)
                        @php
                            $subtotal = $data->jumlah * $data->stock->harga;
                            $totalKeseluruhan += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $data->stock->namabarang }}</td>
                            <td>Rp{{ number_format($data->stock->harga, 0, ',', '.') }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                            <td>{{ $data->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ route('penjualan.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('penjualan.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus penjualan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3 text-center fw-bold">
                Total Penjualan: Rp{{ number_format($totalKeseluruhan, 0, ',', '.') }}
            </div>
        </div>
    </div>

@else
    <p class="text-center text-muted mt-5">Tidak diizinkan mengakses halaman ini.</p>
@endif

@endsection
