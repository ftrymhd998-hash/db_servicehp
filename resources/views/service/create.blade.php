@extends('adminlte::page')

@section('title', 'Tambah Service')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop

@section('content_header')
<h1>Tambah Service HP</h1>
@stop

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0 pl-3">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if($pelanggan->isEmpty() || $teknisi->isEmpty())
<div class="alert alert-warning">
    Pastikan data <strong>Pelanggan</strong> dan <strong>Teknisi</strong> sudah tersedia
    sebelum menambahkan data service.
</div>
@endif

<form action="{{ route('service.store') }}" method="POST">
    @csrf

    <div class="card">
        <div class="card-header">Formulir Data Service</div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <select name="pelanggan_id" class="form-control custom-select" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach($pelanggan as $p)
                                <option value="{{ $p->id }}" {{ old('pelanggan_id') == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }} ({{ $p->no_hp }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Teknisi</label>
                        <select name="teknisi_id" class="form-control custom-select" required>
                            <option value="">-- Pilih Teknisi --</option>
                            @foreach($teknisi as $t)
                                <option value="{{ $t->id }}" {{ old('teknisi_id') == $t->id ? 'selected' : '' }}>
                                    {{ $t->nama }} ({{ $t->keahlian }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Merk HP</label>
                        <input type="text" name="merk_hp" class="form-control" value="{{ old('merk_hp') }}"
                               placeholder="Contoh: Samsung" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipe HP</label>
                        <input type="text" name="tipe_hp" class="form-control" value="{{ old('tipe_hp') }}"
                               placeholder="Contoh: Galaxy A54" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>IMEI</label>
                <input type="text" name="imei" class="form-control" value="{{ old('imei') }}"
                       placeholder="Nomor IMEI HP" required>
            </div>

            <div class="form-group">
                <label>Kerusakan</label>
                <textarea name="kerusakan" class="form-control" rows="3"
                          placeholder="Deskripsi kerusakan" required>{{ old('kerusakan') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" class="form-control"
                               value="{{ old('tanggal_masuk', date('Y-m-d')) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Estimasi Selesai</label>
                        <input type="date" name="estimasi_selesai" class="form-control"
                               value="{{ old('estimasi_selesai') }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control custom-select" required>
                            @foreach(['Menunggu', 'Diproses', 'Selesai', 'Diambil'] as $status)
                                <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Biaya (Rp)</label>
                        <input type="number" name="biaya" class="form-control" value="{{ old('biaya') }}"
                               min="0" placeholder="Biaya service" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('service.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</form>

@stop
