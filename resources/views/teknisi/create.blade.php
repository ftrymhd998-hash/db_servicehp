@extends('adminlte::page')

@section('title', 'Tambah Teknisi')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop

@section('content_header')
<h1>Tambah Teknisi</h1>
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

<form action="{{ route('teknisi.store') }}" method="POST">
    @csrf

    <div class="card">
        <div class="card-header">Formulir Data Teknisi</div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}"
                       placeholder="Nama lengkap teknisi" required>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}"
                       placeholder="08xxxxxxxxxx" required>
            </div>

            <div class="form-group">
                <label>Keahlian</label>
                <input type="text" name="keahlian" class="form-control" value="{{ old('keahlian') }}"
                       placeholder="Contoh: hardware, software, ganti LCD" required>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('teknisi.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</form>

@stop
