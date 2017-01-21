<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Zix\Core\Support\Traits\ApiResponses;

class PermissionMiddleware
{
    use ApiResponses;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $permission
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        if ($request->user() && $request->user()->can($permission)) {
            return $next($request);
        }
        return $this->respondBadRequest('You Don\'t Access To Permission : ' . $permission);

    }
}
