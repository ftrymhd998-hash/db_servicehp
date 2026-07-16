@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop

@section('content_header')
<h1>Dashboard</h1>
<p class="text-muted mb-0">Ringkasan aktivitas Fitson Service HP hari ini.</p>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ session('success') }}
</div>
@endif

<div class="row">
    <div class="col-lg-3 col-6">
        <div class="fitson-stat fitson-stat-navy">
            <i class="fas fa-users fitson-stat-icon"></i>
            <div class="fitson-stat-number">{{ $jumlahPelanggan }}</div>
            <div class="fitson-stat-label">Pelanggan Terdaftar</div>
            <a href="{{ route('pelanggan.index') }}" class="fitson-stat-link">
                Lihat data <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="fitson-stat fitson-stat-teal">
            <i class="fas fa-user-cog fitson-stat-icon"></i>
            <div class="fitson-stat-number">{{ $jumlahTeknisi }}</div>
            <div class="fitson-stat-label">Teknisi Aktif</div>
            <a href="{{ route('teknisi.index') }}" class="fitson-stat-link">
                Lihat data <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="fitson-stat fitson-stat-amber">
            <i class="fas fa-mobile-alt fitson-stat-icon"></i>
            <div class="fitson-stat-number">{{ $jumlahService }}</div>
            <div class="fitson-stat-label">Total Service</div>
            <a href="{{ route('service.index') }}" class="fitson-stat-link">
                Lihat data <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="fitson-stat fitson-stat-red">
            <i class="fas fa-hourglass-half fitson-stat-icon"></i>
            <div class="fitson-stat-number">{{ $serviceMenunggu + $serviceDiproses }}</div>
            <div class="fitson-stat-label">Sedang Berjalan</div>
            <a href="{{ route('service.index') }}" class="fitson-stat-link">
                Lihat data <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Status Service
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge-status badge-status-menunggu">Menunggu</span>
                    <strong>{{ $serviceMenunggu }}</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge-status badge-status-diproses">Diproses</span>
                    <strong>{{ $serviceDiproses }}</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge-status badge-status-selesai">Selesai</span>
                    <strong>{{ $serviceSelesai }}</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge-status badge-status-diambil">Diambil</span>
                    <strong>{{ $serviceDiambil }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Service Terbaru
            </div>
            <div class="card-body p-0">
                @if($serviceTerbaru->isEmpty())
                    <div class="fitson-empty">
                        <i class="fas fa-inbox"></i>
                        Belum ada data service.
                    </div>
                @else
                <table class="table table-fitson mb-0">
                    <thead>
                        <tr>
                            <th>Pelanggan</th>
                            <th>HP</th>
                            <th>Teknisi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($serviceTerbaru as $s)
                        <tr>
                            <td>{{ $s->pelanggan->nama ?? '-' }}</td>
                            <td>{{ $s->merk_hp }} {{ $s->tipe_hp }}</td>
                            <td>{{ $s->teknisi->nama ?? '-' }}</td>
                            <td>
                                @php
                                    $badgeClass = match($s->status) {
                                        'Menunggu' => 'badge-status-menunggu',
                                        'Diproses' => 'badge-status-diproses',
                                        'Selesai'  => 'badge-status-selesai',
                                        'Diambil'  => 'badge-status-diambil',
                                        default    => 'badge-status-menunggu',
                                    };
                                @endphp
                                <span class="badge-status {{ $badgeClass }}">{{ $s->status }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>

@stop
