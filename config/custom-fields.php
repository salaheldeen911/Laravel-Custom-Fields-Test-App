<?php

// config for CustomFields /LaravelCustomFields
return [
    'models' => [
        'post' => 'App\Models\Post',
        'product' => 'App\Models\Product',
    ],
    'routing' => [
        'api' => [
            'enabled' => true,
            'prefix' => 'api/custom-fields',
            'middleware' => ['api'],
        ],
        'web' => [
            'enabled' => true,
            'prefix' => 'custom-fields',
            'middleware' => ['web'],
        ],
    ],
];
