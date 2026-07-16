<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    public function index()
    {
        $teknisi = Teknisi::all();
        return view('teknisi.index', compact('teknisi'));
    }

    public function create()
    {
        return view('teknisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'keahlian' => 'required',
        ]);

        Teknisi::create($request->all());

        return redirect()->route('teknisi.index')
            ->with('success', 'Data teknisi berhasil ditambahkan.');
    }

    public function edit(Teknisi $teknisi)
    {
        return view('teknisi.edit', compact('teknisi'));
    }

    public function update(Request $request, Teknisi $teknisi)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'keahlian' => 'required',
        ]);

        $teknisi->update($request->all());

        return redirect()->route('teknisi.index')
            ->with('success', 'Data teknisi berhasil diubah.');
    }

    public function destroy(Teknisi $teknisi)
    {
        $teknisi->delete();

        return redirect()->route('teknisi.index')
            ->with('success', 'Data teknisi berhasil dihapus.');
    }
}