<?php

namespace App\Enums\Employee;

use App\Supports\Enum;

enum EmployeeRole: int
{
    use Enum;

    case NhanVien = 1;
    case QuanLy = 2;
}
