<div class="card" >
        <div class="card-header">Información del Paciente                      
               <button onclick="limpiarFormulario()"  class="btn btn-mdb-color btn-sm" style="float:inline-end" >Limpiar Formulario</button> 
        </div>
        <div class="card-body"> 
            <form action="guardarPaciente" method="post" >                
                  <input id="pa_registrado" type="hidden" value="no" autofocus>                    
                    @csrf                               
                <div class="md-form row" >                                     
                    <div class="col-md-3">                                 
                        <input id="pa_cedula" maxlength="10" name="pa_cedula" class="form-control form-control-sm"  type="number" autofocus>
                        <label for="pa_cedula" id="lblcedula">Cédula:</label>   
                        <span class="invalid-feedback" role="alert">
                            <strong id="mensajeCedula"></strong>
                        </span>
                    </div> 
                    <div class="col-md-1">                        
                        <input id="pa_id" name="pa_id" class="form-control form-control-sm" type="text" disabled>
                        <label for="pa_id" id="lblid">Paciente:</label>
                    </div> 
                </div>

                <div class="md-form row">                              
                           
                    <div class="col-md-3">                                                      
                        <input id="pa_nombres" onkeyup="mayus(this);" name="pa_nombres" class="form-control form-control-sm" type="text" required>
                        <label for="pa_nombres" id="lblnombres">Nombres:</label> 
                        <span class="invalid-feedback" role="alert" id="error-nombre">
                            <strong id="mensajeNombre"></strong>
                        </span>                                      
                          
                    </div>    
                            
                    <div class="col-md-3">                                                        
                        <input id="pa_apellidos" onkeyup="mayus(this);" name="pa_apellidos" class="form-control form-control-sm" type="text" required>
                        <label for="pa_apellidos" id="lblapellidos" >Apellidos:</label>
                        <span class="invalid-feedback" role="alert" id="error-apellido">
                            <strong id="mensajeApellidos"></strong>
                            </span>                                     
                         
                    </div> 
                         
                    <div class="col-md-3">
                        <input id="pa_fechanac" name="pa_fechanac" class="form-control form-control-sm" type="date"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required autofocus>
                        <label for="pa_fechanac" id="lblfecha">Fecha de Nacimiento:</label>   
                        <span class="invalid-feedback" role="alert" id="error-fechanac">
                            <strong id="mensajeFechanac" ></strong>
                            </span>                                   
                    </div>                                       
                           
                    <div class="col-md-3">
                        <input id="pa_correo" onkeyup="mayus(this);" name="pa_correo" class="form-control form-control-sm" type="email">
                        <label for="pa_correo" id="lblcorreo">Email:</label>  
                        <span class="invalid-feedback" role="alert">
                            <strong id="mensajeCorreo"></strong>
                        </span>                                      
                         
                    </div> 
                                                
                </div>

                <div class="md-form row">                                                                      
                    <div class="col-md-3">                           
                        <input id="pa_telefono" maxlength="10" max="10" name="pa_telefono" class="form-control form-control-sm {{ $errors->has('pa_telefono') ? ' is-invalid' : '' }}" type="number">
                        <label for="pa_telefono" id="lbltelefono">Teléfono:</label>    
                        @if ($errors->has('pa_telefono'))  
                            <span class="invalid-feedback" role="alert">
                            <strong >{{ $errors->first('pa_telefono') }}</strong>
                            </span>                                      
                        @endif    
                    </div>                                                                             

                    <div class="col-md-3">                                        
                        <select id="_localidades"name="_localidades" class="custom-select form-control-sm {{ $errors->has('id_lo') ? ' is-invalid' : '' }} " name="su_ciudad"  data-live-search="true" required autofocus>
                            <option value="">Seleccione una Localidad</option>                                        
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
                        <input id="pa_direccion" onkeyup="mayus(this);" name="pa_direccion" class="form-control form-control-sm {{ $errors->has('pa_direccion') ? ' is-invalid' : '' }}" type="text" required>
                        <label for="pa_direccion" id="lbldireccion">Dirección:</label>
                        @if ($errors->has('pa_direccion'))  
                            <span class="invalid-feedback" role="alert">
                            <strong id="mensajeDireccion"></strong>
                            </span>                                      
                        @endif    
                    </div>   
                                                              
                </div>                                  
                
                <div class="md-form row"> 
                    <div class="col-md-3">                                                     
                        <input id="pa_ocupacion" onkeyup="mayus(this);" name="pa_ocupacion" class="form-control form-control-sm {{ $errors->has('pa_ocupacion') ? ' is-invalid' : '' }}" type="text" required>
                        <label for="pa_ocupacion" id="lblocupacion">Ocupacion:</label>    
                        <span class="invalid-feedback" role="alert">
                            <strong id="mensajeOcupacion"></strong>
                        </span>                                      
                          
                    </div>

                    <div class="col-md-3"> 
                                                        
                        <input id="pa_antecedentesf" value="Ninguno" onkeyup="mayus(this);" name="pa_antecedentesf" class="form-control form-control-sm {{ $errors->has('pa_antecedentesf') ? ' is-invalid' : '' }}" type="text" placeholder="Papá/Mamá.....">
                        <label for="pa_antecedentesf">Antecedentes Familiares:</label>
                        @if ($errors->has('pa_antecedentesf'))  
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pa_antecedentesf') }}</strong>
                            </span>                                      
                        @endif    
                    </div>                                
            </div>

            <div class="md-form row"> 
                <div class="col-md-6">                             
                    <input id="pa_enfamiliares" value="Ninguna" onkeyup="mayus(this);" name="pa_enfamiliares" class="form-control form-control-sm {{ $errors->has('pa_enfamiliares') ? ' is-invalid' : '' }}" type="text" autofocus>
                    <label for="pa_enfamiliares">Enfermedades Familiares:</label>  
                    @if ($errors->has('pa_enfamiliares'))  
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pa_enfamiliares') }}</strong>
                        </span>                                      
                    @endif    
                </div>

                <div class="col-md-6"> 
                                                  
                    <input id="pa_enpersonales" value="Ninguna" onkeyup="mayus(this);" name="pa_enpersonales" class="form-control form-control-sm {{ $errors->has('pa_enpersonales') ? ' is-invalid' : '' }}" type="text"autofocus>
                    <label for="pa_enpersonales" >Enfermedades Personales:</label>  
                    @if ($errors->has('pa_enpersonales'))  
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pa_enpersonales') }}</strong>
                        </span>                                      
                    @endif    
                </div>              
        </div>
        <div class="form-group row">
                <div class="col-md-11 ">
                    <button type="button" onclick="EnviarPaciente()" style="float:inline-end" class="btn btn-primary">
                        Guardar Información
                    </button>       
                    
                </div>
        </div>     
    </form>
</div>
</div>


<!--localidades-->
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

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/AgregarSelects.js"></script>
<script type="text/javascript" src="js/AgregarPaciente.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>
<script type="text/javascript" src="js/BuscarPaciente.js"></script>