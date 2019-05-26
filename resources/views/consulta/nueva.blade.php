@extends('layouts.app2')

@section('content')
<div class="container-fluid" style="margin-top: 0px">    
    <div class="md-form row offset-md-1" >                                          
      <div class="col-md-6" >
          @include('consulta.buscarpaciente')
      </div>           
    </div>
    <div>
            <div class="col-md-12" >                
            @include('consulta.agregarpaciente')  
            </div>
      </div>
   
        
<div class="col-md-12" > 
<div class="card" style="position:relative;margin-top: 20px">
    <div class="card-header">Consultas Realizadas     
    </div>
    <div class="card-body"> 
        <form method="get" action="medidasNuevas">            
            <div class="btn-group" role="group" aria-label="Button group">
                  <input id="id_pa"  class="form-control"  type="hidden" name="id_pa">                 
              <button type="submit" class="btn btn-primary" >Agregar Consulta</button>
            </div>
          </form>
          <div class="table-responsive">
          <table id="tablaprueba" class="table table-striped table-bordered table-sm" cellspacing="0">
              <thead>
                <tr>
                  <th>Fecha de Consulta</th>
                  <th>Motivo de Consulta</th>
                  <th>Amnanesis de Consulta</th>
                  <th>Observacion de Consulta</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>          
              </tbody>
            </table>

          </div>
    </div>
</div>
</div>
</div>  
@include('consulta.generarCertificado') 
@endsection



