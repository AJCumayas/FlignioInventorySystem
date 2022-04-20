<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permission;
use App\Models\Roles;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'user_id',
        'role_id',
    ];
    public function permissions()
    {
        return $this->belongsTo(Permission::class);
    }

    //  public function users() {

    //     return $this->belongsToMany(User::class,'users_permissions');

    //  }
}
