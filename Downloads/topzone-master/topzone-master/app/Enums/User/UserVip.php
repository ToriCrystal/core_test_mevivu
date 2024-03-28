<?php

namespace App\Enums\User;

use App\Supports\Enum;

enum UserVip: int
{
    use Enum;

    case Bronze = 1;
    case Silver = 2;
    case Gold = 3;
    case Diamond = 4;
}
