<?php

namespace App\Http\Middleware;

use App\Permission\Models\Roles\Role;
use Closure;

class CheckRoleEditDeleteAllowed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $superAdmin = Role::where('slug','super-admin')->first();

        if($request->id == $superAdmin->id)
        {
            return response('Unauthorized Operation', 404);
        }
        return $next($request);
    }
}
