
function EnviarPaciente(){
    var pa_cedula= $("#pa_cedula").val();
    var pa_nombres= $("#pa_nombres").val();
    var pa_apellidos= $("#pa_apellidos").val();
    var pa_fechanac= $("#pa_fechanac").val();
    var pa_correo= $("#pa_correo").val();
    var pa_telefono= $("#pa_telefono").val();
    var id_lo= $("select#_localidades").val();
    var pa_direccion= $("#pa_direccion").val();
    var pa_ocupacion= $("#pa_ocupacion").val();
    var pa_antecedentesf= $("#pa_antecedentesf").val();
    var pa_enfamiliares= $("#pa_enfamiliares").val();
    var pa_enpersonales= $("#pa_enpersonales").val();

    var route = "guardarPaciente";
   
    

    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        type: 'POST',
        dataType: 'json',
        data:{
            pa_cedula : pa_cedula,
            pa_nombres : pa_nombres,
            pa_apellidos : pa_apellidos,
            pa_fechanac : pa_fechanac,
            pa_correo : pa_correo,
            pa_telefono : pa_telefono,
            id_lo : id_lo,
            pa_direccion : pa_direccion,
            pa_ocupacion : pa_ocupacion,
            pa_antecedentesf : pa_antecedentesf,
            pa_enfamiliares : pa_enfamiliares,
            pa_enpersonales : pa_enpersonales,        
        },
        success: function(msj){ 
            $("#pa_nombres").attr("class","form-control form-control-sm");
            $("#pa_apellidos").attr("class","form-control form-control-sm");
            $("#pa_correo").attr("class","form-control form-control-sm");
            $("#pa_fechanac").attr("class","form-control form-control-sm");
            $("#pa_cedula").attr("class","form-control form-control-sm");
            $("#_localidades").attr("class","form-control form-control-sm"); 
            $("#pa_direccion").attr("class","form-control form-control-sm");
            $("#pa_ocupacion").attr("class","form-control form-control-sm");
            $("#succesMensaje").text("Paciente guardado");
            $("#mensjeInformacion").addClass("alert alert-success alert-dismissible fade show");
            $("#pa_id").val(msj.pa_id); 
            $("#id_pa").val(msj.pa_id);   
            console.log(msj.pa_id)              
           }, 
        error: function(msj){          

                       
            $("#pa_nombres").attr("class","form-control form-control-sm is-valid");
            $("#pa_apellidos").attr("class","form-control form-control-sm is-valid");
            $("#pa_correo").attr("class","form-control form-control-sm");
            $("#pa_fechanac").attr("class","form-control form-control-sm is-valid");
            $("#pa_cedula").attr("class","form-control form-control-sm");
            $("#_localidades").attr("class","form-control form-control-sm is-valid"); 
            $("#pa_direccion").attr("class","form-control form-control-sm is-valid");
            $("#pa_ocupacion").attr("class","form-control form-control-sm is-valid");            
                       

            var mensajes=msj.responseJSON.errors;
            $.each(mensajes,function(key,value){
                 if(key=='pa_nombres'){                      
                    $('#mensajeNombre').text("Debe ingresar los nombres");            
                    $("#pa_nombres").attr("class","form-control form-control-sm is-invalid");                    
                 }
                 if(key=='pa_apellidos'){                      
                    $('#mensajeApellidos').text("Debe ingresar los apellidos");            
                    $("#pa_apellidos").addClass("is-invalid");                    
                 }
                 if(key=='pa_correo'){                      
                    $('#mensajeCorreo').text("Correo mal ingresado ");            
                    $("#pa_correo").addClass("is-invalid");                    
                 }
                 if(key=='pa_fechanac'){                      
                    $('#mensajeFechanac').text("Debe ingresar la fecha de nacimiento");            
                    $("#pa_fechanac").addClass("is-invalid");                    
                 }
                 if(key=='pa_cedula'){                      
                    $('#mensajeCedula').text(value);            
                    $("#pa_cedula").addClass("is-invalid");                    
                 }
                 if(key=='id_lo'){                      
                    $('#mensajeLocalidad').text("Escoja una localidad");            
                    $("#_localidades").addClass("is-invalid");                    
                 }
                 if(key=='pa_direccion'){                      
                    $('#mensajeDireccion').text("Ingrese una dirección");            
                    $("#pa_direccion").addClass("is-invalid");                    
                 }
                 if(key=='pa_ocupacion'){                      
                    $('#mensajeOcupacion').text("Ingrese una ocupación");            
                    $("#pa_ocupacion").addClass("is-invalid");                    
                 }
            });
                       
            
                 
                        
        }       
        });
}

function medidasNuevas(){
   var pa_id=$("#pa_id").val(); 
   var route= "medidasNuevas/"+pa_id;
   console.log(pa_id);
    //$("#_su_ciudad").empty();
    $.get(route);
   
}

