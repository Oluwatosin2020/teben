<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Account\BaseController;

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
        $base = new BaseController();
        if(!in_array($request->getUri() , [
            route("account.dashboard"),
            route("account.atg_callback"),
            route("account.logout"),
        ]) && !$base->isActive()) { 
            return redirect()->route("account.dashboard"); 
        }

        return $next($request);
    }
}
