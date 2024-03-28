<?php
namespace App\Admin\Repositories\Employee;
use App\Admin\Repositories\EloquentRepositoryInterface;
interface EmployeeRepositoryInterface extends EloquentRepositoryInterface {
    public function GetAllEmployee();
    public function GetEmployeeById($id);
    public function CreateEmployee($data);
    public function UpdateEmployee($id, $data);
    public function DeleteEmployee($id);
}
