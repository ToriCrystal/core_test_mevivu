<?php

namespace App\Admin\Repositories\Post;

interface PostRepositoryInterface
{
    public function find($id);

    public function findOrFail($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');

    public function getQueryBuilder();
}
