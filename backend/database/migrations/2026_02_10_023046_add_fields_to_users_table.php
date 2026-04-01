<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Kolom untuk membedakan Admin atau Siswa 
            $table->enum('role', ['admin', 'siswa'])->default('siswa')->after('email');
            
            // Kolom Username (Sesuai Flowmap, login pakai Username) [cite: 41]
            $table->string('username')->unique()->after('name');
            
            // Kolom NISP/NIS (Khusus siswa, opsional untuk admin)
            $table->string('nis')->nullable()->after('username');
            
            // Kolom Alamat (Sesuai data anggota)
            $table->text('address')->nullable()->after('password');
            
            // Kolom Foto Profil (Agar dashboard bisa tampil keren seperti gambar)
            $table->string('avatar')->nullable()->after('address');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'username', 'nis', 'address', 'avatar']);
        });
    }
};