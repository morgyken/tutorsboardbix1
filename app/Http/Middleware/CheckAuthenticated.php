<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class CheckAuthenticated
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
       if (Auth::check() or $request->is("auth/login"))
       {
            return $next($request);
       } 
       else
       {
            return redirect()->guest('auth/login');
       }
}
}
