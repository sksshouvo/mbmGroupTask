<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'requisitions' => 'app,rej',
            'suppliers'   => 'c,r,u.d',
            'items'       => 'c,r,u.d',
            'stock'       => 'r'
        ],
        'employee' => [
            'requisitions'   => 'c,r,u.d',
        ],
        'store_executive' => [
            'received_items' => 'c,r,u,d',
            'stock'         => 'r',
            'issued_items'  => 'r'
        ]
    ],

    'permissions_map' => [
        'c'   => 'create',
        'r'   => 'read',
        'u'   => 'update',
        'd'   => 'delete',
        'app' => 'approved',
        'rej' => 'reject'
    ]
];
