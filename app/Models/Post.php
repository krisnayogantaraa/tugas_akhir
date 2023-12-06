<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'no_keputusan_pengadilan',
        'status_pengajuan',
        'nama',
        'instansi',
        'alamat',
        'no_ktp',
        'no_telp',
        'file1',
        'file2',
        'file3',
        'file4',
        'file5',
    ]; 
}
