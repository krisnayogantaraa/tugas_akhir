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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('no_keputusan_pengadilan');
            $table->string('status_pengajuan');
            $table->string('nama');
            $table->string('instansi');
            $table->text('alamat');
            $table->string('no_ktp');
            $table->string('no_telp');
            //Surat permohonan pengambilan Basan Baran
            $table->string('file1');
            //Surat penetapan putusan pengadilan
            $table->string('file2');
            //Salinan barang bukti dari instansi penanggung jawab secara yuridis
            $table->string('file3');
            //Surat eksekusi dari Kejaksaan
            $table->string('file4');
            //Surat kuasa dari pemilik Basan Baran (Jika pengambil bukan orang yang bersangkutan)
            $table->string('file5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
