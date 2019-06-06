@extends('layouts.app2')

@section('content')
<div class="container-fluid" style="margin-top: 0px"> 
  <div class="card">
    <div class="card-header" >
      <h5 style="color: #2E519f"><strong><ion-icon name="search" style="color:#b49b3e;"></ion-icon> Buscar Consultas de Paciente</strong></h5>
    </div>
    <div class="card-body">
        <div class="row offset-md-1" >                                          
            <div class="col-md-6" >
              <div class="form-group">
                <div class="inputIcon">                        
                  <input id="buscarpaciente" class="form-control " type="text" placeholder="Buscar Paciente" onkeyup="buscarPacSecre()" >
                  <ion-icon name="search" aria-hidden="true"></ion-icon>
                </div>  
                  <ul id="__lista_pacientes"  class="mdb-autocomplete-wrap">            
                  </ul>  
                  </div>   
            </div>
          </div>
    </div>
  </div>  
    
    <div id="__consultasecre">

    </div>
</div>
<div class="modal fade" id="verConsulta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered " role="document">
            @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Generar Certificado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
         
        <div class="modal-body" id="cosultaBody">
        </div>
      </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/BuscarPaciente.js"></script>
@endsection