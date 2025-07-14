<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ruangan;
class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['nama_kategori'];

    public function ruangan(){
        return $this->hasMany(Ruangan::class, 'kategori_id');
    }
}
