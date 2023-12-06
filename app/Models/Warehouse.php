<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama_barang',
        'deskripsi_barang',
        'foto_barang',
        'pihak_yang_menitipkan',
        'asal_instansi',
        'nama_pemilik_barang',
        'no_keputusan_pengadilan',
    ];
}
