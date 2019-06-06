@extends('layouts.app2')

@section('content')
<div class="container-fluid" style="margin-top: 0px">  
                  
                <div class="row" style="margin-bottom: 10px" >
                    <div class="col-md-6">
                        
                    
                        <div class="card">                            
                                <div class="card-body"> 
                                        <h6 class="card-title"><strong style="color:#2E519f"><ion-icon style="color:#b49b3e; font-size: 20px"  name="calendar"></ion-icon>TUS CONSULTAS POR FECHAS</strong></h6>                      
                                            <form method="post" action="tureporte">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Fecha Inicio</label>
                                                            <input class="form-control" type="date" name="inicio" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Fecha Fin</label>
                                                            <input class="form-control" type="date" name="final" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <button class="btn btn-sm "  type="submit" style="background: #2E519f;color: white"><ion-icon style="font-size: 12px" name="print"></ion-icon>Generar Reporte</button>
                                                        </div>
                                                    </div>                                                    
                                            </form>   
                                        </div>
                                    
                                </div>
                    </div>
                    <div class="col-md-6">                                           
                                        
                            <div class="card">                            
                                    <div class="card-body"> 
                                            <h6 class="card-title" style="color:#2E519f"><strong><ion-icon style="color:#b49b3e;font-size: 20px" name="logo-buffer"></ion-icon>TODAS LAS CONSULTAS</strong></h6>                      
                                                <form method="post" action="todoreporte">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Fecha Inicio</label>
                                                                <input class="form-control" type="date" name="inicio" required>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Fecha Fin</label>
                                                                <input class="form-control" type="date" name="final" required>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <button class="btn btn-sm"  type="submit" style="background-color: #2E519f;color: white"><ion-icon style="font-size: 12px" name="print"></ion-icon>Generar Reporte</button>
                                                            </div>
                                                        </div>                                                    
                                                </form>   
                                            </div>
                                        
                                    </div>
            </div>
                </div>
                 <div class="row" style="margin-bottom: 10px" >
                <div class="col-md-12">
                        <div class="card">                            
                                <div class="card-body"> 
                                        <h6 class="card-title"><strong style="color:#2E519f"><ion-icon style="color:#b49b3e;font-size: 20px" name="contact"></ion-icon>CONSULTAS POR OPT/OFT </strong></h6>                      
                                            <form method="post" action="reporteopof">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                                    <label>Opt/Oft</label>
                                                                    <select id="us_cedula"name="us_cedula" class="custom-select form-control-sm {{ $errors->has('id_lo') ? ' is-invalid' : '' }} " name="su_ciudad"  data-live-search="true" required autofocus>
                                                                            <option value="">Seleccione un OPT/OFT</option>                                        
                                                                            @foreach ($doctores as $doctor)
                                                                            <option   value={{ $doctor->us_cedula }}>{{ $doctor->us_nombres }} {{ $doctor->us_apellidos }}</option>
                                                                            @endforeach                                                     
                                                                        </select>  
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Fecha Inicio</label>
                                                            <input class="form-control" type="date" name="inicio" required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Fecha Fin</label>
                                                            <input class="form-control" type="date" name="final" required>
                                                        </div>
                                                        <div class="col-md-3">                                                            
                                                            <button class="btn btn-sm" style="background: #2E519f;color: white" type="submit"><ion-icon style="font-size: 12px" name="print"></ion-icon>Generar Reporte</button>
                                                        </div>
                                                    </div>                                                    
                                            </form>   
                                        </div>
                                    
                                </div>
                    </div>
                   
                </div>
                <div class="row">
                        <div class="col-md-12">                                           
                                        
                                <div class="card">                            
                                        <div class="card-body"> 
                                                <h6 class="card-title"><strong style="color:#2E519f"><ion-icon style="color:#b49b3e;font-size: 20px" name="business"></ion-icon>CONSULTAS POR SUCURSALES</strong></h6>                      
                                                    <form method="post" action="reportesucu">
                                                            @csrf
                                                            <div class="row">
                                                                    <div class="col-md-3">
                                                                            <label>Sucursal</label>
                                                                            <select id="su_id"name="su_id" class="custom-select form-control-sm {{ $errors->has('id_lo') ? ' is-invalid' : '' }} " name="su_ciudad"  data-live-search="true" required autofocus>
                                                                                    <option value="">Seleccione Sucursal</option>                                        
                                                                                    @foreach ($sucursales as $sucursal)
                                                                                    <option   value={{ $sucursal->su_id }}>{{ $sucursal->su_ciudad }}</option>
                                                                                    @endforeach                                                     
                                                                                </select>  
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Fecha Inicio</label>
                                                                    <input class="form-control" type="date" name="inicio" required>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Fecha Fin</label>
                                                                    <input class="form-control" type="date" name="final" required>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <button class="btn  btn-sm" style="background: #2E519f;color: white" type="submit"><ion-icon style="font-size: 12px" name="print"></ion-icon>Generar Reporte</button>
                                                                </div>
                                                            </div>                                                    
                                                    </form>   
                                                </div>
                                            
                                        </div>                    
                                            
                     </div>
                </div>
        
</div>
@endsection