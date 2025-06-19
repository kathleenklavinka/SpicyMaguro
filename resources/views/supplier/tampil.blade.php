@extends('layout')

@section('konten')
    @if (Auth::user()->role === 'user')
        <div class="text-center mt-5">
            <p class="text-muted">Tidak diizinkan mengakses halaman ini.</p>
        </div>
    @else

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
                <h5 class="mb-0">List Supplier</h5>
                <a class="btn btn-success btn-sm" href="{{ route('supplier.tambah') }}">+ Tambah Supplier</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped" id="supplierTable">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supplier as $no => $data)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->telepon }}</td>
                            <td>
                                <a href="{{ route('supplier.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('supplier.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus supplier ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
