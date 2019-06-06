@extends('layouts.app2')

@section('content')
<div class="container-fluid">
    <div class="row">
        <h3 style="color:#2E519f">Proximas Consultas</h3>
    </div>
    <div class="row" id="__proximasConsultas">        
    
        <table class="table table-sm table-responsive-md table-bordered">
                <thead>
                    <tr>
                       <th><strong style="color:#2E519f"><ion-icon style="color:#b49b3e;font-size: 15px" name="calendar"></ion-icon> Consulta Anterior</strong></th>
                       <th><strong style="color:#2E519f"><ion-icon style="color:#b49b3e;font-size: 15px" name="person"></ion-icon> Paciente</strong></th>
                       <th><strong style="color:#2E519f"><ion-icon style="color:#b49b3e;font-size: 15px" name="phone-portrait"></ion-icon> Numero de teléfono</strong></th>
                       <th><strong style="color:#2E519f"><ion-icon style="color:#b49b3e;font-size: 15px" name="mail"></ion-icon> E-mail</strong></th>
                       <th><strong style="color:#2E519f"><ion-icon style="color:#b49b3e;font-size: 15px" name="calendar"></ion-icon> Proxima consulta</strong> </th>
                       <th><strong style="color:#2E519f"><ion-icon style="color:#b49b3e;font-size: 15px" name="alert"></ion-icon> Notificar</strong></th>
                    </tr>
                </thead>
                <tbody>
                 
                        @foreach ($consultas as $consulta)
                        <tr>
                        <td>{{ $consulta->co_fecha }}</td>
                        <td>{{ $consulta->paciente->pa_nombres }} {{ $consulta->paciente->pa_apellidos }}</td>
                        <td>{{ $consulta->paciente->pa_telefono }}</td>
                        <td>{{ $consulta->paciente->pa_correo }}</td>
                        <td>{{ $consulta->pc_fecha }}</td>
                        <td><button class="btn btn-sm" style="background: #2E519f;color:white" type="button" onclick="verificarConsulta({{ $consulta->co_id }})"><ion-icon name="done-all"></ion-icon>Notificado</button></td>                            
                    </tr>
                        @endforeach
                        
                    
                </tbody>
            </table>
        </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/BuscarPaciente.js"></script>
@endsection