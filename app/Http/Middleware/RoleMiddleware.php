<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Zix\Core\Support\Traits\ApiResponses;

class RoleMiddleware
{
    use ApiResponses;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $role
     * @param $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $role = false, $permission = false)
    {
        if (!$request->user()) {
            return $this->respondBadRequest('Unauthorized');
        }

        if ($role && !$request->user()->hasRole($role)) {
            return $this->respondBadRequest('You Don\'t Access To Role : ' . $role);
        }

        if ($permission && !$request->user()->can($permission)) {
            return $this->respondBadRequest('You Don\'t Access To Permission : ' . $permission);
        }

        return $next($request);
    }
}
