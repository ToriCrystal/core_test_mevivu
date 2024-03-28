<?php

namespace App\Enums\Employee;

use App\Support\Enum as SupportEnum;

enum EmployeeGender: int
{
    use SupportEnum;
    case Male = 1;
    case Female = 2;
    case Other = 3;
}
