@extends('adminlte::page')

@section('title', 'Data Service HP')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop

@section('content_header')
<h1>Data Service HP</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-header">
        <div class="fitson-page-actions mb-0">
            <span>Daftar seluruh proses service HP pelanggan.</span>
            <a href="{{ route('service.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Service
            </a>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-fitson mb-0">
                <thead>
                    <tr>
                        <th style="width:50px">No</th>
                        <th>Pelanggan</th>
                        <th>HP</th>
                        <th>IMEI</th>
                        <th>Teknisi</th>
                        <th>Masuk</th>
                        <th>Estimasi Selesai</th>
                        <th>Status</th>
                        <th>Biaya</th>
                        <th style="width:170px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($service as $key => $s)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $s->pelanggan->nama ?? '-' }}</td>
                        <td>{{ $s->merk_hp }} {{ $s->tipe_hp }}</td>
                        <td>{{ $s->imei }}</td>
                        <td>{{ $s->teknisi->nama ?? '-' }}</td>
                        <td>{{ optional($s->tanggal_masuk)->format('d/m/Y') }}</td>
                        <td>{{ optional($s->estimasi_selesai)->format('d/m/Y') }}</td>
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
                        <td>Rp {{ number_format($s->biaya, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('service.edit', $s->id) }}" class="btn btn-sm btn-fitson-navy">
                                <i class="fas fa-pen"></i> Edit
                            </a>
                            <form action="{{ route('service.destroy', $s->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10">
                            <div class="fitson-empty">
                                <i class="fas fa-mobile-alt"></i>
                                Belum ada data service.
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
