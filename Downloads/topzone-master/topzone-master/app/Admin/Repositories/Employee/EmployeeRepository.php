<?php
namespace App\Admin\Repositories\Employee;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use App\Models\Employee;
class EmployeeRepository extends EloquentRepository implements EmployeeRepositoryInterface
{
    public function getModel(){
        return Employee::class;
    }

    public function GetAllEmployee(){
        return $this->getQueryBuilder()->get();
    }

    public function GetEmployeeById($id){
        return $this->getQueryBuilder()->find($id);
    }

    public function CreateEmployee($data){
        return $this->getQueryBuilder()->create($data);
    }

    public function UpdateEmployee($id, $data){
        return $this->getQueryBuilder()->where('id', $id)->update($data);
    }

    public function DeleteEmployee($id){
        return $this->getQueryBuilder()->where('id', $id)->delete();
    }
}
