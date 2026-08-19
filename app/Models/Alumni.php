<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';

   protected $fillable = [
   'nama',
    'nim',
    'prodi',
    'tahun_lulus',
    'ts',
    'pekerjaan',
    'instansi',

    'sumber_rekognisi',
    'jenis_pengakuan',
    'link_bukti',
    'tahun_bekerja',
    ];
}