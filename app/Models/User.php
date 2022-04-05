<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Permissions\HasPermissionsTrait;

class User extends Model
{
    use HasApiTokens, HasFactory, HasPermissionsTrait;

    protected $fillable = [
        'employee_id',
        'company_name',
        'name',
        'email',
        'password',
        'role_request',
        'role_id'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
