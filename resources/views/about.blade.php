@extends('adminlte::page')

@section('title', 'About')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop

@section('content_header')
<h1>Tentang Fitson</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <h3 class="mb-3" style="color:var(--fitson-navy);">
            Fitson - Sistem Informasi Service HP
        </h3>

        <p class="text-muted" style="text-align: justify;">
            <strong>Fitson</strong> merupakan aplikasi berbasis web yang dirancang
            untuk membantu proses pengelolaan layanan service handphone secara
            lebih cepat, terstruktur, dan efisien. Sistem ini memudahkan admin
            dalam mencatat data pelanggan, mengelola data teknisi, serta
            memonitor setiap proses perbaikan perangkat mulai dari penerimaan
            hingga selesai dikerjakan. Dengan adanya sistem ini, proses pencarian
            data menjadi lebih mudah, risiko kehilangan data dapat diminimalkan,
            dan pelayanan kepada pelanggan menjadi lebih optimal.
        </p>

        <div class="row mt-4">

            <div class="col-md-4">
                <i class="fas fa-users fa-2x mb-2" style="color:var(--fitson-teal);"></i>
                <h5>Data Pelanggan</h5>
                <p class="text-muted small">
                    Menyimpan informasi pelanggan secara lengkap, termasuk nama,
                    nomor telepon, alamat, serta riwayat service yang pernah
                    dilakukan sehingga memudahkan pencarian data di kemudian hari.
                </p>
            </div>

            <div class="col-md-4">
                <i class="fas fa-user-cog fa-2x mb-2" style="color:var(--fitson-teal);"></i>
                <h5>Data Teknisi</h5>
                <p class="text-muted small">
                    Mengelola data teknisi beserta keahlian masing-masing agar
                    pembagian pekerjaan dapat dilakukan dengan lebih efektif dan
                    proses perbaikan menjadi lebih terorganisir.
                </p>
            </div>

            <div class="col-md-4">
                <i class="fas fa-mobile-alt fa-2x mb-2" style="color:var(--fitson-teal);"></i>
                <h5>Proses Service</h5>
                <p class="text-muted small">
                    Mencatat detail perangkat, jenis kerusakan, estimasi biaya,
                    status pengerjaan, hingga penyelesaian service sehingga setiap
                    proses dapat dipantau dengan mudah.
                </p>
            </div>

        </div>

        <hr>

        <h5 style="color:var(--fitson-navy);">Tujuan Sistem</h5>

        <p class="text-muted" style="text-align: justify;">
            Tujuan utama pembangunan aplikasi Fitson adalah untuk meningkatkan
            efisiensi pengelolaan layanan service handphone, mempermudah proses
            administrasi, mempercepat pencarian informasi, serta memberikan
            pelayanan yang lebih baik kepada pelanggan melalui sistem yang
            terkomputerisasi.
        </p>

        <hr>

        <p class="text-muted mb-0 small">
            <strong>Fitson</strong> dikembangkan menggunakan
            <strong>Laravel 9</strong> sebagai framework backend,
            <strong>AdminLTE 3</strong> sebagai template antarmuka,
            serta <strong>MySQL</strong> sebagai sistem manajemen basis data.
        </p>

    </div>
</div>

@stop