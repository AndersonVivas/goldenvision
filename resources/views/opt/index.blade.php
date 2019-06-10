@extends('layouts.app2')
@section('title','OPT/OFT') 
@section('content' )
<div class="container" style="height:100%">
    <div class="row justify-content-md-center" style="height:100%" >
<div class="col-sm-12  col-lg-6 col-xl-3" style="margin-top:10px" >
    <div class="card card-cascade wider" style="height: 300px">
        <div class="view view-cascade overlay">  
                <ion-icon name="contacts" aria-hidden="true" style="font-size: 200px;color: #b49b3e;opacity: 0.8"></ion-icon >      
         <!-- <img src="images/consultas.png" class="card-img-top" style="animation: down-ani 20s linear infinete"/>-->                   
          <a href="consulta">
              <div class="mask rgba-white-slight"></div>
        </a>
        </div>
        <div class="card-body card-body-cascade text-center pb-0">

            <!-- Title -->
            <h4 class="card-title"><strong>CONSULTA</strong></h4>
        </div>
      </div>
      </div><div class="col-sm-12  col-lg-3 col-xl-3"  style="margin-top:10px">
          <div class="card card-cascade wider" style="height: 300px">
              <div class="view view-cascade overlay"> 
                    <ion-icon name="copy" aria-hidden="true" style="font-size: 200px;color: #b49b3e;opacity: 0.8"></ion-icon>        
                 <!--<img src="images/reportes.png" class="card-img-top" style="animation: down-ani 20s linear infinete"/> -->                  
                <a href="reportesop">
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