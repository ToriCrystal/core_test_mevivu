<?php

namespace App\Admin\Http\Requests\Employee;

use App\Admin\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\Employee\{EmployeeGender, EmployeeRoles};
use Illuminate\Validation\Rule;

class EmployeeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'username' => [
                'required', 
                'string', 'min:6', 'max:50',
                'unique:App\Models\User,username', 
                'regex:/^[A-Za-z0-9_-]+$/',
                function ($attribute, $value, $fail) {
                    if (in_array(strtolower($value), ['admin', 'user', 'password'])) {
                        $fail('The '.$attribute.' cannot be a common keyword.');
                    }
                },
            ],
            'email' => ['required', 'email', 'unique:App\Models\Employee, email'],
            'gender' => ['required', new Enum(EmployeeGender::class)],
            'role' => ['required', new Enum(EmployeeRoles::class)],
            'password' => ['required', 'string', 'confirmed'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\User,id'],
            'username' => [
                'required', 
                'string', 'min:6', 'max:50',
                'unique:App\Models\User,username,'.$this->id, 
                'regex:/^[A-Za-z0-9_-]+$/',
                function ($attribute, $value, $fail) {
                    if (in_array(strtolower($value), ['admin', 'user', 'password'])) {
                        $fail('The '.$attribute.' cannot be a common keyword.');
                    }
                },
            ],
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:App\Models\User,email,'.$this->id],
            'gender' => ['required', new Enum(UserGender::class)],
            'password' => ['nullable', 'string', 'confirmed'],
        ];
    }
}