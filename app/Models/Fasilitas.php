<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fasilitas_ruangan;
class Fasilitas extends Model
{
    protected $fillable = ['nama_fasilitas'];

    public function fasilitas_ruangan(){
        return $this->hasMany(Fasilitas_Ruangan::class, 'fasilitas_id', 'ruangan_id');
    }
}
