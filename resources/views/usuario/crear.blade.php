@extends('layouts.app')

@section('content')
<div class="container-fluid"  style="height:100%">    
<div class="row row justify-content-center" style="height:100%">
<div class=" col-auto col-sm-12 col-lg-9 align-self-center">
<div class="card">
 <h5 class="card-header">Usuario Nuevo</h5>
    <div class="card-body"> 
            @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            </div>
            @endif
 <form   action="usuario" method="post" style="margin-left:auto; margin-right:auto" autocomplete="off">
    @csrf   
    <div class="form-row">                       
        <div class="form-group col-auto col-sm-12 col-lg-3" required>
            <label for="my-input">Tipo de usuario</label>                                       
            <select id="rol_id" name="tipo" class="custom-select form-control-sm">
                <option value="">--Seleccione--</option>
                @foreach ($roles as $rol)
                <option value={{ $rol->ro_id }}>{{ $rol->ro_rol }}</option>
                @endforeach                   
            </select>
        </div>
    </div> 
    <div class="form-row">
        <div class="form-group col-auto col-sm-12 col-lg-4" >
            <label for="my-input">Cedula</label>
            <input id="ced" class="form-control form-control-sm"    type="text" name="cedula" placeholder="Cedula" value="{{ old('cedula') }}" >
            <div id="salida"></div>                    
        </div>
        <div class="form-group col-auto col-sm-12 col-lg-4" >
                <label for="my-input">Nombres</label>
                <input id="my-input" onkeyup="mayus(this);" class="form-control form-control-sm" type="text" name="nombres" placeholder="Ingrese el nombre completo" value="{{ old('nombres') }}" >
        </div>
        <div class="form-group col-sm-12 col-lg-4" >
                <label for="my-input">Apellidos</label>
                <input id="my-input" onkeyup="mayus(this);" class="form-control form-control-sm" type="text" name="apellidos" placeholder="Ingrese apellidos completos" value="{{ old('apellidos') }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-auto col-sm-12 col-lg-6">
            <label for="my-input">Email</label>
            <input id="my-input" class="form-control form-control-sm" type="text" name="email" placeholder="example@correo.com" value="{{ old('email') }}">
        </div>
        <div class="form-group col-auto col-sm-12 col-lg-4">
            <label for="my-input">Celular/Telefono</label>
            <input id="celular"name="celular"class="form-control form-control-sm" type="text" placeholder="0999999999/062540000" maxlength="10" minlength="6" value="{{ old('celular') }}">
        </div>
    </div> 
    <div class="form-row">
            <div class="form-group col-auto col-sm-12 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="estado" value="1">
                    <label class="form-check-label" for="exampleCheck1">Activo</label>
            </div>        
    </div>               
    <div class="btn-group" role="group" aria-label="Button group">
        <button class="btn btn-primary" type="submit" onclick="validar();">Guardar</button>
    </div>
    </form>
    </div>
</div>
</div>
</div>
</div>
@endsection
<script type="text/javascript" src="js/validaciones.js"></script>