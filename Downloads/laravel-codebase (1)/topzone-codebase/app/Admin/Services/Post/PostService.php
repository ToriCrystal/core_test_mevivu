<?php

namespace App\Admin\Services\Post;

use App\Admin\Services\Post\PostServiceInterface;
use App\Admin\Repositories\Post\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostService implements PostServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {   
        $this->data = $request->validated();

        return $this->repository->create($this->data);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validated();
        
        $postId = $validatedData['id'];

        return $this->repository->update($postId, $validatedData);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
