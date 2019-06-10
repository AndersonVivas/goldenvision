<input id="pa_id" class="form-control" type="hidden" value={{ $pa_id }}>
@section('title','Medidas Oculares') 
@extends('layouts.app2')

@section('content')
 <div class="container-fluid">
    <div class="row justify-content-center " style="margin-bottom: 15px" >
        <div class="col-md-11" >
            <div class="row">
                <div class="card">                    
                    <div class="card-body">
                        <h6 class="card-title"><strong style="color:#2E519f"><ion-icon name="folder-open" style="color:#b49b3e; font-size: 20px"></ion-icon> RX en Uso</strong></h6>  
                    @if ($rxanterior<>null)
                       @foreach ($rxanterior as $ran)
                       @if ($ran->te_examen=='Rx-Final')
                       <div class="row">    
                               <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                   <small for="ODesru">ESF:</small> 
                                   <div class="form-group">
                                       <small for="ODesru">OD:</small>
                                       <input id="ODesru" class="form-control form-control-sm" value="{{ $ran->pivot->mo_esfod }}" type="text" disabled>                                    
                                       <small for="OIesru">OI:</small>
                                       <input id="OIesru" class="form-control form-control-sm" value="{{ $ran->pivot->mo_esfoi }}" type="text"disabled>
                                   </div>              
                               </div> 
                               <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                   <small for="ODesru">CILINDRO:</small>  
                                   <div class="form-group">
                                       <small for="ODciru">OD:</small>
                                       <input id="ODciru" class="form-control form-control-sm" value="{{ $ran->pivot->mo_ciod }}" type="text"disabled>
                                       <small for="OIciru">OI:</small>
                                       <input id="OIciru" class="form-control form-control-sm" value="{{ $ran->pivot->mo_cioi }}" type="text"disabled>                                                      
                                   </div>
                               </div>
                               <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                   <small>EJE:</small>
                                       <div class="form-group"> 
                                           <small for="ODesru">OD:</small>
                                           <input id="ODesru" class="form-control form-control-sm" value="{{ $ran->pivot->mo_ejod }}" type="text"disabled>                                    
                                           <small for="OIesru">OI:</small>
                                           <input id="OIesru" class="form-control form-control-sm" value="{{ $ran->pivot->mo_ejoi }}" type="text"disabled>                                                     
                                       </div>
                               </div>
                               <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4 offset-xl-2 offset-lg-1 offset-md-0 ">
                                   <small>AV/L con corrección</small>
                                   <div class="form-group">
                                       <small for="ODavlru">OD:</small>
                                       <input id="ODavlru" class="form-control form-control-sm" type="text" value="{{ $ran->pivot->mo_avlod }}" disabled>                                    
                                       <small for="OIavlru">OI:</small>
                                       <input id="OIavlru" class="form-control form-control-sm" type="text" value="{{ $ran->pivot->mo_avloi }}" disabled>                                                     
                                   </div>
                               </div>
                               <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                   <small>AV/C con corrección</small>
                                   <div class="form-group"> 
                                       <small for="ODesru">OD:</small>
                                       <input id="ODesru" class="form-control form-control-sm" type="text" value="{{ $ran->pivot->mo_avcod }}" disabled>                                    
                                       <small for="OIesru">OI:</small>
                                       <input id="OIesru" class="form-control form-control-sm" type="text" value="{{ $ran->pivot->mo_avcod }}" disabled>                                                     
                                   </div>
                               </div>
                               <div class="col-md-4 col-lg-3 col-xl-2 col-sm-4 ">
                               @if ($lentesconsulta != null)
                                 <small style="color:brown">El paciente utiliza lentes:&nbsp; </small>   
                                  @foreach ($lentesconsulta as $lente)
                                 <small style="color:brown">de  {{ $lente->lente->le_tipo   }}:&nbsp;{{ $lente->cle_caracteristica   }},&nbsp; </small>
                                 @endforeach                                    
                               @else
                                 <small style="color:brown">No tiene registrado lentes</small>
                               @endif 
                               </div>                                 
                           </div>                                
                       @endif
                   @endforeach                            
                @else 
                   <div class="col-md-12 ">                                
                        <div class="form-group"> 
                                        <h1 for="ODesru" style="color:cornflowerblue">No existe datos Anteriores</h1>
                                      </div>
                                </div>    
                @endif                                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
   <form action="guardarmedidas" method="POST" autocomplete="off">
        @csrf   
       <input id="pa_id" class="form-control" name="pa_id" type="hidden" value={{ $pa_id }} >
       <div class="row"></div>
    <!-- parte superior-->
    <div class="row " >
        <div class="col-md-8" >
            <div class="row  form-sm">  
                    <div class="col-md-11 offset-md-1">              
                        <input id="co_motivo" placeholder="Motivo de Consulta" onkeyup="mayus(this);" name="co_motivo" class="form-control form-control-sm" type="text">
                        <span class="invalid-feedback" role="alert" id="errormotivo">
                        <strong id="mensajeanamnesis"></strong>
                        </span> 
                    
                </div> 
            </div> 
            <div class="row  form-sm" style="margin-top: 10px">                 
                <div class="col-md-11 offset-md-1">         
                    <input id="co_anamnesis" placeholder="Anamnesis" onkeyup="mayus(this);" name="co_anamnesis" class="form-control form-control-sm" type="text">
                    <span class="invalid-feedback" role="alert" id="error-apellido">
                        <strong id="mensajeanamnesis"></strong>
                    </span> 
                </div>
            </div>                  
            <div class="row  form-sm " style="margin-top: 10px">                                   
                    <div class="col-md-11 offset-md-1">                                         
                        <input id="co_ishihara" placeholder="Test de Colores (ISHIHARA)" onkeyup="mayus(this);" name="co_ishihara" class="form-control form-control-sm" type="text">
                        <span class="invalid-feedback" role="alert" id="errorishihara">
                            <strong id="mensajeanamnesis"></strong>
                        </span> 
                    </div>
                </div>                      
            
        </div>
        <div class="col-md-3">            
            <div class="row">
               <button type="button" data-toggle="modal" data-target="#ccorporal" class="btn btn-outline-primary btn-rounded waves-effect" style="width:250px"><ion-icon name="walk"></ion-icon>OBSERVACION CORPORAL</button> 
            </div>
            <div class="row">
              <button type="button" data-toggle="modal" data-target="#keratrometria" class="btn btn-outline-primary btn-rounded waves-effect" style="width:250px"><ion-icon name="paper"></ion-icon>KERATROMETRIA</button>
            </div>                           
        </div>
    </div>

    <!-- parte inferior-->
    <div class="row" style="margin-top: 20px">
        <div class="col-md-6 col-lg-4 col-xl-3 col-sm-12 " style="margin-bottom: 10px">            
            <div class="card">                
        <div class="card-body">
        <h5 class="card-title"><strong style="color:#2E519f"><ion-icon name="body" style="color:#b49b3e; font-size: 20px"></ion-icon> Sintomas</strong></h5>
            <div class="form-check">
               @foreach ($sintomas as $sintoma)
               <input type="checkbox" name="sintomas[]" value={{  $sintoma->si_id }} id={{  $sintoma->si_sintoma }}>
               <label class="form-check-label" for={{  $sintoma->si_sintoma }}>{{  $sintoma->si_sintoma }}</label></br>
               @endforeach
            </div>
            <input id="otrossintoma" name="otrossintomas" class="form-control" type="text" placeholder="Otro sintoma">
            </div>
        </div>
            </div>
        
        <div class="col-md-12 col-lg-12 col-xl-8 col-sm-12">             
            <div class="row" style="margin-bottom: 10px" >
                    <div class="card">                            
                            <div class="card-body"> 
                                    <h6 class="card-title"><strong style="color:#2E519f"><ion-icon name="eye" style="color:#b49b3e; font-size: 20px"></ion-icon> RETINOSCOPÍA</strong></h6>                      
                                    <div class="row"> 
                                            <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>AV/L sin corrección:</small>
                                                    <div class="form-group">
                                                        <small for="ODavlsincorrre">OD:</small>
                                                        <input id="ODavlsincorrre" tabindex="1" name="ODavlsincorrre" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavlsincorrre">OI:</small>
                                                        <input id="OIavlsincorrre" tabindex="2" name="OIavlsincorrre" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>AV/C sin corrección:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODavcsincorrre">OD:</small>
                                                        <input id="ODavcsincorrre" tabindex="1" name="ODavcsincorrre" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavcsincorrre">OI:</small>
                                                        <input id="OIavcsincorrre" tabindex="2" name="OIavcsincorrre" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                        </div>   
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                            <small for="ODesru">ESF:</small> 
                                            <div class="form-group">
                                                <small for="ODesre">OD:</small>
                                                <input id="ODesre" name="ODesre" tabindex="1" class="form-control form-control-sm" type="text">                                    
                                                <small for="OIesre">OI:</small>
                                                <input id="OIesre" name="OIesre" tabindex="2" class="form-control form-control-sm" type="text">
                                            </div>              
                                        </div> 
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                            <small for="ODesru">CILINDRO:</small>  
                                            <div class="form-group">
                                                <small for="ODcire">OD:</small>
                                                <input id="ODcire" name="ODcire" tabindex="1" class="form-control form-control-sm" type="text">
                                                <small for="OIcire">OI:</small>
                                                <input id="OIcire" name="OIcire" tabindex="2" class="form-control form-control-sm" type="text">                                                      
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                            <small>EJE:</small>
                                                <div class="form-group"> 
                                                    <small for="ODejre">OD:</small>
                                                    <input id="ODejre" name="ODejre" tabindex="1" class="form-control form-control-sm" type="text">                                    
                                                    <small for="OIejre">OI:</small>
                                                    <input id="OIejre" name="OIejre" tabindex="2" class="form-control form-control-sm" type="text">                                                     
                                                </div>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                <small>DNP:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODdnpre">OD:</small>
                                                        <input id="ODdnpre" name="ODdnpre" tabindex="1" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIdnpre">OI:</small>
                                                        <input id="OIdnpre" name="OIdnpre" tabindex="2" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                            </div>
                                            
                                                                                     
                                    
                                            <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>ADD:</small>
                                                        <div class="form-group"> 
                                                            <small for="ODaddre">OD:</small>
                                                            <input id="ODaddre" name="ODaddre" tabindex="1" class="form-control form-control-sm" type="text">                                    
                                                            <small for="OIaddre">OI:</small>
                                                            <input id="OIaddre" name="OIaddre" tabindex="2" class="form-control form-control-sm" type="text">                                                     
                                                        </div>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                        <small>ALTURA:</small>
                                                            <div class="form-group"> 
                                                                <small for="ODalre">OD:</small>
                                                                <input id="ODalre" name="ODalre" tabindex="1" class="form-control form-control-sm" type="text">                                    
                                                                <small for="OIalre">OI:</small>
                                                                <input id="OIalre" name="OIalre" tabindex="2" class="form-control form-control-sm" type="text">                                                     
                                                            </div>
                                                    </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>AV/L con corrección</small>
                                                    <div class="form-group">
                                                        <small for="ODavlre">OD:</small>
                                                        <input id="ODavlre" name="ODavlre" tabindex="1" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavlre">OI:</small>
                                                        <input id="OIavlre" name="OIavlre" tabindex="2" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>AV/C con corrección</small>
                                                    <div class="form-group"> 
                                                        <small for="ODavcre">OD:</small>
                                                        <input id="ODavcre" name="ODavcre" tabindex="1" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavcre">OI:</small>
                                                        <input id="OIavcre" name="OIavcre" tabindex="2" class="form-control form-control-sm" type="text"d>                                                     
                                                    </div>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                <div class="form-check">
                                                     <input class="form-check-input" type="radio" name="aumdisre" id="aumentar" value="1" checked>
                                                     <label class="form-check-label" tabindex="3" for="aumentar">
                                                       Aumentar
                                                     </label>
                                                   </div>
                                                   <div class="form-check">
                                                     <input class="form-check-input" type="radio" name="aumdisre" id="disminuir" value="0">
                                                     <label class="form-check-label" tabindex="3" for="disminuir">
                                                       Disminuir
                                                     </label>
                                            </div>
                                        </div>
                                    </div>                                              
                                </div>
                            </div>
            </div>
            <div class="row" style=" margin-bottom: 10px" >
                    <div class="card">
                            <div class="card-body"> 
                                    <h6 class="card-title"><strong style="color:#2E519f"><ion-icon name="eye" style="color:#b49b3e; font-size: 20px"></ion-icon> RX-FINAL</strong>&nbsp;&nbsp;&nbsp;<button class="btn btn-sm" type="button" onclick="copiarRetinoscopia()" style="background: #9aa0a6;color: white">Copiar Retinoscopía</button></h6>                        
                                    <div class="row">  
                                            <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>AV/L sin corrección:</small>
                                                    <div class="form-group">
                                                        <small for="ODavlsincorrrx">OD:</small>
                                                        <input id="ODavlsincorrrx" tabindex="3" name="ODavlsincorrrx" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavlsincorrrx">OI:</small>
                                                        <input id="OIavlsincorrrx" tabindex="4" name="OIavlsincorrrx" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>AV/C sin corrección:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODavcsincorrrx">OD:</small>
                                                        <input id="ODavcsincorrrx" tabindex="3" name="ODavcsincorrrx" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavcsincorrrx">OI:</small>
                                                        <input id="OIavcsincorrrx" tabindex="4" name="OIavcsincorrrx" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                               </div>  
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                            <small for="ODesru">ESF:</small> 
                                            <div class="form-group">
                                                <small for="ODesrx">OD:</small>
                                                <input id="ODesrx" name="ODesrx" tabindex="3" class="form-control form-control-sm" type="text">                                    
                                                <small for="OIesrx">OI:</small>
                                                <input id="OIesrx" name="OIesrx" tabindex="4" class="form-control form-control-sm" type="text">
                                            </div>              
                                        </div> 
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                            <small for="ODesru">CILINDRO:</small>  
                                            <div class="form-group">
                                                <small for="ODcirx">OD:</small>
                                                <input id="ODcirx" name="ODcirx" tabindex="3" class="form-control form-control-sm" type="text">
                                                <small for="OIcirx">OI:</small>
                                                <input id="OIcirx" name="OIcirx" tabindex="4" class="form-control form-control-sm" type="text">                                                      
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                            <small>EJE:</small>
                                                <div class="form-group"> 
                                                    <small for="ODejrx">OD:</small>
                                                    <input id="ODejrx" name="ODejrx" tabindex="3" class="form-control form-control-sm" type="text">                                    
                                                    <small for="OIejrx">OI:</small>
                                                    <input id="OIejrx" name="OIejrx" tabindex="4" class="form-control form-control-sm" type="text">                                                     
                                                </div>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                <small>DNP:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODdnprx">OD:</small>
                                                        <input id="ODdnprx" name="ODdnprx" tabindex="3" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIdnprx">OI:</small>
                                                        <input id="OIdnprx" name="OIdnprx" tabindex="4" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                            </div>
                                           
                                                                                     
                                    
                                    
                                            <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>ADD:</small>
                                                        <div class="form-group"> 
                                                            <small for="ODaddrx">OD:</small>
                                                            <input id="ODaddrx" name="ODaddrx" tabindex="3" class="form-control form-control-sm" type="text">                                    
                                                            <small for="OIaddrx">OI:</small>
                                                            <input id="OIaddrx" name="OIaddrx" tabindex="4"  class="form-control form-control-sm" type="text">                                                     
                                                        </div>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                        <small>ALTURA:</small>
                                                            <div class="form-group"> 
                                                                <small for="ODalrx">OD:</small>
                                                                <input id="ODalrx" name="ODalrx" tabindex="3" class="form-control form-control-sm" type="text">                                    
                                                                <small for="OIalrx">OI:</small>
                                                                <input id="OIalrx" name="OIalrx" tabindex="4" class="form-control form-control-sm" type="text">                                                     
                                                            </div>
                                                    </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>AV/L con corrección</small>
                                                    <div class="form-group">
                                                        <small for="ODavlrx">OD:</small>
                                                        <input id="ODavlrx" name="ODavlrx" tabindex="3" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavlrx">OI:</small>
                                                        <input id="OIavlrx" name="OIavlrx" tabindex="4" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                                    <small>AV/C con corrección</small>
                                                    <div class="form-group"> 
                                                        <small for="ODavcrx">OD:</small>
                                                        <input id="ODavcrx" name="ODavcrx" tabindex="3" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavcrx">OI:</small>
                                                        <input id="OIavcrx" name="OIavcrx" tabindex="4" class="form-control form-control-sm" type="text"d>                                                     
                                                    </div>
                                               </div>
                                               <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                               <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="aumdisrx" id="aumentar" value="1" checked>
                                                    <label class="form-check-label" tabindex="4" for="aumentar">
                                                      Aumentar
                                                    </label>
                                                  </div>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="aumdisrx" id="disminuir" value="0">
                                                    <label class="form-check-label" tabindex="4" for="disminuir">
                                                      Disminuir
                                                    </label>
                                                  </div>
                                               </div>
                                            </div>
                                                                                 
                                </div>
            </div>
            </div>
        </div>
    </div>
        <div class="row" style="margin-top: 20px" >  
                <div class="col-xl-8 offset-xl-3 offset-md-0">
            <div class="row">
                    <div id="tipoLentes" style="margin-bottom: 15px">
                    <div class="card">
                    <div class="card-body">
                            <h6 class="card-title"><strong style="color:#2E519f"><ion-icon name="glasses" style="color:#b49b3e; font-size: 20px"></ion-icon> LENTES</strong></h6>                        
                            <div class="row">
                                <div class="col-md-5 col-lg-3 col-xl-4 col-sm-5">
                                <div>
                                    <label for="_lenteContacto" class="col-form-label">Lentes de Contacto:</label> 
                                    <select id="_lenteContacto" tabindex="4" onclick="LCavilitar()"   name="_lenteContacto" class="custom-select form-control-sm">
                                        <option value="">--Seleccione--</option>                                        
                                        @foreach ($lentesContacto as $lenteContacto)
                                        <option value={{ $lenteContacto->cle_id }}>{{ $lenteContacto->cle_caracteristica }}</option>
                                        @endforeach 
                                        <option value="">NINGUNO</option>                                                     
                                    </select>
                                    <small style="color:blue" id="mensajecontacto" name="mensaje"></small> </br>                                       
                                    <a id="nuevaLocalidad" data-toggle="modal" data-target="#lenteContacto" href="#" style="color:#2E519f"><small><ion-icon name="add-circle-outline"></ion-icon>Agregar lente de Contacto</small></a>
                                </div><div> <label for="_localidades" class=" col-form-label">Lentes de Marco:</label>   
                                    <select id="_lenteMarco"name="_lenteMarco" tabindex="4" class="custom-select form-control-sm">
                                        <option value="">--Seleccione--</option>                                        
                                        @foreach ($lentesMarco as $lenteMarco)
                                        <option   value={{ $lenteMarco->cle_id }}>{{ $lenteMarco->cle_caracteristica }}</option>
                                        @endforeach                                                     
                                    </select> 
                                    <small style="color:blue" id="mensajemarco" name="mensaje"></small>                                    
                                    <a id="nuevaLocalidad" data-toggle="modal" data-target="#lenteMarco" href="#" style="color:#2E519f"><small><ion-icon name="add-circle-outline"></ion-icon>Agregar lente de Marco</small></a>
                                 </div>
                                </div> 
                                  
                                <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <small for="ODeslc">ESF:</small> 
                                    <div class="form-group">
                                        <small for="ODeslc">OD:</small>
                                        <input id="ODeslc" name="ODeslc" tabindex="4" class="form-control form-control-sm" type="text" disabled required>                                    
                                        <small for="OIeslc">OI:</small>
                                        <input id="OIeslc" name="OIeslc" tabindex="5"  class="form-control form-control-sm" type="text" disabled required>
                                    </div>              
                                </div> 
                                <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <small for="ODesru">CILINDRO:</small>  
                                    <div class="form-group">
                                        <small for="ODcilc">OD:</small>
                                        <input id="ODcilc" name="ODcilc" tabindex="4" class="form-control form-control-sm" type="text"disabled required>
                                        <small for="OIcilc">OI:</small>
                                        <input id="OIcilc" name="OIcilc" tabindex="5" class="form-control form-control-sm" type="text"disabled required>                                                      
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <small>EJE:</small>
                                    <div class="form-group"> 
                                        <small for="ODejlc">OD:</small>
                                        <input id="ODejlc" name="ODejlc" tabindex="4" class="form-control form-control-sm" type="text"disabled required>                                    
                                        <small for="OIejlc">OI:</small>
                                        <input id="OIejlc" name="OIejlc" tabindex="5" class="form-control form-control-sm" type="text"disabled required>                                                     
                                    </div>
                                </div> 
                                                                                                              
                        </div>
                    </div>
                 </div>
                </div>  
                </div>  
            
    
            
                    
                                 
                    <div class="row ">                                   
                            <div class="col-md-12 ">
                                 <input id="co_observaciones" placeholder="Observaciones" onkeyup="mayus(this);" tabindex="5" name="co_observaciones" class="form-control " type="text">
                            </div>
                        </div> 
                        <div class="row " style="margin-top: 10px">                 
                                <div class="col-md-12">   
                                   <input id="co_recomendaciones" placeholder="Recomendaciones" onkeyup="mayus(this);" tabindex="5"  name="co_recomendaciones" class="form-control" type="text">
                                   
                                </div>
                        </div>
                        <div class="row form-group " style="margin-top: 10px">
                                <label for="pc_fecha" style="margin-left: 15px"><strong>Proxima Consulta:</strong></label>                
                                <div class="col-md-4 col-lg-3 col-xl-4 col-sm-4 ">          
                                    <input id="pc_fecha" tabindex="5"  name="pc_fecha" class="form-control form-control-sm" type="date">
                                </div>
                        </div>
        </div>   
    </div> 
                   
                  
    
    <div class="col-md-4 offset-md-8">
        <div class="row"  >
       <button type="submit" class="btn" style="background: #2E519f;color: white"><ion-icon name="save"></ion-icon>Guardar Consulta</button>
        </div>
    </div>
 </form>
