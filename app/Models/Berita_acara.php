<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita_acara extends Model
{
    use HasFactory;
        /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'no_keputusan_pengadilan',
        'perihal',
        //pihak 1
        'nama_pihak_1',
        'nip_pihak_1',
        'pangkat_pihak_1',
        'jabatan_pihak_1',
        //pihak 2
        'nama_pihak_2',
        'nip_pihak_2',
        'pangkat_pihak_2',
        'jabatan_pihak_2',
        //saksi 1
        'nama_saksi_1',
        'nip_saksi_1',
        //saksi 2
        'nama_saksi_2',
        'nip_saksi_2',
    ];
}
