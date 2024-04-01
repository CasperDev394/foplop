<?php

return [
        'entities' => [
            'ADMIN' => [
                'guard' => 'admin',
                'basePath' => '/admin/profile'
            ],
            'BROKER' => [
                'guard' => 'broker',
                'basePath' => '/broker/profile'
            ],
            'BIDDER' => [
                'guard' => 'bidder',
                'basePath' => '/bidder/profile'
            ],
        ]


];
