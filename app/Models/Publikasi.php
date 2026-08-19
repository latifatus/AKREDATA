<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    protected $table = 'publikasi';

    protected $fillable = [
        'nama_dosen_ti',
        'dosen_kolaborasi',
        'prodi_kolaborasi',
        'universitas',
        'judul',
        'tahun_kolaborasi',
        'link_publikasi',
    ];
}