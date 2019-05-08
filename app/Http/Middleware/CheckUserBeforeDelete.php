<?php

namespace App\Http\Middleware;

use Closure;

use App\User;
use Illuminate\Support\Facades\Auth;

class CheckUserBeforeDelete
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
        $admin_id = User::where('role_id',1)->first()->id;

        if($request->id==$admin_id)
        {
            return response('Invalid Operation', 404);
        }
        return $next($request);
    }
}
