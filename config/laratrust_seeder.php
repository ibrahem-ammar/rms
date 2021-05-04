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
        'super_admin' => [

            'users' => 'c,r,u,d,ra,ua,da,sa',
            'publicadministrations' => 'c,r,u,d,ra,ua,da,sa',
            'administrations' => 'c,r,u,d,ra,ua,da,sa',
            'departments' => 'c,r,u,d,ra,ua,da,sa',
            'branchs' => 'c,r,u,d,ra,ua,da,sa',
            'tasks' => 'c,r,u,d,ra,ua,da,sa',
            'types' => 'c,r,u,d,s',
            'statuses' => 'c,r,u,d,s',
            'reports' => 'c,r,u,d,ra,ua,da,sa',
            'settings' => 'r,u',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'publicadministrations' => 'c,r,u,d',
            'administrations' => 'c,r,u,d',
            'departments' => 'c,r,u,d',
            'branchs' => 'c,r,u,d',
            'tasks' => 'c,r,u,d',
            'reports' => 'c,r,u,d',
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        's' => 'show',
        'ra' => 'read_all',
        'ua' => 'update_all',
        'da' => 'delete_all',
        'sa' => 'show_all',
    ]
];
