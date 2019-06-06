<?php

namespace GoldenVision\Http\Middleware;

use Closure;

class OftMiddleware
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
            if($usuario->ro_id==2 || $usuario->ro_id==1 || $usuario->ro_id==3){
                return $next($request);
                
            }
            return redirect()->intended($this->redirectPath());
            
           }else{
            return redirect()->intended('sistema');
           }
    }
}
