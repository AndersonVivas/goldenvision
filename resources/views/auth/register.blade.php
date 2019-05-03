@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de Usuario</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('usuario') }}">
                        @csrf
                    <div class="form-group row">
                        <label for="rol_id" class="col-md-4 col-form-label text-md-right">Tipo de usuario</label>      
                        <div class="col-md-6">                                                         
                            <select id="rol_id" name="tipo" class="custom-select ">
                                <option value="">--Seleccione--</option>
                                @foreach ($roles as $rol)
                                 <option value={{ $rol->ro_id }}>{{ $rol->ro_rol }}</option>
                                @endforeach                   
                            </select>
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
                                <input id="us_nombres" onkeyup="mayus(this);" type="text" class="form-control{{ $errors->has('us_nombres') ? ' is-invalid' : '' }}" name="us_nombres" value="{{ old('us_nombres') }}" required autofocus>

                                @if ($errors->has('us_nombres'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('us_nombres') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="us_apellidos" class="col-md-4 col-form-label text-md-right">Apellidos:</label>

                            <div class="col-md-6">
                                <input id="us_apellidos" onkeyup="mayus(this);" type="text" class="form-control{{ $errors->has('us_apellidos') ? ' is-invalid' : '' }}" name="us_apellidos" value="{{ old('us_apellidos') }}" required>

                                @if ($errors->has('us_apellidos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('us_apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="us_correo" class="col-md-4 col-form-label text-md-right">Correo Electrónico:</label>

                            <div class="col-md-6">
                                <input id="us_correo" type="email" class="form-control{{ $errors->has('us_correo') ? ' is-invalid' : '' }}" name="us_correo" required>

                                @if ($errors->has('us_correo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('us_correo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="us_telefono" class="col-md-4 col-form-label text-md-right">Teléfono/Celular:</label>

                            <div class="col-md-6">
                                <input id="us_telefono" type="text" class="form-control{{ $errors->has('us_telefono') ? ' is-invalid' : '' }}" name="us_telefono" required>
                            </div>
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
