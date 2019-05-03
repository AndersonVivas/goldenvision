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
        $('#buscarpaciente').val(res[0].pa_nombres+" "+res[0].pa_apellidos);
        $("#lblid").attr("class","active");
        $("#pa_id").val(res[0].pa_id);
        $("#id_pa").val(res[0].pa_id);         
        $("#lblcedula").attr("class","active");
        $("#pa_cedula").val(res[0].pa_cedula);                
        $("#pa_nombres").val(res[0].pa_nombres);
        $("#pa_apellidos").val(res[0].pa_apellidos);
        $("#pa_fechanac").val(res[0].pa_fechanac);
        $("#pa_correo").val(res[0].pa_correo);
        $("#pa_telefono").val(res[0].pa_telefono);
        $("select#_localidades").val(res[0].lo_id);
        $("#pa_direccion").val(res[0].pa_direccion);
        $("#pa_ocupacion").val(res[0].pa_ocupacion);
        $("#pa_antecedentesf").val(res[0].pa_antecedentesf);
        $("#pa_enfamiliares").val(res[0].pa_enfamiliares);
        $("#pa_enpersonales").val(res[0].pa_enpersonales);
    });
}
