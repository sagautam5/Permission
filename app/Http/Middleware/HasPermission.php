<?php

namespace App\Http\Middleware;

use App\Permission\Models\Permissions\Permission;
use App\Permission\Models\Resources\Resource;
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
    public function handle($request, Closure $next, $resource, $action)
    {

        $role_id = Auth::user()->role_id;
        $resource_record = Resource::where('name', $resource)->first();

        if($resource_record){

            $permission = Permission::where('role_id', $role_id)->where('resource_id', $resource_record->id)->where('action', $action)->first();

            if($permission){
                return $next($request);
            }
        }
        echo 'You don\'t have permission to do that';
    }
}
