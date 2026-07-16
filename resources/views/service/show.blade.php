@extends('adminlte::page')

@section('title', 'Detail Service')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop

@section('content_header')
<h1>Detail Service</h1>
@stop

@section('content')

@php
    $badgeClass = match($service->status) {
        'Menunggu' => 'badge-status-menunggu',
        'Diproses' => 'badge-status-diproses',
        'Selesai'  => 'badge-status-selesai',
        'Diambil'  => 'badge-status-diambil',
        default    => 'badge-status-menunggu',
    };
@endphp

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>{{ $service->merk_hp }} {{ $service->tipe_hp }}</span>
        <span class="badge-status {{ $badgeClass }}">{{ $service->status }}</span>
    </div>
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">Pelanggan</dt>
            <dd class="col-sm-9">{{ $service->pelanggan->nama ?? '-' }} ({{ $service->pelanggan->no_hp ?? '-' }})</dd>

            <dt class="col-sm-3">Teknisi</dt>
            <dd class="col-sm-9">{{ $service->teknisi->nama ?? '-' }}</dd>

            <dt class="col-sm-3">IMEI</dt>
            <dd class="col-sm-9">{{ $service->imei }}</dd>

            <dt class="col-sm-3">Kerusakan</dt>
            <dd class="col-sm-9">{{ $service->kerusakan }}</dd>

            <dt class="col-sm-3">Tanggal Masuk</dt>
            <dd class="col-sm-9">{{ optional($service->tanggal_masuk)->format('d F Y') }}</dd>

            <dt class="col-sm-3">Estimasi Selesai</dt>
            <dd class="col-sm-9">{{ optional($service->estimasi_selesai)->format('d F Y') }}</dd>

            <dt class="col-sm-3">Biaya</dt>
            <dd class="col-sm-9">Rp {{ number_format($service->biaya, 0, ',', '.') }}</dd>
        </dl>
    </div>
    <div class="card-footer">
        <a href="{{ route('service.edit', $service->id) }}" class="btn btn-fitson-navy">
            <i class="fas fa-pen"></i> Edit
        </a>
        <a href="{{ route('service.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>

@stop
