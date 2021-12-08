function eliminar(id){
   if( confirm("se eliminara la categoria con todos los productos,¿confirma eliminacion?")){
       //location.href="eliminarcategorias.php?idcategoria="+id;
       $.ajax({
           type:"POST",
           url:"eliminarcategorias.php",
           data:'idcategoria='+id,

       });

       $("#"+id).hide("slow");
   }
}

/*function eliminarproductojs esta la funcion que se llama desde mostrar productos.php */


function eliminarproductojs(id){
    if( confirm("¿confirma su eliminacion?")){
        $.ajax({
            type:"POST",
            url:"eliminarproductos.php",
            data:'idproducto='+id,
 
        });
 
        $("#"+id).hide("slow");
    }
 }


function validarformulario(){
    if(document.formproductos.nombre.value==""){
        $("#avisonombre").show("fast");
    }
}



