<?php

namespace App\Http\Middleware;

use Closure;

class SchoolAccountMiddleware
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
        if(!session()->has('school_account')){
            return redirect()->route('account.login');
        }
        return $next($request);
    }
}
