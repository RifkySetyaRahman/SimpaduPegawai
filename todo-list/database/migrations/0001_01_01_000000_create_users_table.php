<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     */
    public function up(): void
    {
        // Tabel users
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama pengguna
            $table->string('email')->unique(); // Email pengguna, harus unik
            $table->timestamp('email_verified_at')->nullable(); // Verifikasi email
            $table->string('password'); // Password
            $table->string('role')->default('user'); // Tambahkan kolom role (untuk admin atau user biasa)
            $table->rememberToken(); // Token remember me
            $table->timestamps(); // created_at dan updated_at
        });

        // Tabel password_reset_tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email sebagai primary key
            $table->string('token'); // Token untuk reset password
            $table->timestamp('created_at')->nullable(); // Waktu token dibuat
        });

        // Tabel sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary key untuk session ID
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
            $table->string('ip_address', 45)->nullable(); // Alamat IP
            $table->text('user_agent')->nullable(); // Informasi user agent
            $table->longText('payload'); // Payload data
            $table->integer('last_activity')->index(); // Indeks aktivitas terakhir
        });
    }

    /**
     * Balikkan migrasi untuk menghapus tabel.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions'); // Hapus tabel sessions
        Schema::dropIfExists('password_reset_tokens'); // Hapus tabel password_reset_tokens
        Schema::dropIfExists('users'); // Hapus tabel users
    }
};
