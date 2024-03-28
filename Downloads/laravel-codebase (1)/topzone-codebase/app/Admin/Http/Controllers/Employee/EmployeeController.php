<?php

namespace App\Admin\Http\Controllers\Employee;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Employee\EmployeeRequest;
use App\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use App\Admin\Services\Employee\EmployeeServiceInterface;
use App\Admin\DataTables\Employee\EmployeeDataTable;
use App\Enums\Employee\EmployeeRoles;
use App\Enums\Employee\EmployeeGender;

use AWS\CRT\HTTP\Request;

class EmployeeController extends Controller
{
    public function __construct(
        EmployeeRepositoryInterface $repository,
        EmployeeServiceInterface $service
    ) {

        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'admin.employees.index',
            'create' => 'admin.employees.create',
            'edit' => 'admin.employees.edit'
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.employee.index',
            'create' => 'admin.employee.create',
            'edit' => 'admin.employee.edit',
            'delete' => 'admin.employee.delete'
        ];
    }
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render($this->view['index'], ['roles' => EmployeeRoles::asSelectArray()]);
    }

    public function create()
    {
        return view($this->view['create'], ['roles' => EmployeeRoles::asSelectArray()], ['gender' => EmployeeGender::asSelectArray()]);
    }
    
    public function store(EmployeeRequest $request)
    {
        $this->service->store($request);
        return redirect()->route($this->view['index']);
    }

    public function edit($id)
    {

        $instance = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'],
            [
                'admin' => $instance,
                'roles' => EmployeeRoles::asSelectArray()
            ],
        );
    }

    // public function update(AdminRequest $request)
    // {

    //     $this->service->update($request);

    //     return back()->with('success', __('notifySuccess'));
    // }

    public function delete($id)
    {

        $this->service->delete($id);

        return redirect()->route($this->route['index'])->with('success', __('notifySuccess'));
    }
}
