<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class RuanganController extends Controller
{
    /**
     * Tampilkan semua ruangan.
     */
    public function index()
    {
        $ruangan = Ruangan::with('kategori')->get();
        confirmDelete('Data ini akan dihapus secara permanen', 'Apa anda yakin?');
        return view('admin.ruangan.index', compact('ruangan'));
    }

    /**
     * Form tambah ruangan.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.ruangan.create', compact('kategori'));
    }

    /**
     * Simpan ruangan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required|unique:ruangan,nama_ruangan',
            'kategori_id' => 'required|exists:kategori,id',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'fasilitas' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar_ruangan', 'public');
        }

        Ruangan::create($data);
        Alert::success('Sukses', 'Data ruangan berhasil ditambahkan');
        return redirect()->route('ruangan.index');
    }

    /**
     * Form edit ruangan.
     */
    public function edit($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.ruangan.edit', compact('ruangan', 'kategori'));
    }

    /**
     * Update ruangan.
     */
    public function update(Request $request, $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        $request->validate([
            'nama_ruangan' => 'required|unique:ruangan,nama_ruangan,' . $ruangan->id,
            'kategori_id' => 'required|exists:kategori,id',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'fasilitas' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($ruangan->gambar) {
                Storage::disk('public')->delete($ruangan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('gambar_ruangan', 'public');
        }

        $ruangan->update($data);
        Alert::success('Sukses', 'Data ruangan berhasil diupdate');
        return redirect()->route('ruangan.index');
    }

    /**
     * Hapus ruangan.
     */
    public function destroy($id)
    {
        $ruangan = Ruangan::findOrFail($id);

        if ($ruangan->gambar) {
            Storage::disk('public')->delete($ruangan->gambar);
        }

        $ruangan->delete();
        Alert::success('Sukses', 'Data ruangan berhasil dihapus');
        return redirect()->route('ruangan.index');
    }
}
