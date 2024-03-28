<?php

namespace App\Admin\DataTables\Post;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Post\PostRepositoryInterface;
use App\Admin\Traits\GetConfig;

class PostDataTable extends BaseDataTable
{
    use GetConfig;

    protected array $actions = ['reset', 'reload'];

    public function __construct(
        PostRepositoryInterface $repository
    ) {
        parent::__construct();

        $this->repository = $repository;
    }

    public function getView()
    {
        return [
            'action' => 'admin.posts.datatable.action',
            'editlink' => 'admin.posts.datatable.editlink',
        ];
    }

    public function dataTable($query)
    {
        $posts = $query->get();

        $this->instanceDataTable = datatables()->collection($posts)->addIndexColumn();
        $this->editColumnId();
        $this->editColumnTitle();
        $this->editColumnSlug();
        $this->editColumnIsFeatured();
        $this->editColumnStatus();
        $this->editColumnImage();
        $this->editColumnExcerpt();
        $this->editColumnContent();
        $this->editColumnPostedAt();
        $this->editColumnCreatedAt();
        $this->addColumnAction();

        return $this->instanceDataTable;
    }

    public function query()
    {
        return $this->repository->getQueryBuilder();
    }

    public function html()
    {
        $this->instanceHtml = $this->builder()
            ->setTableId('postTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0);

        $this->htmlParameters();

        return $this->instanceHtml;
    }

    protected function setCustomColumns()
    {
        $this->customColumns = $this->traitGetConfigDatatableColumns('post');
    }

    protected function filename(): string
    {
        return 'Post_' . date('YmdHis');
    }

    protected function editColumnId()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('id', $this->view['editlink']);
    }

    protected function editColumnTitle()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('title', function ($post) {
            return $post->title;
        });
    }

    protected function editColumnSlug()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('slug', function ($post) {
            return $post->slug;
        });
    }

    protected function editColumnIsFeatured()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('is_featured', function ($post) {
            return $post->is_featured->description();
        });
    }


    protected function editColumnStatus()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('status', function ($post) {
            return $post->status->description();
        });
    }
    

    protected function editColumnImage()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('image', function ($post) {
            return $post->image;
        });
    }

    protected function editColumnExcerpt()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('excerpt', function ($post) {
            return $post->excerpt;
        });
    }

    protected function editColumnContent()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('content', function ($post) {
            return $post->content;
        });
    }

    protected function editColumnPostedAt()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('posted_at', function ($post) {
            return $post->posted_at;
        });
    }

    protected function editColumnCreatedAt()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('created_at', function ($post) {
            return $post->created_at->format('d-m-Y');
        });
    }

    protected function addColumnAction()
    {
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }

    protected function htmlParameters()
    {
        $this->parameters['buttons'] = $this->actions;

        $this->parameters['initComplete'] = "function () {
            moveSearchColumnsDatatable('#postTable');
            searchColumsDataTable(this);
        }";

        $this->instanceHtml = $this->instanceHtml
            ->parameters($this->parameters);
    }
}
