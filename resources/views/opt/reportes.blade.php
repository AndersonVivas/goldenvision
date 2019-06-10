@extends('layouts.app2')
@section('title','Reportes')
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
                </div>
</div>
@endsection