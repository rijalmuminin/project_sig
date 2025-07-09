<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $fillable = ['nama_ruangan', 'kategori_id', 'deskripsi', 'gambar', 'fasilitas', 'latitude', 'longitude'];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
}