</div>

<!--Caracteristicas Corporale -->
<div class="modal fade" id="ccorporal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong style="color:#2E519f"><ion-icon name="walk" style="color:#b49b3e; font-size: 20px"> </ion-icon> Características Corporales</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form >
         @csrf
         <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        <div class="modal-body">                       
              <div class="form-group">
                         
                <select id="_ccorporales"name="ccorporales" class="custom-select form-control-sm " name="su_ciudad"  data-live-search="true" required>
                    <option value="">--Seleccione una característica--</option>                                        
                    @foreach ($ccorporales as $ccorporal)
                    <option   value={{ $ccorporal->cc_id }}>{{ $ccorporal->cc_caracteristica }}</option>
                    @endforeach                                                     
                </select> 
                <span class="invalid-feedback" role="alert">
                    <strong id="mensajeCaracteristica"></strong>
                </span>    
            </div>  
                <input id="coc_observaion"  class="form-control" onkeyup="mayus(this);" type="text" name="coc_observaion">
                <span class="invalid-feedback" role="alert">
                <strong id="mensajeObservacion"></strong>
                </span>      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal" style="background: #9aa0a6;color: white">Terminar</button>
          <button type="button" onclick="AgregarCcorporal()" id='guardarLocalidad'  class="btn  addLocalidad" style="background: #2E519f;color: white">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!--Keratrometria -->
