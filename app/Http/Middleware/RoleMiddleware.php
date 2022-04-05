<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{

    public function handle($request, Closure $next, $role, $permission = null)
    {
         dd($role);
        if(!$request->user()->hasRole($role)) {

             abort(404);

        }

        if($permission !== null && !$request->user()->can($permission)) {

              abort(404);
        }

        return $next($request);

    }

}
