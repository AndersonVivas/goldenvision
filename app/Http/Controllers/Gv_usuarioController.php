<?php

namespace GoldenVision\Http\Controllers;

use Illuminate\Http\Request;
use GoldenVision\Gv_rol;
use GoldenVision\Http\Requests\Gv_usuarioRequest;
use GoldenVision\Gv_usuario;

class Gv_usuarioController extends Controller
{   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles= Gv_rol::all();       
        $administradores= Gv_usuario::where('ro_id',1)->orderBy('us_apellidos','asc')->get();
        
        $oftomalogos= Gv_usuario::where('ro_id',2)->orderBy('us_apellidos','asc')->get();
        $optometristas= Gv_usuario::where('ro_id',3)->orderBy('us_apellidos','asc')->get();
        $secretarias= Gv_usuario::where('ro_id',4)->orderBy('us_apellidos','asc')->get();        
        return view('usuario.listaUsuarios')
        ->with('administradores',$administradores)
        ->with('oftalmologos',$oftomalogos)
        ->with('optometristas',$optometristas)
        ->with('secretarias',$secretarias)
        ->with('roles',$roles);
        
    }
    public function editarAdministrador($us_cedula){
        $usuario=Gv_usuario::find($us_cedula);        
        if($usuario->us_estado==1){
            $usuario->us_estado=false;
            $usuario->save();
        } else if($usuario->us_estado==0) {
            $usuario->us_estado=true;
            $usuario->save();
        }  
        $administradores= Gv_usuario::where('ro_id',1)->orderBy('us_apellidos','asc')->get();           
        return  response()->json(view('usuario.listaAdministrador')
        ->with('administradores',$administradores)->render());        
    }
    public function editarOftalmologo($us_cedula){
        $usuario=Gv_usuario::find($us_cedula);        
        if($usuario->us_estado==1){
            $usuario->us_estado=false;
            $usuario->save();
        } else if($usuario->us_estado==0) {
            $usuario->us_estado=true;
            $usuario->save();
        }  
        $oftomalogos= Gv_usuario::where('ro_id',2)->orderBy('us_apellidos','asc')->get();           
        return  response()->json(view('usuario.listaOftalmologos')
        ->with('oftalmologos',$oftomalogos)->render());        
    }
    public function editarOptometrista($us_cedula){
        $usuario=Gv_usuario::find($us_cedula);        
        if($usuario->us_estado==1){
            $usuario->us_estado=false;
            $usuario->save();
        } else if($usuario->us_estado==0) {
            $usuario->us_estado=true;
            $usuario->save();
        }  
        $optometristas= Gv_usuario::where('ro_id',3)->orderBy('us_apellidos','asc')->get();           
        return  response()->json(view('usuario.listaOptometristas')
        ->with('optometristas',$optometristas)->render());        
    }
    public function editarSecretaria($us_cedula){
        $usuario=Gv_usuario::find($us_cedula);        
        if($usuario->us_estado==1){
            $usuario->us_estado=false;
            $usuario->save();
        } else if($usuario->us_estado==0) {
            $usuario->us_estado=true;
            $usuario->save();
        }  
        $secretarias= Gv_usuario::where('ro_id',4)->orderBy('us_apellidos','asc')->get();          
        return  response()->json(view('usuario.listaSecretarias')
        ->with('secretarias',$secretarias)->render());        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles= Gv_rol::all();       
        return view('usuario.crear',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Gv_usuarioRequest $request)
    {
       $usuario = new Gv_usuario();
        $usuario->us_cedula=$request->us_cedula;
        $usuario->us_apellidos=$request->apellidos;
        $usuario->us_nombres=$request->nombres;
        $usuario->us_correo=$request->email;
        $usuario->us_telefono=$request->celular;
        $usuario->us_password=bcrypt($request->us_cedula); 
        $usuario->us_estado=true;          
        $usuario->ro_id=$request->tipo;
        $usuario->save();        
        return back()->with('status','Usuario ingresado');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($us_cedula)
    {
        $usuario=Gv_usuario::find($us_cedula);  
        return response()->json(['usuario'=>$usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $usuario=Gv_usuario::find($request->us_cedula);  
        $usuario->ro_id=$request->tipo;
        $usuario->us_nombres=$request->nombres;
        $usuario->us_apellidos=$request->apellidos;
        $usuario->us_correo=$request->email;
        $usuario->us_telefono=$request->celular;
        $usuario->save();
        return back()->with('status','Usuario editado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
