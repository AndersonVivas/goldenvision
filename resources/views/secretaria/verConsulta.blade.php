<form method="post" action="generarPedido">
    <input class="form-control" type="hidden" name="co_id" value="{{ $consulta->co_id }}">
@csrf
@foreach ($consulta->examenes as $examen)        
           
            @if($examen->te_examen == 'Rx-Final')
                <div class="row" style="margin-bottom: 10px" >
                    <div class="card">                        
                            <div class="card-body"> 
                                    <h6 class="card-title" style="color:#2E519f"><strong><ion-icon name="eye" style="color:#b49b3e; font-size: 20px"></ion-icon>{{ $examen->te_examen }}</strong></h6>
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
            
            @if ($examen->te_examen == 'L/C')            
            <div class="row" style="margin-bottom: 10px" >
                <div class="card"> 
                    <div class="card-body"> 
                            <h6 class="card-title"><strong style="color:#2E519f"><ion-icon name="glasses" style="color:#b49b3e; font-size: 20px"></ion-icon>{{ $examen->te_examen }}</strong></h6>                      
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
            
        @endif
        
        @endforeach
        
        <div class="row">
                <div id="tipoLentes" style="margin-bottom: 15px">
                <div class="card">
                <div class="card-body">
                        <h6 class="card-title"><strong style="color:#2E519f"><ion-icon name="glasses" style="color:#b49b3e; font-size: 20px"></ion-icon> LENTES en USO</strong></h6>                        
                        <div class="row">
                            <div class="col-12">
                            @foreach ($consulta->examenes as $examen)   
                            @if ($examen->te_examen == 'L/C') 
                                     
                            <div>
                                <label for="_lenteContacto" class="col-form-label">Lentes de Contacto:</label> 
                                <select id="_lenteContacto" tabindex="4" onclick="LCavilitar()"    name="_lenteContacto" class="custom-select form-control-sm">
                                    <option value="">--Seleccione--</option>                                        
                                    @foreach ($lentesContacto as $lenteContacto)
                                    <option value={{ $lenteContacto->cle_id }}>{{ $lenteContacto->cle_caracteristica }}</option>
                                    @endforeach 
                                    <option value="">NINGUNO</option>                                                     
                                </select>
                                <small style="color:blue" id="mensajecontacto" name="mensaje"></small> </br>                                       
                                </div>
                                @endif                                            
                                @endforeach   
                                <div> <label for="_localidades" class=" col-form-label">Lentes de Marco:</label> 
                                <select id="_lenteMarco"name="_lenteMarco" tabindex="4" class="custom-select form-control-sm">
                                        <option value="">--Seleccione--</option>                                        
                                        @foreach ($lentesMarco as $lenteMarco)
                                        <option   value={{ $lenteMarco->cle_id }}>{{ $lenteMarco->cle_caracteristica }}</option>
                                        @endforeach                                                     
                                    </select>
                                <small style="color:blue" id="mensajemarco" name="mensaje"></small>                                    
                                </div>
                            </div>                                                                              
                    </div>
                </div>
             </div>
            </div>  
            </div> 
           </div>
           <div class="col-md-11 " style="text-align:end; margin-top: 30px">
                <button type="button" class="btn btn-md" style="background: #9aa0a6;color: white;" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-md" style="background: #2E519f;color: white"><ion-icon name="print"></ion-icon>
                    Generar Pedido
                </button>
            </div>
           
    </form>