@extends('adminlte::page')

@section('title', 'Profile')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<style>
    .profile-cover {
    height: 180px;
    background: linear-gradient(135deg, var(--fitson-navy) 0%, var(--fitson-teal-dark) 100%);
    border-radius: var(--fitson-card-radius) var(--fitson-card-radius) 0 0;
}

.profile-avatar-wrap {
    text-align: center;
    margin-top: -60px;
    margin-bottom: 20px;
}

.profile-avatar-wrap img {
    width: 180px;
    height: 180px;
    object-fit: cover;
    border-radius: 15px;   /* Kotak dengan sudut membulat */
    border: 6px solid #fff;
    box-shadow: 0 8px 20px rgba(16,35,62,.25);
    background: #fff;
}

.profile-name {
    text-align: center;
    margin-top: 0;
    margin-bottom: 25px;
}

.profile-name h3 {
    font-weight: 800;
    color: var(--fitson-navy);
    margin-bottom: .3rem;
}
    .profile-name .badge-role {
        background: var(--fitson-teal);
        color: #fff;
        font-weight: 600;
        padding: .35em .9em;
        border-radius: 20px;
        font-size: .78rem;
    }
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
        gap: 1rem;
        margin-top: 1.75rem;
    }
    .info-item {
        background: #f8fafc;
        border: 1px solid #eef1f5;
        border-radius: 10px;
        padding: .9rem 1rem;
        display: flex;
        gap: .75rem;
        align-items: flex-start;
    }
    .info-item i {
        color: var(--fitson-teal);
        font-size: 1.05rem;
        margin-top: .15rem;
        width: 20px;
        text-align: center;
    }
    .info-item .info-label {
        display: block;
        font-size: .72rem;
        text-transform: uppercase;
        letter-spacing: .04em;
        color: #9aa3b2;
        font-weight: 700;
        margin-bottom: .1rem;
    }
    .info-item .info-value {
        color: var(--fitson-navy);
        font-weight: 600;
        font-size: .92rem;
    }
</style>
@stop

@section('content_header')
<h1>Profile</h1>
@stop

@section('content')

<div class="card">

    <!-- Cover -->
    <div class="profile-cover"></div>

    <!-- Foto -->
    <div class="profile-avatar-wrap text-center">
        <img src="{{ asset('img/fitri.jpeg') }}" alt="Foto Profil">
    </div>

    <div class="card-body">

        <!-- Nama -->
        <div class="profile-name">
            <h3>Muhammad Fitri</h3>
            <span class="badge-role">Developer Fitson</span>
        </div>

        <!-- Biodata -->
        <div class="info-grid">
            <div class="info-item">
                <i class="fas fa-id-card"></i>
                <div>
                    <span class="info-label">NPM</span>
                    <span class="info-value">2410010204</span>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-users"></i>
                <div>
                    <span class="info-label">Kelas</span>
                    <span class="info-value">TI 4A Reguler Banjarbaru</span>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-graduation-cap"></i>
                <div>
                    <span class="info-label">Program Studi</span>
                    <span class="info-value">Teknik Informatika</span>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-building"></i>
                <div>
                    <span class="info-label">Fakultas</span>
                    <span class="info-value">Fakultas Teknologi Informasi</span>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-university"></i>
                <div>
                    <span class="info-label">Universitas</span>
                    <span class="info-value">UNISKA Muhammad Arsyad Al-Banjari</span>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-mobile-alt"></i>
                <div>
                    <span class="info-label">Aplikasi</span>
                    <span class="info-value">Fitson - Sistem Informasi Service HP</span>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-layer-group"></i>
                <div>
                    <span class="info-label">Framework</span>
                    <span class="info-value">Laravel 9 + AdminLTE 3</span>
                </div>
            </div>
        </div>

    </div>

</div>

@stop