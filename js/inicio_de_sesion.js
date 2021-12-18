function validar_sesion(){
    //zona ajax
if($('#checkbox_recordar').prop('checked')){ var crear_cookie='true';}
else{
    var crear_cookie=false;
}
var email = document.form_inicio_sesion.email.value;
var password = document.form_inicio_sesion.password.value;
//debugger;

$.ajax({

    type:"POST",
    url:"clientes/inicio_de_sesion/validar_sesion.php",
    data:{"email":email, "password":password, "crear_cookie":crear_cookie},
   
    beforeSend:function(){
        $("#errordedatos").hide("#fast");
        
        $("#exito").hide("#fast");
        //debugger;
        $("#carga").show("#fast");
    },

    success:function(resp){
        if(resp == "exito"){
            $("#carga").hide("#fast");
            $("#exito").show("#fast");
            location.href="clientes/zona_clientes/index.php";
        }

if(resp == "fallo")
{
    $("#carga").hide("#fast");
    $("#errordedatos").show("#fast");
    $("#casilla").effect("shake",{times: 3}, 1000);
}

    }

})



}