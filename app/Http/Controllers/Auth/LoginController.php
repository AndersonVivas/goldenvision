<?php

namespace GoldenVision\Http\Controllers\Auth;

use GoldenVision\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GoldenVision\Gv_sucursal;

class LoginController extends Controller
{  

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectPath()
    {
      if(auth()->user()->ro_id==1){
        return '/administrador';
      }else if(auth()->user()->ro_id==2){
        return '/opt';
      }else if(auth()->user()->ro_id==3){
        return '/secretaria';
      }
        
    }
}
