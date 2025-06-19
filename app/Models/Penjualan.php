<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan'; 
    protected $fillable = ['stock_id', 'jumlah'];

    public function stock()
    {
        // Karena mengacu ke tabel stock
        // Setiap ada penjualan maka berkurang stocknya
        return $this->belongsTo(Stock::class);
    }
}
