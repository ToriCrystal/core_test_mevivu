<?php

namespace App\Enums\Post;

use App\Support\Enum as SupportEnum;

enum PostFeatured: int
{
    use SupportEnum;
    case Không = 0;
    case Có = 1;
}
