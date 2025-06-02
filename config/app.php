<?php

return [

    'name' => env('APP_NAME', 'De Leeghte'),

    'env' => env('APP_ENV', 'production'),

    'debug' => (bool) env('APP_DEBUG', false),

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Tijdzone: Europa/Amsterdam
    |--------------------------------------------------------------------------
    */
    'timezone' => 'Europe/Amsterdam',

    /*
    |--------------------------------------------------------------------------
    | Locale: Nederlands
    |--------------------------------------------------------------------------
    */
    'locale' => 'nl',
    'fallback_locale' => 'nl',
    'faker_locale' => 'nl_NL',

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
