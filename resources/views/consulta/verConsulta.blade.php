@extends('layouts.app2')


@section('content')
<div class="container-fluid">
    <div class="row" >
        <div class="col-md-10 "> 
        <div class="card">
            
            <div class="card-body">
                    <h6 class="card-title"><strong  style="color:#2E519f"><ion-icon name="information-circle-outline" style="color:#b49b3e;font-size: 15px"></ion-icon> Información General de Consulta</strong></h6>
                <div class="row">               
                      <div class="col-md-4">
                            <small>Paciente:</small>
                            <small> {{ $consulta->paciente->pa_nombres }} {{ $consulta->paciente->pa_apellidos }}</small>
                      </div>  
                      <div class="col-md-4">
                            <small for="cedula">Cedula del Paciente:</small>
                            <small>{{ $consulta->paciente->pa_cedula }}</small>
                        </div>      
                              <div class="col-md-4">
                                    <small for="cedula">Ocupación:</small>
                                <small>{{ $consulta->paciente->pa_ocupacion }}</small>
                            </div>   
                </div>
                <div class="row">                                         
                          <div class="col-md-4">
                                <small>Opt/Oft:</small>
                                <small> {{ $consulta->usuario->us_nombres }} {{ $consulta->usuario->us_apellidos}}</small>
                          </div>                 
                              <div class="col-md-4">
                                    <small for="cedula">Sucursal de atención:</small>
                                <small>{{ $consulta->sucursal->su_ciudad }}</small>
                            </div> 
                            <div class="col-md-4">
                                    <small for="cedula">Fecha de Consulta:</small>
                                <small>{{ $consulta->co_fecha }}</small>
                            </div>   
                    </div>
                    <div class="row">
                        <div class="col-6">
                                <small>Motivo de consulta:</small>
                                <small> {{ $consulta->co_motivo }} </small>
                          
                        </div>
                        
                    </div>
                    <div class="row">
                            <div class="col-6">
                                    <small>Anamnesis:</small>
                                    <small> {{ $consulta->co_anamnesis }} </small>
                              
                            </div>
                            
                        </div>
                        <div class="row">
                                <div class="col-6">
                                        <small>Ishihara:</small>
                                        <small> {{ $consulta->co_ishihara }} </small>
                                  
                                </div>
                                
                            </div>
            </div>            
        </div>
        
        <div class="card" style="margin-top: 10px">
                <div class="card-body">
                    <h6 class="card-title"><strong style="color:#2E519f"><ion-icon name="bed" style="color:#b49b3e;font-size: 15px"></ion-icon> Enfermedades</strong></h6>
                    <div class="row">               
                          <div class="col-md-12">
                                <small>Antecedentes Familiares:</small>
                                <small> {{ $consulta->paciente->pa_antecedentesf }}</small>
                          </div>  
                          <div class="col-md-12">
                                <small for="cedula">Enfermedades Familiares:</small>
                                <small>{{ $consulta->paciente->pa_enfamiliares }}</small>
                            </div>      
                                  <div class="col-md-12">
                                        <small for="cedula">Enfermedades Personales:</small>
                                    <small>{{ $consulta->paciente->pa_enpersonales}}</small>
                                </div>   
                    </div>
                    
                </div>
            </div>
    </div>  
    <div class="col-md-2">
            <a href="medidasNuevas?id_pa={{ $consulta->pa_id }}" class="btn btn-sm" style="width:183px;background: #2E519f;color: white" ><ion-icon name="clipboard" style="font-size: 15px"></ion-icon> Agregar Consulta</a>
           <button class='btn btn-sm' onclick='generar({{ $consulta->co_id }})' style="width:183px;background: #9aa0a6;color: white;"><ion-icon name='print' style="font-size: 15px" ></ion-icon> Generar Certificado</button> 
           <a  href="imprimirConsulta?co_id={{ $consulta->co_id }}" class="btn btn-sm" style="width:183px;background: #b49b3e;color:white"><ion-icon name="clipboard" style="font-size: 15px" ></ion-icon> Imprimir esta Consulta</a>         
         </div>  
    </div> 
        
