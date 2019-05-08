<?php

namespace App\Http\Middleware;

use App\Permission\Models\Permissions\Permission;
use Closure;
use Illuminate\Support\Facades\Auth;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param $resource
     * @param $action
     * @return mixed
     */
    public function handle($request, Closure $next,$resource,$action)
    {

        $role_id = Auth::user()->role_id;
        $permission = Permission::where('role_id',$role_id)->where('resource',$resource)->where('action',$action)->first();

        if($permission){
            return $next($request);
        }
        echo 'You don\'t have permission to do that';
    }
}
