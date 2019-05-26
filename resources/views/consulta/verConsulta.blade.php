@extends('layouts.app2')


@section('content')
<div class="container-fluid">
    <div class="row" >
        <div class="col-md-10 "> 
        <div class="card">
            <div class="card-header" style="height: 35px">
                <small>Información general de consulta</small>
            </div>
            <div class="card-body">
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
            </div>            
        </div>
        
        <div class="card" style="margin-top: 10px">
                <div class="card-header" style="height: 35px">
                    <small>Enfermedades</small>
                </div>
                <div class="card-body">
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
            <form method="get" action="medidasNuevas">            
               <div class="btn-group" role="group" aria-label="Button group">
                   <input id="id_pa"  class="form-control"  type="hidden" name="id_pa" value="{{ $consulta->pa_id }}">                 
                       <button type="submit" class="btn btn-primary" >Agregar Consulta</button>
                      
                   </div>
           </form> 
           <button class='btn btn-primary' onclick='generar({{ $consulta->co_id }})'>Generar Certificado</button>          
                      
       </div>  
    </div> 
        
<div class="row" style="margin-top: 10px">
    <!--sintomas-->
    <div class="col-md-4" style="margin-bottom: 10px">            
        <div class="card">
            <div class="card-header" style="height: 35px">
                <small>Sintomas</small>
            </div>
            <div class="card-body">
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
            <div class="card-header">
                <small>Observaciones Corporales</small>
            </div>
            <div class="card-body">
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
                    <div class="card-header" style="height: 35px">
                                <small>Lentes en Uso</small>
                    </div>
                    <div class="card-body"> 
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
                        <div class="card-header" style="height: 35px">
                            <small>{{ $examen->te_examen }} </small>
                        </div>
                        <div class="card-body">                       
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
                        <div class="card-header" style="height: 35px">
                            <small>{{ $examen->te_examen }} </small>
                        </div>
                            <div class="card-body">                       
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
                                    <div class="col-md-2">
                                        <small>DNP:</small>
                                        <div class="form-group"> 
                                            <small for="ODdnpre">OD:</small>
                                            <input id="ODdnpre" name="ODdnpre" value='{{ $examen->pivot->mo_dnpod }}' class="form-control form-control-sm" type="text" disabled>                                    
                                            <small for="OIdnpre">OI:</small>
                                            <input id="OIdnpre" name="OIdnpre" value='{{ $examen->pivot->mo_dnpoi }}' class="form-control form-control-sm" type="text" disabled>                                                     
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <small>ADD:</small>
                                        <div class="form-group"> 
                                            <small for="ODaddre">OD:</small>
                                            <input id="ODaddre" name="ODaddre" value='{{ $examen->pivot->mo_addod }}' class="form-control form-control-sm" type="text" disabled>                                    
                                            <small for="OIaddre">OI:</small>
                                            <input id="OIaddre" name="OIaddre" value='{{ $examen->pivot->mo_addoi }}' class="form-control form-control-sm" type="text" disabled>                                                     
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <small>ALTURA:</small>
                                        <div class="form-group"> 
                                            <small for="ODalre">OD:</small>
                                            <input id="ODalre" name="ODalre" value='{{ $examen->pivot->mo_alturaod }}' class="form-control form-control-sm" type="text" disabled>                                    
                                            <small for="OIalre">OI:</small>
                                            <input id="OIalre" name="OIalre" value='{{ $examen->pivot->mo_alturaoi }}' class="form-control form-control-sm" type="text" disabled>                                                     
                                        </div>
                                    </div>                                                                                     
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <small>AV/L:</small>
                                        <div class="form-group">
                                            <small for="ODavlre">OD:</small>
                                            <input id="ODavlre" name="ODavlre" value='{{ $examen->pivot->mo_avlod }}' class="form-control form-control-sm" type="text" disabled>                                    
                                            <small for="OIavlre">OI:</small>
                                            <input id="OIavlre" name="OIavlre" value='{{ $examen->pivot->mo_avloi }}' class="form-control form-control-sm" type="text" disabled>                                                     
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <small>AV/C:</small>
                                        <div class="form-group"> 
                                            <small for="ODavcre">OD:</small>
                                            <input id="ODavcre" name="ODavcre" value='{{ $examen->pivot->mo_avcod }}' class="form-control form-control-sm" type="text" disabled>                                    
                                            <small for="OIavcre">OI:</small>
                                            <input id="OIavcre" name="OIavcre" value='{{ $examen->pivot->mo_avcoi }}' class="form-control form-control-sm" type="text" disabled>                                                     
                                        </div>
                                    </div>
                                    <div class="col-md-4">                                                
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
        <h4>keratometria</h4>   
        
    <div class="card">
            <div class="card-header" >
                <h5>Ojo:{{ $keratrometria->oj_tipo }}</h5>
            </div>
            <div class="card-body">                
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
</div>
@include('consulta.generarCertificado') 
<script type="text/javascript" src="js/BuscarPaciente.js"></script>



@endsection