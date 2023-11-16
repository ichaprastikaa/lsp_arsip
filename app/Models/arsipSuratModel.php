<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arsipSuratModel extends Model
{
    use HasFactory;

    protected $table = 'tb_arsip';
    protected $primaryKey = 'kdSurat';
    public $incrementing=false;
    protected $fillable = ['kdSurat', 'nomorSurat', 'judulSurat', 'kategoriSurat', 'fileSurat', 'waktuPengarsipan'];

    public function kategoriList() {
        return $this->belongsTo(kategoriSuratModel::class, 'kategoriSurat',  'kdKategori')->withTrashed();
    }
}
