<?php

namespace App\Http\Middleware;

use Closure;

use App\User;
use Illuminate\Support\Facades\Auth;

class CheckUserEditDeleteAllowed
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
        $roleLevel = Auth::user()->role->level;
        $user = User::find($request->id);

        if(!$user){
            abort(404, 'User Not Found');
        }

        if($user->role->level >= $roleLevel)
        {
            return response('Unauthorized Operation', 404);
        }

        return $next($request);
    }
}
