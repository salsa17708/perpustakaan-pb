<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Admin
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@school.id',
            'password' => Hash::make('password'), // Password standar
            'role' => 'admin',
        ]);

        // Buat Siswa (Untuk mengetes Dashboard keren tadi)
        User::create([
            'name' => 'Siswa Teladan',
            'username' => 'siswa',
            'email' => 'siswa@school.id',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);
    }
}