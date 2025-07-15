<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Gedung;
use App\Models\Ruangan;
use App\Models\Lantai;

class AdminController extends Controller
{
    public function index(){
        $fasilitas = Fasilitas::all();
        $gedung = Gedung::all();
        $ruangan = Ruangan::all();

        return view('admin.index', compact('fasilitas', 'gedung', 'ruangan'));
    }
}