<div class="modal fade" id="keratrometria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
            @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong style="color:#2E519f"><ion-icon name="paper" style="color:#b49b3e; font-size: 20px"></ion-icon> Ingresar Keratrometría</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form >
         @csrf
         <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        <div class="modal-body"> 
                
            <div class="row">              
            
            <div class="col-md-6">
                    <div class="row" style="margin-bottom: 5px">
                    <div class="col-md-10">
                    <select id="_oj_id" class="custom-select form-control-sm " name="_oj_id"  data-live-search="true" required>
                            <option value="">--Escoja tipo de ojo--</option>                                        
                            @foreach ($ojos as $ojo)
                            <option   value={{ $ojo->oj_id }}>{{ $ojo->oj_tipo }}</option>
                            @endforeach                                                     
                        </select> 
                        <span class="invalid-feedback" role="alert">
                            <strong id="mensajeoj_id"></strong>
                        </span>  
                        </div>
                    </div>
                <div class="row" style="margin-bottom: 5px">
                    <div class="col-md-1">
                            <small>K1</small>
                    </div>
                    <div class="col-md-4">
                            <input id="ke_k1" class="form-control form-control-sm" type="text"  name="ke_k1">
                    </div>
                    <div class="col-md-4">
                            <input id="ke_grk1" class="form-control form-control-sm" type="text" name="ke_grk1">  
                    </div>                      
                </div> 
                <div class="row" style="margin-bottom: 5px">
                        <div class="col-md-1">
                                <small>K2</small>
                        </div>
                        <div class="col-md-4">
                                <input id="ke_k2" class="form-control form-control-sm" type="text" name="ke_k2">
                        </div>
                        <div class="col-md-4">
                                <input id="ke_grrs" class="form-control form-control-sm" type="text" name="ke_grrs">  
                        </div>                      
                </div>  
                <div class="row">
                        <div class="col-md-1">
                                <small>Km</small>
                        </div>
                        <div class="col-md-4">
                                <input id="ke_km" class="form-control form-control-sm" type="text" name="ke_km">
                        </div>
                        <div class="col-md-4">
                                <input id="ke_grkm" class="form-control form-control-sm" type="text" name="ke_grkm">  
                        </div>                      
                </div>                   
            </div> 
            <div class="col-md-6" style="margin-bottom: 5px">
                    <div class="row" style="margin-bottom: 5px">
                        <div class="col-md-1">
                                <small>ISV</small>
                        </div>
                        <div class="col-md-4">
                                <input id="ke_isv" class="form-control form-control-sm" type="text" name="ke_isv">
                        </div>
                        <div class="col-md-1">
                            <small>IHA</small>
                        </div>
                            <div class="col-md-4">
                                    <input id="ke_iha" class="form-control form-control-sm" type="text" name="ke_iha">  
                            </div>                      
                    </div> 
                    <div class="row" style="margin-bottom: 5px">
                            <div class="col-md-1">
                                    <small>IVA</small>
                            </div>
                            <div class="col-md-4">
                                    <input id="ke_iva" class="form-control form-control-sm" type="text" name="ke_iva">
                            </div>
                            <div class="col-md-1">
                                <small>IHD</small>
                            </div>
                                <div class="col-md-4">
                                        <input id="ke_ihd" class="form-control form-control-sm" type="text" name="ke_ihd">  
                                </div>                      
                        </div> 
                        <div class="row" style="margin-bottom: 5px">
                                <div class="col-md-1">
                                        <small>KI</small>
                                </div>
                                <div class="col-md-4">
                                        <input id="ke_ki" class="form-control form-control-sm" type="text" name="ke_ki">
                                </div>
                                <div class="col-md-1">
                                    <small>Rmin</small>
                                </div>
                                    <div class="col-md-4">
                                            <input id="ke_rmin" class="form-control form-control-sm" type="text" name="ke_rmin">  
                                    </div>                      
                            </div> 
                            <div class="row" style="margin-bottom: 5px">
                                    <div class="col-md-1">
                                            <small>CKI</small>
                                    </div>
                                    <div class="col-md-4">
                                            <input id="ke_cki" class="form-control form-control-sm" type="text" name="ke_cki">
                                    </div>
                                    <div class="col-md-1">
                                        <small>IS</small>
                                    </div>
                                        <div class="col-md-4">
                                                <input id="ke_tkc" class="form-control form-control-sm" type="text" name="ke_tkc">  
                                        </div>                      
                                </div>  
                
            </div> 
            <div class="col-md-12">
                    <div class="row" style="margin-bottom: 5px">
                            <div class="col-md-2">
                                    <small>Centro de Pupila:</small>
                            </div>
                            <div class="col-md-3">
                                    <input id="ke_paquip" class="form-control form-control-sm" type="text" name="ke_paquip" placeholder="Paqui">
                            </div>
                            <div class="col-md-3">
                                    <input id="ke_xp" class="form-control form-control-sm" type="text" name="ke_xp" placeholder="x(mm)">  
                            </div> 
                            <div class="col-md-3">
                                    <input id="ke_yp" class="form-control form-control-sm" type="text" name="ke_yp" placeholder="y(mm)">  
                            </div>                      
                    </div> 
                    <div class="row" style="margin-bottom: 5px">
                            <div class="col-md-2">
                                    <small>Posición más fina:</small>
                            </div>
                            <div class="col-md-3">
                                    <input id="ke_paquio" class="form-control form-control-sm" type="text" name="ke_paquio" placeholder="Paqui">
                            </div>
                            <div class="col-md-3">
                                    <input id="ke_xo" class="form-control form-control-sm" type="text" name="ke_xo" placeholder="x(mm)">  
                            </div> 
                            <div class="col-md-3">
                                    <input id="ke_yo" class="form-control form-control-sm" type="text" name="ke_yo" placeholder="y(mm)">  
                            </div>                      
                    </div>   
                
            </div>                      
        </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal" style="background: #9aa0a6;color: white">Terminar</button>
          <button type="button" onclick="AgregarKeratrometria()" id='guardarLocalidad'  class="btn  addLocalidad" style="background: #2E519f;color: white" >Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="lenteContacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><strong style="color:#2E519f"><ion-icon name="glasses" style="color:#b49b3e; font-size: 20px"></ion-icon> Lente de Contacto Nuevo</strong></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form >
             @csrf
             <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <div class="modal-body">              
                  <div class="form-group">
                      <label for="le_contacto">Agregue Identificador de Lente</label>
                      <input id="le_contacto"  class="form-control" onkeyup="mayus(this);" type="text" name="lo_nombre" placeholder="marca/característica de lente">
                  </div>             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-dismiss="modal" style="background: #9aa0a6;color: white">Cancelar</button>
              <button type="button" onclick="EnviarLenteC()" id='guardarLocalidad' data-dismiss="modal" class="btn addLocalidad" style="background: #2E519f;color: white">Guardar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="lenteMarco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                    @csrf
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><strong style="color:#2E519f"><ion-icon name="glasses" style="color:#b49b3e; font-size: 20px"></ion-icon>  Lente de Marco Nuevo</strong></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form >
                 @csrf
                 <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <div class="modal-body">              
                      <div class="form-group">
                          <label for="le_marco">Agregue Identificador de Lente</label>
                          <input id="le_marco"  class="form-control" onkeyup="mayus(this);" type="text" name="lo_nombre" placeholder="tipo/característica de lente">
                      </div>             
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-dismiss="modal" style="background: #9aa0a6;color: white">Cancelar</button>
                  <button type="button" onclick="EnviarLenteM()" id='guardarLocalidad' data-dismiss="modal" class="btn  addLocalidad" style="background: #2E519f;color: white">Guardar</button>
                </div>
                </form>
              </div>
            </div>
          </div>

@endsection
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>
<script type="text/javascript" src="js/Medidas.js"></script>
<script type="text/javascript" src="js/AgregarSelects.js"></script>