<?php

namespace GoldenVision\Http\Controllers;

use Illuminate\Http\Request;
use GoldenVision\Gv_sucursal;
use GoldenVision\Gv_localidad;

class Gv_selectsController extends Controller
{
    //Sucursales
    public function guardarSucursal(Request $request)
    {
       $request->validate([
            'su_ciudad' => 'unique:gv_sucursales',
            
        ]);        
        if($request->ajax()){
            $sucursal= new Gv_sucursal(); 
            $sucursal->su_ciudad=$request->su_ciudad;             
            $sucursal->save();
            $sucursales= Gv_sucursal::all();
            return response()->json([
                 'status'=> 200,
             ]);
        }
    }
    public function obtenerSucursal(){
        $sucursales= Gv_sucursal::all();
            return response()->json($sucursales->toArray());
    }
    //Localidades
    public function guardarLocalidad(Request $request)
    {
       $request->validate([
            'lo_nombre' => 'unique:gv_localidades',            
        ]);        
        if($request->ajax()){
            $localidad= new Gv_localidad(); 
            $localidad->lo_nombre=$request->lo_nombre;             
            $localidad->save();
            return response()->json([
                 'status'=> 200,
             ]);
        }
    }
    public function obtenerLocalidades(){
        $localidades= Gv_localidad::orderBy('lo_nombre', 'asc')->get();
            return response()->json($localidades->toArray());
    }
}
