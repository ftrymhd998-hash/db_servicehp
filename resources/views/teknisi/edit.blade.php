@extends('adminlte::page')

@section('title', 'Edit Teknisi')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop

@section('content_header')
<h1>Edit Data Teknisi</h1>
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

<form action="{{ route('teknisi.update', $teknisi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-header">Formulir Data Teknisi</div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control"
                       value="{{ old('nama', $teknisi->nama) }}" required>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control"
                       value="{{ old('no_hp', $teknisi->no_hp) }}" required>
            </div>

            <div class="form-group">
                <label>Keahlian</label>
                <input type="text" name="keahlian" class="form-control"
                       value="{{ old('keahlian', $teknisi->keahlian) }}" required>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('teknisi.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</form>

@stop
