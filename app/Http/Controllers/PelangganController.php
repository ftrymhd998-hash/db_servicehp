<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan semua data pelanggan
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('pelanggan.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'kerusakan' => 'required',
        'biaya' => 'required|numeric',
    ]);

    Pelanggan::create($request->all());

    return redirect()->route('pelanggan.index')
        ->with('success', 'Data pelanggan berhasil ditambahkan.');
}

    // Menampilkan form edit
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    // Menyimpan perubahan data
   public function update(Request $request, Pelanggan $pelanggan)
{
    $request->validate([
        'nama' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'kerusakan' => 'required',
        'biaya' => 'required|numeric',
    ]);

    $pelanggan->update([
        'nama' => $request->nama,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'kerusakan' => $request->kerusakan,
        'biaya' => $request->biaya,
    ]);

    return redirect()->route('pelanggan.index')
        ->with('success', 'Data pelanggan berhasil diupdate.');
}

    // Menghapus data
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus.');
    }
}