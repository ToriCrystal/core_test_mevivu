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
    'post' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'title' => [
            'title' => 'Tiêu đề',
            'orderable' => false,
        ],
        'slug' => [
            'title' => 'Slug',
            'orderable' => false
        ],
        'is_featured' => [
            'title' => 'Đặc sắc',
            'orderable' => false,
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false
        ],
        'image' => [
            'title' => 'Hình ảnh',
            'orderable' => false,
        ],
        'excerpt' => [
            'title' => 'Đoạn trích',
            'orderable' => false,
        ],
        'content' => [
            'title' => 'Nội dung',
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
    'employee' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'username' => [
            'title' => 'Họ tên',
            'orderable' => false
        ],
        'email' => [
            'title' => 'Email',
            'orderable' => false
        ],
        'password' => [
            'title' => 'Mật khẩu',
            'orderable' => false,
        ],
        'roles' => [
            'title' => 'Roles',
            'orderable' => false,
        ],
        'gender' => [
            'title' => 'Giới tính',
            'orderable' => false,
        ],
        'date' => [
            'title' => 'Ngày',
            'orderable' => false,
            'visible' => true // Hiển thị cột ngày tạo
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    
];
