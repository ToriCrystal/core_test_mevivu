<?php

namespace App\Admin\DataTables\Employee;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use App\Admin\Traits\GetConfig;
use App\Models\Employee;

class EmployeeDataTable extends BaseDataTable
{
    use GetConfig;

    protected array $actions = ['reset', 'reload'];

    public function __construct(EmployeeRepositoryInterface $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    public function getView()
    {
        return [
            'action' => 'admin.employees.datatable.action',
            'editlink' => 'admin.employees.datatable.editlink',
        ];
    }

    public function dataTable($query)
    {
        $this->instanceDataTable = datatables()->eloquent($query)->addIndexColumn();
        $this->filterColumnGender();
        $this->editColumnUsername();
        $this->editColumnPassword();
        $this->editColumnRoles();
        $this->editColumnGender();
        $this->filterColumnDate();
        $this->addColumnAction();
        $this->rawColumnsNew();
        return $this->instanceDataTable;
    }


    public function query()
    {
        return Employee::query();
    }

    public function html()
    {
        $this->instanceHtml = $this->builder()
            ->setTableId('employeeTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0);

        $this->htmlParameters();

        return $this->instanceHtml;
    }

    protected function filterColumnGender()
    {
        $this->instanceDataTable = $this->instanceDataTable
            ->filterColumn('gender', function ($query, $keyword) {
                $query->where('gender', $keyword);
            });
    }

    protected function setCustomColumns()
    {
        $this->customColumns = [
            'id' => ['title' => 'ID'],
            'username' => ['title' => 'Username'],
            'email' => ['title' => 'Email'],
            'password' => ['title' => 'Password'],
            'role' => ['title' => 'role'],
            'gender' => ['title' => 'Gender'],
            'date' => ['title' => 'Date'],
        ];
    }

    protected function editColumnPassword()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('password', function ($employee) {
            return '********'; // Hiển thị mật khẩu dưới dạng dấu sao
        });
    }

    protected function editColumnGender()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('gender', function ($employee) {
            return $employee->gender->description();
        });
    }

    protected function editColumnRoles()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('role', function ($employee) {
            return $employee->role->description();
        });
    }


    protected function filename(): string
    {
        return 'Employee_' . date('YmdHis');
    }

    protected function filterColumnRoles()
    {
        $this->instanceDataTable = $this->instanceDataTable
            ->filterColumn('role', function ($query, $keyword) {
                $query->where('role', $keyword);
            });
    }

    protected function filterColumnDate()
    {
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('date', function ($query, $keyword) {
            $query->whereDate('date', date('Y-m-d', strtotime($keyword)));
        });
    }

    protected function editColumnUsername()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('username', function ($employee) {
            return $employee->username;
        });
    }

    protected function editColumnCreatedAt()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('created_at', function ($employee) {
            return date("d-m-Y", strtotime($employee->created_at));
        });
    }

    protected function addColumnAction()
    {
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }

    protected function rawColumnsNew()
    {
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['username', 'action']);
    }

    protected function htmlParameters()
    {
        $this->parameters['buttons'] = $this->actions;

        $this->parameters['initComplete'] = "function () {
            moveSearchColumnsDatatable('#employeeTable');
            searchColumsDataTable(this);
        }";

        $this->instanceHtml = $this->instanceHtml
            ->parameters($this->parameters);
    }
}
