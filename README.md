# Fitson — Sistem Informasi Service HP

Fitson adalah aplikasi web untuk membantu toko service handphone mencatat data
pelanggan, teknisi, dan proses perbaikan secara digital dan terpusat — mulai dari
HP masuk, proses pengerjaan, hingga status selesai/diambil, lengkap dengan
dashboard ringkasan statistik.

Dibuat untuk memenuhi tugas UAS Mata Kuliah **Pemrograman Web 2**.

---

## ✨ Fitur

- 🔐 **Autentikasi** — login & logout admin berbasis session (Laravel Auth)
- 📊 **Dashboard** — ringkasan jumlah pelanggan, teknisi, total service, dan
  breakdown status service (Menunggu / Diproses / Selesai / Diambil)
- 👤 **Kelola Data Pelanggan** — CRUD nama, no HP, alamat, kerusakan, estimasi biaya
- 🧑‍🔧 **Kelola Data Teknisi** — CRUD nama, no HP, dan bidang keahlian
- 📱 **Kelola Data Service** — CRUD transaksi service yang terhubung ke pelanggan
  & teknisi, mencatat merk/tipe HP, IMEI (unik), kerusakan, tanggal masuk,
  estimasi selesai, status, dan biaya
- ✅ Validasi input di sisi server pada seluruh form
- 🎨 Tampilan custom di atas AdminLTE 3 (bukan tampilan bawaan/template polos)

---

## 🛠️ Tech Stack

| Layer                | Teknologi                              |
|-----------------------|-----------------------------------------|
| Backend               | Laravel 9 (PHP 8.0+)                    |
| Frontend / UI         | Blade Template + AdminLTE 3 (Bootstrap 4)|
| Database              | MySQL                                   |
| Dependency Manager    | Composer, NPM                           |

---

## 📂 Struktur Database

- `users` — akun admin (autentikasi)
- `pelanggans` — data pelanggan
- `teknisis` — data teknisi
- `services` — data transaksi service (relasi ke `pelanggans` & `teknisis`)

Detail lengkap kolom & relasi ada di dokumen **PRD** (`PRD_Fitson_Muhammad_Fitri.pdf`).

---

## 🚀 Instalasi & Menjalankan Project

1. **Clone / extract project**, lalu masuk ke folder project:
   ```bash
   cd db_servicehp
   ```

2. **Install dependency PHP:**
   ```bash
   composer install
   ```

3. **Salin file environment** (jika belum ada `.env`):
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Atur koneksi database** di file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_servicehp
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Jalankan migrasi & seeder** (membuat tabel + akun admin default):
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Jalankan server:**
   ```bash
   php artisan serve
   ```
   Buka `http://127.0.0.1:8000` di browser.

---


## 📁 Struktur Folder Penting

```
db_servicehp/
├── app/
│   ├── Http/Controllers/     # AuthController, DashboardController,
│   │                         # PelangganController, TeknisiController,
│   │                         # ServiceController
│   └── Models/               # User, Pelanggan, Teknisi, Service
├── database/
│   ├── migrations/           # struktur tabel
│   └── seeders/               # akun admin default
├── resources/views/
│   ├── auth/login.blade.php
│   ├── pelanggan/            # index, create, edit
│   ├── teknisi/              # index, create, edit
│   ├── service/               # index, create, edit, show
│   ├── dashboard.blade.php
│   ├── profile.blade.php
│   └── about.blade.php
├── routes/web.php
└── public/css/custom.css     # tema tampilan custom
```

---

## 👨‍💻 Identitas Pengembang

- **Nama**: Muhammad Fitri
- **NPM**: 2410010204
- **Kelas**: TI 4A Reguler Banjarbaru
- **Program Studi**: Teknik Informatika
- **Fakultas**: Fakultas Teknologi Informasi
- **Universitas**: Universitas Islam Kalimantan Muhammad Arsyad Al-Banjari (UNISKA)

---
