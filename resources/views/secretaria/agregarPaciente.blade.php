@extends('layouts.app2')

@section('content')
<div class="container-fluid" style="margin-top: 0px"> 
<div class="row offset-md-1" >                                          
                        <div class="col-md-6" >
                            @include('consulta.buscarpaciente')
                        </div>           
                      </div>
  <div class="row">
            <div class="col-md-12" >                
            @include('consulta.agregarpaciente')  
            </div>
      </div>
</div>
@endsection