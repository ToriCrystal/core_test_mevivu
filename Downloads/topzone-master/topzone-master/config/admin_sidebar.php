<?php

return [
    [
        'title' => 'Dashboard',
        'routeName' => 'admin.dashboard',
        'icon' => '<i class="ti ti-home"></i>',
        'roles' => [],
        'sub' => []
    ],
    [
        'title' => 'QL Thành viên',
        'routeName' => null,
        'icon' => '<i class="ti ti-users"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Thêm thành viên',
                'routeName' => 'admin.user.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS thành viên',
                'routeName' => 'admin.user.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],
    [
        'title' => 'QL Nhân viên',
        'routeName' => null,
        'icon' => '<i class="ti ti-user"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Thêm nhân viên',
                'routeName' => 'admin.employees.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS nhân viên',
                'routeName' => 'admin.employees.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],
    [
        'title' => 'QL Admin',
        'routeName' => null,
        'icon' => '<i class="ti ti-user-cog"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Thêm admin',
                'routeName' => 'admin.admin.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS admin',
                'routeName' => 'admin.admin.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],
    [
        'title' => 'QL Post',
        'routeName' => null,
        'icon' => '<i class="ti ti-user-cog"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Thêm post',
                'routeName' => 'admin.post.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS Post',
                'routeName' => 'admin.post.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],
];
