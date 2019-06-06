<!DOCTYPE html>
<html lang="en" style="margin: 0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>{{ $consulta->paciente->pa_nombres }}{{ $consulta->paciente->pa_apellidos }}</title>
</head>
<body style="background-image: url(../images/certificado.png);padding-top: 0cm;padding-left: 0cm;padding-right: 0cm; padding-bottom: 0cm;margin-bottom: 0cm" >
       
        
    </div>
    <div class="row"  >
        <div class="col-12" style="text-align:right;margin-top: 30px;margin-right: 30px;margin-left: 30px">
                <small><strong >{{  $fechaCer }}</strong></small>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="margin-top: 50px;margin-left: 30px;margin-right: 30px">
            <p style="text-align: justify"><small>{{ $descripcion }}</small> </p>
        </div>
    </div>
    <div class="row">
        <div class="col" style="margin-left: 30px">
                <small ><strong >AGUDEZA VISUAL</strong></small>
        </div>
            
    </div>
    <div class="col-10" style="margin-top: 10px">
        
   
    <div class="row offset-1">  
          
        
            @foreach ($consulta->examenes as $examen)        
                @if ($examen->te_examen == 'Rx-Final')
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th></th>
                            <th><small><strong>AV/L</strong></small></th>
                            <th><small><strong>AV/C</strong></small></th>                            
                        </tr>
                    </thead>
                        <tbody>
                            <tr>
                                <td><small><strong>OD</strong></small></td>
                                <td><small>{{ $examen->pivot->mo_avlod }}</small></td>
                                <td><small>{{ $examen->pivot->mo_avcod }}</strong></small> </td>
                            </tr>
                            <tr>
                                    <td><small><strong>OI</strong></small></td>
                                    <td><small>{{ $examen->pivot->mo_avloi }}</small></td>
                                    <td><small>{{ $examen->pivot->mo_avcoi }}</small> </td>
                            </tr>
                        </tbody>
                        <thead>
                                <tr>
                                    <th><small><strong>RX TOTAL</strong></small></th>
                                    <th><small><strong>ESF</strong></small></th>
                                    <th><small><strong>CIL</strong></small></th>
                                    <th><small><strong>EJE</strong></small></th>
                                    <th><small><strong>DNP</strong></small></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td><small><strong>OD</strong></small></td>
                                        <td><small>{{ $examen->pivot->mo_esfod }}</small></td>
                                        <td><small>{{ $examen->pivot->mo_ciod }}</strong></small> </td>
                                        <td><small>{{ $examen->pivot->mo_ejod }}</strong></small> </td>
                                        <td><small>{{ $examen->pivot->mo_dnpod }}</strong></small> </td>
                                    </tr>
                                    <tr>
                                            <td><small><strong>OI</strong></small></td>
                                            <td><small>{{ $examen->pivot->mo_esfoi }}</small></td>
                                            <td><small>{{ $examen->pivot->mo_cioi }}</strong></small> </td>
                                            <td><small>{{ $examen->pivot->mo_ejoi }}</strong></small> </td>
                                            <td><small>{{ $examen->pivot->mo_dnpoi }}</strong></small> </td>
                                        </tr>
                                </tbody>

                    </table>
                @endif
                
            @endforeach
            
        </div>
    </div>
    <div class="row">
            <div class="col-12" style="margin-left:30px;margin-right: 30px" >
                    <small><strong >TEST DE COLORES (ISHIHARA)</strong></small>
                <p style="text-align: justify"><small>{{ $ishihara }}</small> </p>
            </div>
    </div>
    <div class="row">
            <div class="col-12" style="margin-left:30px;margin-right: 30px" >
                    <small><strong >ESTRUCTURA OCULAR</strong></small>
                <p style="text-align: justify"><small>{{ $estructuraOC }}</small> </p>
            </div>
    </div>
    <div class="row">
            <div class="col-12"style="margin-left:30px;margin-right: 30px"  >
                    <small><strong >REFLEJOS PUPILARES Y PUPILAS</strong></small>
                <p style="text-align: justify"><small>{{ $reflejosPu }}</small> </p>
            </div>
    </div>
    <div class="row">
            <div class="col-12"  style="margin-left:30px;margin-right: 30px" >
                <small><strong >MOTILIDAD ESTRAOCULAR</strong></small>
                <p style="text-align: justify"><small>{{ $motilidad }}</small> </p>
            </div>
            
    </div>
    <div class="row"> 
    <div class="col-12" style="margin-left:30px;margin-right: 30px"  >
            <small><strong >Cover test (D. El.)</strong></small>
            <p style="text-align: justify"><small>{{ $coverte }}</small> </p>
        </div>
    </div>
<div class="row"> 
    <div class="col-12" style="margin-left:30px;margin-right: 30px"  >
            <small><strong >CONCLUSIONES</strong></small>
        <p style="text-align: justify"><small>{{ $conclusiones }}</small> </p>
    </div>
</div>

<div class="row" >         
        <div class="col-6" style="margin-top: 70px; margin-left:30px;margin-right: 30px" >
                <small>___________________________________</small>
            <p style="text-align: justify"><small>{{ $medico }}</small> </p>
        </div>
    </div>
    
    
</body>
</html>