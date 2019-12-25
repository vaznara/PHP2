<?php

return [
    'name' => 'My Shop',
    'defaultController' => 'main',
    'components' => [
        'DB' => [
            'class' => \App\services\DB::class,
            'config' => [
                'driver' => 'mysql',
                'host' => 'localhost',
                'db' => 'php2shop',
                'charset' => 'UTF8',
                'username' => 'php2shop',
                'password' => '123456',
            ],
        ],
        'render' => [
            'class' => App\services\renderers\TwigRender::class,
        ],
        'request' => [
            'class' => App\services\Request::class,
        ],
        'auth' => [
            'class' => App\services\Auth::class,
        ],
        'userRepository' => [
            'class' => App\repositories\UserRepository::class,
        ],
        'catalogRepository' => [
            'class' => App\repositories\CatalogRepository::class,
        ],
        'cartRepository' => [
            'class' => App\repositories\CartRepository::class,
        ],
        'orderRepository' => [
            'class' => App\repositories\OrderRepository::class,
        ],
        'orderItemRepository' => [
            'class' => App\repositories\OrderItemRepository::class,
        ]
    ],
];