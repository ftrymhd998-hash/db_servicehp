<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Service;
use App\Models\Teknisi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPelanggan = Pelanggan::count();
        $jumlahTeknisi   = Teknisi::count();
        $jumlahService   = Service::count();

        $serviceMenunggu = Service::where('status', 'Menunggu')->count();
        $serviceDiproses = Service::where('status', 'Diproses')->count();
        $serviceSelesai  = Service::where('status', 'Selesai')->count();
        $serviceDiambil  = Service::where('status', 'Diambil')->count();

        $serviceTerbaru = Service::with(['pelanggan', 'teknisi'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'jumlahPelanggan',
            'jumlahTeknisi',
            'jumlahService',
            'serviceMenunggu',
            'serviceDiproses',
            'serviceSelesai',
            'serviceDiambil',
            'serviceTerbaru'
        ));
    }
}
