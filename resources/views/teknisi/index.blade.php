@extends('adminlte::page')

@section('title', 'Data Teknisi')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop

@section('content_header')
<h1>Data Teknisi</h1>
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
            <span>Daftar teknisi yang menangani service HP.</span>
            <a href="{{ route('teknisi.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Teknisi
            </a>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-fitson mb-0">
                <thead>
                    <tr>
                        <th style="width:50px">No</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Keahlian</th>
                        <th style="width:170px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teknisi as $key => $t)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $t->nama }}</td>
                        <td>{{ $t->no_hp }}</td>
                        <td>{{ $t->keahlian }}</td>
                        <td>
                            <a href="{{ route('teknisi.edit', $t->id) }}" class="btn btn-sm btn-fitson-navy">
                                <i class="fas fa-pen"></i> Edit
                            </a>
                            <form action="{{ route('teknisi.destroy', $t->id) }}" method="POST" style="display:inline">
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
                        <td colspan="5">
                            <div class="fitson-empty">
                                <i class="fas fa-user-slash"></i>
                                Belum ada data teknisi.
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
