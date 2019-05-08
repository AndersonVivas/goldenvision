@extends('layouts.app2')

@section('content')
<div class="container">      
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">                                           
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">               
                    <form method="POST" action="{{ route('login') }}"  aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="form-group row">
                                <label for="rol_id" class="col-md-4 col-form-label text-md-right">Lugar de trabajo</label>      
                                <div class="col-md-4">                                           
                                    <select id="_su_ciudad" name="_su_ciudad" class="custom-select {{ $errors->has('su_ciudad') ? ' is-invalid' : '' }}" name="su_ciudad"  data-live-search="true">
                                            <option value="">--Seleccione--</option>                                        
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
                                <a id="nuevaLocalidad" data-toggle="modal" data-target="#sucursal" href="#" ><ion-icon name="add-circle-outline"></ion-icon>Agregar nueva sucursal</a>
                                
                                </div>
                                
                             </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="us_correo" type="email" class="form-control{{ $errors->has('us_correo') ? ' is-invalid' : '' }}" name="us_correo" value="{{ old('us_correo') }}" required autofocus>
                                @if ($errors->has('us_correo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('us_correo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="us_password" type="password" class="form-control{{ $errors->has('us_password') ? ' is-invalid' : '' }}" name="us_password" required>

                                @if ($errors->has('us_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('us_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <!--<div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>-->
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                               <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>      
 <div class="modal fade" id="sucursal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form >
             @csrf
             <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <div class="modal-body">              
                  <div class="form-group">
                      <label for="su_ciudad">Agregue una Localidad</label>
                      <input id="su_ciuda" class="form-control" onkeyup="mayus(this);" type="text" name="su_ciudad" placeholder="Ciudad">
                  </div>             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" onclick="EnviarSucursal()" id='guardarSucursal' data-dismiss="modal" class="btn btn-primary addLocalidad">Guardar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
@endsection
<script type="text/javascript" src="js/AgregarSelects.js"></script>
