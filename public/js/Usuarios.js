function estadoAdministrador(us_cedula){    
    var route= "activaAdmin/"+us_cedula;
    
    //$("#_su_ciudad").empty();
    $.get(route,function(res){
          $("#_administradores").html(res);
    });       
        
}
function estadoOftalmolo(us_cedula){    
    var route= "activaOfta/"+us_cedula;
    
    //$("#_su_ciudad").empty();
    $.get(route,function(res){
          $("#_oftalmologos").html(res);
    });       
        
}
function estadoOptometrista(us_cedula){    
    var route= "activaOptom/"+us_cedula;
    
    //$("#_su_ciudad").empty();
    $.get(route,function(res){
          $("#_optometristas").html(res);
    });       
        
}
function estadoSecretaria(us_cedula){    
    var route= "activaSecre/"+us_cedula;
    
    //$("#_su_ciudad").empty();
    $.get(route,function(res){
          $("#_secretarias").html(res);
    });       
        
}
function editarUsuario(us_cedula){
    var route= "obtenerUsuario/"+us_cedula;
    
    //$("#_su_ciudad").empty();
    $.get(route,function(res){
        $('select#__tipo').val(res.usuario.ro_id);
        $('#__us_cedula').val(res.usuario.us_cedula);
        $('#_us_cedula').val(res.usuario.us_cedula);
        $('#__nombres').val(res.usuario.us_nombres);
        $('#__apellidos').val(res.usuario.us_apellidos);
        $('#__email').val(res.usuario.us_correo);
        $('#__celular').val(res.usuario.us_telefono);
    });       
        
    $('#editarUsuario').modal("toggle");
}
