<!DOCTYPE html>
<html lang="en" style="margin: 0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Document</title>
    
    
</head>
<body style="background-image: url(../images/certificado.png);">
    <div style="margin-top: 50px;margin-left: 30px;margin-right: 30px">
    <div class="row" >
         <small>Fecha: {{ $consulta->co_fecha }}</small>
    </div>
    <div class="row">
            <small>Apellidos y Nombres: {{ $consulta->paciente->pa_apellidos }} {{ $consulta->paciente->pa_nombres }}</small>
    </div>
    <div class="row">
            <small>Fecha de Nacimiento: {{ $consulta->paciente->pa_fechanac }}</small>
    </div>
    <div class="row">
            <small>Telefono: {{ $consulta->paciente->pa_telefono }}</small>
    </div>
    <div class="row">
            <small>Actividad: {{ $consulta->paciente->pa_ocupacion }}</small>
    </div>
    <div class="row">
            <small>Direccion: {{ $consulta->paciente->localidad->lo_nombre }} ({{ $consulta->paciente->pa_direccion }}) </small>
    </div>
    <div class="row">
            <small>Motivo de Consulta: {{ $consulta->co_motivo }}</small>
    </div>
    
    @foreach ($consulta->lentes as $lente)
    <div class="row">
            
                 
                 <small>Lentes de {{ $lente->lente->le_tipo   }}: {{ $lente->cle_caracteristica   }}</small>
              
    </div>
    @endforeach
   <div class="row">
                 <div class="card">            
                        <div class="card-body">
                                <h6 class="card-title"><strong > Sintomas Presentados</strong></h6>
                            <table id="sintomas" class="table table-sm">            
                                <tbody>
                                    @foreach ($consulta->sintomas as $sintoma)
                                    <tr><td><small>{{ $sintoma->si_sintoma }}</small></td></tr>                         
                                    @endforeach
                                </tbody>
                            </table>     
                        </div>
                    </div>
       
    </div>  <div class="row">
        
                <div class="card" >
                        <div class="card-body">
                              <h6 class="card-title"> Observaciones Corporales</h6>
                          <table class="table table-sm">
                              <thead>
                                  <tr>
                                      <th><small>Caracteristica</small></th>
                                      <th><small>Observación</small></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($consulta->caracteristicasCor as $observacion)
                                  <tr><td><small>{{ $observacion->cc_caracteristica }}</small></td>
                                  <td><small>{{ $observacion->pivot->coc_observaion }}</small></td></tr>                         
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
        </div>
            
   
    
    @foreach ($consulta->examenes as $examen)     
               <div class="card" >                   
                   <div class="card-body">
                       <h6 class="card-title"><strong>{{ $examen->te_examen }}</strong></h6>
                       @if ($examen->te_examen == 'L/C')

                       <table class="table table-sm">                        
                            <thead>
                                    <tr>
                                        <th><small><strong></strong></small></th>
                                        <th><small><strong>ESF</strong></small></th>
                                        <th><small><strong>CIL</strong></small></th>
                                        <th><small><strong>EJE</strong></small></th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td><small><strong>OD</strong></small></td>
                                            <td><small>{{ $examen->pivot->mo_esfod }}</small></td>
                                            <td><small>{{ $examen->pivot->mo_ciod }}</strong></small> </td>
                                            <td><small>{{ $examen->pivot->mo_ejod }}</strong></small> </td>
                                        </tr>
                                        <tr>
                                                <td><small><strong>OI</strong></small></td>
                                                <td><small>{{ $examen->pivot->mo_esfoi }}</small></td>
                                                <td><small>{{ $examen->pivot->mo_cioi }}</strong></small> </td>
                                                <td><small>{{ $examen->pivot->mo_ejoi }}</strong></small> </td>
                                               
                                            </tr>
                                    </tbody>
                       </table>
                           
                       @else
                       <table class="table table-sm" >
                        <thead>
                            <tr>
                                <th></th>
                                <th><small><strong>AV/L sin RX</strong></small></th>
                                <th><small><strong>AV/C sin RX</strong></small></th> 
                                <th><small><strong>AV/L con RX</strong></small></th>
                                <th><small><strong>AV/C con RX</strong></small></th>                              
                            </tr>
                        </thead>
                            <tbody>
                                <tr>
                                    <td><small><strong>OD</strong></small></td>
                                    <td><small>{{ $examen->pivot->mo_avlodsncorr }}</small></td>
                                    <td><small>{{ $examen->pivot->mo_avcodsncorr }}</small> </td>
                                    <td><small>{{ $examen->pivot->mo_avcod }}</small> </td>
                                    <td><small>{{ $examen->pivot->mo_avcod }}</small> </td>
                                </tr>
                                <tr>
                                        <td><small><strong>OI</strong></small></td>
                                        <td><small>{{ $examen->pivot->mo_avloisncorr }}</small></td>
                                        <td><small>{{ $examen->pivot->mo_avcoisncorr }}</small> </td>
                                        <td><small>{{ $examen->pivot->mo_avcoi }}</small> </td>
                                        <td><small>{{ $examen->pivot->mo_avcoi }}</small> </td>
                                </tr>
                            </tbody>
                            <thead>
                                    <tr>
                                        <th><small><strong></strong></small></th>
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
                                    <thead>
                                        <tr>
                                            <th><small><strong></strong></small></th>
                                            <th><small><strong>ADD</strong></small></th>
                                            <th><small><strong>ALTURA</strong></small></th>
                                            @if ( $examen->pivot->mo_aumentar==0 )                                                    
                                            <th><small><strong>  Disminuir</strong></small></th>
                                                    
                                                    @else
                                                    
                                                        <th><small><strong>Aumentar</strong></small></th>
                                                        @endif
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td><small><strong>OD</strong></small></td>
                                                <td><small>{{ $examen->pivot->mo_addod}}</small></td>
                                                <td><small>{{ $examen->pivot->mo_alturaod }}</strong></small> </td>
                                               
                                            </tr>
                                            <tr>
                                                    <td><small><strong>OI</strong></small></td>
                                                    <td><small>{{ $examen->pivot->mo_addoi }}</small></td>
                                                    <td><small>{{ $examen->pivot->mo_alturaoi }}</small> </td>
                                                    
                                                   
                                            </tr>
                                        </tbody>
        
    
                        </table>
                           
                       @endif
                       

                   </div>
               </div>
    @endforeach

    <div class="row">
            <small>Observacines: {{ $consulta->co_observaciones }} </small>
    </div>
    <div class="row">
            <small>Recomendaciones: {{ $consulta->co_recomendaciones }}</small>
    </div>
</div>
    
</body>

</html>