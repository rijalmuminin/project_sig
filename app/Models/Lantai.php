<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gedung;
use App\Models\Ruangan;

class Lantai extends Model
{
    protected $fillable = ['gedung_id', 'lantai'];

    public function gedung(){
        return $this->belongsTo(Gedung::class,'gedung_id');
    }

    public function ruangan(){
        return $this->hasMany(Ruangan::class,'lantai_id');
    }
}
