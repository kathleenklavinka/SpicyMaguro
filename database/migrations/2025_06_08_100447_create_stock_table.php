<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->string('namabarang');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
