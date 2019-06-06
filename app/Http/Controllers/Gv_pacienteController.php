<?php

namespace GoldenVision\Http\Controllers;

use Illuminate\Http\Request;
use GoldenVision\Gv_localidad;
use GoldenVision\Gv_paciente;
use GoldenVision\Http\Requests\Gv_pacienteRequest;
use GoldenVision\Gv_consulta;

class Gv_pacienteController extends Controller
{
     public function index(){ 
        $localidades=Gv_localidad::orderBy('lo_nombre', 'asc')->get();
         return view('consulta.nueva')
         ->with('localidades',$localidades);
     }
     public function guardarPaciente(Gv_pacienteRequest $request){ 
           
        if($request->ajax()){  
        if($request->pa_id != null){
         $paciente= Gv_paciente::find($request->pa_id);
         if($request->pa_cedula=='registrado'){
            $paciente->pa_apellidos=$request->pa_apellidos;
            $paciente->pa_nombres=$request->pa_nombres;
            $paciente->pa_fechanac=$request->pa_fechanac;
            $paciente->pa_telefono=$request->pa_telefono;
            $paciente->pa_ocupacion=$request->pa_ocupacion;
            $paciente->pa_correo=$request->pa_correo;
            $paciente->pa_direccion=$request->pa_direccion;
            $paciente->pa_antecedentesf=$request->pa_antecedentesf;
            $paciente->pa_enfamiliares=$request->pa_enfamiliares;
            $paciente->pa_enpersonales=$request->pa_enpersonales;
            $paciente->lo_id=$request->id_lo;
            $paciente->save();
            return response()->json([
               'pa_id'=> $paciente->pa_id,
           ]); 
         }else{
        $request->validate([
            'pa_cedula' => 'nullable|unique:gv_pacientes|ecuador:ci',
        ]);
         $paciente->pa_cedula=$request->pa_cedula;
         $paciente->pa_apellidos=$request->pa_apellidos;
         $paciente->pa_nombres=$request->pa_nombres;
         $paciente->pa_fechanac=$request->pa_fechanac;
         $paciente->pa_telefono=$request->pa_telefono;
         $paciente->pa_ocupacion=$request->pa_ocupacion;
         $paciente->pa_correo=$request->pa_correo;
         $paciente->pa_direccion=$request->pa_direccion;
         $paciente->pa_antecedentesf=$request->pa_antecedentesf;
         $paciente->pa_enfamiliares=$request->pa_enfamiliares;
         $paciente->pa_enpersonales=$request->pa_enpersonales;
         $paciente->lo_id=$request->id_lo;
         $paciente->save();
         return response()->json([
            'pa_id'=> $paciente->pa_id,
        ]);
        }            
        }else{
        $request->validate([
            'pa_cedula' => 'nullable|unique:gv_pacientes|ecuador:ci',
        ]);
         $paciente= new Gv_paciente();
         $paciente->pa_cedula=$request->pa_cedula;
         $paciente->pa_apellidos=$request->pa_apellidos;
         $paciente->pa_nombres=$request->pa_nombres;
         $paciente->pa_fechanac=$request->pa_fechanac;
         $paciente->pa_telefono=$request->pa_telefono;
         $paciente->pa_ocupacion=$request->pa_ocupacion;
         $paciente->pa_correo=$request->pa_correo;
         $paciente->pa_direccion=$request->pa_direccion;
         $paciente->pa_antecedentesf=$request->pa_antecedentesf;
         $paciente->pa_enfamiliares=$request->pa_enfamiliares;
         $paciente->pa_enpersonales=$request->pa_enpersonales;
         $paciente->lo_id=$request->id_lo;
         $paciente->save();
         return response()->json([
            'pa_id'=> $paciente->pa_id,
        ]);  
        } 
     } 
     }
     public function autocomplete(Request $request){
         $cedula=$request->pa_cedula;
         $data=Gv_paciente::where('pa_cedula','LIKE','%'.$cedula.'%')
         ->orWhere('pa_nombres','LIKE','%'.$cedula.'%')
         ->orWhere('pa_apellidos','LIKE','%'.$cedula.'%')
         ->take(5)
         ->get();
         return response()->json([
             'data'=>$data->toArray()
         ]);
     }
     public function obtenerPaciente($pa_id){
         $paciente=Gv_paciente::find($pa_id);  
         $consultas=Gv_consulta::where('pa_id',$pa_id)->orderBy('co_id','desc')->take(10)->get();       
         return response()->json([
            'paciente'=> $paciente,
            'consultas'=> view('consulta.consultas')->with('consultas',$consultas)->render()]
        );
     }
     public function obtenerPacienteSecre($pa_id){        
        $consultas=Gv_consulta::where('pa_id',$pa_id)->orderBy('co_id','desc')->get();       
        return response()->json([           
           'consultas'=> view('secretaria.listaConsultas')->with('consultas',$consultas)->render()]
       );
    }
    public function agregarPacienteS(){
        $localidades=Gv_localidad::orderBy('lo_nombre', 'asc')->get();
         return view('secretaria.agregarPaciente')
         ->with('localidades',$localidades);
    }
     
}
