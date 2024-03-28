<?php

namespace App\Admin\Repositories\Employee;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use App\Models\Employee;

class EmployeeRepository extends EloquentRepository implements EmployeeRepositoryInterface
{

    protected $select = [];

    public function getModel()
    {
        return Employee::class;
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }

 
}
