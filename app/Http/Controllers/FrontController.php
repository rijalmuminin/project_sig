<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Gedung;
use App\Models\Kategori;
use App\Models\Lantai;
use App\Models\Ruangan;

class FrontController extends Controller
{


    public function index()
    {
        $ruangan = Ruangan::with(['kategori', 'fasilitas', 'lantai'])->get();
        $kategori = Kategori::all();
        $fasilitas = Fasilitas::all();
        $gedung = Gedung::all();
        $lantai = Lantai::with('gedung')->get()->unique('gedung_id');

        return view('front.index', compact('ruangan', 'kategori', 'fasilitas', 'gedung', 'lantai'));
    }

    
    public function gedung()
    {
        $gedung = Gedung::with('lantai')->get();
        return view('front.gedung', compact('gedung'));
    }

 
    public function ruangan()
    {
        $ruangan = Ruangan::with(['kategori', 'lantai', 'fasilitas'])->get();
        return view('front.ruangan', compact('ruangan'));
    }

    public function filter($gedung_id)
    {
        $gedung = Gedung::all();
        $lantai = Lantai::where('gedung_id', $gedung_id)->get();
        $ruangan = Ruangan::whereIn('lantai_id', $lantai->pluck('id'))->latest()->get();
        $pilihGedung = Gedung::findOrFail($gedung_id);
        return view('front.index', compact('lantai', 'ruangan', 'pilihGedung', 'gedung'));
    }


    public function fasilitas()
    {
        $fasilitas = Fasilitas::with('ruangans')->get();
        return view('front.fasilitas', compact('fasilitas'));
    }


    public function kategori()
    {
        $kategori = Kategori::with('ruangan')->get();
        return view('front.kategori', compact('kategori'));
    }

    
    public function detailRuangan($id)
    {
        $ruangan = Ruangan::with(['kategori', 'lantai', 'fasilitas'])->findOrFail($id);
        return view('front.detail.index', compact('ruangan'));

    }
    public function tentang()
    {
        return view('tentang');
    }

    
}
