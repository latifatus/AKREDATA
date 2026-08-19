<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';

    protected $fillable = [
        'nama_dokumen',
        'kategori',
        'file',
        'file_pdf',
        'keterangan',
    ];
    
    public function getJenisFileAttribute()
    {
        $ext = strtolower(pathinfo($this->file, PATHINFO_EXTENSION));
    
        return match ($ext) {
            'pdf' => 'PDF',
            'doc', 'docx' => 'Word',
            'xls', 'xlsx' => 'Excel',
            'ppt', 'pptx' => 'PowerPoint',
            default => strtoupper($ext),
        };
    }
}
