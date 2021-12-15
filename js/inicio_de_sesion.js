function validar_sesion(){
    //zona ajax

var email = document.form_inicio_sesion.email.value;
var password = document.form_inicio_sesion.password.value;
//debugger;

$.ajax({

    type:"POST",
    url:"clientes/inicio_de_sesion/validar_sesion.php",
    data:{"email":email, "password":password},
   
    before:function(){
        $("#errordedatos").hide("#fast");
        
        $("#exito").hide("#fast");
        
        $("#carga").show("#fast");
    },

    success:function(resp){
        if(resp == "exito"){
            $("#carga").hide("#fast");

            location.href="index.php";
        }

if(resp == "fallo")
{
    $("#carga").hide("#fast");
    $("#errordedatos").show("#fast");
}

    }

})



}