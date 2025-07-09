<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use RealRashid\SweetAlert\Facades\Alert;

class GedungController extends Controller
{
    /**
     * Tampilkan semua gedung.
     */
    public function index()
    {
        confirmDelete('Data akan dihapus!', 'Apa anda yakin?');

        $gedung = Gedung::all();
        return view('admin.gedung.index', compact('gedung'));
    }

    /**
     * Tampilkan form tambah gedung.
     */
    public function create()
    {
        return view('admin.gedung.create');
    }

    /**
     * Simpan gedung baru.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama_gedung' => 'required|unique:gedungs,nama_gedung|max:255',
        ], [
            'nama_gedung.required' => 'Data harus diisi',       
            'nama_gedung.unique'   => 'Data sudah ada',      
        ]);


        $gedung = new Gedung();
        $gedung->nama_gedung = $request->nama_gedung;
        $gedung->save();

        toast('Gedung berhasil ditambahkan.', 'success')->position('bottom-end');
        return redirect()->route('gedung.index');
    }

    /**
     * Tampilkan detail satu gedung.
     */
    public function show(string $id)
    {
        $gedung = Gedung::findOrFail($id);
        return view('admin.gedung.show', compact('gedung'));
    }

    /**
     * Tampilkan form edit gedung.
     */
    public function edit(string $id)
    {
        $gedung = Gedung::findOrFail($id);
        return view('admin.gedung.edit', compact('gedung'));
    }

    /**
     * Update data gedung.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_gedung' => 'required|string|max:255',
        ], [
            'nama_gedung' => 'Nama gedung sudah ada',
        ]);

        $gedung = Gedung::findOrFail($id);
        $gedung->nama_gedung = $request->nama_gedung;
        $gedung->save();

        toast('Gedung berhasil diperbarui.', 'success')->position('bottom-end');
        return redirect()->route('gedung.index');
    }

    /**
     * Hapus data gedung.
     */
    public function destroy(string $id)
    {
        $gedung = Gedung::findOrFail($id);
        $gedung->delete();

        toast('Data berhasil dihapus.', 'success')->position('bottom-end');
        return back();
    }
}
