@extends('layout')

@section('konten')

<h4>Tambah Penjualan</h4>

<form action="{{ route('penjualan.submit') }}" method="post">
    @csrf 
    <label>Nama Barang</label>
    <select id="stockSelect" name="stock_id" class="form-control mb-2" required>
        <option value="">Pilih Barang</option>
        @foreach($stock as $item)
            <option 
                value="{{ $item->id }}" 
                data-stok="{{ $item->jumlah }}">
                {{ $item->namabarang }} (Stok: {{ $item->jumlah }})
            </option>
        @endforeach
    </select>

    <label>Jumlah Terjual</label>
    <input type="number" id="jumlahInput" name="jumlah" class="form-control mb-2" min="1" required>

    <div id="warning" class="text-danger mb-2" style="display: none;">
        Jumlah melebihi stok tersedia!
    </div>

    <button class="btn btn-primary" id="submitBtn">Tambah</button>
</form>

<!-- Tambahkan script untuk validasi -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('stockSelect');
    const jumlah = document.getElementById('jumlahInput');
    const warning = document.getElementById('warning');
    const submitBtn = document.getElementById('submitBtn');

    function validateStock() {
        const selected = select.options[select.selectedIndex];
        const stok = parseInt(selected.dataset.stok || 0);
        const jml = parseInt(jumlah.value || 0);

        if (jml > stok) {
            warning.style.display = 'block';
            submitBtn.disabled = true;
        } else {
            warning.style.display = 'none';
            submitBtn.disabled = false;
        }
    }

    select.addEventListener('change', validateStock);
    jumlah.addEventListener('input', validateStock);
});
</script>

@endsection
