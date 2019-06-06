<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  <script src="{{ asset('js/app.js') }}" defer></script>
   <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
        <div class="container">    
                <div class="row justify-content-center align-items-center" style="margin-top: 20px;margin-left: 40px">
                        <div class="col-md-4 align-self-center">
                                <img src="images/logo.png" style="width: 250px; height: 60px"/> 
                        </div></div>  
                <div class="row justify-content-center align-items-center"style="margin-top: 80px" >
                    <div class="col-lg-4 col-lg-offset-bp-4  col-sm-6 col-sm-offset-3 bp-box-no-top-padding col-xs-12">
                            <form method="POST" action="login"  aria-label="{{ __('Login') }}" autocomplete="off"> 
                        <div class="card"><div class="card-body" style="margin-top: 20px">  
                                <div class="col-md-12">
                                </div>            
                                
                                    @csrf
                                    <div class="form-group row">                                                
                                            <div class="col-md-12">                                           
                                                <select id="_su_ciudad" name="_su_ciudad" class="custom-select {{ $errors->has('su_ciudad') ? ' is-invalid' : '' }}" name="su_ciudad"  data-live-search="true" required>
                                                        <option value="">Seleccione Lugar de Trabajo</option>                                        
                                                        @foreach ($sucursales as $sucursal)
                                                         <option   value={{ $sucursal->su_id }}>{{ $sucursal->su_ciudad }}</option>
                                                        @endforeach                                                     
                                                </select> 
                                                <small style="color:blue" id="mensaje" name="mensaje"></small>
                                                @if ($errors->has('su_ciudad'))  
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('su_ciudad') }}</strong>
                                                    </span>                                      
                                            @endif
                                            <a id="nuevaLocalidad" data-toggle="modal" data-target="#sucursal" href="#" style="color:#2E519f" ><small><ion-icon name="add-circle-outline"></ion-icon>Agregar nueva sucursal</small></a>
                                            
                                            </div>
                                            
                                         </div>
            
                                    <div class="form-group row">                                        
            
                                        <div class="col-md-12">
                                            <input id="us_correo" placeholder="Correo Electronico" type="email" class="form-control{{ $errors->has('us_correo') ? ' is-invalid' : '' }}" name="us_correo" value="{{ old('us_correo') }}" required autofocus>
                                            @if ($errors->has('us_correo'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('us_correo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="us_password" placeholder="Contraseña" type="password" class="form-control{{ $errors->has('us_password') ? ' is-invalid' : '' }}" name="us_password" required>
            
                                            @if ($errors->has('us_password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('us_password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>            
                                   
            
                                    
                                
                            </div>
                            <div class="card-footer">
                                    <div class="form-group row mb-0">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-md btn-block" style="background: #2E519f;color: white">
                                                    Ingresar
                                                </button>
                                               
                                            </div>
                                        </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div> 
             
             <div class="modal fade" id="sucursal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                            @csrf
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong style="color: #2E519f"><ion-icon name="business"  style="color:#b49b3e;"></ion-icon> Agregar Sucursal</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form >
                         @csrf
                         <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                        <div class="modal-body">              
                              <div class="form-group">                                  
                                  <input id="su_ciuda" class="form-control" onkeyup="mayus(this);" type="text" name="su_ciudad" placeholder="Ingrese la Ciudad de la Sucursal">
                              </div>             
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn" data-dismiss="modal" style="background: #9aa0a6;color: white">Cancelar</button>
                          <button type="button" onclick="EnviarSucursal()" id='guardarSucursal' data-dismiss="modal" class="btn addLocalidad" style="background: #2E519f;color: white">Guardar</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
            
            <script type="text/javascript" src="js/AgregarSelects.js"></script>
</body>
</html>

