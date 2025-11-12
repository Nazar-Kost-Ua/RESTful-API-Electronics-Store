<?php

return [
    'default_per_page' => 15,
    'max_per_page' => 100,

    'allowed_includes' => [
        'users_index' => ['orders', 'cart', 'wishlist', 'reviews'],
   ],

    'allowed_fields' => [
        'users_index' => [
            'users' => [
                'id', 'first_name', 'last_name', 'email',
                'phone', 'created_at', 'updated_at', 'deleted_at'
            ],
            'orders' => [
                'id', 'order_ref', 'delivery_type_id',
                'payment_type_id', 'subtotal', 'total',
                'currency', 'status', 'created_at', 'updated_at'
            ],
            'cart' => [
                'id', 'quantity',
                'price', 'currency',
                'created_at', 'updated_at'],
            'reviews' => [
                'id', 'content', 'rating',
                'status', 'created_at', 'updated_at'
            ],
        ],
    ],

    'default_fields' => [
        'users_index' => [
            'users' => [
                'id', 'first_name', 'last_name', 'email',
                'created_at', 'updated_at'
            ],
            'orders' => [
                'id', 'order_ref', 'total',
                'currency', 'status', 'created_at'
            ],
            'cart' => [
                'id', 'user_id', 'product_id',
                'quantity', 'price', 'currency',
                'created_at', 'updated_at'
            ],
            'reviews' => [
                'id', 'user_id', 'product_id',
                'content', 'rating',
                'status', 'created_at', 'updated_at'
            ],
        ],
    ],
];
