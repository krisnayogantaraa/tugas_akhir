<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->text('deskripsi_barang');
            $table->string('foto_barang');
            $table->string('pihak_yang_menitipkan');
            $table->string('asal_instansi');
            $table->string('nama_pemilik_barang');
            $table->string('no_keputusan_pengadilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
