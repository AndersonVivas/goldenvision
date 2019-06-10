<div class="card"  >
        
        <div class="card-body">
                <h5 class="card-title" style="color: #2E519f; "><strong><ion-icon name="person" style="color:#b49b3e; font-size: 20px"></ion-icon> Información del Paciente </strong>
                <button onclick="limpiarFormulario()"  class="btn btn-sm" style="background: #9aa0a6;color: white;float:inline-end" ><ion-icon name="trash"></ion-icon>
                    Limpiar Formulario</button></h5>
               <!-- background:#e3f0f4<h6 class="card-title"  style="color: #2E519f"><strong><ion-icon name="eye"></ion-icon>Información del Paciente  
                    <button onclick="limpiarFormulario()"  class="btn btn-mdb-color btn-sm" style="float:inline-end" ><ion-icon name="trash"></ion-icon>
                        Limpiar Formulario</button></strong></h6>-->
            <form action="guardarPaciente" method="post" >                
                  <input id="pa_registrado" type="hidden" value="no" autofocus>                    
                    @csrf 
                                                    
                <div class="row" >                                     
                    <div class="col-sm-4 col-md-5 col-lg-4 col-xl-3"> 
                            <small for="pa_cedula" id="lblcedula" style="color: #9aa0a6">Cédula:</small>                                   
                        <input id="pa_cedula" style="outline-color: brown" maxlength="10" name="pa_cedula" class="form-control form-control-sm"  type="number" autofocus>
                        
                        <span class="invalid-feedback" role="alert">
                            <strong id="mensajeCedula"></strong>
                        </span>
                    </div> 
                    <div class="col-sm-3 col-md-4 col-lg-3 col-xl-2">  
                        <small for="pa_id" id="lblid" style="color: #9aa0a6">Paciente:</small>                      
                        <input id="pa_id" name="pa_id" class="form-control form-control-sm" type="text" disabled>
                        </div> 
                </div>

                <div class="row">                              
                           
                    <div class="col-sm-4 col-md-5 col-lg-4 col-xl-3"> 
                        <small for="pa_nombres" id="lblnombres" style="color: #9aa0a6">Nombres:</small>                                                      
                        <input id="pa_nombres" style="outline: red" onkeyup="mayus(this);" name="pa_nombres" class="form-control form-control-sm" type="text" required>
                        <span class="invalid-feedback" role="alert" id="error-nombre">
                            <strong id="mensajeNombre"></strong>
                        </span>                                      
                          
                    </div>    
                            
                    <div class="col-sm-4 col-md-5 col-lg-4 col-xl-3"> 
                        <small for="pa_apellidos" id="lblapellidos" style="color: #9aa0a6">Apellidos:</small>                                                       
                        <input id="pa_apellidos" onkeyup="mayus(this);" name="pa_apellidos" class="form-control form-control-sm" type="text" required>
                        <span class="invalid-feedback" role="alert" id="error-apellido">
                            <strong id="mensajeApellidos"></strong>
                            </span>                                     
                         
                    </div> 
                         
                    <div class="col-sm-4 col-md-3 col-lg-3 col-xl-2">
                        <small for="pa_fechanac" id="lblfecha" style="color: #9aa0a6">Fecha de Nacimiento:</small>   
                        <input id="pa_fechanac" name="pa_fechanac"  class="form-control form-control-sm" type="date"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required autofocus>
                        <span class="invalid-feedback" role="alert" id="error-fechanac">
                            <strong id="mensajeFechanac" ></strong>
                            </span>                                   
                    </div>  
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1">
                       <small for="pa_edad" id="lbledad" style="color: #9aa0a6">Edad:</small> 
                        <input id="pa_edad" name="pa_edad" class="form-control form-control-sm" type='text' required disabled>
                          
                        <span class="invalid-feedback" role="alert" id="error-fechanac">
                            <strong id="mensajeFechanac" ></strong>
                            </span>                                   
                    </div>                                        
                           
                    <div class="col-sm-4 col-md-5 col-lg-4 col-xl-3">
                        <small for="pa_correo" id="lblcorreo" style="color: #9aa0a6">Email:</small> 
                        <input id="pa_correo"   name="pa_correo" class="form-control form-control-sm" type="email">
                         
                        <span class="invalid-feedback" role="alert">
                            <strong id="mensajeCorreo"></strong>
                        </span>                                      
                         
                    </div> 
                                                
                </div>

                <div class=" row">                                                                      
                    <div class="col-sm-3 col-md-3 col-lg-2 col-xl-3">
                            <small for="pa_telefono" id="lbltelefono" style="color: #9aa0a6">Teléfono:</small>                            
                        <input id="pa_telefono" maxlength="10" max="10" name="pa_telefono" class="form-control form-control-sm {{ $errors->has('pa_telefono') ? ' is-invalid' : '' }}" type="number">
                           
                        @if ($errors->has('pa_telefono'))  
                            <span class="invalid-feedback" role="alert">
                            <strong >{{ $errors->first('pa_telefono') }}</strong>
                            </span>                                      
                        @endif    
                    </div>                                                                             

                    <div class="col-sm-7 col-md-5 col-lg-4 col-xl-3"> 
                        <small for="pa_telefono" id="lbltelefono" style="color: #9aa0a6">Localidad:</small>                                        
                        <select id="_localidades"name="_localidades" class="form-control form-control-sm {{ $errors->has('id_lo') ? ' is-invalid' : '' }} " name="su_ciudad"  data-live-search="true" required autofocus>
                            <option value="">Seleccione una Localidad</option>                                        
                            @foreach ($localidades as $localidad)
                            <option   value={{ $localidad->lo_id }}>{{ $localidad->lo_nombre }}</option>
                            @endforeach                                                     
                        </select>                         
                        <small style="color:blue" id="mensaje" name="mensaje"></small>                                    
                        <span class="invalid-feedback" role="alert">
                            <strong id="mensajeLocalidad"></strong>
                        </span>                                      
                        <a id="nuevaLocalidad" data-toggle="modal" data-target="#localidad" href="#" ><small style="color:#2E519f"><ion-icon name="add-circle-outline"></ion-icon>Agregar nueva localidad</small></a>
                                                       
                        <!--<button  type="button" class="btn btn-outline-primary mb-0" data-toggle="modal" data-target="#localidad">Agregar</button>-->                                                                       
                    </div>
                   
                           

                    <div class="col-sm-12 col-md-7 col-lg-6 col-xl-5">   
                        <small for="pa_direccion" id="lbldireccion" style="color: #9aa0a6">Dirección:</small>                                                   
                        <input id="pa_direccion" onkeyup="mayus(this);" name="pa_direccion" class="form-control form-control-sm {{ $errors->has('pa_direccion') ? ' is-invalid' : '' }}" type="text" required>
                      
                        @if ($errors->has('pa_direccion'))  
                            <span class="invalid-feedback" role="alert">
                            <strong id="mensajeDireccion"></strong>
                            </span>                                      
                        @endif    
                    </div>   
                                                              
                </div>                                  
                
                <div class="row"> 
                    <div class="col-md-3">
                            <small for="pa_ocupacion" id="lblocupacion" style="color: #9aa0a6">Ocupacion:</small>                                                       
                        <input id="pa_ocupacion" onkeyup="mayus(this);" name="pa_ocupacion" class="form-control form-control-sm {{ $errors->has('pa_ocupacion') ? ' is-invalid' : '' }}" type="text" required>
                          
                        <span class="invalid-feedback" role="alert">
                            <strong id="mensajeOcupacion"></strong>
                        </span>                                      
                          
                    </div>

                    <div class="col-md-9"> 
                            <small for="pa_antecedentesf" style="color: #9aa0a6">Antecedentes Familiares:</small>                            
                        <input id="pa_antecedentesf" value="Ninguno" onkeyup="mayus(this);" name="pa_antecedentesf" class="form-control form-control-sm {{ $errors->has('pa_antecedentesf') ? ' is-invalid' : '' }}" type="text" placeholder="Papá/Mamá.....">
                        
                        @if ($errors->has('pa_antecedentesf'))  
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pa_antecedentesf') }}</strong>
                            </span>                                      
                        @endif    
                    </div>                                
            </div>

            <div class="row"> 
                <div class="col-md-6"> 
                    <small for="pa_enfamiliares" style="color: #9aa0a6">Enfermedades Familiares:</small>                              
                    <input id="pa_enfamiliares" value="Ninguna" onkeyup="mayus(this);" name="pa_enfamiliares" class="form-control form-control-sm {{ $errors->has('pa_enfamiliares') ? ' is-invalid' : '' }}" type="text" autofocus>
                    
                    @if ($errors->has('pa_enfamiliares'))  
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pa_enfamiliares') }}</strong>
                        </span>                                      
                    @endif    
                </div>

                <div class="col-md-6"> 
                        <small for="pa_enpersonales" style="color: #9aa0a6" >Enfermedades Personales:</small>                              
                    <input id="pa_enpersonales" value="Ninguna" onkeyup="mayus(this);" name="pa_enpersonales" class="form-control form-control-sm {{ $errors->has('pa_enpersonales') ? ' is-invalid' : '' }}" type="text"autofocus>
                     
                    @if ($errors->has('pa_enpersonales'))  
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pa_enpersonales') }}</strong>
                        </span>                                      
                    @endif    
                </div>              
        </div>
        <div class="form-group row" style="margin-top: 10px">
                <div class="col-md-12 " style="text-align:end">
                    <button type="button"  onclick="EnviarPaciente()"  class="btn btn-md " style="background: #2E519f;color: white"><ion-icon name="save"></ion-icon>
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
              <button type="button" class="btn btn-md" data-dismiss="modal" style="background: #9aa0a6;color: white;">Cancelar</button>
              <button type="button" onclick="EnviarLocalidad()" id='guardarLocalidad' data-dismiss="modal" class="btn btn-md addLocalidad" style="background: #2E519f;color: white">Guardar</button>
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