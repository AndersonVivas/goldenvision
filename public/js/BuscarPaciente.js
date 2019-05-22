$(document).click(function(){
    $('#lista_pacientes').empty();
})

function buscarPac(){
    //console.log($('#buscarpaciente').val());
    var query= $('#buscarpaciente').val();
    var route = "buscarPaciente";
    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        type: 'POST',
        dataType: 'json',
        data:{pa_cedula: query},
        success: function(msj){ 
            var output=""; //'<div class="dropdown-menu"> ';       
            var data=msj.data; 
             $('#lista_pacientes').empty();
             var htm=     
             $.each(data,function(key,value){                             
               output += '<li onclick="CargarPaciente('+value.pa_id+')" class="list-group-item list-group-item-action" >' + value.pa_nombres+" "+value.pa_apellidos + '</li>';
             });
             //output +='</div>';
             console.log(output);             
             $('#lista_pacientes').append(output);

        }
   });
}
function CargarPaciente(pa_id){    
    var route= "obtenerPaciente/"+pa_id;
    
    //$("#_su_ciudad").empty();
    $.get(route,function(res){
        console.log(res);
        $('#buscarpaciente').val(res.paciente.pa_nombres+" "+res.paciente.pa_apellidos);
        $("#lblid").attr("class","active");
        $("#pa_id").val(res.paciente.pa_id);
        $("#id_pa").val(res.paciente.pa_id);
        if(res.paciente.pa_cedula != null){           
         $("#lblcedula").attr("class","active");
          $("#pa_cedula").val(res.paciente.pa_cedula);  
          $("#pa_registrado").val('si');       
          document.getElementById("pa_cedula").disabled = true;          
        }else{
            document.getElementById("pa_cedula").disabled = false; 
            $("#pa_cedula").val(""); 
            $("#pa_registrado").val('no');              
        }
        $("#lblnombres").attr("class","active");                
        $("#pa_nombres").val(res.paciente.pa_nombres);
        $("#lblapellidos").attr("class","active");
        $("#pa_apellidos").val(res.paciente.pa_apellidos);    
        $("#pa_fechanac").val(res.paciente.pa_fechanac);
        $("#lblcorreo").attr("class","active");
        $("#pa_correo").val(res.paciente.pa_correo);
        $("#lbltelefono").attr("class","active");
        $("#pa_telefono").val(res.paciente.pa_telefono);
        $("select#_localidades").val(res.paciente.lo_id);
        $("#lbldireccion").attr("class","active");
        $("#pa_direccion").val(res.paciente.pa_direccion); 
        $("#lblocupacion").attr("class","active");       
        $("#pa_ocupacion").val(res.paciente.pa_ocupacion);
        $("#pa_antecedentesf").val(res.paciente.pa_antecedentesf);
        $("#pa_enfamiliares").val(res.paciente.pa_enfamiliares);
        $("#pa_enpersonales").val(res.paciente.pa_enpersonales);
        $('#tablaprueba tbody').empty();
        
        $.each(res.consultas,function(key,value){ 
            var htmlTags = "<tr data-id="+value.co_id+">"+
        '<td>' + value.co_fecha + '</td>'+        
        '<td>' + value.co_motivo + '</td>'+
        '<td>' + value.co_anamnesis + '</td>'+
        '<td>' + value.co_observaciones + '</td>'+
        "<td><a href='obtenerConsulta?co_id="+value.co_id+"' class='btn btn-primary'>Ver</a><button>Generar Certificado</button></td>"+
        
      '</tr>';
      
       $('#tablaprueba tbody').append(htmlTags);
        });    
            
        });
        
        
}
function verConsulta(co_id){
  var route='obtenerConsulta/'+co_id;
  console.log(co_id);
  $.get(route,function(res){

  });

  $('#_consulta').modal('toggle');
  

}
