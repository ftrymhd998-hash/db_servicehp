<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelanggan_id',
        'teknisi_id',
        'merk_hp',
        'tipe_hp',
        'imei',
        'kerusakan',
        'tanggal_masuk',
        'estimasi_selesai',
        'status',
        'biaya',
    ];

    protected $casts = [
        'tanggal_masuk'    => 'date',
        'estimasi_selesai' => 'date',
        'biaya'            => 'decimal:2',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class);
    }
}
