<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Kategori;
use App\Models\Fasilitas;
use App\Models\Lantai;
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
        $ruangan = Ruangan::with(['kategori', 'lantai', 'fasilitas'])->get();
        confirmDelete('Data ini akan dihapus secara permanen', 'Apa anda yakin?');
        return view('admin.ruangan.index', compact('ruangan'));
    }

    /**
     * Tampilkan form tambah ruangan.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $fasilitas = Fasilitas::all();
        $lantai = Lantai::all();
        return view('admin.ruangan.create', compact('kategori', 'fasilitas', 'lantai'));
    }

    /**
     * Simpan ruangan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required|unique:ruangans,nama_ruangan',
            'kategori_id' => 'required|exists:kategoris,id',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|max:2048',
            'fasilitas_id' => 'nullable|array',
            'lantai_id' => 'required|exists:lantais,id',
            'denah' => 'required',
        ], [
            'nama_ruangan.unique' => 'nama ruangan sudah ada',
            'kategori_id.required' => 'Kategori belum dipilih',
            'lantai_id.required' => 'Lantai belum dipilih',
            'gambar.required' => 'Gambar belum dipilih',
            'deskripsi.required' => 'Deskripsi belum diisi',
            'denah' => 'Denah belum dipilih',
        ]);

        $data = $request->only(['nama_ruangan', 'kategori_id', 'deskripsi', 'lantai_id']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar_ruangan', 'public');
        }

        if ($request->hasFile('denah')) {
            $data['denah'] = $request->file('denah')->store('denah', 'public');
        }

        $ruangan = Ruangan::create($data);

        if ($request->has('fasilitas_id')) {
            $ruangan->fasilitas()->attach($request->fasilitas_id);
        }

        Alert::success('Sukses', 'Data ruangan berhasil ditambahkan');
        return redirect()->route('ruangan.index');
    }

     /**
     * Tampilkan detail petugas.
     */
    public function show(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        return view('admin.ruangan.show', compact('ruangan'));
    }

    /**
     * Form edit ruangan.
     */
    public function edit($id)
    {
        $ruangan = Ruangan::with('fasilitas')->findOrFail($id);
        $kategori = Kategori::all();
        $fasilitas = Fasilitas::all();
        $lantai = Lantai::all();
        return view('admin.ruangan.edit', compact('ruangan', 'kategori', 'fasilitas', 'lantai'));
    }

    /**
     * Update ruangan.
     */
    public function update(Request $request, $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        $request->validate([
            'nama_ruangan' => 'required|unique:ruangans,nama_ruangan,' . $ruangan->id,
            'kategori_id' => 'required|exists:kategoris,id',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'fasilitas_id' => 'required|array',
            'lantai_id' => 'required|exists:lantais,id',
            'denah' => 'nullable',
        ], [
            'nama_ruangan.unique' => 'nama ruangan sudah terpakai',
        ]);

        $data = $request->only(['nama_ruangan', 'kategori_id', 'deskripsi', 'lantai_id']);

        if ($request->hasFile('gambar')) {
            if ($ruangan->gambar) {
                Storage::disk('public')->delete($ruangan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('gambar_ruangan', 'public');
        }

        if ($request->hasFile('denah')) {
            if ($ruangan->denah) {
                Storage::disk('public')->delete($ruangan->denah);
            }
            $data['denah'] = $request->file('denah')->store('denah', 'public');
        }

        $ruangan->update($data);

        // Sinkronisasi fasilitas
        $ruangan->fasilitas()->sync($request->fasilitas_id ?? []);

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

        if ($ruangan->denah) {
            Storage::disk('public')->delete($ruangan->denah);
        }

        $ruangan->fasilitas()->detach();
        $ruangan->delete();

        Alert::success('Sukses', 'Data ruangan berhasil dihapus');
        return redirect()->route('ruangan.index');
    }
}
