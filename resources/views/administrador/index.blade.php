@extends('layouts.app2')
@section('title','Administrador') 
@section('content' )
<div class="container" style="height:100%">
    <div class="row align-items-center" style="height:100%" >
<div class="col-sm-12  col-lg-4 col-xl-3" style="margin-top:10px" >
    <div class="card card-cascade wider">
        <div class="view view-cascade overlay">         
          <img src="images/consultas.png" class="card-img-top" style="animation: down-ani 20s linear infinete"/>                   
          <a href="consulta">
              <div class="mask rgba-white-slight"></div>
        </a>
        </div>
        <div class="card-body card-body-cascade text-center pb-0">

            <!-- Title -->
            <h4 class="card-title"><strong>CONSULTA</strong></h4>
        </div>
      </div>
      </div><div class="col-sm-12  col-lg-4 col-xl-3" style="margin-top:5px">
          <div class="card card-cascade wider">
              <div class="view view-cascade overlay">         
                <img src="images/usuarios.png" class="card-img-top" style="animation: down-ani 20s linear infinete"/>                   
                <a href="consulta">
                    <div class="mask rgba-white-slight"></div>
              </a>
              </div>
              <div class="card-body card-body-cascade text-center pb-0">
      
                  <!-- Title -->
                  <h4 class="card-title"><strong>USUARIOS</strong></h4>
              </div>
            </div>
    
      </div><div class="col-sm-12 col-lg-4 col-xl-3" style="margin-top:5px">
      <div class="card" >
       
        <div class="card-body">
          <h5 class="card-title">Secretaria</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <button class="btn btn-primary" type="button">Text</button>
        </div>
      </div>
      </div><div class="col-sm-12  col-lg-4 col-xl-3" style="margin-top:5px">
          <div class="card card-cascade wider">
              <div class="view view-cascade overlay">         
                <img src="images/reportes.png" class="card-img-top" style="animation: down-ani 20s linear infinete"/>                   
                <a href="consulta">
                    <div class="mask rgba-white-slight"></div>
              </a>
              </div>
              <div class="card-body card-body-cascade text-center pb-0">
      
                  <!-- Title -->
                  <h4 class="card-title"><strong>REPORTES</strong></h4>
              </div>
            </div>
      </div>
    </div>
</div>
@endsection