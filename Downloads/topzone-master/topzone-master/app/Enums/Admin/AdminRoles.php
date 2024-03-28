<?php

namespace App\Enums\Admin;

use App\Supports\Enum;

enum AdminRoles: int
{
    use Enum;

    case SuperAdmin = 1;
    case Admin = 2;
}
