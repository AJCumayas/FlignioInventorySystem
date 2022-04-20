<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesPermissions extends Model
{
    use HasFactory;
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function user()
    {
        return $this->hasMany('App\Models\User', 'id', 'permission_id');
        //return $this->hasMany('App\Models\Role', 'id', 'role_id');
    }
}
