@extends('adminlte::page')

@section('title', 'Edit Service')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop

@section('content_header')
<h1>Edit Data Service</h1>
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

<form action="{{ route('service.update', $service->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-header">Formulir Data Service</div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <select name="pelanggan_id" class="form-control custom-select" required>
                            @foreach($pelanggan as $p)
                                <option value="{{ $p->id }}"
                                    {{ old('pelanggan_id', $service->pelanggan_id) == $p->id ? 'selected' : '' }}>
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
                            @foreach($teknisi as $t)
                                <option value="{{ $t->id }}"
                                    {{ old('teknisi_id', $service->teknisi_id) == $t->id ? 'selected' : '' }}>
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
                        <input type="text" name="merk_hp" class="form-control"
                               value="{{ old('merk_hp', $service->merk_hp) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipe HP</label>
                        <input type="text" name="tipe_hp" class="form-control"
                               value="{{ old('tipe_hp', $service->tipe_hp) }}" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>IMEI</label>
                <input type="text" name="imei" class="form-control"
                       value="{{ old('imei', $service->imei) }}" required>
            </div>

            <div class="form-group">
                <label>Kerusakan</label>
                <textarea name="kerusakan" class="form-control" rows="3"
                          required>{{ old('kerusakan', $service->kerusakan) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" class="form-control"
                               value="{{ old('tanggal_masuk', optional($service->tanggal_masuk)->format('Y-m-d')) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Estimasi Selesai</label>
                        <input type="date" name="estimasi_selesai" class="form-control"
                               value="{{ old('estimasi_selesai', optional($service->estimasi_selesai)->format('Y-m-d')) }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control custom-select" required>
                            @foreach(['Menunggu', 'Diproses', 'Selesai', 'Diambil'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status', $service->status) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Biaya (Rp)</label>
                        <input type="number" name="biaya" class="form-control"
                               value="{{ old('biaya', $service->biaya) }}" min="0" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('service.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</form>

@stop
