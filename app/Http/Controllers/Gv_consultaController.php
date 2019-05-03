<?php

namespace GoldenVision\Http\Controllers;

use Illuminate\Http\Request;
use GoldenVision\Gv_sintoma;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use GoldenVision\Gv_consulta;

class Gv_consultaController extends Controller
{
    public function index(Request $request){
        $sintomas=Gv_sintoma::orderBy('si_id', 'asc')->get();        
        return view('consulta.medidas')
        ->with('pa_id',$request->id_pa)
        ->with('sintomas',$sintomas);
    }
    public function guardar(Request $request){
        //Agragar Consulta
       $us_cedula=Auth::user()->us_cedula;
        $su_id=\Session::get('id_sucursal');
        $pa_id=$request->pa_id;  
        $consulta=new Gv_consulta();
        $consulta->pa_id=$pa_id;
        $consulta->us_cedula=$us_cedula;
        $consulta->su_id=$su_id;
        $consulta->save();
        
        //Agregar sintomas a consulta
        $cos_otros=$request->otrossintomas;
        if (isset($request->sintomas)>0){       
          foreach($request->sintomas as $sintoma){
            if($cos_otros != null && $sintoma==14){
                $consulta->sintomas()->attach($sintoma,['cos_otros'=>$cos_otros]);
            }else if($cos_otros == null && $sintoma==14){
                $consulta->sintomas()->attach(14,['cos_otros'=>'No especificado']);                
            }else{
                $consulta->sintomas()->attach($sintoma);
            }
            
          }
       } else if( $cos_otros != null){
        $consulta->sintomas()->attach(14,['cos_otros'=>$cos_otros]);
       }
       return 'bien';
        

        
    }
}
