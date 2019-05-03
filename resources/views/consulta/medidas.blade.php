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
               <button type="button" class="btn btn-outline-primary btn-rounded waves-effect" style="width:250px">OBSERVACION CORPORAL</button> 
            </div>
            <div class="row">
              <button type="button" class="btn btn-outline-primary btn-rounded waves-effect" style="width:250px">KERATROMETRIA</button>
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
            <div class="row" style="background-color: blue" >
                proxima consulta
            </div>        
    </div>    
    </div>
    <div class="col-md-4 offset-md-8">
        <div class="row" style="background-color: red" >
       <button type="submit">Guardar</button>
        </div>
    </div>
 </form>
</div>

@endsection