<div class="row" style="margin-top: 10px">
    <!--sintomas-->
    <div class="col-md-4" style="margin-bottom: 10px">            
        <div class="card">            
            <div class="card-body">
                    <h6 class="card-title"><strong style="color:#2E519f"><ion-icon name="body" style="color:#b49b3e;font-size: 15px"></ion-icon> Sintomas Presentados</strong></h6>
                <table id="sintomas" class="table table-sm">            
                    <tbody>
                        @foreach ($consulta->sintomas as $sintoma)
                        <tr><td>{{ $sintoma->si_sintoma }}</td></tr>                         
                        @endforeach
                    </tbody>
                </table>     
            </div>
        </div>
        <div class="card" style="margin-top: 10px">
              <div class="card-body">
                    <h6 class="card-title"><strong style="color:#2E519f"><ion-icon name="walk" style="color:#b49b3e;font-size: 15px"></ion-icon> Observaciones Corporales</strong></h6>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Caracteristica</th>
                            <th>Observación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consulta->caracteristicasCor as $observacion)
                        <tr><td>{{ $observacion->cc_caracteristica }}</td>
                        <td>{{ $observacion->pivot->coc_observaion }}</td></tr>                         
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            <div class="card" style="margin-top: 10px">
                     <div class="card-body">
                        <h6 class="card-title"><strong style="color:#2E519f"><ion-icon name="glasses" style="color:#b49b3e;font-size: 15px"></ion-icon> Lentes en Uso</strong></h6>
                        @foreach ($consulta->lentes as $lente)
                        <label>Lentes de {{ $lente->lente->le_tipo }}:  {{ $lente->cle_caracteristica }}</label> 
                                            
                        @endforeach
                    </div>
            </div>  
        
    </div>
        <!--examene-->
    
    <div class="col-md-8">   
        @foreach ($consulta->examenes as $examen)        
            @if ($examen->te_examen == 'L/C')
            
                <div class="row" style="margin-bottom: 10px" >
                    <div class="card"> 
                        <div class="card-body"> 
                                <h6 class="card-title"><strong style="color:#2E519f"><ion-icon name="glasses" style="color:#b49b3e;font-size: 15px"></ion-icon> {{ $examen->te_examen }}</strong></h6>                      
                            <div class="row">    
                                <div class="col-md-2">
                                    <small for="ODesru">ESF:</small> 
                                    <div class="form-group">
                                        <small for="ODesre">OD:</small>
                                        <input id="ODesre" name="ODesre" value='{{ $examen->pivot->mo_esfod }}' class="form-control form-control-sm" type="text" disabled>                                    
                                        <small for="OIesre">OI:</small>
                                        <input id="OIesre" name="OIesre" value='{{ $examen->pivot->mo_esfoi }}' class="form-control form-control-sm" type="text" disabled>
                                    </div>              
                                </div> 
                                <div class="col-md-2">
                                    <small for="ODesru">CILINDRO:</small>  
                                    <div class="form-group">
                                        <small for="ODcire">OD:</small>
                                        <input id="ODcire" name="ODcire" value='{{ $examen->pivot->mo_ciod }}' class="form-control form-control-sm" type="text" disabled>
                                        <small for="OIcire">OI:</small>
                                        <input id="OIcire" name="OIcire" value='{{ $examen->pivot->mo_cioi }}' class="form-control form-control-sm" type="text" disabled>                                                      
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <small>EJE:</small>
                                        <div class="form-group"> 
                                            <small for="ODejre">OD:</small>
                                            <input id="ODejre" name="ODejre" value='{{ $examen->pivot->mo_ejod }}' class="form-control form-control-sm" type="text" disabled>                                    
                                            <small for="OIejre">OI:</small>
                                            <input id="OIejre" name="OIejre" value='{{ $examen->pivot->mo_ejoi }}' class="form-control form-control-sm" type="text" disabled>                                                     
                                        </div>
                                </div>                                                           
                            </div>
                        </div>
                    </div>
                </div>
                    
                
            @else
                <div class="row" style="margin-bottom: 10px" >
                    <div class="card">                        
                            <div class="card-body"> 
                                    <h6 class="card-title"><strong style="color:#2E519f"><ion-icon name="eye" style="color:#b49b3e;font-size: 15px"></ion-icon> {{ $examen->te_examen }}</strong></h6>
                                    <div class="row">  
                                            <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>AV/L sin corrección:</small>
                                                    <div class="form-group">
                                                        <small for="ODavlsincorrrx">OD:</small>
                                                        <input id="ODavlsincorrrx" tabindex="3" value='{{ $examen->pivot->mo_avlodsncorr }}' name="ODavlsincorrrx" class="form-control form-control-sm" type="text" disabled>                                    
                                                        <small for="OIavlsincorrrx">OI:</small>
                                                        <input id="OIavlsincorrrx" tabindex="4" value='{{ $examen->pivot->mo_avloisncorr }}' name="OIavlsincorrrx" class="form-control form-control-sm" type="text" disabled>                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>AV/C sin corrección:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODavcsincorrrx">OD:</small>
                                                        <input id="ODavcsincorrrx" tabindex="3" value='{{ $examen->pivot->mo_avcodsncorr }}' name="ODavcsincorrrx" class="form-control form-control-sm" type="text" disabled>                                    
                                                        <small for="OIavcsincorrrx">OI:</small>
                                                        <input id="OIavcsincorrrx" tabindex="4" value='{{ $examen->pivot->mo_avcoisncorr }}' name="OIavcsincorrrx" class="form-control form-control-sm" type="text" disabled>                                                     
                                                    </div>
                                               </div>  
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                            <small for="ODesru">ESF:</small> 
                                            <div class="form-group">
                                                <small for="ODesrx">OD:</small>
                                                <input id="ODesrx" name="ODesrx" value='{{ $examen->pivot->mo_esfod }}'  tabindex="3" class="form-control form-control-sm" type="text" disabled>                                    
                                                <small for="OIesrx">OI:</small>
                                                <input id="OIesrx" name="OIesrx" value='{{ $examen->pivot->mo_esfoi }}' tabindex="4" class="form-control form-control-sm" type="text" disabled>
                                            </div>              
                                        </div> 
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                            <small for="ODesru">CILINDRO:</small>  
                                            <div class="form-group">
                                                <small for="ODcirx">OD:</small>
                                                <input id="ODcirx" name="ODcirx" tabindex="3" value='{{ $examen->pivot->mo_ciod }}' class="form-control form-control-sm" type="text" disabled>
                                                <small for="OIcirx">OI:</small>
                                                <input id="OIcirx" name="OIcirx" tabindex="4" value='{{ $examen->pivot->mo_cioi }}' class="form-control form-control-sm" type="text" disabled>                                                      
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                            <small>EJE:</small>
                                                <div class="form-group"> 
                                                    <small for="ODejrx">OD:</small>
                                                    <input id="ODejrx" name="ODejrx" tabindex="3" value='{{ $examen->pivot->mo_ejod }}' class="form-control form-control-sm" type="text" disabled>                                    
                                                    <small for="OIejrx">OI:</small>
                                                    <input id="OIejrx" name="OIejrx" tabindex="4" value='{{ $examen->pivot->mo_ejoi }}' class="form-control form-control-sm" type="text" disabled>                                                     
                                                </div>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                <small>DNP:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODdnprx">OD:</small>
                                                        <input id="ODdnprx" name="ODdnprx" tabindex="3" value='{{ $examen->pivot->mo_dnpod }}' class="form-control form-control-sm" type="text" disabled>                                    
                                                        <small for="OIdnprx">OI:</small>
                                                        <input id="OIdnprx" name="OIdnprx" tabindex="4" value='{{ $examen->pivot->mo_dnpoi }}' class="form-control form-control-sm" type="text" disabled>                                                     
                                                    </div>
                                            </div>
                                           
                                                                                     
                                    
                                    
                                            <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>ADD:</small>
                                                        <div class="form-group"> 
                                                            <small for="ODaddrx">OD:</small>
                                                            <input id="ODaddrx" name="ODaddrx" value='{{ $examen->pivot->mo_addod }}' tabindex="3" class="form-control form-control-sm" type="text" disabled>                                    
                                                            <small for="OIaddrx">OI:</small>
                                                            <input id="OIaddrx" name="OIaddrx" value='{{ $examen->pivot->mo_addoi }}' tabindex="4"  class="form-control form-control-sm" type="text" disabled>                                                     
                                                        </div>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                        <small>ALTURA:</small>
                                                            <div class="form-group"> 
                                                                <small for="ODalrx">OD:</small>
                                                                <input id="ODalrx" name="ODalrx" value='{{ $examen->pivot->mo_alturaod }}' tabindex="3" class="form-control form-control-sm" type="text" disabled>                                    
                                                                <small for="OIalrx">OI:</small>
                                                                <input id="OIalrx" name="OIalrx" value='{{ $examen->pivot->mo_alturaoi }}' tabindex="4" class="form-control form-control-sm" type="text" disabled>                                                     
                                                            </div>
                                                    </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>AV/L con corrección</small>
                                                    <div class="form-group">
                                                        <small for="ODavlrx">OD:</small>
                                                        <input id="ODavlrx" name="ODavlrx" value='{{ $examen->pivot->mo_avlod }}' tabindex="3" class="form-control form-control-sm" type="text" disabled>                                    
                                                        <small for="OIavlrx">OI:</small>
                                                        <input id="OIavlrx" name="OIavlrx" value='{{ $examen->pivot->mo_avloi }}' tabindex="4" class="form-control form-control-sm" type="text" disabled>                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>AV/C con corrección</small>
                                                    <div class="form-group"> 
                                                        <small for="ODavcrx">OD:</small>
                                                        <input id="ODavcrx" name="ODavcrx" value='{{ $examen->pivot->mo_avcod }}' tabindex="3" class="form-control form-control-sm" type="text" disabled>                                    
                                                        <small for="OIavcrx">OI:</small>
                                                        <input id="OIavcrx" name="OIavcrx" value='{{ $examen->pivot->mo_avcoi }}' tabindex="4" class="form-control form-control-sm" type="text" disabled>                                                     
                                                    </div>
                                               </div>
                                               <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    @if ( $examen->pivot->mo_aumentar==0 )
                                                    <label class="form-check-label" for="disminuir">
                                                        Disminuir
                                                    </label>
                                                @else
                                                    <label class="form-check-label" for="disminuir">
                                                        Aumentar
                                                    </label>        
                                                @endif 
                                               </div>
                                            </div>

                           
                                    
                                
                            </div>
                        </div> 
                        
                </div>           
            @endif
        @endforeach        
    <div class="row">
        
        @foreach ($consulta->ojos as $keratrometria)
        <h4>Keratometria</h4>   
        
    <div class="card">            
            <div class="card-body">
                    <h6 class="card-title"><strong><ion-icon name="eye"></ion-icon>{{ $keratrometria->oj_tipo }}</strong></h6>                                        
                    <div class="row">
                            <div class="col-md-6">
                               <div class="row" style="margin-bottom: 5px">
                                    <div class="col-md-2">
                                            <small>K1</small>
                                    </div>
                                    <div class="col-md-4">
                                            <input id="ke_k1" value="{{ $keratrometria->pivot->ke_k1 }}" class="form-control form-control-sm" type="text"  name="ke_k1" disabled>
                                    </div>
                                    <div class="col-md-4">
                                            <input id="ke_grk1" value="{{ $keratrometria->pivot->ke_grk1 }}" class="form-control form-control-sm" type="text" name="ke_grk1" disabled>  
                                    </div>                      
                                </div> 
                                <div class="row" style="margin-bottom: 5px">
                                        <div class="col-md-2">
                                                <small>K2</small>
                                        </div>
                                        <div class="col-md-4">
                                                <input id="ke_k2" value="{{ $keratrometria->pivot->ke_k2 }}" class="form-control form-control-sm" type="text" name="ke_k2" disabled>
                                        </div>
                                        <div class="col-md-4">
                                                <input id="ke_grrs" value="{{ $keratrometria->pivot->ke_grrs }}" class="form-control form-control-sm" type="text" name="ke_grrs" disabled>  
                                        </div>                      
                                </div>  
                                <div class="row">
                                        <div class="col-md-2">
                                                <small>Km</small>
                                        </div>
                                        <div class="col-md-4">
                                                <input id="ke_km" value="{{ $keratrometria->pivot->ke_km }}" class="form-control form-control-sm" type="text" name="ke_km" disabled>
                                        </div>
                                        <div class="col-md-4">
                                                <input id="ke_grkm" value="{{ $keratrometria->pivot->ke_grkm }}" class="form-control form-control-sm" type="text" name="ke_grkm" disabled>  
                                        </div>                      
                                </div>                   
                            </div> 
                            <div class="col-md-6" style="margin-bottom: 5px">
                                    <div class="row" style="margin-bottom: 5px">
                                        <div class="col-md-2">
                                                <small>ISV</small>
                                        </div>
                                        <div class="col-md-4">
                                                <input id="ke_isv" value="{{ $keratrometria->pivot->ke_isv }}" class="form-control form-control-sm" type="text" name="ke_isv" disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <small>IHA</small>
                                        </div>
                                            <div class="col-md-4">
                                                    <input id="ke_iha" value="{{ $keratrometria->pivot->ke_iha }}" class="form-control form-control-sm" type="text" name="ke_iha" disabled>  
                                            </div>                      
                                    </div> 
                                    <div class="row" style="margin-bottom: 5px">
                                            <div class="col-md-2">
                                                    <small>IVA</small>
                                            </div>
                                            <div class="col-md-4">
                                                    <input id="ke_iva" value="{{ $keratrometria->pivot->ke_iva }}" class="form-control form-control-sm" type="text" name="ke_iva" disabled>
                                            </div>
                                            <div class="col-md-2">
                                                <small>IHD</small>
                                            </div>
                                                <div class="col-md-4">
                                                        <input id="ke_ihd" value="{{ $keratrometria->pivot->ke_ihd }}" class="form-control form-control-sm" type="text" name="ke_ihd" disabled>  
                                                </div>                      
                                        </div> 
                                        <div class="row" style="margin-bottom: 5px">
                                                <div class="col-md-2">
                                                        <small>KI</small>
                                                </div>
                                                <div class="col-md-4">
                                                        <input id="ke_ki" value="{{ $keratrometria->pivot->ke_ki }}" class="form-control form-control-sm" type="text" name="ke_ki" disabled>
                                                </div>
                                                <div class="col-md-2">
                                                    <small>Rmin</small>
                                                </div>
                                                    <div class="col-md-4">
                                                            <input id="ke_rmin" value="{{ $keratrometria->pivot->ke_rmin }}" class="form-control form-control-sm" type="text" name="ke_rmin" disabled>  
                                                    </div>                      
                                            </div> 
                                            <div class="row" style="margin-bottom: 5px">
                                                    <div class="col-md-2">
                                                            <small>CKI</small>
                                                    </div>
                                                    <div class="col-md-4">
                                                            <input id="ke_cki" value="{{ $keratrometria->pivot->ke_cki }}" class="form-control form-control-sm" type="text" name="ke_cki" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <small>IS</small>
                                                    </div>
                                                        <div class="col-md-4">
                                                                <input id="ke_tkc" value="{{ $keratrometria->pivot->ke_tkc }}" class="form-control form-control-sm" type="text" name="ke_tkc" disabled>  
                                                        </div>                      
                                                </div>  
                                
                            </div> 
                            <div class="col-md-12">
                                    <div class="row" style="margin-bottom: 5px">
                                            <div class="col-md-2">
                                                    <small>Centro de Pupila:</small>
                                            </div>
                                            <div class="col-md-3">
                                                    <input id="ke_paquip" value="{{ $keratrometria->pivot->ke_paquip }}" class="form-control form-control-sm" type="text" name="ke_paquip" placeholder="Paqui" disabled>
                                            </div>
                                            <div class="col-md-3">
                                                    <input id="ke_xp" value="{{ $keratrometria->pivot->ke_xp }}" class="form-control form-control-sm" type="text" name="ke_xp" placeholder="x(mm)" disabled>  
                                            </div> 
                                            <div class="col-md-3">
                                                    <input id="ke_yp" value="{{ $keratrometria->pivot->ke_yp }}" class="form-control form-control-sm" type="text" name="ke_yp" placeholder="y(mm)" disabled>  
                                            </div>                      
                                    </div> 
                                    <div class="row" style="margin-bottom: 5px">
                                            <div class="col-md-2">
                                                    <small>Posición más fina:</small>
                                            </div>
                                            <div class="col-md-3">
                                                    <input id="ke_paquio" value="{{ $keratrometria->pivot->ke_paquio }}" class="form-control form-control-sm" type="text" name="ke_paquio" placeholder="Paqui" disabled>
                                            </div>
                                            <div class="col-md-3">
                                                    <input id="ke_xo" value="{{ $keratrometria->pivot->ke_xo }}" class="form-control form-control-sm" type="text" name="ke_xo" placeholder="x(mm)" disabled>  
                                            </div> 
                                            <div class="col-md-3">
                                                    <input id="ke_yo" value="{{ $keratrometria->pivot->ke_yo }}" class="form-control form-control-sm" type="text" name="ke_yo" placeholder="y(mm)" disabled>  
                                            </div>                      
                                    </div>   
                                
                            </div>                      
                        </div> 
            </div>
        </div>
        @endforeach
    </div>                                             
    </div>
</div>
<div class="row">
    <div class="col-12">
            <small for="cedula">Observaciones:</small>
            <small>{{ $consulta->co_observaciones }}</small>
    </div>
</div>
<div class="row">
        <div class="col-12">
                <small for="cedula">Recomendaciones:</small>
                <small>{{ $consulta->co_recomendaciones }}</small>
        </div>
    </div>
</div>
@include('consulta.generarCertificado') 
<script type="text/javascript" src="js/BuscarPaciente.js"></script>



@endsection