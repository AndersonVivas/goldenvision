@extends('layouts.app2')
@section('title','Administrador') 
@section('content' )
<div class="container" style="height:100%">
    <div class="row justify-content-md-center" style="height:100%" >
<div class="col-sm-12  col-lg-4 col-xl-3" style="margin-top:10px" >
    <div class="card card-cascade wider">
        <div class="view view-cascade overlay"> 
            <ion-icon name="contacts" aria-hidden="true" style="font-size: 200px;color: #b49b3e;opacity: 0.8"></ion-icon >      
                 
         <a href="consulta">
              <div class="mask rgba-white-slight"></div>
        </a>
        </div>
        <div class="card-body card-body-cascade text-center pb-0">

            <!-- Title -->
            <h4 class="card-title"><strong>CONSULTA</strong></h4>
        </div>
      </div>
      </div><div class="col-sm-12  col-lg-4 col-xl-3" style="margin-top:5px">
          <div class="card card-cascade wider">
              <div class="view view-cascade overlay">         
                  <ion-icon name="person" aria-hidden="true" style="font-size: 200px;color: #b49b3e;opacity: 0.8"></ion-icon >      
                    <a href="usuarios">
                    <div class="mask rgba-white-slight"></div>
              </a>
              </div>
              <div class="card-body card-body-cascade text-center pb-0">
      
                  <!-- Title -->
                  <h4 class="card-title"><strong>USUARIOS</strong></h4>
              </div>
            </div>
    
      </div><div class="col-sm-12  col-lg-4 col-xl-3" style="margin-top:5px">
          <div class="card card-cascade wider">
              <div class="view view-cascade overlay">         
                  <ion-icon name="copy" aria-hidden="true" style="font-size: 200px;color: #b49b3e;opacity: 0.8"></ion-icon >      
                    <a href="reportes">
                    <div class="mask rgba-white-slight"></div>
              </a>
              </div>
              <div class="card-body card-body-cascade text-center pb-0">
      
                  <!-- Title -->
                  <h4 class="card-title"><strong>REPORTES</strong></h4>
              </div>
            </div>
      </div>
    </div>
</div>
@endsection