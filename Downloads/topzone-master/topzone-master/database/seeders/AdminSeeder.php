<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo một bản ghi user cho admin
        Admin::create([
            'username' => 'Admin',
            'fullname' => 'Admin',
            'email' => 'nhat@gmail.com',
            'password' => bcrypt('123456789'), // Bạn có thể sử dụng bcrypt để mã hóa mật khẩu
            'roles' => '1', // Đây có thể là cột role trong bảng users để xác định vai trò của người dùng
        ]);
    }
}
