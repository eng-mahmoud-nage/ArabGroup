<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginCheck
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
        if(!auth()->user()->admin){
            Auth::logout();
            abort(403);
        }else if(!auth()->user()->active){
            Auth::logout();
            abort(401);
        }
        return $next($request);
    }
}
