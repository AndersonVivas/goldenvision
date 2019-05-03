@extends('layouts.app2')

@section('content')
<div class="container-fluid"> 
        
    <div class="md-form row" style="padding-left:50px;">       
                                                
        <div class="col-md-6" >
            <i class="fas fa-search prefix"></i>                            
            <input id="buscarpaciente" class="form-control apparencoutline" type="text" placeholder="Buscar Paciente" onkeyup="buscarPac()" >  
                 
            <ul id="lista_pacientes"  class="mdb-autocomplete-wrap">            
            </ul>  
            </div> 
        </div>   
   
    <div class="row justify-content-center" >

        <div class="col-md-11" >
                
            <div class="card" style="position:relative">
                    <div class="card-header">Paciente</div>
                    <div class="card-body">                        
                        
                        <form action="guardarPaciente" method="post" style="position:relative">
                                <div  role="alert" id="mensjeInformacion" >
                                        <strong id="succesMensaje"></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </button>  
                                </div>
                                
                                @csrf                               
                            <div class="md-form row" >                                     
                                <div class="col-md-3">                                 
                                    <input id="pa_cedula" name="pa_cedula" class="form-control"  type="number">
                                    <label for="pa_cedula" id="lblcedula">Cédula:</label>   
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="mensajeCedula"></strong>
                                    </span>
                                </div> 
                                <div class="col-md-1">
                                    <label for="pa_id" class="class=col-md-4 col-form-label" id="lblid">Paciente:</label>
                                    <input id="pa_id" class="form-control form-control-sm" type="text" disabled>
                                </div> 
                            </div>

                            <div class="form-group row">                              
                                       
                                <div class="col-md-3 form-group bmd-form-group">   
                                    <label for="pa_nombres" class="bmd-label-floating">Nombres:</label>                              
                                    <input id="pa_nombres" onkeyup="mayus(this);" name="pa_nombres" class="form-control" type="text" required>
                                    <span class="invalid-feedback" role="alert" id="error-nombre">
                                        <strong id="mensajeNombre"></strong>
                                    </span>                                      
                                      
                                </div>    
                                        
                                <div class="col-md-3"> 
                                    <label for="pa_apellidos" class="class=col-md-2 col-form-label">Apellidos:</label>                                
                                    <input id="pa_apellidos" onkeyup="mayus(this);" name="pa_apellidos" class="form-control form-control-sm" type="text" required autofocus>
                                       <span class="invalid-feedback" role="alert" id="error-apellido">
                                        <strong id="mensajeApellidos"></strong>
                                        </span>                                     
                                     
                                </div> 
                                     
                                <div class="col-md-3">  
                                    <label for="pa_fechanac" class="class=col-md-2 col-form-label text-md-right">Fecha de Nacimiento:</label>                               
                                    <input id="pa_fechanac" name="pa_fechanac" class="form-control form-control-sm" type="date"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required autofocus>
                                    <span class="invalid-feedback" role="alert" id="error-fechanac">
                                        <strong id="mensajeFechanac" ></strong>
                                        </span>                                   
                                </div>                                       
                                       
                                <div class="col-md-3"> 
                                    <label for="pa_correo" class="class=col-md-4 col-form-label">Email:</label>                                
                                    <input id="pa_correo" onkeyup="mayus(this);" name="pa_correo" class="form-control form-control-sm" type="email">
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="mensajeCorreo"></strong>
                                    </span>                                      
                                     
                                </div> 
                                                            
                            </div>

                            <div class="form-group row">                                                                      
                                <div class="col-md-3">  
                                    <label for="pa_telefono" class="class=col-md-4 col-form-label">Teléfono:</label>                               
                                    <input id="pa_telefono" name="pa_telefono" class="form-control form-control-sm {{ $errors->has('pa_telefono') ? ' is-invalid' : '' }}" type="number">
                                    @if ($errors->has('pa_telefono'))  
                                        <span class="invalid-feedback" role="alert">
                                        <strong >{{ $errors->first('pa_telefono') }}</strong>
                                        </span>                                      
                                    @endif    
                                </div>                                                                             

                                <div class="col-md-3"> 
                                    <label for="_localidades" class="class=col-md-4 col-form-label">Localidad:</label>
                                                                            
                                    <select id="_localidades"name="_localidades" class="custom-select form-control-sm {{ $errors->has('id_lo') ? ' is-invalid' : '' }} " name="su_ciudad"  data-live-search="true" required>
                                        <option value="">--Seleccione--</option>                                        
                                        @foreach ($localidades as $localidad)
                                        <option   value={{ $localidad->lo_id }}>{{ $localidad->lo_nombre }}</option>
                                        @endforeach                                                     
                                    </select> 
                                    <small style="color:blue" id="mensaje" name="mensaje"></small>                                    
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="mensajeLocalidad"></strong>
                                    </span>                                      
                                    <a id="nuevaLocalidad" data-toggle="modal" data-target="#localidad" href="#" ><ion-icon name="add-circle-outline"></ion-icon>Agregar nueva localidad</a>
                                                                   
                                    <!--<button  type="button" class="btn btn-outline-primary mb-0" data-toggle="modal" data-target="#localidad">Agregar</button>-->                                                                       
                                </div>
                               
                                       

                                <div class="col-md-5"> 
                                    <label for="pa_direccion" classpa_direccion="class=col-md-2 col-form-label">Dirección:</label>                                
                                    <input id="pa_direccion" onkeyup="mayus(this);" name="pa_direccion" class="form-control form-control-sm {{ $errors->has('pa_direccion') ? ' is-invalid' : '' }}" type="text" required autofocus>
                                    @if ($errors->has('pa_direccion'))  
                                        <span class="invalid-feedback" role="alert">
                                        <strong id="mensajeDireccion"></strong>
                                        </span>                                      
                                    @endif    
                                </div>   
                                                                          
                            </div>                                  
                            
                            <div class="form-group row"> 
                                <div class="col-md-3">  
                                    <label for="pa_ocupacion" class="class=col-md-3 col-form-label">Ocupacion:</label>                               
                                    <input id="pa_ocupacion" onkeyup="mayus(this);" name="pa_ocupacion" class="form-control form-control-sm {{ $errors->has('pa_ocupacion') ? ' is-invalid' : '' }}" type="text" required autofocus>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="mensajeOcupacion"></strong>
                                    </span>                                      
                                      
                                </div>

                                <div class="col-md-3"> 
                                    <label for="pa_antecedentesf" class="class=col-md-3 col-form-label">Antecedentes Familiares:</label>                                
                                    <input id="pa_antecedentesf" value="Ninguno" onkeyup="mayus(this);" name="pa_antecedentesf" class="form-control form-control-sm {{ $errors->has('pa_antecedentesf') ? ' is-invalid' : '' }}" type="text" placeholder="Papá/Mamá.....">
                                    @if ($errors->has('pa_antecedentesf'))  
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pa_antecedentesf') }}</strong>
                                        </span>                                      
                                    @endif    
                                </div>                                
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-6">  
                                <label for="pa_enfamiliares" class="class=col-md-3 col-form-label">Enfermedades Familiares:</label>                               
                                <input id="pa_enfamiliares" value="Ninguna" onkeyup="mayus(this);" name="pa_enfamiliares" class="form-control form-control-sm {{ $errors->has('pa_enfamiliares') ? ' is-invalid' : '' }}" type="text">
                                @if ($errors->has('pa_enfamiliares'))  
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pa_enfamiliares') }}</strong>
                                    </span>                                      
                                @endif    
                            </div>

                            <div class="col-md-6"> 
                                <label for="pa_enpersonales" class="class=col-md-3 col-form-label">Enfermedades Personales:</label>                                
                                <input id="pa_enpersonales" value="Ninguna" onkeyup="mayus(this);" name="pa_enpersonales" class="form-control form-control-sm {{ $errors->has('pa_enpersonales') ? ' is-invalid' : '' }}" type="text">
                                @if ($errors->has('pa_enpersonales'))  
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pa_enpersonales') }}</strong>
                                    </span>                                      
                                @endif    
                            </div>              
                    </div>
                    <div class="form-group row justify-content-end">
                            <div class="col-md-10 ">
                                <button type="button" onclick="EnviarPaciente()" class="btn btn-primary">
                                    Guardar
                                </button>       
                                
                            </div>
                    </div>     
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="localidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Localidad Nueva</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form >
             @csrf
             <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <div class="modal-body">              
                  <div class="form-group">
                      <label for="lo_nombre">Agregue una Localidad</label>
                      <input id="lo_nombre"  class="form-control" onkeyup="mayus(this);" type="text" name="lo_nombre">
                  </div>             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" onclick="EnviarLocalidad()" id='guardarLocalidad' data-dismiss="modal" class="btn btn-primary addLocalidad">Guardar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <form method="get" action="medidasNuevas">
            
      <div class="btn-group" role="group" aria-label="Button group">
            <input id="id_pa"  class="form-control"  type="hidden" name="id_pa">                 
          <button type="submit" >Agregar Consulta</button>
      </div>
    </form>
@endsection

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/AgregarSelects.js"></script>
<script type="text/javascript" src="js/AgregarPaciente.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>
<script type="text/javascript" src="js/BuscarPaciente.js"></script>

