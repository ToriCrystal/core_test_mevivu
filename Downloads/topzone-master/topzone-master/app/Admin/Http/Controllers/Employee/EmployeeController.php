<?php

namespace App\Admin\Http\Controllers\Employee;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Employee\EmployeeRequest;
use App\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use App\Admin\Services\Employee\EmployeeServiceInterface;
use App\Admin\DataTables\Employee\EmployeeDataTable;
use App\Enums\Employee\EmployeeGender;
use App\Enums\Employee\EmployeeRole;

class EmployeeController extends Controller
{
    public function __construct(
        EmployeeRepositoryInterface $repository,
        EmployeeServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;

    }

    public function getView(){
        return [
            'index' => 'admin.employees.index',
            'create' => 'admin.employees.create',
            'edit' => 'admin.employees.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.employees.index',
            'create' => 'admin.employees.create',
            'edit' => 'admin.employees.edit',
            'delete' => 'admin.employees.delete'
        ];
    }
    public function index(EmployeeDataTable $dataTable){
        return $dataTable->render($this->view['index'], [
            'role' => EmployeeRole::asSelectArray(),
            'gender' => EmployeeGender::asSelectArray()
        ]);
    }

    public function create(){
        return view($this->view['create'], [
            'role' => EmployeeRole::asSelectArray(),
            'gender' => EmployeeGender::asSelectArray()
        ]);
    }

    public function store(EmployeeRequest $request){

        $instance = $this->service->store($request);

        if ($instance) {
            return $request->input('submitter') == 'save' ?
                back()->with('success', __('notifySuccess')) :
                    to_route($this->route['index'])->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'))->withInput();

    }

    public function edit($id){

        $instance = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'],
            [
                'employees' => $instance,
                'role' => EmployeeRole::asSelectArray(),
                'gender' => EmployeeGender::asSelectArray(),
            ],
        );

    }

    public function update(EmployeeRequest $request){

        $response = $this->service->update($request);
        if ($response) {
            return $request->input('submitter') == 'save' ?
                back()->with('success', __('notifySuccess')) :
                    to_route($this->route['index'])->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'))->withInput();

    }

    public function delete($id){

        $this->service->delete($id);

        return to_route($this->route['index'])->with('success', __('notifySuccess'));

    }
}
