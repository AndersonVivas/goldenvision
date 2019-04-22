@extends('Layauts.administrador')
@section('title','Agregar-Rol') 
@section('content')
<form class="form-group" action="rolUsuario" method="post">
    @csrf
    </div class="form-group">
        <input type="text" class="form-control" name="ro_rol" placeholder="Ingrese el rol" >    
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div> 
</form>  
@endsection