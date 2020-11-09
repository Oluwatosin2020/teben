<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CompleteProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth('web')->check()){
            $user = auth('web')->user();
            if(is_bool(getUserProfileStatuses($user , true)) == true){
                return $next($request);
            }
            else{
                return redirect()->route("user.profile.complete")->with('error_msg','Kindly complete your profile to proceed!');
            }
        }
        else{
            return redirect('/login');
        }
        return redirect('/');
    }
}
