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
        Schema::create('berita_acaras', function (Blueprint $table) {
            $table->id();
            $table->string('no_keputusan_pengadilan');
            $table->text('perihal');
            //pihak 1
            $table->string('nama_pihak_1');
            $table->string('nip_pihak_1');
            $table->string('pangkat_pihak_1');
            $table->string('jabatan_pihak_1');
            //pihak 2
            $table->string('nama_pihak_2');
            $table->string('nip_pihak_2');
            $table->string('pangkat_pihak_2');
            $table->string('jabatan_pihak_2');
            //saksi 1
            $table->string('nama_saksi_1');
            $table->string('nip_saksi_1');
            //saksi 2
            $table->string('nama_saksi_2');
            $table->string('nip_saksi_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_acaras');
    }
};
