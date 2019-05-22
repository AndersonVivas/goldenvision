<input id="pa_id" class="form-control" type="hidden" value={{ $pa_id }}>
@extends('layouts.app2')

@section('content')
 <div class="container-fluid">
    <div class="row justify-content-center " style="margin-bottom: 15px" >
        <div class="col-md-11" >
            <div class="row">
                <div class="card">
                    <div class="card-header" style="height: 35px">
                        <small>  RX EN USO</small>
                    </div>
                    <div class="card-body">  
                    @if ($rxanterior<>null)
                       @foreach ($rxanterior as $ran)
                       @if ($ran->te_examen=='Rx-Final')
                       <div class="row">    
                               <div class="col-md-2">
                                   <small for="ODesru">ESF:</small> 
                                   <div class="form-group">
                                       <small for="ODesru">OD:</small>
                                       <input id="ODesru" class="form-control form-control-sm" value="{{ $ran->pivot->mo_esfod }}" type="text" disabled>                                    
                                       <small for="OIesru">OI:</small>
                                       <input id="OIesru" class="form-control form-control-sm" value="{{ $ran->pivot->mo_esfoi }}" type="text"disabled>
                                   </div>              
                               </div> 
                               <div class="col-md-2">
                                   <small for="ODesru">CILINDRO:</small>  
                                   <div class="form-group">
                                       <small for="ODciru">OD:</small>
                                       <input id="ODciru" class="form-control form-control-sm" value="{{ $ran->pivot->mo_ciod }}" type="text"disabled>
                                       <small for="OIciru">OI:</small>
                                       <input id="OIciru" class="form-control form-control-sm" value="{{ $ran->pivot->mo_cioi }}" type="text"disabled>                                                      
                                   </div>
                               </div>
                               <div class="col-md-2">
                                   <small>EJE:</small>
                                       <div class="form-group"> 
                                           <small for="ODesru">OD:</small>
                                           <input id="ODesru" class="form-control form-control-sm" value="{{ $ran->pivot->mo_ejod }}" type="text"disabled>                                    
                                           <small for="OIesru">OI:</small>
                                           <input id="OIesru" class="form-control form-control-sm" value="{{ $ran->pivot->mo_ejoi }}" type="text"disabled>                                                     
                                       </div>
                               </div>
                               <div class="col-md-2 offset-md-2">
                                   <small>AV/L:</small>
                                   <div class="form-group">
                                       <small for="ODavlru">OD:</small>
                                       <input id="ODavlru" class="form-control form-control-sm" type="text" value="{{ $ran->pivot->mo_avlod }}" disabled>                                    
                                       <small for="OIavlru">OI:</small>
                                       <input id="OIavlru" class="form-control form-control-sm" type="text" value="{{ $ran->pivot->mo_avloi }}" disabled>                                                     
                                   </div>
                               </div>
                               <div class="col-md-2 ">
                                   <small>AV/C:</small>
                                   <div class="form-group"> 
                                       <small for="ODesru">OD:</small>
                                       <input id="ODesru" class="form-control form-control-sm" type="text" value="{{ $ran->pivot->mo_avcod }}" disabled>                                    
                                       <small for="OIesru">OI:</small>
                                       <input id="OIesru" class="form-control form-control-sm" type="text" value="{{ $ran->pivot->mo_avcod }}" disabled>                                                     
                                   </div>
                               </div>
                               @if ($lentesconsulta != null)
                                 <small style="color:brown">El paciente utiliza lentes:&nbsp; </small>   
                                  @foreach ($lentesconsulta as $lente)
                                 <small style="color:brown">de  {{ $lente->lente->le_tipo   }}:&nbsp;{{ $lente->cle_caracteristica   }},&nbsp; </small>
                                 @endforeach                                    
                               @else
                                 <small style="color:brown">No tiene registrado lentes</small>
                               @endif                                  
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
            <div class="row md-form form-sm">  
                    <div class="col-md-10 offset-md-1">
                        <label for="co_motivo">Motivo de Consulta:</label>                 
                        <input id="co_motivo" name="co_motivo" class="form-control form-control-sm" type="text">
                        <span class="invalid-feedback" role="alert" id="errormotivo">
                        <strong id="mensajeanamnesis"></strong>
                        </span> 
                    
                </div> 
            </div> 
            <div class="row md-form form-sm">                 
                <div class="col-md-10 offset-md-1">   
                <label for="co_anamnesis">Anamnesis:</label>              
                    <input id="co_anamnesis" name="co_anamnesis" class="form-control form-control-sm" type="text">
                    <span class="invalid-feedback" role="alert" id="error-apellido">
                        <strong id="mensajeanamnesis"></strong>
                    </span> 
                </div>
            </div>                  
            <div class="row md-form form-sm ">                                   
                    <div class="col-md-10 offset-md-1">
                        <label for="co_ishihara">Test de Colores (ISHIHARA):</label>                 
                        <input id="co_ishihara" name="co_ishihara" class="form-control form-control-sm" type="text">
                        <span class="invalid-feedback" role="alert" id="errorishihara">
                            <strong id="mensajeanamnesis"></strong>
                        </span> 
                    </div>
                </div>                      
            
        </div>
        <div class="col-md-4">            
            <div class="row" style="margin-top: 40px">
               <button type="button" data-toggle="modal" data-target="#ccorporal" class="btn btn-outline-primary btn-rounded waves-effect" style="width:250px">OBSERVACION CORPORAL</button> 
            </div>
            <div class="row">
              <button type="button" data-toggle="modal" data-target="#keratrometria" class="btn btn-outline-primary btn-rounded waves-effect" style="width:250px">KERATROMETRIA</button>
            </div>                           
        </div>
    </div>

    <!-- parte inferior-->
    <div class="row">
        <div class="col-md-3" style="margin-bottom: 10px">            
            <div class="card">
                <div class="card-header" style="height: 35px">
                    <small>Sintomas</small>
                </div>
        <div class="card-body">
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
        
        <div class="col-md-8">             
            <div class="row" style="margin-bottom: 10px" >
                    <div class="card">
                            <div class="card-header" style="height: 35px">
                            <small>RETINOSCOPIA</small>
                            </div>
                            <div class="card-body">                       
                                    <div class="row">    
                                        <div class="col-md-2">
                                            <small for="ODesru">ESF:</small> 
                                            <div class="form-group">
                                                <small for="ODesre">OD:</small>
                                                <input id="ODesre" name="ODesre" class="form-control form-control-sm" type="text">                                    
                                                <small for="OIesre">OI:</small>
                                                <input id="OIesre" name="OIesre" class="form-control form-control-sm" type="text">
                                            </div>              
                                        </div> 
                                        <div class="col-md-2">
                                            <small for="ODesru">CILINDRO:</small>  
                                            <div class="form-group">
                                                <small for="ODcire">OD:</small>
                                                <input id="ODcire" name="ODcire" class="form-control form-control-sm" type="text">
                                                <small for="OIcire">OI:</small>
                                                <input id="OIcire" name="OIcire" class="form-control form-control-sm" type="text">                                                      
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <small>EJE:</small>
                                                <div class="form-group"> 
                                                    <small for="ODejre">OD:</small>
                                                    <input id="ODejre" name="ODejre" class="form-control form-control-sm" type="text">                                    
                                                    <small for="OIejre">OI:</small>
                                                    <input id="OIejre" name="OIejre" class="form-control form-control-sm" type="text">                                                     
                                                </div>
                                        </div>
                                        <div class="col-md-2">
                                                <small>DNP:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODdnpre">OD:</small>
                                                        <input id="ODdnpre" name="ODdnpre" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIdnpre">OI:</small>
                                                        <input id="OIdnpre" name="OIdnpre" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                            </div>
                                            <div class="col-md-2">
                                                    <small>ADD:</small>
                                                        <div class="form-group"> 
                                                            <small for="ODaddre">OD:</small>
                                                            <input id="ODaddre" name="ODaddre" class="form-control form-control-sm" type="text">                                    
                                                            <small for="OIaddre">OI:</small>
                                                            <input id="OIaddre" name="OIaddre" class="form-control form-control-sm" type="text">                                                     
                                                        </div>
                                                </div>
                                                <div class="col-md-2">
                                                        <small>ALTURA:</small>
                                                            <div class="form-group"> 
                                                                <small for="ODalre">OD:</small>
                                                                <input id="ODalre" name="ODalre" class="form-control form-control-sm" type="text">                                    
                                                                <small for="OIalre">OI:</small>
                                                                <input id="OIalre" name="OIalre" class="form-control form-control-sm" type="text">                                                     
                                                            </div>
                                                    </div>
                                                                                     
                                    </div>
                                    <div class="row">
                                            <div class="col-md-2">
                                                    <small>AV/L:</small>
                                                    <div class="form-group">
                                                        <small for="ODavlre">OD:</small>
                                                        <input id="ODavlre" name="ODavlre" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavlre">OI:</small>
                                                        <input id="OIavlre" name="OIavlre" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-2 ">
                                                    <small>AV/C:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODavcre">OD:</small>
                                                        <input id="ODavcre" name="ODavcre" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavcre">OI:</small>
                                                        <input id="OIavcre" name="OIavcre" class="form-control form-control-sm" type="text"d>                                                     
                                                    </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-check">
                                                     <input class="form-check-input" type="radio" name="aumdisre" id="aumentar" value="1" checked>
                                                     <label class="form-check-label" for="aumentar">
                                                       Aumentar
                                                     </label>
                                                   </div>
                                                   <div class="form-check">
                                                     <input class="form-check-input" type="radio" name="aumdisre" id="disminuir" value="0">
                                                     <label class="form-check-label" for="disminuir">
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
                            <div class="card-header" style="height: 35px">
                            <small>RX-FINAL</small>
                            </div>
                            <div class="card-body">                       
                                    <div class="row">    
                                        <div class="col-md-2">
                                            <small for="ODesru">ESF:</small> 
                                            <div class="form-group">
                                                <small for="ODesrx">OD:</small>
                                                <input id="ODesrx" name="ODesrx" class="form-control form-control-sm" type="text">                                    
                                                <small for="OIesrx">OI:</small>
                                                <input id="OIesrx" name="OIesrx" class="form-control form-control-sm" type="text">
                                            </div>              
                                        </div> 
                                        <div class="col-md-2">
                                            <small for="ODesru">CILINDRO:</small>  
                                            <div class="form-group">
                                                <small for="ODcirx">OD:</small>
                                                <input id="ODcirx" name="ODcirx" class="form-control form-control-sm" type="text">
                                                <small for="OIcirx">OI:</small>
                                                <input id="OIcirx" name="OIcirx" class="form-control form-control-sm" type="text">                                                      
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <small>EJE:</small>
                                                <div class="form-group"> 
                                                    <small for="ODejrx">OD:</small>
                                                    <input id="ODejrx" name="ODejrx" class="form-control form-control-sm" type="text">                                    
                                                    <small for="OIejrx">OI:</small>
                                                    <input id="OIejrx" name="OIejrx" class="form-control form-control-sm" type="text">                                                     
                                                </div>
                                        </div>
                                        <div class="col-md-2">
                                                <small>DNP:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODdnprx">OD:</small>
                                                        <input id="ODdnprx" name="ODdnprx" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIdnprx">OI:</small>
                                                        <input id="OIdnprx" name="OIdnprx" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                            </div>
                                            <div class="col-md-2">
                                                    <small>ADD:</small>
                                                        <div class="form-group"> 
                                                            <small for="ODaddrx">OD:</small>
                                                            <input id="ODaddrx" name="ODaddrx" class="form-control form-control-sm" type="text">                                    
                                                            <small for="OIaddrx">OI:</small>
                                                            <input id="OIaddrx" name="OIaddrx" class="form-control form-control-sm" type="text">                                                     
                                                        </div>
                                                </div>
                                                <div class="col-md-2">
                                                        <small>ALTURA:</small>
                                                            <div class="form-group"> 
                                                                <small for="ODalrx">OD:</small>
                                                                <input id="ODalrx" name="ODalrx" class="form-control form-control-sm" type="text">                                    
                                                                <small for="OIalrx">OI:</small>
                                                                <input id="OIalrx" name="OIalrx" class="form-control form-control-sm" type="text">                                                     
                                                            </div>
                                                    </div>
                                                                                     
                                    </div>
                                    <div class="row">
                                            <div class="col-md-2">
                                                    <small>AV/L:</small>
                                                    <div class="form-group">
                                                        <small for="ODavlrx">OD:</small>
                                                        <input id="ODavlrx" name="ODavlrx" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavlrx">OI:</small>
                                                        <input id="OIavlrx" name="OIavlrx" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-2 ">
                                                    <small>AV/C:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODavcrx">OD:</small>
                                                        <input id="ODavcrx" name="ODavcrx" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavcrx">OI:</small>
                                                        <input id="OIavcrx" name="OIavcrx" class="form-control form-control-sm" type="text"d>                                                     
                                                    </div>
                                               </div>
                                               <div class="col-md-4">
                                               <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="aumdisrx" id="aumentar" value="1" checked>
                                                    <label class="form-check-label" for="aumentar">
                                                      Aumentar
                                                    </label>
                                                  </div>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="aumdisrx" id="disminuir" value="0">
                                                    <label class="form-check-label" for="disminuir">
                                                      Disminuir
                                                    </label>
                                                  </div>
                                               </div>
                                    </div>                                              
                                </div>
            </div>
            </div>
            <div class="row">
                    <div id="tipoLentes" style="margin-bottom: 15px">
                    <div class="card">
                    <div class="card-header" style="height: 35px">
                    <small>Lentes</small>
                    </div>
                    <div class="card-body">                       
                            <div class="row">
                                <div class="col-md-6">
                                <div>
                                    <label for="_lenteContacto" class="class=col-md-4 col-form-label">Lentes de Contacto:</label> 
                                    <select id="_lenteContacto" onclick="LCavilitar()"   name="_lenteContacto" class="custom-select form-control-sm">
                                        <option value="">--Seleccione--</option>                                        
                                        @foreach ($lentesContacto as $lenteContacto)
                                        <option value={{ $lenteContacto->cle_id }}>{{ $lenteContacto->cle_caracteristica }}</option>
                                        @endforeach 
                                        <option value="">NINGUNO</option>                                                     
                                    </select>
                                    <small style="color:blue" id="mensajecontacto" name="mensaje"></small> </br>                                       
                                    <a id="nuevaLocalidad" data-toggle="modal" data-target="#lenteContacto" href="#" ><ion-icon name="add-circle-outline"></ion-icon>Agregar lente de Contacto</a>
                                </div><div> <label for="_localidades" class="class=col-md-4 col-form-label">Lentes de Marco:</label>   
                                    <select id="_lenteMarco"name="_lenteMarco" class="custom-select form-control-sm">
                                        <option value="">--Seleccione--</option>                                        
                                        @foreach ($lentesMarco as $lenteMarco)
                                        <option   value={{ $lenteMarco->cle_id }}>{{ $lenteMarco->cle_caracteristica }}</option>
                                        @endforeach                                                     
                                    </select> 
                                    <small style="color:blue" id="mensajemarco" name="mensaje"></small>                                    
                                    <a id="nuevaLocalidad" data-toggle="modal" data-target="#lenteMarco" href="#" ><ion-icon name="add-circle-outline"></ion-icon>Agregar lente de Marco</a>
                                 </div>
                                </div>    
                                <div class="col-md-2">
                                    <small for="ODeslc">ESF:</small> 
                                    <div class="form-group">
                                        <small for="ODeslc">OD:</small>
                                        <input id="ODeslc" name="ODeslc" class="form-control form-control-sm" type="text" disabled required>                                    
                                        <small for="OIeslc">OI:</small>
                                        <input id="OIeslc" name="OIeslc" class="form-control form-control-sm" type="text" disabled required>
                                    </div>              
                                </div> 
                                <div class="col-md-2">
                                    <small for="ODesru">CILINDRO:</small>  
                                    <div class="form-group">
                                        <small for="ODcilc">OD:</small>
                                        <input id="ODcilc" name="ODcilc" class="form-control form-control-sm" type="text"disabled required>
                                        <small for="OIcilc">OI:</small>
                                        <input id="OIcilc" name="OIcilc" class="form-control form-control-sm" type="text"disabled required>                                                      
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <small>EJE:</small>
                                    <div class="form-group"> 
                                        <small for="ODejlc">OD:</small>
                                        <input id="ODejlc" name="ODejlc" class="form-control form-control-sm" type="text"disabled required>                                    
                                        <small for="OIejlc">OI:</small>
                                        <input id="OIejlc" name="OIejlc" class="form-control form-control-sm" type="text"disabled required>                                                     
                                    </div>
                                </div>                                                                                    
                        </div>
                    </div>
                 </div>
                </div>  
                </div>     
            <div class="row"  >
                    <div class="col-md-12" >
                    <div class="row md-form form-sm ">                                   
                            <div class="col-md-11 ">
                                <label for="co_observaciones">Observaciones:</label>                 
                                <input id="co_observaciones" name="co_observaciones" class="form-control form-control-sm" type="text">
                            </div>
                        </div> 
                        <div class="row md-form form-sm">                 
                                <div class="col-md-11">   
                                <label for="co_recomendaciones">Recomendaciones:</label>              
                                    <input id="co_recomendaciones" name="co_recomendaciones" class="form-control form-control-sm" type="text">
                                </div>
                        </div>
                        <div class="row form-group form-sm">
                                <label for="pc_fecha">Proxima Consulta:</label>                
                                <div class="col-md-8">          
                                    <input id="pc_fecha" name="pc_fecha" class="form-control form-control-sm" type="date">
                                </div>
                        </div>
            </div>        
    </div>    
    </div>
    <div class="col-md-4 offset-md-8">
        <div class="row"  >
       <button type="submit" class="btn btn-primary">Guardar Consulta</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Características Corporales</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form >
         @csrf
         <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        <div class="modal-body">                       
              <div class="form-group">
                    <div  role="alert" id="mensjeCcorporal" class="alert">
                            <strong id="succesMensaje"></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>  
                    </div>       
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
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="AgregarCcorporal()" id='guardarLocalidad'  class="btn btn-primary addLocalidad">Guardar</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Ingresar Keratrometria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form >
         @csrf
         <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        <div class="modal-body"> 
                <div  role="alert" id="mensjekeratrometria" class="alert">
                        <strong id="succesMensajek"></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>  
                </div>  
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
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Terminar</button>
          <button type="button" onclick="AgregarKeratrometria()" id='guardarLocalidad'  class="btn btn-primary addLocalidad">Guardar</button>
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
              <h5 class="modal-title" id="exampleModalLabel">Lente de Contacto Nuevo</h5>
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
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" onclick="EnviarLenteC()" id='guardarLocalidad' data-dismiss="modal" class="btn btn-primary addLocalidad">Guardar</button>
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
                  <h5 class="modal-title" id="exampleModalLabel">Lente de Marco Nuevo</h5>
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
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" onclick="EnviarLenteM()" id='guardarLocalidad' data-dismiss="modal" class="btn btn-primary addLocalidad">Guardar</button>
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