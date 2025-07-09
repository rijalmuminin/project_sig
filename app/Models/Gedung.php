<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lantai;
class Gedung extends Model
{
    protected $fillable = ['nama_gedung'];

    public function lantai(){
        return $this->hasMany(Lantai::class, 'gedung_id');
    }
}
