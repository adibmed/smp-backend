<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, String $role)
    {
        if($role == 'submitter' && auth('api')->user()->role->name  != Role::IS_SUBMITTER) {
            abort(403);
        }
        if($role == 'reviewer' && auth('api')->user()->role->name != Role::IS_REVIEWER) {
            abort(403);
        }
        if($role == "client" && auth('api')->user()->role->name != Role::IS_CLIENT) {
            abort(403);
        }
        return $next($request);
    }
}
