<?php

namespace App\Admin\Repositories\Post;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Post\PostRepositoryInterface;
use App\Models\Post;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{

    public function getModel()
    {
        return Post::class;
    }

    public function updateMultipleBy(array $filter = [], array $data)
    {

        $this->instance = $this->model;

        $this->applyFilters($filter);

        $this->instance = $this->instance->update($data);
        return $this->instance;
    }

    public function attachCategories(Post $post, array $categoriesId)
    {
        return $post->categories()->attach($categoriesId);
    }

    public function syncCategories(Post $post, array $categoriesId)
    {
        return $post->categories()->sync($categoriesId);
    }

    
}
