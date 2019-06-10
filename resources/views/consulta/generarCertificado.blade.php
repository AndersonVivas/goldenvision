<div class="modal fade" id="generarCer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered " role="document">
                @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Generar Certificado</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
             
            <div class="modal-body">
                
              <form action="generarCertificado" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
                  <input type="hidden" name="co_id" id="__co_id" >
                  @csrf
                  <div class="row">
                      <div class="col-md-8 " style="text-align:initial">
                      </div>
                              
              <div class="col-md-4">
                <small>ciudad y fecha de atención</small>
                <input id="fechaCer" name="fechaCer" class="form-control" type="text" style="align-content: flex-end">
              </div> 
            </div> 
              <div class="col-md-12">                
                <div class="form-group">
                  <small for="my-input">Descripción</small>
                  <textarea id="_descripcion"  name="_descripcion" class="form-control" rows="3"></textarea>
                </div>
              </div>
                <small for="my-input"><strong>AGUDEZA VISUAL</strong></small>
                <table class="table table-sm " id="tblresultado">
                    <thead>
                        <tr>
                            <th></th>
                            <th><small><strong>AV/L sin corrección</strong></small></th>
                            <th><small><strong>AV/C sin corrección</strong></small></th> 
                            <th><small><strong>AV/L con corrección</strong></small></th>
                            <th><small><strong>AV/C con corrección</strong></small></th>                            
                        </tr>                        
                    </thead>                  
                </table> 
                <div class="col-md-12">                           
                <div class="form-group">
                    <small for="my-input"><strong>TEST DE COLORES (ISHIHARA)</strong></small>
                    <input id="__ishihara" name="__ishihara" class="form-control" type="text">
                  </div>
                </div>
                <div class="col-md-12">                
                      <div class="form-group">
                          <small for="my-input"><strong>ESTRUCTURA OCULAR</strong></small>
                        <textarea id="estructuraOC" name="estructuraOC" class="form-control" rows="3">OD. NORMAL
OI.NORMAL
                        </textarea>
                      </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                    <small for="my-input"><strong>REFLEJOS PUPILARES Y PUPILAS<strong></small>
                    <input id="reflejosPu" name="reflejosPu" class="form-control" type="text" value="Pupilas iguales, responden a luz y acomodación al estímulo luminoso.">
                  </div>
                </div>
            <div class="row">
              
            
            <div class="col-md-6">
                <div class="form-group">
                    <small for="my-input"><strong>MOTILIDAD EXTRAOCULAR</strong></small>
                    <textarea id="motilidad"  name="motilidad" class="form-control" rows="3">Pupilas iguales, responden a luz y acomodación al estímulo luminoso.
DX: OD EMETROPE
     OI EMETROPE
                    </textarea>
                  </div>
            </div>            
            <div class="col-md-6">
                <div class="form-group">
                    <small for="my-input"><strong>Cover test (D. e l.)</strong></small>
                    <textarea id="coverte" name="coverte" class="form-control" rows="3">Pupilas iguales, responden a luz y acomodación al estímulo luminoso.
                      </textarea>
                    
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <small for="my-input"><strong>CONCLUSIONES</strong></small>
                      <textarea id="conclusiones" name="conclusiones" class="form-control" rows="5">NO SE RECOMIENDA EL USO DE LENTES, EL PACIENTE NO PRESENTA PROBLEMAS REFRACTIVOS, TIENE UNA VISION DE 20/20 EN AMBOS OJOS POR LO CUAL SOLO SE RECOMIENDA UN CONTROL CADA AÑO.
                      
EL PACIENTE PUEDE REALIZAR TODAS LA ACTIVIDADES.
                        </textarea>
                      
                    </div>
                  </div>
                  <div class="col-md-10" >
                      <small for="my-input"><strong>OPT/OFT</strong></small>
                      <input id="medico" name="medico" class="form-control" type="text">
                  </div>
                  <div class="col-md-11 " style="text-align:end; margin-top: 30px">
                      <button type="button" class="btn btn-md" style="background: #9aa0a6;color: white;" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-md" style="background: #2E519f;color: white"><ion-icon name="print"></ion-icon>
                          Generar Certificado
                      </button>
                  </div>
                </form> 
            </div>
                

                    
            </div>
                
              
            
          
          </div>
        </div>
</div>