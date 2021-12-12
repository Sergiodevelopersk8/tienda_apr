




function validarformulario(){
    if(document.formproductos.nombre.value==""){
        $("#avisonombre").show("fast");
        document.formproductos.nombre.style.border='1px solid red';
    }
    if(document.formproductos.precio.value==""){
        $("#avisoprecio").show("fast");
        document.formproductos.precio.style.border='1px solid red';
    }
    
   
    if(document.formproductos.descripcion.value==""){
        $("#avisodescripcion").show("fast");
        document.formproductos.descripcion.style.border='1px solid red';
    }
    if(document.formproductos.categorias.value==""){
        $("#avisocategorias").show("fast");
        document.formproductos.categorias.style.border='1px solid red';
            }
        
            if(document.formproductos.nombre.value!="" &&  document.formproductos.precio.value!="" && document.formproductos.descripcion.value!="" && 
             document.formproductos.categorias.value!="")
             {
                var formData = new FormData($("#form")[0]);
                 var nombre=document.formproductos.nombre.value;
                 
                 var precio=document.formproductos.precio.value;
                 
                 var descripcion=document.formproductos.descripcion.value;
                 
                 var categorias=document.formproductos.categorias.value;
                 $.ajax({

                 type:"POST",
                 url:'aniadirproductos.php',
                 data:formData,
                 cache:false,
                 contentType:false,
                 processData:false,
                 
                 
                 beforeSend:function()
                 {
                    $("#nombrerepetido").hide("fast");
                    $("#exito").hide("fast");
                    $("#contenedor_carga").show("fast");
                   

                 },
                 success:function(resp){
                     
                 debugger;  

                if(resp == "ok"){
            
    $("#errorimagen").hide("fast");
                     $("#contenedor_carga").hide("fast");        
                     $("#nombrerepetido").hide("fast");
                     $("#exito").show("fast");
                    $("#loadimg").hide("fast");
                   
}
debugger;
if(resp=="nombrerepetido"){
    
    $("#contenedor_carga").hide("fast");
    $("#exito").hide("fast");
    $("#nombrerepetido").show("fast");
    
    document.formproductos.nombre.style.border='1px solid red';
}
if(resp=="errorimagen"){
    $("#contenedor_carga").hide("fast");
    $("#exito").hide("fast");
    $("#errorimagen").show("fast");
    
    document.formproductos.nombre.style.border='1px solid red';

}
                 },
                
                 });
             }

}

/**zona de exito al validar */

function mostrar(){
    $("#unaimg").show("fast");
    
}

function validadonombre(){
    
    $("#avisonombre").hide("slow");
    document.formproductos.nombre.style.border='1px solid green';

}

function validadoprecio(){
    
    $("#avisoprecio").hide("slow");
    document.formproductos.precio.style.border='1px solid green';

}

function validadodescripcion(){
    
    $("#avisodescripcion").hide("slow");
    document.formproductos.descripcion.style.border='1px solid green';

}
function validadocategoria(){
    
    $("#categorias").hide("slow");
    document.formproductos.categorias.style.border='1px solid green';

}



/**
<script> 
function validarformulario(){
    if(document.formproductos.nombre.value==""){
        $("#avisonombre").show("fast");
        document.formproductos.nombre.style.border='1px solid red';
    }
    if(document.formproductos.precio.value==""){
        $("#avisoprecio").show("fast");
        document.formproductos.precio.style.border='1px solid red';
    }
    
   
    if(document.formproductos.descripcion.value==""){
        $("#avisodescripcion").show("fast");
        document.formproductos.descripcion.style.border='1px solid red';
    }
    if(document.formproductos.categorias.value==""){
        $("#avisocategorias").show("fast");
        document.formproductos.categorias.style.border='1px solid red';
            }
        
            if(document.formproductos.nombre.value!="" &&  document.formproductos.precio.value!="" && document.formproductos.descripcion.value!="" && 
             document.formproductos.categorias.value!="")
             {
                 var nombre=document.formproductos.nombre.value;
                 
                 var precio=document.formproductos.precio.value;
                 
                 var descripcion=document.formproductos.descripcion.value;
                 
                 var categorias=document.formproductos.categorias.value;
                 $.ajax({

                 type:"POST",
                 url:"aniadirproductos.php",
                 data:{nombre:nombre,precio:precio,descripcion:descripcion,categorias:categorias},
                  beforeSend: function(){
            alert("enviado");   
        },

                 });
             }

}

/**zona de exito al validar 
function validadonombre(){
    
    $("#avisonombre").hide("slow");
    document.formproductos.nombre.style.border='1px solid green';

}

function validadoprecio(){
    
    $("#avisoprecio").hide("slow");
    document.formproductos.precio.style.border='1px solid green';

}

function validadodescripcion(){
    
    $("#avisodescripcion").hide("slow");
    document.formproductos.descripcion.style.border='1px solid green';

}
function validadocategoria(){
    
    $("#categorias").hide("slow");
    document.formproductos.categorias.style.border='1px solid green';

}

</script> */