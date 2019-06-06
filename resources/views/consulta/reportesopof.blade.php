<!DOCTYPE html>
<html lang="en" style="margin:0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Reporte</title>
</head>
<body  style="background-image: url(../images/certificado.png)">
    <div class="row" style="">
        <div class="col" style="text-align: center;margin-top: 40px">
            <h5 >REPORTE DE CONSULTAS</h5>
        </div>    
    </div>
    <div class="row" style="margin-left: 20px">        
        <small>Opt/Oft:  {{ $usuario->us_nombres }} {{ $usuario->us_apellidos }}</small>             
    </div>
    <div class="row" style="margin-left: 20px">
        <small>Fecha Inicio:  {{ $fecha_inicio }}</small>
    </div>
    <div class="row" style="margin-left: 20px">
        <small>Fecha Fin:  {{ $fecha_fin }}</small>
    </div>
    <div class="row"style="margin-left:20px; margin-bottom:30px;">
            <small>Numero de Consultas:  {{ $consultas->count() }}</small>
    </div>
    <div class="row" style="margin-left: 20px;margin-right: 20px">
        <table class="table table-sm table-bordered" >
            <thead >
                <tr>
                    <th style="color:#2E519f"><small><strong>Fecha</strong></small></th>
                    <th style="color:#2E519f"><small><strong>Sucursal</strong></small></th>
                    <th style="color:#2E519f"><small><strong>Paciente</strong></small></th>
                    <th style="color:#2E519f"><small><strong>Motivo de Consulta</strong></small></th>                    
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                <tr>
                    <td><small>{{ $consulta->co_fecha }}</small></td>
                    <td><small>{{ $consulta->sucursal->su_ciudad}}</small></td>
                    <td><small>{{ $consulta->paciente->pa_nombres }} {{ $consulta->paciente->pa_apellidos }}</small></td>
                    <td><small>{{ $consulta->co_motivo }}</small></td>
                </tr>                    
                @endforeach                
            </tbody>
        </table>
    </div>
    
    
</body>
</html>