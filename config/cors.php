<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // Akses dari mana saja (jangan lupa, untuk production, ganti '*' ke domain frontend kamu)
    'allowed_origins' => ['*'], // atau ['https://your-frontend.vercel.app']

    'allowed_methods' => ['*'],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false, // true jika pakai login/session/cookie dari frontend

];

