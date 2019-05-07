function AgregarCcorporal(){
    var coc_observaion= $("#coc_observaion").val();
    var cc_id= $("select#_ccorporales").val();
    var route = "ccorporales";    
    

    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        type: 'POST',
        dataType: 'json',
        data:{coc_observaion: coc_observaion,
              cc_id : cc_id},
        success: function(msj){            
            console.log(msj); 
            if(msj.status==400) {
                                    
                    $('#mensajeCaracteristica').text("Esta característica ya ingreso");            
                    $("#_ccorporales").addClass("is-invalid");                    
                 
            }else if(msj.status==200){
                $("#coc_observaion").attr("class","form-control form-control-sm");
                $("#_ccorporales").attr("class","custom-select form-control-sm"); 
                $("#coc_observaion").val("");
                $("#_ccorporales").val(null);    
                $("#succesMensaje").text("Característica Agregada");
                $("#mensjeCcorporal").addClass("alert alert-success alert-dismissible fade show");
            }
            
           }, 
        error: function(msj){            
            var mensajes=msj.responseJSON.errors;
            $.each(mensajes,function(key,value){
                console.log(key);                         
                if(key=='coc_observaion'){   
                    $('#mensajeObservacion').text("Debe ingresar una observación");                       
                    $("#coc_observaion").attr("class","form-control form-control-sm is-invalid");                    
                 }
                 if(key=='cc_id'){                      
                    $('#mensajeCaracteristica').text("Debe escoger una característica");            
                    $("#_ccorporales").addClass("is-invalid");                    
                 }
            });
            
        }       
        });
}