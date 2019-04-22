<?php

namespace GoldenVision\Http\Controllers;

use Illuminate\Http\Request;
use GoldenVision\Gv_rol;
use GoldenVision\Http\Requests\Gv_usuarioRequest;
use GoldenVision\Gv_usuario;

class Gv_usuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $usuario->us_cedula=$request->cedula;
        $usuario->us_apellidos=$request->apellidos;
        $usuario->us_nombres=$request->nombres;
        $usuario->us_correo=$request->email;
        $usuario->us_telefono=$request->celular;
        $usuario->us_password=bcrypt($request->cedula); 
        if($request->estado=='on'){
            $usuario->us_estado=true;  
        } else{
            $usuario->us_estado=false;
        }       
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
