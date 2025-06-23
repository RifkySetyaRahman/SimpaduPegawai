<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Di sini kamu dapat mengatur pengaturan CORS untuk aplikasi kamu.
    | Pengaturan ini akan digunakan oleh middleware CORS dari Laravel.
    |
    */

    // Endpoint mana saja yang diperbolehkan CORS
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // Metode HTTP yang diizinkan
    'allowed_methods' => ['*'],

    // Origin yang diizinkan (ganti '*' dengan spesifik domain kalau di production)
    'allowed_origins' => ['*'],

    // Pola regex untuk origin (biasanya kosong)
    'allowed_origins_patterns' => [],

    // Header apa yang diizinkan dikirim dari client
    'allowed_headers' => ['*'],

    // Header yang bisa diakses dari client (misal Authorization)
    'exposed_headers' => [],

    // Berapa lama hasil preflight disimpan (dalam detik)
    'max_age' => 0,

    // Apakah permintaan dengan kredensial (cookies, auth) diizinkan
    'supports_credentials' => false,

];
