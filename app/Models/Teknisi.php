<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_hp',
        'keahlian',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
