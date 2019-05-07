<?php

namespace GoldenVision\Http\Controllers;

use Illuminate\Http\Request;
use GoldenVision\Gv_sintoma;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use GoldenVision\Gv_consulta;
use GoldenVision\Gv_ccorporal;
use phpDocumentor\Reflection\Types\Object_;

class Gv_consultaController extends Controller
{
    public function index(Request $request){
        $sintomas=Gv_sintoma::orderBy('si_id', 'asc')->get(); 
        $ccorporales=Gv_ccorporal::orderBy('cc_caracteristica','asc')->get();       
        return view('consulta.medidas')
        ->with('pa_id',$request->id_pa)
        ->with('sintomas',$sintomas)
        ->with('ccorporales',$ccorporales);
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
        /*$cos_otros=$request->otrossintomas;
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
       }*/        
        
       if(\Session::exists('ccorporales')){
        $ccorporales=\Session::get('ccorporales');
        foreach($ccorporales as $ccorporal){ 
            $consulta->caracteristicasCor()->attach($ccorporal->cc_id,['coc_observaion'=>$ccorporal->coc_observaion]);
        }  
        \Session::flush('ccorporales');                      
       }       
       
       return $ccorporales;    
    }
    public function AgregarCcorporal(Request $request){
        $request->validate([
            'coc_observaion' => 'required',
            'cc_id' => 'required',             
        ]);
        $ccorporales = (Object)array(
            'cc_id'=>$request->cc_id,
            'coc_observaion'=>$request->coc_observaion

        );        
        if(\Session::exists('ccorporales')){      
        $ccorporal=\Session::get('ccorporales');
        foreach($ccorporal as $ccorpor){ 
           if($ccorpor->cc_id == $ccorporales->cc_id){
            return response()->json([
                'status'=> 400,
            ]);
           }else{
            \Session::push('ccorporales',$ccorporales); 
           }
        } 
            
    }else{
        \Session::push('ccorporales',$ccorporales);         
    }
    return response()->json([
        'status'=> 200,
    ]); 
         

    }
}
