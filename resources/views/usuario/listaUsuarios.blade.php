@extends('layouts.app2')

@section('title')
USUARIOS
@endsection
@section('content')
<div class="container">
  <div class="row form-group" >
    <div class="col-md-4">
      <h4><strong><ion-icon name="contacts"></ion-icon>Usuarios</strong></h4>
    </div>
    <div class="col-md-8" style="text-align: end"> 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarUsuario" ><ion-icon name="person-add"></ion-icon>Agregar Usuario</button>         
      
    </div>
      
  </div>    
        <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#_administradores" role="tab" aria-controls="nav-home" aria-selected="true">Administradores</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#_oftalmologos" role="tab" aria-controls="nav-profile" aria-selected="false">Oftalmólogos</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#_optometristas" role="tab" aria-controls="nav-contact" aria-selected="false">Optometristas</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#_secretarias" role="tab" aria-controls="nav-contact" aria-selected="false">Secretaria</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="_administradores" role="tabpanel" aria-labelledby="nav-home-tab">
                        <table class="table table-sm table-responsive-sm">
                                <thead>
                                  <tr>
                                    <th scope="col">Cédula</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Nombres</th>                                    
                                    <th scope="col">Correo</th>
                                    <th scope="col">Celular/Telefono</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col"><ion-icon name="options"></ion-icon>Opciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                    @foreach ($administradores as $administrador)
                                    <tr>
                                    <td>{{ $administrador->us_cedula }}</td>
                                    <td>{{ $administrador->us_apellidos }}</td>
                                    <td>{{ $administrador->us_nombres }}</td>                                    
                                    <td>{{ $administrador->us_correo }}</td>
                                    <td>{{ $administrador->us_telefono }}</td>
                                    <td>
                                    @if ($administrador->us_estado)
                                    <div class="custom-control custom-switch">
                                    <input type="checkbox" onclick="estadoAdministrador({{ $administrador->us_cedula }})" class="custom-control-input" id="{{ $administrador->us_cedula }}" checked>
                                    <label class="custom-control-label" for="{{ $administrador->us_cedula }}">Activo</label>
                                    </div>
                                    @else
                                  <div class="custom-control custom-switch">
                                        <input type="checkbox" onclick="estadoAdministrador({{ $administrador->us_cedula }})" class="custom-control-input" id="{{ $administrador->us_cedula }}" >
                                        <label class="custom-control-label" for="{{ $administrador->us_cedula }}">Inactivo</label>
                                    </div>                              
                                    @endif
                                  </td>  
                                  <td><button class="btn btn-outline-primary waves-effect btn-sm" onclick="editarUsuario({{ $administrador->us_cedula }})" type="button"><ion-icon name="create"></ion-icon>Editar</button></td>
                                </tr>
                                  @endforeach                                    
                                  
                                </tbody>                                
                        </table>
                        
                    
                </div>
                <div class="tab-pane fade" id="_oftalmologos" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <table class="table table-sm table-responsive-sm">
                                <thead>
                                  <tr>
                                    <th scope="col">Cédula</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Nombres</th>                                    
                                    <th scope="col">Correo</th>
                                    <th scope="col">Celular/Telefono</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Opciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                    @foreach ($oftalmologos as $oftalmologo)
                                    <tr>
                                    <td>{{ $oftalmologo->us_cedula }}</td>
                                    <td>{{ $oftalmologo->us_apellidos }}</td>
                                    <td>{{ $oftalmologo->us_nombres }}</td>                                    
                                    <td>{{ $oftalmologo->us_correo }}</td>
                                    <td>{{ $oftalmologo->us_telefono }}</td>
                                    <td>
                                        @if ($oftalmologo->us_estado)
                                        <div class="custom-control custom-switch">
                                        <input type="checkbox" onclick="estadoOftalmolo({{ $oftalmologo->us_cedula }})" class="custom-control-input" id="{{ $oftalmologo->us_cedula }}"  checked>
                                        <label class="custom-control-label" for="{{ $oftalmologo->us_cedula }}">Activo</label>
                                        </div>
                                        @else
                                      <div class="custom-control custom-switch">
                                            <input type="checkbox" onclick="estadoOftalmolo({{ $oftalmologo->us_cedula }})" class="custom-control-input" id="{{ $oftalmologo->us_cedula }}" >
                                            <label class="custom-control-label" for="{{ $oftalmologo->us_cedula }}">Inactivo</label>
                                        </div>                              
                                        @endif
                                      </td>
                                      <td><button class="btn btn-outline-primary waves-effect btn-sm" onclick="editarUsuario({{ $oftalmologo->us_cedula }})" type="button"><ion-icon name="create"></ion-icon>Editar</button></td>  
                                    </tr>
                                      @endforeach                                    
                                  
                                </tbody>
                        </table>
                        
                    
                </div>
                <div class="tab-pane fade" id="_optometristas" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <table class="table table-sm table-responsive-sm">
                                <thead>
                                  <tr>
                                    <th scope="col">Cédula</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Nombres</th>                                    
                                    <th scope="col">Correo</th>
                                    <th scope="col">Celular/Telefono</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Opciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                    @foreach ($optometristas as $optometrista)
                                    <tr>
                                    <td>{{ $optometrista->us_cedula }}</td>
                                    <td>{{ $optometrista->us_apellidos }}</td>
                                    <td>{{ $optometrista->us_nombres }}</td>                                    
                                    <td>{{ $optometrista->us_correo }}</td>
                                    <td>{{ $optometrista->us_telefono }}</td>
                                    <td>
                                        @if ($optometrista->us_estado)
                                        <div class="custom-control custom-switch">
                                        <input type="checkbox" onclick="estadoOptometrista({{ $optometrista->us_cedula }})" class="custom-control-input" id="{{ $optometrista->us_cedula }}" checked>
                                        <label class="custom-control-label" for="{{ $optometrista->us_cedula }}">Activo</label>
                                        </div>
                                        @else
                                      <div class="custom-control custom-switch">
                                            <input type="checkbox" onclick="estadoOptometrista({{ $optometrista->us_cedula }})" class="custom-control-input" id="{{ $optometrista->us_cedula }}" >
                                            <label class="custom-control-label" for="{{ $optometrista->us_cedula }}">Inactivo</label>
                                        </div>                              
                                        @endif
                                      </td>
                                      <td><button class="btn btn-outline-primary waves-effect btn-sm" onclick="editarUsuario({{ $optometrista->us_cedula }})" type="button"><ion-icon name="create"></ion-icon>Editar</button></td> 
                                    </tr>
                                      @endforeach                                    
                                  
                                </tbody>
                        </table>
                        
                    
                </div>
                <div class="tab-pane fade" id="_secretarias" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <table class="table table-sm table-responsive-sm">
                                <thead>
                                  <tr>
                                    <th scope="col">Cédula</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Nombres</th>                                    
                                    <th scope="col">Correo</th>
                                    <th scope="col">Celular/Telefono</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Opciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                    @foreach ($secretarias as $secretaria)
                                    <tr>
                                    <td>{{ $secretaria->us_cedula }}</td>
                                    <td>{{ $secretaria->us_apellidos }}</td>
                                    <td>{{ $secretaria->us_nombres }}</td>                                    
                                    <td>{{ $secretaria->us_correo }}</td>
                                    <td>{{ $secretaria->us_telefono }}</td>
                                     <td>
                                        @if ($secretaria->us_estado)
                                        <div class="custom-control custom-switch">
                                        <input type="checkbox" onclick="estadoSecretaria({{ $secretaria->us_cedula }})" class="custom-control-input" id="{{ $secretaria->us_cedula }}" checked>
                                        <label class="custom-control-label" for="{{ $secretaria->us_cedula }}">Activo</label>
                                        </div>
                                        @else
                                      <div class="custom-control custom-switch">
                                            <input type="checkbox" onclick="estadoSecretaria({{ $secretaria->us_cedula }})"  class="custom-control-input" id="{{ $secretaria->us_cedula }}" >
                                            <label class="custom-control-label" for="{{ $secretaria->us_cedula }}">Inactivo</label>
                                        </div>                              
                                        @endif
                                      </td>
                                      <td><button class="btn btn-outline-primary waves-effect btn-sm" onclick="editarUsuario({{ $secretaria->us_cedula }})" type="button"><ion-icon name="create"></ion-icon>Editar</button></td> 
                                    </tr>
                                      @endforeach                                    
                                  
                                </tbody>
                        </table>
                       
                    
                </div>
              </div>
              
    
