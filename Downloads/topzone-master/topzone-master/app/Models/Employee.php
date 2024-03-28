<?php

namespace App\Models;

use App\Enums\Employee\EmployeeGender;
use App\Enums\Employee\EmployeeRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'gender',
        'password',
        'role',
        'gender',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'role' => EmployeeRole::class,
        'gender' => EmployeeGender::class,
    ];
}
