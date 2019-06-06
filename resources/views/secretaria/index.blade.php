@extends('layouts.app2')
@section('title','Secretaria') 
@section('content' )
<div class="container" style="height:100%">
    <div class="row justify-content-md-center" style="height:100%" >
<div class="col-sm-12  col-lg-4 col-xl-3" style="margin-top:10px" >
    <div class="card card-cascade wider" style="height: 300px">
        <div class="view view-cascade overlay">  
            <ion-icon name="contacts" aria-hidden="true" style="font-size: 200px;color: #b49b3e;opacity: 0.8"></ion-icon >       
                            
          <a href="secreConsulta">
              <div class="mask rgba-white-slight"></div>
        </a>
        </div>
        <div class="card-body card-body-cascade text-center pb-0">
            <!-- Title -->
            <h4 class="card-title"><strong>CONSULTAS</strong></h4>
        </div>
      </div>
      </div><div class="col-sm-12  col-lg-4 col-xl-3" style="margin-top:10px">
          <div class="card card-cascade wider" style="height: 300px">
              <div class="view view-cascade overlay">         
                  <ion-icon name="call" aria-hidden="true" style="font-size: 200px;color: #b49b3e;opacity: 0.8"></ion-icon >                   
                <a data-toggle="modal" data-target="#proximasConsultas">
                    <div class="mask rgba-white-slight"></div>
              </a>
              </div>
              <div class="card-body card-body-cascade text-center pb-0">
      
                  <!-- Title -->
                  <h4 class="card-title"><strong>PRÓXIMAS CONSULTAS</strong></h4>
              </div>
            </div>
    
      </div>
      <div class="col-sm-12  col-lg-4 col-xl-3" style="margin-top:10px">
          <div class="card card-cascade wider" style="height: 300px">
              <div class="view view-cascade overlay">         
                  <ion-icon name="person-add" aria-hidden="true" style="font-size: 200px;color: #b49b3e;opacity: 0.8"></ion-icon >                   
                    <a href="agregarPaciente">
                    <div class="mask rgba-white-slight"></div>
              </a>
              </div>
              <div class="card-body card-body-cascade text-center pb-0">
      
                  <!-- Title -->
                  <h4 class="card-title"><strong>AGREGAR PACIENTE</strong></h4>
              </div>
            </div>
      </div>
    </div>
</div>
<div class="modal fade" id="proximasConsultas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                @csrf
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong style="color: #2E519f"><ion-icon name="calendar"  style="color:#b49b3e;"></ion-icon> Escoja una Fecha</strong></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>           
            <form method="get" action="proximasConsultas">
            <div class="modal-body" id="cosultaBody">
               <input type="date" class="form-control" name="fecha">                                    
            </div>
            <div class="modal-footer">
           <button type="submit" class="btn btn-md" style="background: #2E519f;color: white">Ver</button>
          </div>
            </form>
        </div>
    </div>
@endsection