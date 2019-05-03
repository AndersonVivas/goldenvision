<?php

namespace GoldenVision\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(auth()->user()->ro_id==1){
                return redirect('/administrador');
              }else if(auth()->user()->ro_id==2){
                return redirect('/opt');
              }else if(auth()->user()->ro_id==3){
                return redirect('/secretaria');
              }           

        }

        return $next($request);
    }
}
