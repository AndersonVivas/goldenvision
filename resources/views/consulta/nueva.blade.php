@extends('layouts.app2')

@section('content')
<div class="container-fluid" style="margin-top: 0px">    
    <div class="row offset-md-1" >                                          
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
            <div class="btn-group" role="group" aria-label="Button group" style="margin-bottom: 10px">
                  <input id="id_pa"  class="form-control"  type="hidden" name="id_pa">                 
              <button type="submit" class="btn btn-primary" style="background: #2E519f;color: white" ><ion-icon name="clipboard" style="size: 20px"></ion-icon>Agregar Consulta</button>
            </div>
          </form>
          
          <div class="table-responsive" id="__consultas">
         

          </div>
    </div>
</div>
</div>
</div>  
@include('consulta.generarCertificado')



@endsection



