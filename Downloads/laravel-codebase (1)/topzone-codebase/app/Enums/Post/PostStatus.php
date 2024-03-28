<?php

namespace App\Enums\Post;

use App\Support\Enum as SupportEnum;

enum PostStatus: int
{
    use SupportEnum;
    case Ẩn = 0;
    case Hiện = 1;
}
