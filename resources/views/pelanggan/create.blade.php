@extends('adminlte::page')

@section('title', 'Tambah Pelanggan')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop

@section('content_header')
<h1>Tambah Pelanggan</h1>
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

<form action="{{ route('pelanggan.store') }}" method="POST">
    @csrf

    <div class="card">
        <div class="card-header">Formulir Data Pelanggan</div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}"
                       placeholder="Nama lengkap pelanggan" required>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}"
                       placeholder="08xxxxxxxxxx" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="2"
                          placeholder="Alamat lengkap" required>{{ old('alamat') }}</textarea>
            </div>

            <div class="form-group">
                <label>Kerusakan</label>
                <textarea name="kerusakan" class="form-control" rows="3"
                          placeholder="Contoh: layar retak, baterai boros, dll" required>{{ old('kerusakan') }}</textarea>
            </div>

            <div class="form-group">
                <label>Biaya (Rp)</label>
                <input type="number" name="biaya" class="form-control" value="{{ old('biaya') }}"
                       placeholder="Masukkan estimasi biaya service" min="0" required>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</form>

@stop
