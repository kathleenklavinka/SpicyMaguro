<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Stock;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    // Menampilkan semua data penjualan
    public function tampil()
    {
        $penjualan = Penjualan::with('stock')->get();
        return view('penjualan.tampil', compact('penjualan'));
    }

    // Form tambah penjualan
    public function tambah()
    {
        $stock = Stock::all(); // untuk dropdown pilih barang
        return view('penjualan.tambah', compact('stock'));
    }

    // Menyimpan penjualan baru
    public function submit(Request $request)
    {
        $request->validate([
            'stock_id' => 'required|exists:stock,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        $stock = Stock::findOrFail($request->stock_id);

        // Jika stock lebih sedikit dari penjualan yang diminta
        if ($stock->jumlah < $request->jumlah) {
            return back()->with('error', 'Stok tidak mencukupi!');
        }

        Penjualan::create([
            'stock_id' => $stock->id,
            'jumlah' => $request->jumlah
        ]);

        // Stock berkurang sesuai jumlah yang diminta
        $stock->decrement('jumlah', $request->jumlah);

        return redirect()->route('penjualan.tampil')->with('success', 'Penjualan berhasil disimpan.');
    }

    // Edit penjualan yang terjadi
    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $stock = Stock::all();
        return view('penjualan.edit', compact('penjualan', 'stock'));
    }

    // Update penjualan
    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::findOrFail($id);

        $request->validate([
            'stock_id' => 'required|exists:stock,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        $oldJumlah = $penjualan->jumlah;
        $stock = Stock::findOrFail($request->stock_id);

        // Kembalikan stok sebelumnya sebelum dihitung ulang
        $stock->increment('jumlah', $oldJumlah);

        // Cek stok cukup atau tidak untuk jumlah baru
        if ($stock->jumlah < $request->jumlah) {
            return back()->with('error', 'Stok tidak mencukupi untuk update.');
        }

        // Update data
        $penjualan->update([
            'stock_id' => $request->stock_id,
            'jumlah' => $request->jumlah
        ]);

        $stock->decrement('jumlah', $request->jumlah);

        return redirect()->route('penjualan.tampil')->with('success', 'Penjualan berhasil diperbarui.');
    }

    // Menghapus penjualan
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $stock = $penjualan->stock;

        // Kembalikan stok karena penjualan dibatalkan
        $stock->increment('jumlah', $penjualan->jumlah);

        $penjualan->delete();

        return redirect()->route('penjualan.tampil')->with('success', 'Penjualan berhasil dihapus.');
    }
}
