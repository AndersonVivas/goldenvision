@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de Usuario</div>
                <div class="card-body">
                    <form  action="usuario"  method="post" autocomplete="off">                        
                        @csrf
                    <div class="form-group row">
                        <label for="rol_id" class="col-md-4 col-form-label text-md-right">Tipo de usuario</label>      
                        <div class="col-md-6">                                                         
                            <select id="tipo" name="tipo" class="custom-select" data-live-search="true">
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

                            <div class="col-md-6">
                                <input id="us_cedula" type="text" class="form-control{{ $errors->has('us_cedula') ? ' is-invalid' : '' }}" name="us_cedula" value="{{ old('us_cedula') }}" maxlength="10" required autofocus>

                                @if ($errors->has('us_cedula'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('us_cedula') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombres:</label>

                            <div class="col-md-6">
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

                            <div class="col-md-6">
                                <input id="apellidos" onkeyup="mayus(this);" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ old('apellidos') }}" required>

                                @if ($errors->has('apellidos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico:</label>

                            <div class="col-md-6">
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

                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" required>
                            </div>
                            @if ($errors->has('celular'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('celular') }}</strong>
                            </span>
                        @endif
                        </div>                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
@endsection
<script type="text/javascript" src="js/validaciones.js"></script>