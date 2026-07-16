<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Pelanggan;
use App\Models\Teknisi;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Menampilkan semua data service beserta relasi pelanggan & teknisi.
     */
    public function index()
    {
        $service = Service::with(['pelanggan', 'teknisi'])
            ->latest()
            ->get();

        return view('service.index', compact('service'));
    }

    /**
     * Menampilkan form tambah data service.
     */
    public function create()
    {
        $pelanggan = Pelanggan::orderBy('nama')->get();
        $teknisi   = Teknisi::orderBy('nama')->get();

        return view('service.create', compact('pelanggan', 'teknisi'));
    }

    /**
     * Menyimpan data service baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id'     => 'required|exists:pelanggans,id',
            'teknisi_id'       => 'required|exists:teknisis,id',
            'merk_hp'          => 'required|string|max:255',
            'tipe_hp'          => 'required|string|max:255',
            'imei'             => 'required|string|max:255|unique:services,imei',
            'kerusakan'        => 'required|string',
            'tanggal_masuk'    => 'required|date',
            'estimasi_selesai' => 'required|date|after_or_equal:tanggal_masuk',
            'status'           => 'required|in:Menunggu,Diproses,Selesai,Diambil',
            'biaya'            => 'required|numeric|min:0',
        ]);

        Service::create($request->all());

        return redirect()->route('service.index')
            ->with('success', 'Data service berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu data service.
     */
    public function show(Service $service)
    {
        $service->load(['pelanggan', 'teknisi']);

        return view('service.show', compact('service'));
    }

    /**
     * Menampilkan form edit data service.
     */
    public function edit(Service $service)
    {
        $pelanggan = Pelanggan::orderBy('nama')->get();
        $teknisi   = Teknisi::orderBy('nama')->get();

        return view('service.edit', compact('service', 'pelanggan', 'teknisi'));
    }

    /**
     * Menyimpan perubahan data service.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'pelanggan_id'     => 'required|exists:pelanggans,id',
            'teknisi_id'       => 'required|exists:teknisis,id',
            'merk_hp'          => 'required|string|max:255',
            'tipe_hp'          => 'required|string|max:255',
            'imei'             => 'required|string|max:255|unique:services,imei,' . $service->id,
            'kerusakan'        => 'required|string',
            'tanggal_masuk'    => 'required|date',
            'estimasi_selesai' => 'required|date|after_or_equal:tanggal_masuk',
            'status'           => 'required|in:Menunggu,Diproses,Selesai,Diambil',
            'biaya'            => 'required|numeric|min:0',
        ]);

        $service->update($request->all());

        return redirect()->route('service.index')
            ->with('success', 'Data service berhasil diperbarui.');
    }

    /**
     * Menghapus data service.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index')
            ->with('success', 'Data service berhasil dihapus.');
    }
}
