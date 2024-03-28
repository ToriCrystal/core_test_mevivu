<?php

namespace App\Admin\Http\Controllers\Post;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Post\PostRequest;
use App\Admin\Repositories\Post\PostRepositoryInterface;
use App\Admin\Services\Post\PostServiceInterface;
use App\Admin\DataTables\Post\PostDataTable;
use App\Models\Post;
use AWS\CRT\HTTP\Request;

class PostController extends Controller
{
    public function __construct(
        PostRepositoryInterface $repository,
        PostServiceInterface $service
    ) {

        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'admin.posts.index',
            'create' => 'admin.posts.create',
            'edit' => 'admin.posts.edit'
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.post.index',
            'create' => 'admin.post.create',
            'edit' => 'admin.post.edit',
            'delete' => 'admin.post.delete'
        ];
    }

    public function create()
    {
        return view($this->view['create']);
    }


    public function index(PostDataTable $dataTable)
    {
        return $dataTable->render($this->view['index']);
    }


    public function store(PostRequest $request)
    {       
        $this->service->store($request);
        return redirect()->route($this->view['index']);
    }

    public function delete($id)
    {
        $this->service->delete($id);
        return back();
    }

    public function edit($id)
    {
        $post  = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'],
            compact('post')
        );
    }
  

  
    public function update(PostRequest $request){

        $this->service->update($request);

        return redirect()->route('admin.post.index')->with('success', __('notifySuccess'));

    }
}