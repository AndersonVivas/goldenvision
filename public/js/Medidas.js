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
                alert("Característica Agregada");    
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
function AgregarKeratrometria(){
    //primera etapa
    var ke_k1= $("#ke_k1").val();
    var ke_grk1= $("#ke_grk1").val();
    var ke_k2= $("#ke_k2").val();
    var ke_grrs= $("#ke_grrs").val();
    var ke_km= $("#ke_km").val();
    var ke_grkm= $("#ke_grkm").val();
    //segunda etapa
    var ke_isv= $("#ke_isv").val();
    var ke_iha= $("#ke_iha").val();
    var ke_iva= $("#ke_iva").val();
    var ke_ihd= $("#ke_ihd").val();
    var ke_ki= $("#ke_ki").val();    
    var ke_rmin= $("#ke_rmin").val();
    var ke_cki= $("#ke_cki").val();
    var ke_tkc= $("#ke_tkc").val();
    //tercer etapa
    var ke_paquip= $("#ke_paquip").val();
    var ke_xp= $("#ke_xp").val();
    var ke_yp= $("#ke_yp").val();
    var ke_paquio= $("#ke_paquio").val();
    var ke_xo= $("#ke_xo").val();
    var ke_yo= $("#ke_yo").val();
    var oj_id=$("select#_oj_id").val();
    var route = "agregarkeratrometria";    
    

    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        type: 'POST',
        dataType: 'json',
        data:{
            oj_id:oj_id,

            ke_k1: ke_k1,
            ke_grk1: ke_grk1,
            ke_k2: ke_k2,
            ke_grrs: ke_grrs,
            ke_km: ke_km,
            ke_grkm : ke_grkm,

            ke_isv: ke_isv,
            ke_iha: ke_iha,
            ke_iva: ke_iva,
            ke_ihd: ke_ihd,
            ke_ki: ke_ki,            
            ke_rmin: ke_rmin,
            ke_cki: ke_cki,
            ke_tkc: ke_tkc,

            ke_paquip: ke_paquip,
            ke_xp: ke_xp,
            ke_yp: ke_yp,
            ke_paquio: ke_paquio,
            ke_xo: ke_xo,
            ke_yo: ke_yo,

        
        },
        success: function(msj){            
            
            if(msj.status==400) {                                    
                $('#mensajeoj_id').text("Esta opción ya fue guardada");                       
                $("#_oj_id").addClass("is-invalid");               
             
        }else if(msj.status==200){
            alert("Información guardada");            
            var ke_k1= $("#ke_k1").val("");
            var ke_grk1= $("#ke_grk1").val("");
            var ke_k2= $("#ke_k2").val("");
            var ke_grrs= $("#ke_grrs").val("");
            var ke_km= $("#ke_km").val("");
            var ke_grkm= $("#ke_grkm").val("");
            //segunda etapa
            var ke_isv= $("#ke_isv").val("");
            var ke_iha= $("#ke_iha").val("");
            var ke_iva= $("#ke_iva").val("");
            var ke_ihd= $("#ke_ihd").val("");
            var ke_ki= $("#ke_ki").val("");    
            var ke_rmin= $("#ke_rmin").val("");
            var ke_cki= $("#ke_cki").val("");
            var ke_tkc= $("#ke_tkc").val("");
            //tercer etapa
            var ke_paquip= $("#ke_paquip").val("");
            var ke_xp= $("#ke_xp").val("");
            var ke_yp= $("#ke_yp").val("");
            var ke_paquio= $("#ke_paquio").val("");
            var ke_xo= $("#ke_xo").val("");
            var ke_yo= $("#ke_yo").val("");
            var oj_id=$("select#_oj_id").val("");
        }            
            
           }, 
        error: function(msj){            
            var mensajes=msj.responseJSON.errors;
            $.each(mensajes,function(key,value){
                 if(key=='oj_id'){
                    $('#mensajeoj_id').text("Escoja un tipo de ojo");                       
                    $("#_oj_id").addClass("is-invalid");  
                 }
                
               
            });
            
        }       
        });
}
function LCavilitar(){  
    console.log('hola')
    var lente=$("select#_lenteContacto").val();
   if(lente != ""){
    document.getElementById("ODeslc").disabled = false;
    document.getElementById("OIeslc").disabled = false;

    document.getElementById("ODcilc").disabled = false;
    document.getElementById("OIcilc").disabled = false;

    document.getElementById("ODejlc").disabled = false;
    document.getElementById("OIejlc").disabled = false;
 }else{
    document.getElementById("ODeslc").disabled = true;
    document.getElementById("OIeslc").disabled = true;

    document.getElementById("ODcilc").disabled = true;
    document.getElementById("OIcilc").disabled = true;

    document.getElementById("ODejlc").disabled = true;
    document.getElementById("OIejlc").disabled = true;
 }
    
}
function copiarRetinoscopia(){
    $('#ODavlsincorrrx').val($('#ODavlsincorrre').val());
    $('#OIavlsincorrrx').val($('#OIavlsincorrre').val());
    $('#ODavcsincorrrx').val($('#ODavcsincorrre').val());
    $('#OIavcsincorrrx').val($('#OIavcsincorrre').val());
    $('#ODesrx').val($('#ODesre').val());
    $('#OIesrx').val($('#OIesre').val());
    $('#ODcirx').val($('#ODcire').val());
    $('#OIcirx').val($('#OIcire').val());
    $('#ODejrx').val($('#ODejre').val());
    $('#OIejrx').val($('#OIejre').val());
    $('#ODdnprx').val($('#ODdnpre').val());
    $('#OIdnprx').val($('#OIdnpre').val());
    $('#ODaddrx').val($('#ODaddre').val());
    $('#OIaddrx').val($('#OIaddre').val());
    $('#ODalrx').val($('#ODalre').val());
    $('#OIalrx').val($('#OIalre').val());
    $('#ODavlrx').val($('#ODavlre').val());
    $('#OIavlrx').val($('#OIavlre').val());
    $('#ODavcrx').val($('#ODavcre').val());
    $('#OIavcrx').val($('#OIavcre').val());
}

