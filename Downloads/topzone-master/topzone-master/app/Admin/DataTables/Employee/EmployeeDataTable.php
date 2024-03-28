<?php

namespace App\Admin\DataTables\Employee;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use App\Admin\Traits\GetConfig;
class EmployeeDataTable extends BaseDataTable
{
    use GetConfig;
    protected array $actions = ['reset', 'reload'];

    protected $nameTable = 'employeeTable';

    public function __construct(
        EmployeeRepositoryInterface $repository
    ) {
        parent::__construct();

        $this->repository = $repository;
    }

    public function getView()
    {
        return [
            'action' => 'admin.employees.datatable.action',
            'editlink' => 'admin.employees.datatable.editlink',
            'gender' => 'admin.employees.datatable.gender',
            'role' => 'admin.employees.datatable.role'
        ];
    }


    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $this->instanceDataTable = datatables()->eloquent($query)->addIndexColumn();
        $this->filterColumnCreatedAt();
        $this->filterColumnRoles();
        $this->editColumnUsername();
        $this->editColumnGender();
        $this->editColumnRole();
        $this->editColumnCreatedAt();
        $this->addColumnAction();
        $this->rawColumnsNew();
        return $this->instanceDataTable;
    }


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(\App\Models\Employee $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        $this->instanceHtml = $this->builder()
        ->setTableId('employeeTable')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Bfrtip')
        ->orderBy(0)
        ->selectStyleSingle();

        $this->htmlParameters();

        return $this->instanceHtml;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function setCustomColumns(){
        $this->customColumns = $this->traitGetConfigDatatableColumns('employees');
    }

    protected function filterColumnCreatedAt(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('created_at', function($query, $keyword) {

            $query->whereDate('created_at', date('Y-m-d', strtotime($keyword)));

        });
    }

    protected function filterColumnRoles(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('roles', function($query, $keyword) {
            $query->where('roles', $keyword);
        });
    }

    protected function editColumnUsername(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('username', $this->view['editlink']);
    }


    protected function editColumnEmail(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('email', $this->view['editlink']);
    }

    protected function editColumnGender(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('gender', $this->view['gender']);
    }

    protected function editColumnRole(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('roles', $this->view['role']);
    }

    protected function editColumnCreatedAt(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}');
    }

    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }

    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['username', 'action']);
    }

    protected function htmlParameters(){

        $this->parameters['buttons'] = $this->actions;

        $this->parameters['initComplete'] = "function () {

            moveSearchColumnsDatatable('#employeeTable');

            searchColumsDataTable(this);
        }";

        $this->instanceHtml = $this->instanceHtml
        ->parameters($this->parameters);
    }
}
