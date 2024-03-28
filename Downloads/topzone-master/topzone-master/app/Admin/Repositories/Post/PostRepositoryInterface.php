<?php

namespace App\Admin\Repositories\Post;

use App\Admin\Repositories\EloquentRepositoryInterface;
use App\Models\Post;

interface PostRepositoryInterface extends EloquentRepositoryInterface
{
    public function updateMultipleBy(array $filter = [], array $data);
    public function attachCategories(Post $post, array $categoriesId);
    public function syncCategories(Post $post, array $categoriesId);
}
