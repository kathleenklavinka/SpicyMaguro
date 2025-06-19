@extends('layout')

@section('konten')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Auth::user()->role === 'admin')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">List User</h5>
        <a class="btn btn-success btn-sm" href="{{ route('user.tambah') }}">+ Tambah User</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped" id="userTable">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $no => $row)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>
                        @if ($row->role === 'admin')
                        <span class="badge bg-primary">Admin</span>
                        @else
                        <span class="badge bg-secondary">User</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('user.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('user.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
{{-- Kosongkan halaman --}}
<p class="text-center text-muted mt-5">Tidak diizinkan mengakses halaman ini.</p>
@endif
@endsection
