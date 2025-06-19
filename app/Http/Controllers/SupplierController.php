<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Untuk menampilkan data supplier
    function tampil() {
        $supplier = Supplier::get();
        return view('supplier.tampil', compact('supplier'));
    }

    // Untuk form tambah supplier
    function tambah() {
        return view('supplier.tambah');
    }

    // Untuk submit (menambahkan supplier baru)
    function submit(Request $request) {
        $supplier = new Supplier();
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->save();

        return redirect()->route('supplier.tampil')->with('success', 'Supplier berhasil ditambahkan.');
    }

    // Untuk edit supplier
    function edit($id) {
        $supplier = Supplier::find($id);
        return view('supplier.edit', compact('supplier'));
    }

    // Untuk update supplier (konfirmasi edit)
    function update(Request $request, $id) {
        $supplier = Supplier::find($id);
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->update();

        return redirect()->route('supplier.tampil')->with('success', 'Supplier berhasil diperbarui.');
    }

    // Untuk menghapus supplier
    function destroy($id) {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect()->route('supplier.tampil')->with('success', 'Supplier berhasil dihapus.');
    }
}
