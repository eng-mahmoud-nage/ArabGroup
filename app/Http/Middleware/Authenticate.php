<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    public function handle($request, Closure $next, ...$guards)
    {
        // dd($next, $request);
        if ($guards[0] === "admin" && !auth()->check()) {
            return redirect(route('login'));
        }
       else if($guards[0] === "web" && !auth()->check()) {
            return redirect(url('fronts/user-login'));
        }
        return $next($request);
    }

    // /**
    //  * Get the path the user should be redirected to when they are not authenticated.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return string|null
    //  */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return route('login');
    //     }
        
    // }
}
