<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Akun admin default untuk login ke Fitson.
        // Silakan ganti password ini setelah login pertama kali.
        User::firstOrCreate(
            ['email' => 'fitson@gmail.com'],
            [
                'name'     => 'Admin Fitson',
                'password' => Hash::make('fitson'),
            ]
        );
    }
}
