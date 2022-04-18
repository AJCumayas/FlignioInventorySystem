<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'slug',

    // ];

    public function permissions(){
        return $this->hasMany(Permission::class);
    }
    public function user(){
        return $this->hasMany('App\Models\User', 'role_id', 'id');
    }


    // public function users()
    // {
    //     return $this->belongsTo(User::class);
    // }

}
