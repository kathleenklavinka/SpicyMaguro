<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // Untuk menampilkan stock barang
    function tampil() {
        $stock = Stock::get();
        return view('stock.tampil', compact('stock'));
    }

    // Untuk menambahkan stock barang
    function tambah() {
        return view('stock.tambah');
    }

    // Untuk submit (menambahkan barang baru)
    function submit(Request $request) {
        $stock = new Stock();
        $stock->namabarang = $request->namabarang;
        // $stock->namabarang diambil dari migrations
        // $request->namabarang diambil dari tambah.blade.php
        $stock->jumlah = $request->jumlah;
        $stock->satuan = $request->satuan;
        $stock->harga = $request->harga;
        $stock->save();

        // Jadi setelah ditambahkan, maka akan diarahkan ke stock.tampil
        return redirect()->route('stock.tampil')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Untuk edit, mengubah data yang sudah ada
    function edit($id) {
        $stock = Stock::find($id);
        return view('stock.edit', compact('stock'));
    }

    // Untuk update, yaitu konfirmasi edit
    // Menggunakan request karena kita mengambil datanya dari form
    function update(Request $request, $id) {
        $stock = Stock::find($id);
        $stock->namabarang = $request->namabarang;
        $stock->jumlah = $request->jumlah;
        $stock->satuan = $request->satuan;
        $stock->harga = $request->harga;
        $stock->update();
        
        return redirect()->route('stock.tampil')->with('success', 'Barang berhasil diperbarui.');
    }

    // Untuk menghapus data barang yang ada
    function destroy($id) {
        $stock = Stock::find($id);
        $stock->delete();

        return redirect()->route('stock.tampil')->with('success', 'Barang berhasil dihapus.');
    }
}
