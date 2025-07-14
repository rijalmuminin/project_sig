<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    /**
     * Tampilkan semua data petugas.
     */
    public function index()
    {
        $petugas = User::all();
        return view('admin.petugas.index', compact('petugas'));
    }

    /**
     * Tampilkan form tambah petugas.
     */
    public function create()
    {
        return view('admin.petugas.create');
    }

    /**
     * Simpan petugas ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Nama harus diisi',
            'name.unique' => 'Nama sudah terdaftar',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $petugas = new User();
        $petugas->name = $request->name;
        $petugas->email = $request->email;
        $petugas->password = Hash::make($request->password); 
        $petugas->save();

        toast('Data petugas berhasil ditambahkan', 'success');
        return redirect()->route('petugas.index');
    }

    /**
     * Tampilkan detail petugas.
     */
    public function show(string $id)
    {
        $petugas = User::findOrFail($id);
        return view('admin.petugas.show', compact('petugas'));
    }

    /**
     * Tampilkan form edit petugas.
     */
    public function edit(string $id)
    {
        $petugas = User::findOrFail($id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    /**
     * Update data petugas di database.
     */
    public function update(Request $request, string $id)
    {
        $petugas = User::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:users,name,' . $petugas->id,
            'email' => 'required|email|unique:users,email,' . $petugas->id,
            'password' => 'nullable|min:8',
        ], [
            'name.required' => 'Nama harus diisi',
            'name.unique' => 'Nama sudah terdaftar',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $petugas->name = $request->name;
        $petugas->email = $request->email;

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $petugas->password = Hash::make($request->password);
        }

        $petugas->save();

        if ($petugas->isDirty()) {
        $petugas->save();
        toast('Data petugas berhasil diperbarui.', 'success');
    } else {
        toast('Tidak ada data yang diubah.', 'info');
    }

    return redirect()->route('petugas.index');
    }

    /**
     * Hapus data petugas.
     */
    public function destroy(string $id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();

        toast('Petugas berhasil dihapus', 'success');
        return back();
    }
}
