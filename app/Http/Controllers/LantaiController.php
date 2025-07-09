<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lantai;
use App\Models\Gedung;
use RealRashid\SweetAlert\Facades\Alert;

class LantaiController extends Controller
{
    /**
     * Tampilkan semua data lantai.
     */
    public function index()
    {
        confirmDelete('Data akan dihapus!', 'Apa anda yakin?');

        $lantai = Lantai::with('gedung')->get();
        return view('admin.lantai.index', compact('lantai'));
    }

    /**
     * Tampilkan form tambah lantai.
     */
    public function create()
    {
        $gedung = Gedung::all(); // untuk dropdown pilihan gedung
        return view('admin.lantai.create', compact('gedung'));
    }

    /**
     * Simpan data lantai baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gedung_id' => 'required|exists:gedungs,id',
            'lantai' => 'required|unique:lantais,lantai,NULL,id,gedung_id,' . $request->gedung_id,
        ], [
            'gedung_id.required' => 'Gedung harus dipilih.',
            'lantai.required' => 'Nama lantai harus diisi.',
            'lantai.unique' => 'Lantai ini sudah terdaftar di gedung tersebut.',
        ]);

        Lantai::create([
            'gedung_id' => $request->gedung_id,
            'lantai' => $request->lantai,
        ]);

        toast('Lantai berhasil ditambahkan.', 'success');
        return redirect()->route('lantai.index');
    }

    /**
     * Tampilkan detail satu lantai.
     */
    public function show(string $id)
    {
        $lantai = Lantai::with('gedung')->findOrFail($id);
        return view('admin.lantai.show', compact('lantai'));
    }

    /**
     * Tampilkan form edit lantai.
     */
    public function edit(string $id)
    {
        $lantai = Lantai::findOrFail($id);
        $gedung = Gedung::all();
        return view('admin.lantai.edit', compact('lantai', 'gedung'));
    }

    /**
     * Update data lantai.
     */
    public function update(Request $request, string $id)
    {
        $lantai = Lantai::findOrFail($id);

        $request->validate([
            'gedung_id' => 'required|exists:gedungs,id',
            'lantai' => 'required|unique:lantais,lantai,' . $lantai->id . ',id,gedung_id,' . $request->gedung_id,
        ], [
            'gedung_id.required' => 'Gedung harus dipilih.',
            'lantai.required' => 'Nama lantai harus diisi.',
            'lantai.unique' => 'Lantai ini sudah terdaftar di gedung tersebut.',
        ]);

        $lantai->update([
            'gedung_id' => $request->gedung_id,
            'lantai' => $request->lantai,
        ]);

        toast('Lantai berhasil diperbarui.', 'success');
        return redirect()->route('lantai.index');
    }

    /**
     * Hapus data lantai.
     */
    public function destroy(string $id)
    {
        $lantai = Lantai::findOrFail($id);
        $lantai->delete();

        toast('Data berhasil dihapus.', 'success');
        return back();
    }
}
