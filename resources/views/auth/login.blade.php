<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Fitson</title>
    <link rel="icon" href="{{ asset('img/fitson-logo.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f4f6f9;
        }

        .login-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .login-box {
            width: 100%;
            max-width: 920px;
            min-height: 560px;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(16,35,62,.18);
            background: #fff;
        }

        /* ---------- Panel kiri (branding) ---------- */
        .login-brand {
            flex: 1 1 46%;
            position: relative;
            background: linear-gradient(155deg, var(--fitson-navy) 0%, var(--fitson-teal-dark) 100%);
            color: #fff;
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .login-brand::before,
        .login-brand::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,.08);
        }
        .login-brand::before { width: 260px; height: 260px; top: -90px; right: -90px; }
        .login-brand::after  { width: 180px; height: 180px; bottom: -60px; left: -60px; background: rgba(255,255,255,.06); }

        .login-brand-top { position: relative; z-index: 1; }

        .login-brand-logo {
            display: flex;
            align-items: center;
            gap: .65rem;
            margin-bottom: 2.5rem;
        }
        .login-brand-logo img { width: 42px; height: 42px; }
        .login-brand-logo span {
            font-size: 1.3rem;
            font-weight: 800;
            letter-spacing: .3px;
        }

        .login-brand-top h2 {
            font-size: 1.65rem;
            font-weight: 800;
            line-height: 1.3;
            margin-bottom: .9rem;
        }
        .login-brand-top p {
            font-size: .9rem;
            color: rgba(255,255,255,.8);
            line-height: 1.6;
            max-width: 320px;
        }

        .login-brand-features {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            gap: .9rem;
        }
        .login-brand-features div {
            display: flex;
            align-items: center;
            gap: .7rem;
            font-size: .85rem;
            color: rgba(255,255,255,.92);
        }
        .login-brand-features i {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: rgba(255,255,255,.14);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .85rem;
        }

        /* ---------- Panel kanan (form) ---------- */
        .login-form-panel {
            flex: 1 1 54%;
            padding: 3.2rem 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form-panel h1 {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--fitson-navy);
            margin-bottom: .25rem;
        }
        .login-form-panel .login-sub {
            color: #8891a3;
            font-size: .88rem;
            margin-bottom: 1.75rem;
        }

        .input-icon-group {
            position: relative;
            margin-bottom: 1.15rem;
        }
        .input-icon-group label {
            display: block;
            font-weight: 600;
            color: var(--fitson-navy);
            font-size: .82rem;
            margin-bottom: .35rem;
        }
        .input-icon-group .icon-wrap {
            position: relative;
        }
        .input-icon-group .icon-wrap i.field-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #b7bfcc;
            font-size: .9rem;
        }
        .input-icon-group input {
            width: 100%;
            padding: .65rem .9rem .65rem 2.4rem;
            border: 1px solid #dfe3ea;
            border-radius: 10px;
            font-size: .92rem;
            outline: none;
            transition: border-color .15s, box-shadow .15s;
        }
        .input-icon-group input:focus {
            border-color: var(--fitson-teal);
            box-shadow: 0 0 0 .18rem rgba(15,155,142,.15);
        }
        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #b7bfcc;
            cursor: pointer;
            font-size: .9rem;
        }
        .toggle-password:hover { color: var(--fitson-teal); }

        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: .25rem 0 1.4rem;
            font-size: .82rem;
        }
        .login-options label {
            display: flex;
            align-items: center;
            gap: .4rem;
            color: #5a6472;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            background: var(--fitson-teal);
            border: none;
            color: #fff;
            font-weight: 700;
            font-size: .95rem;
            padding: .75rem;
            border-radius: 10px;
            transition: background .15s, transform .1s;
        }
        .btn-login:hover { background: var(--fitson-teal-dark); color: #fff; }
        .btn-login:active { transform: scale(.99); }

        .login-footer-note {
            text-align: center;
            font-size: .78rem;
            color: #adb5c0;
            margin-top: 1.75rem;
        }

        .alert-box {
            border-radius: 10px;
            padding: .65rem .9rem;
            font-size: .84rem;
            margin-bottom: 1.1rem;
        }
        .alert-box.success { background: #d8f3ea; color: #0b7a55; }
        .alert-box.danger  { background: #fbe4e3; color: #a6342d; }
        .alert-box div + div { margin-top: .2rem; }

        @media (max-width: 820px) {
            .login-box { flex-direction: column; min-height: auto; }
            .login-brand { padding: 2.25rem 2rem; }
            .login-form-panel { padding: 2.25rem 2rem; }
        }
    </style>
</head>
<body>

<div class="login-shell">
    <div class="login-box">

        <!-- Panel kiri: branding -->
        <div class="login-brand">
            <div class="login-brand-top">
                <div class="login-brand-logo">
                    <img src="{{ asset('img/fitson-logo.svg') }}" alt="Fitson">
                    <span>Fitson</span>
                </div>
                <h2>Kelola service HP lebih rapi dan cepat.</h2>
                <p>Satu sistem untuk mencatat pelanggan, teknisi, dan progres perbaikan dari awal masuk sampai diambil.</p>
            </div>

            <div class="login-brand-features">
                <div><i class="fas fa-users"></i> Data pelanggan tersimpan rapi</div>
                <div><i class="fas fa-user-cog"></i> Kelola teknisi & keahliannya</div>
                <div><i class="fas fa-mobile-alt"></i> Pantau status service real-time</div>
            </div>
        </div>

        <!-- Panel kanan: form login -->
        <div class="login-form-panel">
            <h1>Selamat datang kembali</h1>
            <p class="login-sub">Masuk untuk mengakses dashboard Fitson.</p>

            @if(session('success'))
            <div class="alert-box success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
            <div class="alert-box danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ route('login.attempt') }}" method="POST" autocomplete="off">
                @csrf

                <div class="input-icon-group">
                    <label>Email</label>
                    <div class="icon-wrap">
                        <i class="fas fa-envelope field-icon"></i>
                        <input type="email" name="email" value="{{ old('email') }}"
                               placeholder="nama@fitson.test" required autofocus>
                    </div>
                </div>

                <div class="input-icon-group">
                    <label>Password</label>
                    <div class="icon-wrap">
                        <i class="fas fa-lock field-icon"></i>
                        <input type="password" name="password" id="passwordInput"
                               placeholder="Kata sandi" required>
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="login-options">
                    <label>
                        <input type="checkbox" name="remember" id="remember">
                        Ingat saya
                    </label>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>
            </form>

            <p class="login-footer-note">&copy; {{ date('Y') }} Fitson &mdash; Sistem Informasi Service HP</p>
        </div>

    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('passwordInput');
        const icon = document.getElementById('toggleIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

</body>
</html>