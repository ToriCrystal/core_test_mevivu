<?php

namespace App\Admin\DataTables\Blog\Post;

use App\Admin\DataTables\BaseDataTable2;
use App\Admin\Repositories\Category\CategoryRepositoryInterface;
use App\Admin\Repositories\Post\PostRepositoryInterface;
use App\Enums\DefaultStatus;

class PostDataTable extends BaseDataTable2
{
    protected $nameTable = 'postTable';
    protected $repoCat;
    public function __construct(
        PostRepositoryInterface $repository,
        CategoryRepositoryInterface $repoCat
    ) {
        $this->repository = $repository;
        $this->repoCat = $repoCat;
        parent::__construct();
    }
    public function setView()
    {
        $this->view = [
            'action' => 'admin.posts.datatable.action',
            'feature_image' => 'admin.posts.datatable.feature-image',
            'title' => 'admin.posts.datatable.title',
            'status' => 'admin.posts.datatable.status',
            'categories' => 'admin.posts.datatable.categories',
            'checkbox' => 'admin.posts.datatable.checkbox',
        ];
    }
    public function setColumnSearch()
    {

        $this->columnAllSearch = [1, 2, 3, 4, 5];

        $this->columnSearchDate = [5];

        $this->columnSearchSelect = [
            [
                'column' => 3,
                'data' => DefaultStatus::asSelectArray()
            ],
        ];

        $this->columnSearchSelect2 = [
            [
                'column' => 4,
                'data' => $this->repoCat->getFlatTree()->map(function($category){
                    return [$category->id => generate_text_depth_tree($category->depth).$category->name];
                })
            ]
        ];
    }
    public function query()
    {
        return $this->repository->getByQueryBuilder([], ['categories']);
    }
    protected function setCustomColumns()
    {
        $this->customColumns = config('datatables_columns.post', []);
    }
    protected function setCustomEditColumns()
    {
        $this->customEditColumns = [
            'feature_image' => $this->view['feature_image'],
            'title' => $this->view['title'],
            'status' => $this->view['status'],
            'categories' => $this->view['categories'],
            'posted_at' => '{{ format_date($posted_at) }}',
            'checkbox' => $this->view['checkbox'],
        ];
    }
    protected function setCustomFilterColumns()
    {
        $this->customFilterColumns = [
            'categories' => function ($query, $keyword) {
                $query->whereHas('categories', function ($q) use ($keyword) {
                    $q->whereIn('id', explode(',', $keyword));
                });
            }
        ];
    }
    protected function setCustomAddColumns()
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }
    protected function setCustomRawColumns()
    {
        $this->customRawColumns = [
            'checkbox', 'feature_image', 'title', 'status', 'categories',
            'action'
        ];
    }
}
