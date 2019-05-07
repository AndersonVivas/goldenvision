<?php

namespace GoldenVision\Http\Controllers;

use Illuminate\Http\Request;
use GoldenVision\Gv_sintoma;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use GoldenVision\Gv_consulta;
use GoldenVision\Gv_ccorporal;
use phpDocumentor\Reflection\Types\Object_;
use GoldenVision\Gv_ojo;

class Gv_consultaController extends Controller
{
    public function index(Request $request){
        $ojos=Gv_ojo::orderBy('oj_id', 'asc')->get();
        $sintomas=Gv_sintoma::orderBy('si_id', 'asc')->get(); 
        $ccorporales=Gv_ccorporal::orderBy('cc_caracteristica','asc')->get();       
        return view('consulta.medidas')
        ->with('pa_id',$request->id_pa)
        ->with('sintomas',$sintomas)
        ->with('ccorporales',$ccorporales)
        ->with('ojos',$ojos);
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
        /*
       if(\Session::exists('ccorporales')){
        $ccorporales=\Session::get('ccorporales');
        foreach($ccorporales as $ccorporal){ 
            $consulta->caracteristicasCor()->attach($ccorporal->cc_id,['coc_observaion'=>$ccorporal->coc_observaion]);
        }  
        \Session::flush('ccorporales');                      
       }    
       */   
       
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
    public function AgregarKeratrometria(Request $request){
        $request->validate([
            'oj_id' => 'required',                        
        ]);
        $keratrometria = (Object)array(
            'oj_id'=>$request->oj_id,
            
            'ke_k1'=>$request->ke_k1,
            'ke_grk1'=>$request->ke_grk1,
            'ke_k2'=>$request->ke_k2,
            'ke_grrs'=>$request->ke_grrs,
            'ke_km'=>$request->ke_km,
            'ke_grke'=>$request->ke_grke,

            'ke_isv'=>$request->ke_isv,
            'ke_iha'=>$request->ke_iha,
            'ke_iva'=>$request->ke_iva,
            'ke_ihd'=>$request->ke_ihd,
            'ke_ki'=>$request->ke_ki,
            'ke_rmin'=>$request->ke_rmin,
            'ke_cki'=>$request->ke_cki,
            'ke_tkc'=>$request->ke_tkc,

            'ke_paquip'=>$request->ke_paquip,
            'ke_xp'=>$request->ke_xp,
            'ke_yp'=>$request->ke_yp,
            'ke_paquio'=>$request->ke_paquio,
            'ke_xo'=>$request->ke_xo,
            'ke_yo'=>$request->ke_yo,

        ); 

        if(\Session::exists('keratrometria')){ 
            $kera=\Session::get('keratrometria');
        foreach($kera as $ker){ 
           if($ker->oj_id == $keratrometria->oj_id){
            return response()->json([
                'status'=> 400,
            ]);
           }else{
            \Session::push('keratrometria',$keratrometria); 
           }
        } 
        }else{
            \Session::push('keratrometria',$keratrometria); 
        }

        return response()->json([
            'status'=> 200,
        ]); 

    }
}
