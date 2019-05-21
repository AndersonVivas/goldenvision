function EnviarSucursal(){
    var su_ciudad= $("#su_ciuda").val();
    var route = "agregarSucursal";
    var token = $("#token").val;
    

    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        type: 'POST',
        dataType: 'json',
        data:{su_ciudad: su_ciudad},
        success: function(){
            obtenerSucursales();
            $("#mensaje").text('Localidad guardada'); 
            console.log(guardado);      
           }, 
        error: function(msj){            
            $("#mensaje").text(msj.responseJSON.errors.su_ciudad);
            
        }       
        });
}
function obtenerSucursales(){
    var route= "listarSucursal";
    $("#_su_ciudad").empty();
    $.get(route,function(res){
        $(res).each(function(key,value){
            $('#_su_ciudad').append("<option value="+value.su_id+">"+value.su_ciudad+"</option>");
        });
    });
}

function EnviarLocalidad(){
    
    var lo_nombre= $("#lo_nombre").val();
    console.log(lo_nombre)
    var route = "agregarLocalidad"; 

    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        type: 'POST',
        dataType: 'json',
        data:{lo_nombre: lo_nombre},
        success: function(){
            obtenerLocalidades();
            $("#mensaje").text('Localidad guardada'); 
            console.log(guardado);      
           }, 
        error: function(msj){            
            $("#mensaje").text(msj.responseJSON.errors.lo_nombre);
            
        }       
        });
}
function obtenerLocalidades(){
    var route= "listarLocalidades";    
    $.get(route,function(res){
        $("#_localidades").empty();
        $(res).each(function(key,value){
            console.log(value.lo_id);
            $('#_localidades').append("<option value="+value.lo_id+">"+value.lo_nombre+"</option>");
        });
    });
}
function EnviarLenteC(){    
    var cle_caracteristica= $("#le_contacto").val();    
    var route = "agregarLenteC"; 
    console.log(cle_caracteristica);

   $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        type: 'POST',
        dataType: 'json',
        data:{cle_caracteristica: cle_caracteristica},
        
        success: function(msj){            
                console.log(msj)
                $("#mensajecontacto").text(msj.status);
                $("#_lenteContacto").empty();
                $('#_lenteContacto').append("<option value='' onclick='LCinavilitar()'>--Seleccione--</option>");
                $.each(msj.lentesContacto,function(key,value){     
                    $('#_lenteContacto').append("<option onclick='LCavilitar()' value="+value.cle_id+">"+value.cle_caracteristica+"</option>");
                 });
                 $('#_lenteContacto').append( "<option value='' onclick='LCinavilitar()'>NINGUNO</option> " );               
           }, 
        error: function(msj){
            console.log(msj.responseJSON.errors.cle_caracteristica);        
            $("#mensajecontacto").text(msj.responseJSON.errors.cle_caracteristica);
            
        }       
    });
}
function EnviarLenteM(){    
    var cle_caracteristica= $("#le_marco").val();    
    var route = "agregarLenteM"; 
    console.log(cle_caracteristica);

   $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        type: 'POST',
        dataType: 'json',
        data:{cle_caracteristica: cle_caracteristica},
        
        success: function(msj){            
                console.log(msj)
                $("#mensajemarco").text(msj.status);
                $("#_lenteMarco").empty();
                $('#_lenteMarco').append("<option value=''>--Seleccione--</option>");
                $.each(msj.lentesMarco,function(key,value){     
                    $('#_lenteMarco').append("<option value="+value.cle_id+">"+value.cle_caracteristica+"</option>");
                 });                
           }, 
        error: function(msj){
            console.log(msj.responseJSON.errors.cle_caracteristica);        
            $("#mensajemarco").text(msj.responseJSON.errors.cle_caracteristica);
            
        }       
    });
}


