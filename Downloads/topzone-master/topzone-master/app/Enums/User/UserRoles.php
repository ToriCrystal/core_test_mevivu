<?php

namespace App\Enums\User;

use App\Supports\Enum;

enum UserRoles: int
{
    use Enum;

    case Member = 1;
}