</div>
<div class="modal fade" id="agregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><ion-icon name="person-add"></ion-icon>Usuario Nuevo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  action="usuario"  method="post" autocomplete="off"> 
        <div class="modal-body">                                   
                @csrf
            <div class="form-group row">
                <label for="rol_id" class="col-md-4 col-form-label text-md-right">Tipo de usuario</label>      
                <div class="col-md-8">                                                         
                    <select id="tipo" name="tipo" class="custom-select" value={{ old('tipo') }} data-live-search="true" required>
                        <option value="">--Seleccione--</option>
                        @foreach ($roles as $rol)
                         <option  data-tokens= {{ $rol->ro_rol }} value={{ $rol->ro_id }}>{{ $rol->ro_rol }}</option>
                        @endforeach                   
                    </select>
                    @if ($errors->has('tipo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tipo') }}</strong>
                            </span>
                    @endif
                </div>
             </div>            
             <div class="form-group row">
                    <label for="us_cedula" class="col-md-4 col-form-label text-md-right">Cédula:</label>
                    <div class="col-md-8 input-group">
                        
                        <input id="us_cedula" type="number"  class="form-control{{ $errors->has('us_cedula') ? ' is-invalid' : '' }}" name="us_cedula" value="{{ old('us_cedula') }}" maxlength="10" required autofocus>
                        
                        
                        @if ($errors->has('us_cedula'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('us_cedula') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombres:</label>

                    <div class="col-md-8">
                        <input id="nombres" onkeyup="mayus(this);" type="text" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ old('nombres') }}" required autofocus>

                        @if ($errors->has('nombres'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombres') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="apellidos" class="col-md-4 col-form-label text-md-right">Apellidos:</label>

                    <div class="col-md-8">
                        <input id="apellidos" onkeyup="mayus(this);" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ old('apellidos') }}" required>

                        @if ($errors->has('apellidos'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('apellidos') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" onkeyup="mayus(this);" class="col-md-4">Correo Electrónico:</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="celular" class="col-md-4 col-form-label text-md-right">Teléfono/Celular:</label>

                    <div class="col-md-8">
                        <input id="celular" type="number" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" required>
                    </div>
                    @if ($errors->has('celular'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('celular') }}</strong>
                    </span>
                @endif
                </div>     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
              Guardar
          </button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><ion-icon name="person-add"></ion-icon>Editar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form  action="actualizarUsuario"  method="post" autocomplete="off"> 
          <div class="modal-body">                                   
                  @csrf
              <div class="form-group row">
                  <label for="rol_id" class="col-md-4 col-form-label text-md-right">Tipo de usuario</label>      
                  <div class="col-md-8">                                                         
                      <select id="__tipo" name="tipo" class="custom-select"  data-live-search="true" required>
                          <option value="">--Seleccione--</option>
                          @foreach ($roles as $rol)
                           <option  data-tokens= {{ $rol->ro_rol }} value={{ $rol->ro_id }}>{{ $rol->ro_rol }}</option>
                          @endforeach                   
                      </select>
                      @if ($errors->has('tipo'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('tipo') }}</strong>
                              </span>
                      @endif
                  </div>
               </div>            
               <div class="form-group row">
                      <label for="us_cedula" class="col-md-4 col-form-label text-md-right">Cédula:</label>
                      <div class="col-md-8 input-group">
                          <input id="__us_cedula" type="hidden"  class="form-control{{ $errors->has('us_cedula') ? ' is-invalid' : '' }}" name="us_cedula" value="{{ old('us_cedula') }}" maxlength="10" >                          
                          <input id="_us_cedula" type="number"  class="form-control{{ $errors->has('us_cedula') ? ' is-invalid' : '' }}" disabled value="{{ old('us_cedula') }}" maxlength="10" required>
                          
                          
                          @if ($errors->has('us_cedula'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('us_cedula') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">Nombres:</label>
  
                      <div class="col-md-8">
                          <input id="__nombres" onkeyup="mayus(this);" type="text" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ old('nombres') }}" required autofocus>
  
                          @if ($errors->has('nombres'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('nombres') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
  
                  <div class="form-group row">
                      <label for="__apellidos" class="col-md-4 col-form-label text-md-right">Apellidos:</label>
  
                      <div class="col-md-8">
                          <input id="__apellidos" onkeyup="mayus(this);" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ old('apellidos') }}" required>
  
                          @if ($errors->has('apellidos'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('apellidos') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
  
                  <div class="form-group row">
                      <label for="email" onkeyup="mayus(this);" class="col-md-4">Correo Electrónico:</label>
  
                      <div class="col-md-8">
                          <input id="__email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
  
                          @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
  
                  <div class="form-group row">
                      <label for="__celular" class="col-md-4 col-form-label text-md-right">Teléfono/Celular:</label>
  
                      <div class="col-md-8">
                          <input id="__celular" type="number" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" required>
                      </div>
                      @if ($errors->has('celular'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('celular') }}</strong>
                      </span>
                  @endif
                  </div>     
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
          </div>
        </form>
        </div>
      </div>
    </div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Usuarios.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>
@endsection