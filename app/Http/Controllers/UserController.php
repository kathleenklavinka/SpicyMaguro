<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Untuk menampilkan data user
    function tampil() {
        $user = User::get();
        return view('user.tampil', compact('user'));
    }

    // Untuk form tambah user
    function tambah() {
        return view('user.tambah');
    }

    // Untuk submit (menambahkan user baru)
    function submit(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:user,admin',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->role = $validated['role'];
        $user->save();

        return redirect()->route('user.tampil')->with('success', 'User berhasil ditambahkan.');
    }

    // Untuk edit user
    function edit($id) {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    // Untuk update user (konfirmasi edit)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role' => 'required|in:user,admin',
        ]);

        $user = User::find($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->update();

        return redirect()->route('user.tampil')->with('success', 'User berhasil diupdate.');
    }


    // Untuk menghapus user
    function destroy($id) {
        // Cegah user menghapus dirinya sendiri
        if (auth()->user()->id == $id) {
            return redirect()->route('user.tampil')->with('error', 'Tidak bisa menghapus akun sendiri.');
        }

        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.tampil')->with('success', 'User berhasil dihapus.');
    }
}
