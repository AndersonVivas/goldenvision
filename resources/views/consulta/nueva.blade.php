@extends('layouts.app2')
@section('title','Consulta')
@section('content')
<div class="container-fluid" style="margin-top: 0px">    
    <div class="row offset-md-1" >                                          
      <div class="col-md-6" >
          @include('consulta.buscarpaciente')
      </div>           
    </div>
<div class="row justify-content-center">
  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10 ">
      @include('consulta.agregarpaciente')   
  </div>
    
</div>            

    
      
   
  <div class="row">
    
       
<div class="col-md-12" > 
<div class="card" style="margin-top: 20px">    
    <div class="card-body"> 
      <h5 class="card-title"><strong><ion-icon name="copy" style="color:#b49b3e; font-size: 20px"></ion-icon> Consultas del Paciente </strong></h5>
        <form method="get" action="medidasNuevas">            
            <div class="btn-group" role="group" aria-label="Button group" style="margin-bottom: 10px">
                  <input id="id_pa"  class="form-control"  type="hidden" name="id_pa">                 
              <button type="submit" class="btn btn-md" style="background: #2E519f;color: white" ><ion-icon name="clipboard" style="size: 20px"></ion-icon>Agregar Consulta</button>
            </div>
          </form>
          
          <div class="table-responsive" id="__consultas">         

          </div>
    </div>
</div>
</div>
</div> 
</div>  
@include('consulta.generarCertificado')

<div class="modal fade" id="verConsulta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered " role="document">
            @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Generar Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
         
        <div class="modal-body" id="cosultaBody">
        </div>
      </div>
    </div>
</div>

@endsection



