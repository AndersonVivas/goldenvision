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
        "<td><a href='obtenerConsulta?co_id="+value.co_id+"' class='btn btn-primary'>Ver</a><a class='btn btn-primary' onclick='generar("+value.co_id+")'>Generar Certificado</a></td>"+
        
      '</tr>';
      
       $('#tablaprueba tbody').append(htmlTags);
        });    
            
        });
        
        
}
function generar(co_id){
  var route='informacionCer/'+co_id;
  var fecha = new Date();
  console.log(co_id);

  $.get(route,function(res){
      $('#fechaCer').val(res.sucursal.su_ciudad+" "+fecha.toLocaleDateString("es-ES", res.consulta.co_fecha));
      $('#_descripcion').val("Por medio del presente se CERTIFICA que el Sñr/Sñra :"+" "+res.paciente.pa_apellidos+" "+res.paciente.pa_nombres+" portador de la cédula de identidad"+" "+res.paciente.pa_cedula+" "+"se presentó en GOLDEN VISON OPTICA, para un examen visual en la cual presento los siguientes resultados." );
      $('#__ishihara').val(res.consulta.co_ishihara);
      $('#__co_id').val(res.consulta.co_id);
      $('#medico').val('OPT/OFT.'+" "+res.usuario.us_nombres+" "+res.usuario.us_apellidos);
      $('#tblresultado').empty();
      $('#conclusiones').val("NO SE RECOMIENDA EL USO DE LENTES, EL PACIENTE NO PRESENTA PROBLEMAS REFRACTIVOS, TIENE UNA VISION DE 20/20 EN AMBOS OJOS POR LO CUAL SOLO SE RECOMIENDA UN CONTROL CADA AÑO.EL PACIENTE PUEDE REALIZAR TODAS LA ACTIVIDADES.")
      $.each(res.examenes,function(key,value){ 
        if(value.te_examen=='Rx-Final'){
          var htmlTags= '<tbody><tr>'+
          '<td><small><strong>OD</strong></small></td>'+
          '<td><small>'+value.pivot.mo_avlod+'</small></td>'+
          '<td><small></strong>'+value.pivot.mo_avcod+'</small></td>'+
          '</tr>'+
          '<tr>'+
          '<td><small><strong>OI</strong></small></td>'+
           '<td><small>'+value.pivot.mo_avloi+'</small></td>'+
          '<td><small></strong>'+value.pivot.mo_avcoi+'</small></td></tr>'+
          '</tr></tbody>'+
          '<thead>'+
            '<tr>'+
                '<th><small><strong>RX TOTAL</strong></small></th>'+
               ' <th><small><strong>ESF</strong></small></th>'+
               ' <th><small><strong>CIL</strong></small></th>'+
               ' <th><small><strong>EJE</strong></small></th>'+
                '<th><small><strong>DNP</strong></small></th>'+
           ' </tr>'+
        '</thead>'+
        '<tbody>'+
               ' <tr>'+
                    '<td><small><strong>OD</strong></small></td>'+
                    '<td><small>'+ value.pivot.mo_esfod+' </small></td>'+
                    '<td><small>'+value.pivot.mo_ciod +'</small> </td>'+
                    '<td><small>'+value.pivot.mo_ejod +'</small> </td>'+
                    '<td><small>'+value.pivot.mo_dnpod +'</small> </td>'+
                '</tr>'+
                '<tr>'+
                        '<td><small><strong>OI</strong></small></td>'+
                        '<td><small>'+value.pivot.mo_esfoi+' </small></td>'+
                        '<td><small>'+value.pivot.mo_cioi +'</small> </td>'+
                       ' <td><small>'+value.pivot.mo_ejoi +'</small> </td>'+
                        '<td><small>'+value.pivot.mo_dnpoi +'</small> </td>'+
                    '</tr>'+
            '</tbody>'
          
          ;
          $('#tblresultado').append(htmlTags);
        }


      }); 
  
    });

  $('#generarCer').modal('toggle');
  

}
