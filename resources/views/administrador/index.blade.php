@extends('layouts.app')
@section('title','Administrador') 
@section('content')
<div class="container" style="height:100%">
    <div class="row align-items-center" style="height:100%" >
<div class="col-sm-12  col-lg-4 col-xl-3" style="margin-top:10px" >
    <div class="card" >
        <div class="card-body">
          <h5 class="card-title">Consulta</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="consulta" class="btn btn-primary">Consulta</a>
          <button class="btn btn-primary" type="submit" >Text</button>
        </div>
      </div>
      </div><div class="col-sm-12  col-lg-4 col-xl-3" style="margin-top:5px">
      <form class="form-group" method="get" action="crearUsuario">
       <div class="card" >        
        <div class="card-body">                    
              <h5 class="card-title">Usuarios</h5>
              <img src="images/usuarios.png" class="card-img-top">
               <button class="btn btn-primary" type="submit">AGREGAR</button>
        </div>
      </div>
    </form>
      </div><div class="col-sm-12 col-lg-4 col-xl-3" style="margin-top:5px">
      <div class="card" >
       
        <div class="card-body">
          <h5 class="card-title">Secretaria</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <button class="btn btn-primary" type="button">Text</button>
        </div>
      </div>
      </div><div class="col-sm-12  col-lg-4 col-xl-3" style="margin-top:5px">
      <div class="card" >
        
        <div class="card-body">
          <h5 class="card-title">Reportes</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <button class="btn btn-primary" type="button">Text</button>
        </div>
      </div>
      </div>
    </div>
</div>
@endsection