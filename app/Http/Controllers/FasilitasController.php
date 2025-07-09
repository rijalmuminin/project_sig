<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FasilitasController extends Controller
{
    /**
     * Menampilkan semua data fasilitas.
     */
    public function index()
    {
        $fasilitas = Fasilitas::all();
        confirmDelete('Data ini akan dihapus secara permanen', 'Apa anda yakin?');
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Menampilkan form tambah fasilitas.
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    /**
     * Menyimpan data fasilitas baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|unique:fasilitas,nama_fasilitas',
        ], [
            'nama_fasilitas.required' => 'Nama fasilitas wajib diisi',
            'nama_fasilitas.unique' => 'Nama fasilitas sudah ada',
        ]);

        Fasilitas::create($request->all());

        toast('Fasilitas berhasil ditambahkan.', 'success');
        return redirect()->route('fasilitas.index');
    }

    /**
     * Menampilkan form edit fasilitas.
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Menyimpan perubahan data fasilitas.
     */
    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $request->validate([
            'nama_fasilitas' => 'required|unique:fasilitas,nama_fasilitas,' . $fasilitas->id,
        ], [
            'nama_fasilitas.required' => 'Nama fasilitas wajib diisi',
            'nama_fasilitas.unique' => 'Nama fasilitas sudah digunakan',
        ]);

        $fasilitas->update($request->all());

        toast('Fasilitas berhasil diperbarui.', 'success');
        return redirect()->route('fasilitas.index');
    }

    /**
     * Menghapus data fasilitas.
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();

        toast('Fasilitas berhasil dihapus.', 'success');
        return redirect()->route('fasilitas.index');
    }
}
