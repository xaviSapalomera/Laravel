<?php

return [
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),
        'guzzle' => [
            'verify' => env('APP_ENV') === 'local' 
                ? false  // Solo para desarrollo
                : storage_path('certs/cacert.pem'), // Para producción
        ],
    ],

    // Puedes agregar otros proveedores aquí si los necesitas
];