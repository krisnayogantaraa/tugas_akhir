<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama_pemohon',
        'no_telp',
        'alamat',
        'no_keputusan_pengadilan',
        'nama_sopir',
        'tgl_pengajuan',
        'tgl_pengiriman',
    ];
}
