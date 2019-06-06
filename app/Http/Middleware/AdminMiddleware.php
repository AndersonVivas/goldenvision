<?php

namespace GoldenVision\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function redirectPath()
    {
      if(auth()->user()->ro_id==1){
        return '/administrador';
      }else if(auth()->user()->ro_id==2 || auth()->user()->ro_id==3 ){
        return '/opt';
      }else if(auth()->user()->ro_id==4){
        return '/secretaria';
      }
        
    }
    public function handle($request, Closure $next)
    {
        if(\Auth::check()){
        $usuario=\Auth::user();
        if($usuario->ro_id!=1){
            return redirect()->intended($this->redirectPath());
        }
        return $next($request);
       }else{
        return redirect()->intended('sistema');
       }
        
    }
}
