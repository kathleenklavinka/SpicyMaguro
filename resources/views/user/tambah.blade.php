@extends('layout')

@section('konten')

<h2>Tambah User</h2>

<form action="{{ route('user.submit') }}" method="POST">
    @csrf
    <label>Nama</label>
    <input type="text" name="name" class="form-control mb-2" required>

    <label>Email</label>
    <input type="email" name="email" class="form-control mb-2" required>

    <label>Password</label>
    <input type="password" name="password" class="form-control mb-2" required>

    <label>Role</label>
    <select name="role" class="form-control mb-3" required>
        <option value="">-- Pilih Role --</option>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>

    <button class="btn btn-primary">Simpan</button>
</form>

@endsection
