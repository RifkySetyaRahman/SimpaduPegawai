<?php

return [

    // Konfigurasi standar
    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    // Tambahan untuk proyek microservices
    'dosen_origin' => env('DOSEN_ORIGIN', 'https://ti054e02.agussbn.my.id'),

    'urls' => [
        'admin_service' => env('ADMIN_SERVICE_URL', 'https://ti054e01.agussbn.my.id/api'),
        'dosen_service' => env('APP_URL', 'https://ti054e02.agussbn.my.id'), // Tambahan penting
    ],

    'tokens' => [
        'admin_service' => env('ADMIN_SERVICE_TOKEN'),
        'dosen_service' => env('DOSEN_SERVICE_TOKEN'), // Pastikan ini ada jika dipakai
    ],

];
