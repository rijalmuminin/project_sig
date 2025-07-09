<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ruangan; 
use App\Models\Fasilitas; 

class Fasilitas_ruangan extends Model
{
    protected $fillable = ['fasilitas_id', 'ruangan_id'];

    public function ruangan(){
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    public function fasilitas(){
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id');
    }
}
