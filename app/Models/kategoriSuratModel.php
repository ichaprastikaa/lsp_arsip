<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategoriSuratModel extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'tb_kategori';
    protected $primaryKey = 'kdKategori';
    public $incrementing=false;
    protected $fillable = ['kdKategori', 'namaKategori', 'keterangan'];

    public function surats(){
        return $this->hasMany(arsipSuratModel::class, 'kategoriSurat', 'kdKategori');
    }
}
