<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Permissions\HasPermissionsTrait;


class Requests extends Model
{
    use HasApiTokens, HasFactory, HasPermissionsTrait;

    protected $fillable = [
        'employee_id',
        'company_name',
        'last_name',
        'first_name',
        'middle_name',
        'suffix',
        'email',
        'password',
        'role_request',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


}
