<?php

return [
    'paths'                    => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods'          => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
    'allowed_origins'          => ['http://localhost:5173'],
    'allowed_origins_patterns' => [],
    'allowed_headers'          => [
        'Content-Type',
        'Authorization',
        'X-Requested-With',
        'X-CSRF-TOKEN',
        'X-XSRF-TOKEN',
        'Accept',
    ],
    'exposed_headers'          => [],
    'max_age'                  => 3600,
    'supports_credentials'     => true,
];
