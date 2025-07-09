<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::all();
        return view('admin.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'name' => 'Nama harus diisi',
            'email' => 'Email harus diisi',
            'password' => 'Password harus diisi',
        ]);

        $petugas = new User();
        $petugas->name = $request->name;
        $petugas->email = $request->email;
        $petugas->password = $request->password;
        $petugas->save();
        toast('Data petugas berhasil ditambahkan', 'success');
        return redirect()->route('petugas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = User::findOrFail($id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'name' => 'Nama harus diisi',
            'email' => 'Email harus diisi',
            'password' => 'Password harus diisi',
        ]);

        $petugas = User::findOrFail($id);
        $petugas->name = $request->name;
        $petugas->email = $request->email;
        $petugas->password = $request->password;
        $petugas->save();
        toast('Data petugas berhasil diperbarui.', 'success');
        return redirect()->route('petugas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = User::findOrFail($id);
        $petugas = User::delete();
        toast('Petugas berhasil dihapus');
        return back();
    }
}
