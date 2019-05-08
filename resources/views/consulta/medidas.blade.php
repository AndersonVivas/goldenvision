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
                            <div class="row">    
                                <div class="col-md-2">
                                    <small for="ODesru">ESF:</small> 
                                    <div class="form-group">
                                        <small for="ODesru">OD:</small>
                                        <input id="ODesru" class="form-control form-control-sm" type="text"disabled>                                    
                                        <small for="OIesru">OI:</small>
                                        <input id="OIesru" class="form-control form-control-sm" type="text"disabled>
                                    </div>              
                                </div> 
                                <div class="col-md-2">
                                    <small for="ODesru">CILINDRO:</small>  
                                    <div class="form-group">
                                        <small for="ODciru">OD:</small>
                                        <input id="ODciru" class="form-control form-control-sm" type="text"disabled>
                                        <small for="OIciru">OI:</small>
                                        <input id="OIciru" class="form-control form-control-sm" type="text"disabled>                                                      
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <small>EJE:</small>
                                        <div class="form-group"> 
                                            <small for="ODesru">OD:</small>
                                            <input id="ODesru" class="form-control form-control-sm" type="text"disabled>                                    
                                            <small for="OIesru">OI:</small>
                                            <input id="OIesru" class="form-control form-control-sm" type="text"disabled>                                                     
                                        </div>
                                </div>
                                <div class="col-md-2 offset-md-2">
                                    <small>AV/L:</small>
                                    <div class="form-group">
                                        <small for="ODavlru">OD:</small>
                                        <input id="ODavlru" class="form-control form-control-sm" type="text"disabled>                                    
                                        <small for="OIavlru">OI:</small>
                                        <input id="OIavlru" class="form-control form-control-sm" type="text"disabled>                                                     
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <small>AV/C:</small>
                                    <div class="form-group"> 
                                        <small for="ODesru">OD:</small>
                                        <input id="ODesru" class="form-control form-control-sm" type="text"disabled>                                    
                                        <small for="OIesru">OI:</small>
                                        <input id="OIesru" class="form-control form-control-sm" type="text"disabled>                                                     
                                    </div>
                                </div>                                             
                            </div>                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
   <form action="guardarmedidas" method="POST">
        @csrf   
       <input id="pa_id" class="form-control" name="pa_id" type="hidden" value={{ $pa_id }}>
       <div class="row"></div>
    <!-- parte superior-->
    <div class="row " >
        <div class="col-md-8" >
            <div class="row md-form form-sm">  
                    <div class="col-md-10 offset-md-1">
                        <label for="co_motivo">Motivo de Consulta:</label>                 
                        <input id="co_motivo" class="form-control form-control-sm" type="text">
                        <span class="invalid-feedback" role="alert" id="errormotivo">
                        <strong id="mensajeanamnesis"></strong>
                        </span> 
                    
                </div> 
            </div>               
            <div class="row md-form form-sm ">                                   
                    <div class="col-md-10 offset-md-1">
                        <label for="co_ishihara">Test de Colores (ISHIHARA):</label>                 
                        <input id="co_ishihara" class="form-control form-control-sm" type="text">
                        <span class="invalid-feedback" role="alert" id="errorishihara">
                            <strong id="mensajeanamnesis"></strong>
                        </span> 
                    </div>
                </div> 
                <div class="row md-form form-sm">                 
                        <div class="col-md-10 offset-md-1">   
                        <label for="co_anamnesis">Anamnesis:</label>              
                            <input id="co_anamnesis" class="form-control form-control-sm" type="text">
                            <span class="invalid-feedback" role="alert" id="error-apellido">
                                <strong id="mensajeanamnesis"></strong>
                            </span> 
                        </div>
                    </div>           
            
        </div>
        <div class="col-md-4">
            <div class="row">
               <button type="button" data-toggle="modal" data-target="#ccorporal" class="btn btn-outline-primary btn-rounded waves-effect" style="width:250px">OBSERVACION CORPORAL</button> 
            </div>
            <div class="row">
              <button type="button" data-toggle="modal" data-target="#keratrometria" class="btn btn-outline-primary btn-rounded waves-effect" style="width:250px">KERATROMETRIA</button>
            </div>
            <div class="row">
              <button data-toggle="collapse" data-target="#tipoLentes" type="button" class="btn btn-outline-primary btn-rounded waves-effect" style="width:250px">TIPO DE LENTES</button>
              
            </div>               
        </div>
    </div>

    <!-- parte inferior-->
    <div class="row">
        <div class="col-md-3">
            
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
        
        <div class="col-md-9">
            <div class="row">
                <div class="collapse" id="tipoLentes" style="margin-bottom: 15px">
                        <div class="card">
                                <div class="card-header" style="height: 35px">
                                <small>L/C</small>
                                </div>
                                <div class="card-body">                       
                                        <div class="row">    
                                            <div class="col-md-2">
                                                <small for="ODesru">ESF:</small> 
                                                <div class="form-group">
                                                    <small for="ODesru">OD:</small>
                                                    <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                    <small for="OIesru">OI:</small>
                                                    <input id="OIesru" class="form-control form-control-sm" type="text">
                                                </div>              
                                            </div> 
                                            <div class="col-md-2">
                                                <small for="ODesru">CILINDRO:</small>  
                                                <div class="form-group">
                                                    <small for="ODciru">OD:</small>
                                                    <input id="ODciru" class="form-control form-control-sm" type="text">
                                                    <small for="OIciru">OI:</small>
                                                    <input id="OIciru" class="form-control form-control-sm" type="text">                                                      
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <small>EJE:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODesru">OD:</small>
                                                        <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIesru">OI:</small>
                                                        <input id="OIesru" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                            </div>                                                  
                                        </div>                                                                                    
                                    </div>
                </div>
                </div>
            </div>        
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
                                                <small for="ODesru">OD:</small>
                                                <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                <small for="OIesru">OI:</small>
                                                <input id="OIesru" class="form-control form-control-sm" type="text">
                                            </div>              
                                        </div> 
                                        <div class="col-md-2">
                                            <small for="ODesru">CILINDRO:</small>  
                                            <div class="form-group">
                                                <small for="ODciru">OD:</small>
                                                <input id="ODciru" class="form-control form-control-sm" type="text">
                                                <small for="OIciru">OI:</small>
                                                <input id="OIciru" class="form-control form-control-sm" type="text">                                                      
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <small>EJE:</small>
                                                <div class="form-group"> 
                                                    <small for="ODesru">OD:</small>
                                                    <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                    <small for="OIesru">OI:</small>
                                                    <input id="OIesru" class="form-control form-control-sm" type="text">                                                     
                                                </div>
                                        </div>
                                        <div class="col-md-2">
                                                <small>DNP:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODesru">OD:</small>
                                                        <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIesru">OI:</small>
                                                        <input id="OIesru" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                            </div>
                                            <div class="col-md-2">
                                                    <small>ADD:</small>
                                                        <div class="form-group"> 
                                                            <small for="ODesru">OD:</small>
                                                            <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                            <small for="OIesru">OI:</small>
                                                            <input id="OIesru" class="form-control form-control-sm" type="text">                                                     
                                                        </div>
                                                </div>
                                                <div class="col-md-2">
                                                        <small>ALTURA:</small>
                                                            <div class="form-group"> 
                                                                <small for="ODesru">OD:</small>
                                                                <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                                <small for="OIesru">OI:</small>
                                                                <input id="OIesru" class="form-control form-control-sm" type="text">                                                     
                                                            </div>
                                                    </div>
                                                                                     
                                    </div>
                                    <div class="row">
                                            <div class="col-md-2">
                                                    <small>AV/L:</small>
                                                    <div class="form-group">
                                                        <small for="ODavlru">OD:</small>
                                                        <input id="ODavlru" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavlru">OI:</small>
                                                        <input id="OIavlru" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-2 ">
                                                    <small>AV/C:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODesru">OD:</small>
                                                        <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIesru">OI:</small>
                                                        <input id="OIesru" class="form-control form-control-sm" type="text"d>                                                     
                                                    </div>
                                        </div>
                                    </div>                                              
                                </div>
                            </div>
            </div>
            <div class="row" style="background-color: orange" >
                    <div class="card">
                            <div class="card-header" style="height: 35px">
                            <small>RX-FINAL</small>
                            </div>
                            <div class="card-body">                       
                                    <div class="row">    
                                        <div class="col-md-2">
                                            <small for="ODesru">ESF:</small> 
                                            <div class="form-group">
                                                <small for="ODesru">OD:</small>
                                                <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                <small for="OIesru">OI:</small>
                                                <input id="OIesru" class="form-control form-control-sm" type="text">
                                            </div>              
                                        </div> 
                                        <div class="col-md-2">
                                            <small for="ODesru">CILINDRO:</small>  
                                            <div class="form-group">
                                                <small for="ODciru">OD:</small>
                                                <input id="ODciru" class="form-control form-control-sm" type="text">
                                                <small for="OIciru">OI:</small>
                                                <input id="OIciru" class="form-control form-control-sm" type="text">                                                      
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <small>EJE:</small>
                                                <div class="form-group"> 
                                                    <small for="ODesru">OD:</small>
                                                    <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                    <small for="OIesru">OI:</small>
                                                    <input id="OIesru" class="form-control form-control-sm" type="text">                                                     
                                                </div>
                                        </div>
                                        <div class="col-md-2">
                                                <small>DNP:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODesru">OD:</small>
                                                        <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIesru">OI:</small>
                                                        <input id="OIesru" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                            </div>
                                            <div class="col-md-2">
                                                    <small>ADD:</small>
                                                        <div class="form-group"> 
                                                            <small for="ODesru">OD:</small>
                                                            <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                            <small for="OIesru">OI:</small>
                                                            <input id="OIesru" class="form-control form-control-sm" type="text">                                                     
                                                        </div>
                                                </div>
                                                <div class="col-md-2">
                                                        <small>ALTURA:</small>
                                                            <div class="form-group"> 
                                                                <small for="ODesru">OD:</small>
                                                                <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                                <small for="OIesru">OI:</small>
                                                                <input id="OIesru" class="form-control form-control-sm" type="text">                                                     
                                                            </div>
                                                    </div>
                                                                                     
                                    </div>
                                    <div class="row">
                                            <div class="col-md-2">
                                                    <small>AV/L:</small>
                                                    <div class="form-group">
                                                        <small for="ODavlru">OD:</small>
                                                        <input id="ODavlru" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIavlru">OI:</small>
                                                        <input id="OIavlru" class="form-control form-control-sm" type="text">                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-2 ">
                                                    <small>AV/C:</small>
                                                    <div class="form-group"> 
                                                        <small for="ODesru">OD:</small>
                                                        <input id="ODesru" class="form-control form-control-sm" type="text">                                    
                                                        <small for="OIesru">OI:</small>
                                                        <input id="OIesru" class="form-control form-control-sm" type="text"d>                                                     
                                                    </div>
                                        </div>
                                    </div>                                              
                                </div>
            </div>
            </div>
            <div class="row"  >
                    <div class="col-md-12" >
                    <div class="row md-form form-sm ">                                   
                            <div class="col-md-11 offset-md-1">
                                <label for="co_observaciones">Observaciones:</label>                 
                                <input id="co_observaciones" class="form-control form-control-sm" type="text">
                                <span class="invalid-feedback" role="alert" id="errorishihara">
                                    <strong id="mensajeanamnesis"></strong>
                                </span> 
                            </div>
                        </div> 
                        <div class="row md-form form-sm">                 
                                <div class="col-md-11 offset-md-1">   
                                <label for="co_recomendaciones">Recomendaciones:</label>              
                                    <input id="co_recomendaciones" class="form-control form-control-sm" type="text">
                                    <span class="invalid-feedback" role="alert" id="error-apellido">
                                        <strong id="mensajeanamnesis"></strong>
                                    </span> 
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

@endsection
<script type="text/javascript" src="js/validaciones.js"></script>
<script type="text/javascript" src="js/Medidas.js"></script>