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
use GoldenVision\Gv_clente;
use GoldenVision\Gv_localidad;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade as PDF;

class Gv_consultaController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'id_pa' => 'required',            
        ]);
        $rufinal=Gv_consulta::where('pa_id',$request->id_pa)
        ->orderBy('co_id', 'desc')
        ->take(1)->get(); 
              
        if(count($rufinal)>0){
          $rufinalx=Gv_consulta::find($rufinal[0]->co_id)->examenes()->get();
          $lentesconsulta=Gv_consulta::find($rufinal[0]->co_id)->lentes()->get();
        }else{
            $rufinalx="";
            $lentesconsulta="";
        }        
        $lentesContacto=Gv_clente::where('le_id',1)
         -> orderBy('cle_caracteristica', 'asc')->get();
        $lentesMarco=Gv_clente::where('le_id',2)
         -> orderBy('cle_caracteristica', 'asc')->get();         
        $ojos=Gv_ojo::orderBy('oj_id', 'asc')->get();
        $sintomas=Gv_sintoma::orderBy('si_id', 'asc')->get();
        $ccorporales=Gv_ccorporal::orderBy('cc_caracteristica','asc')->get();       
        return view('consulta.medidas')
        ->with('pa_id',$request->id_pa)
        ->with('sintomas',$sintomas)
        ->with('ccorporales',$ccorporales)
        ->with('ojos',$ojos)
        ->with('lentesContacto',$lentesContacto)
        ->with('lentesMarco',$lentesMarco)
        ->with('rxanterior',$rufinalx)
        ->with('lentesconsulta',$lentesconsulta);
                    
    }
    public function guardar(Request $request){
        //Agragar Consulta
       $us_cedula=Auth::user()->us_cedula;
        $su_id=\Session::get('id_sucursal');
        $pa_id=$request->pa_id;  
        $consulta=new Gv_consulta();
        $consulta->co_fecha= NOW();
        $consulta->pa_id=$pa_id;
        $consulta->us_cedula=$us_cedula;
        $consulta->su_id=$su_id;
        $consulta->co_motivo=$request->co_motivo;
        $consulta->co_anamnesis=$request->co_anamnesis;
        $consulta->co_ishihara=$request->co_ishihara;
        $consulta->co_observaciones=$request->co_observaciones;
        $consulta->co_recomendaciones=$request->co_recomendaciones;
        $consulta->pc_verificado=false;
        $consulta->pc_fecha=$request->pc_fecha;
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
        //caracteristicas corporales
       if(\Session::exists('ccorporales')){
        $ccorporales=\Session::get('ccorporales');
        foreach($ccorporales as $ccorporal){ 
            $consulta->caracteristicasCor()->attach($ccorporal->cc_id,['coc_observaion'=>$ccorporal->coc_observaion]);
        }  
        \Session::flush('ccorporales');                      
       }    
         
      if(\Session::exists('keratrometria')){
        $keratrometrias=\Session::get('keratrometria');
        foreach($keratrometrias as $keratrometria){ 
            $consulta->ojos()->attach($keratrometria->oj_id,[
                'ke_k1'=>$keratrometria->ke_k1,
                'ke_grk1'=>$keratrometria->ke_grk1,
                'ke_k2'=>$keratrometria->ke_k2,
                'ke_grrs'=>$keratrometria->ke_grrs,
                'ke_km'=>$keratrometria->ke_km,
                'ke_grkm'=>$keratrometria->ke_grkm,

                'ke_isv'=>$keratrometria->ke_isv,
                'ke_iha'=>$keratrometria->ke_iha,
                'ke_iva'=>$keratrometria->ke_iva,
                'ke_ihd'=>$keratrometria->ke_ihd,
                'ke_ki'=>$keratrometria->ke_ki,
                'ke_rmin'=>$keratrometria->ke_rmin,
                'ke_cki'=>$keratrometria->ke_cki,
                'ke_tkc'=>$keratrometria->ke_tkc,

                'ke_paquip'=>$keratrometria->ke_paquip,
                'ke_xp'=>$keratrometria->ke_xp,
                'ke_yp'=>$keratrometria->ke_yp,
                'ke_paquio'=>$keratrometria->ke_paquio,
                'ke_xo'=>$keratrometria->ke_xo,
                'ke_yo'=>$keratrometria->ke_yo,
                ]);
        }  
        \Session::flush('keratrometria');                      
       } 
       
      
       //lentes
      if($request->_lenteContacto <> null){
        $consulta->lentes()->attach($request->_lenteContacto); 
        $consulta->examenes()->attach(3,[
            'mo_esfod'=> $request->ODeslc,
            'mo_esfoi'=> $request->OIeslc,
            'mo_ciod'=> $request->ODcilc,
            'mo_cioi'=> $request->OIcilc,
            'mo_ejod'=> $request->ODejlc,
            'mo_ejoi'=> $request->OIejlc,            
        ]);
      }
       if($request->_lenteMarco <> null){
        $consulta->lentes()->attach($request->_lenteMarco);   
       }

       //Rx Final
       $consulta->examenes()->attach(2,[
        'mo_esfod' => $request->ODesrx,
        'mo_esfoi' => $request->OIesrx,
        'mo_ciod' => $request->ODcirx,
        'mo_cioi' => $request->OIcirx,
        'mo_ejod' => $request->ODejrx,
        'mo_ejoi' => $request->OIejrx,
        'mo_dnpod' => $request->ODdnprx,
        'mo_dnpoi' => $request->OIdnprx,
        'mo_avlod' => $request->ODavlrx,
        'mo_avloi' => $request->OIavlrx,
        'mo_avcod' => $request->ODavcrx,
        'mo_avcoi' => $request->OIavcrx,
        'mo_addod' => $request->ODaddrx,
        'mo_addoi' => $request->OIaddrx,
        'mo_alturaod' => $request->ODalrx,
        'mo_alturaoi' => $request->OIalrx,
        'mo_aumentar' => $request->aumdisrx, 
    ]);
    //Rentinoscopia
    $consulta->examenes()->attach(1,[
        'mo_esfod' => $request->ODesre,
        'mo_esfoi' => $request->OIesre,
        'mo_ciod' => $request->ODcire,
        'mo_cioi' => $request->OIcire,
        'mo_ejod' => $request->ODejre,
        'mo_ejoi' => $request->OIejre,
        'mo_dnpod' => $request->ODdnpre,
        'mo_dnpoi' => $request->OIdnpre,
        'mo_avlod' => $request->ODavlre,
        'mo_avloi' => $request->OIavlre,
        'mo_avcod' => $request->ODavcre,
        'mo_avcoi' => $request->OIavcre,
        'mo_addod' => $request->ODaddre,
        'mo_addoi' => $request->OIaddre,
        'mo_alturaod' => $request->ODalre,
        'mo_alturaoi' => $request->OIalre,
        'mo_aumentar' => $request->aumdisre, 
    ]);      
    
    $localidades=Gv_localidad::orderBy('lo_nombre', 'asc')->get();
    return redirect()->route('consulta'); 
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
            'ke_grkm'=>$request->ke_grkm,

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
    public function obtenerConsulta(Request $request){
         
        $consulta=Gv_consulta::find($request->co_id);    
        return view('consulta.verConsulta')->with('consulta',$consulta);
    }
    public function obtenerConCer($co_id){
         
        $consulta=Gv_consulta::find($co_id); 
        $examenes=$consulta->examenes;
        $sucursal=$consulta->sucursal;
        $paciente= $consulta->paciente;  
        $usuario=$consulta->usuario;
        return response()->json([
            'status'=> 'Información guardada',
            'consulta' => $consulta,
            'examenes' => $examenes,
            'paciente'=> $paciente,
            'usuario' => $usuario,
            'sucursal' => $sucursal,
        ]);
    }
    public function imprimirCertificado(Request $request){    
         $consulta=Gv_consulta::find($request->co_id);
         $pdf = PDF::loadView('consulta.certificado', ['consulta' => $consulta,'fechaCer' => $request->fechaCer,'descripcion' => $request->_descripcion,'ishihara' => $request->__ishihara,'estructuraOC' => $request->estructuraOC,'reflejosPu' => $request->reflejosPu,'motilidad' => $request->motilidad,'coverte' => $request->coverte,'conclusiones' => $request->conclusiones,'medico' => $request->medico]);
         $pdf->setPaper('A4', 'portrait');
         return $pdf->download();

    }
}
