<?php

return [
    'admin' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'fullname' => [
            'title' => 'Họ tên',
            'orderable' => false
        ],
        'phone' => [
            'title' => 'Số điện thoại',
            'orderable' => false
        ],
        'email' => [
            'title' => 'Email',
            'orderable' => false,
        ],
        'roles' => [
            'title' => 'Roles',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'visible' => false
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'user' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'username' => [
            'title' => 'Tên đăng nhập',
            'orderable' => false,
            'visible' => false
        ],
        'fullname' => [
            'title' => 'Họ tên',
            'orderable' => false
        ],
        'email' => [
            'title' => 'Email',
            'orderable' => false,
        ],
        'phone' => [
            'title' => 'Số điện thoại',
            'orderable' => false
        ],
        'gender' => [
            'title' => 'Giới tính',
            'orderable' => false,
            'visible' => false
        ],
        'vip' => [
            'title' => 'Vip',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'visible' => false
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'employees' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'username' => [
            'title' => 'Username',
            'orderable' => false
        ],
        'email' => [
            'title' => 'Email',
            'orderable' => false
        ],
        'gender' => [
            'title' => 'Gender',
            'orderable' => false,
        ],

        'roles' => [
            'title' => 'Roles',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'post' => [
        'checkbox' => [
            'title' => 'choose',
            'orderable' => false,
            'addClass' => 'text-center',
            'width' => '10px',
            'footer' => '<input type="checkbox" class="check-all" />',
        ],
        'feature_image' => [
            'title' => 'image',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'title' => [
            'title' => 'title',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'status' => [
            'title' => 'status',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'categories' => [
            'title' => 'category',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'createdAt',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => false
        ],
        'action' => [
            'title' => 'action',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'category' => [
        'name' => [
            'title' => 'name',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'status' => [
            'title' => 'status',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'action' => [
            'title' => 'action',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
];
