/**para mostrar productosphp */

function ventana(id){

$.ajax({

    type:"POST",
    url:"verproducto.php",
    data:'idproducto=' + id,
    success: function (resp){

        $ ('#div-results').html(resp);
    }




});

} 

function enchufe(id){

    var name=document.getElementsByName(id);
    for(var i=0;i<name.length;i++){

if(name[i].checked)
name=name[i].value;

    }

    $.ajax({

        type:"POST",
        url:"interruptor.php",
        data:{"id_producto":id,"interruptor":name},

        beforeSend:function(){

            $("#carga").show("fast");
        },

        success:function(respuesta){
            
            $("#carga").hide("fast");
           /* $("#div-results2").html(respuesta);
            $("#myModal2").modal("toggle");*/
        }
        
    
    
    
    
    })
}
    
