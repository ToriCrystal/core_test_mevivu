<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Employee\EmployeeRoles;
use App\Enums\Employee\EmployeeGender;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'gender',
        'date',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'gender' => EmployeeGender::class,
        'role' => EmployeeRoles::class,
    ];
}
