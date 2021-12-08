<?php

session_start();

include('../../php/conexion.php');

?>

<?php
if (isset($_SESSION['administrador'])){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprventas</title>
    <!--font awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
   
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!--font oswald-->

   <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet">
   

<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
   
<!--boostrap-->
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/paginador.css">

<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->

    <!--custom css-->

    
   <!-- <link rel="stylesheet" href=" ../../css/carritocss.css">
    <link rel="stylesheet" href="../../css/buscadorcss.css">-->
    
    <link rel="stylesheet" href="../../css/stylef.css">
    
    <!--<link rel="stylesheet" href="../../css/menu.css">-->
    <link rel="stylesheet" href="../administracion.css">
    
    
    
   <!-- <link rel="stylesheet" href="../dessing.css">-->
    <script src="../../js/modalscript.js"></script>
   
    <script src="../../js/metodoeliminar.js"></script>
<script>

 </script>
    
</head>
<body>
  
<!--carga-->
<div class="ocultar absoluta" id="carga"><img src="../../imagenes/cargando2.gif"/>  </div>
<?php

if(isset($_GET['alert'])){
  ?>
<div class="alert alert-success alert-dismissible " role="alert" id="exito">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <p class="centrarp"><strong>El producto se actualizo correctamente</p>

    </div>
    <?php
}
?>
<a href="../../index.php"> <div style="text-align: center" class="ellogo"><img  src="../../imagenes/cajaderegalo3.png" alt="aprlogo" class="nav-brand">
    </a>  
   
  <div class="tcat">  <strong> Mostrar productos </strong></div> 

<div class="mostrarcat">
 <?php
 
 $total_registros=mysqli_query($conexion,"select count(*) as total from productos");
 $total_filas=mysqli_fetch_array($total_registros)
 ?>
<p class="fuente"><span class="color">Total:</span> de productos <?php echo $total_filas['total'];?></p>
<?php
//paginador
//$registros1=mysqli_query($conexion,"select * from productos order by nombre asc") ;

$registros0=mysqli_query($conexion,"select id_producto from productos ") ;
$numero_total_registros=mysqli_num_rows($registros0);

$TAMANO_PAGINA=2;
$pagina=false;

if(isset($_GET["pagina"]))
$pagina=$_GET["pagina"];

if(!$pagina){
  $inicio=0;
  $pagina=1;
}

else{
  $inicio=($pagina - 1) * $TAMANO_PAGINA;

}

$total_paginas=ceil($numero_total_registros/ $TAMANO_PAGINA);
$registros1=mysqli_query($conexion,"select * from  productos  order by nombre asc LIMIT
".$inicio.",".$TAMANO_PAGINA);


//cerrarconexion();
echo '<p>'
?>

    
  <table class="table table-hover">
<?php
  while($fila1=mysqli_fetch_array($registros1)){
    $registros2=mysqli_query($conexion,"select nombre from imagenes where id_producto='$fila1[id_producto]' and prioridad =1");
    $fila2=mysqli_fetch_array($registros2);

 ?>
    <tr class="activate" id=<?php echo  $fila1['id_producto']; ?>>
        <td><img width="140px" src="imagenes/<?php if(mysqli_num_rows($registros2)!=0)  {
          echo  utf8_encode($fila2['nombre']);}
        else 
        echo "no-disponible.jpg"
        
        ?>"></td>
    <td> <strong>   <?php echo utf8_encode($fila1['nombre']);?>   </strong></td>
    <td> <button onclick="ventana ('<?php echo $fila1['id_producto']?>')" type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal">ver</button>  </td>
    <td> <a href="formmodificarproductos.php?id_producto=<?php  echo $fila1['id_producto'];?>" ><button type="button" class="btn btn-success">Editar</button></a></td>

    <td> <a onclick="eliminarproductojs('<?php echo $fila1['id_producto'];?>')"  > <button type="button" class="btn btn-danger">Eliminar</button>
   </a>  </td>

<?php $registros3  =mysqli_query($conexion,"select inicio from productos where id_producto='$fila1[id_producto]'");

$fila3=mysqli_fetch_array($registros3);




?>
<!--
   <form method="post" action="interruptor.php"> -->
<form > 
   <td> <input  onclick="enchufe(<?php echo $fila1['id_producto']; ?>)" type="radio" name="<?php echo $fila1['id_producto']; ?>" value="activado" <?php if($fila3 ['inicio']==1) echo "checked" ?> /> On </td>
   
   <td> <input onclick="enchufe(<?php echo $fila1['id_producto']; ?>)" type="radio" name="<?php echo $fila1['id_producto']; ?>" value="desactivado" <?php if($fila3 ['inicio']==0) echo "checked" ?>/> Off </td>
   
   

   </form>
  </tr>
  
  <?php
}
?>
  </table>


    </div>
<!-- Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle producto</h4>
      </div>
      <div class="modal-body">

        <div id="div-results"> </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>

<!--modal2--->
<div class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Información</h4>
      </div>
      <div class="modal-body">
        <div id="div-results2"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>

<!-- ----------------ventana modal archivo zip---------------------- -->

<div class="centrar-pag">
<nav>
  <ul class="pagination"> 
<?php 

if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<li><a href="mostrarproductos.php?pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				
				echo '<li><a href="#"><div class="color-pag">'.$pagina.'</div></a></li>';
			else
				
				echo ' <li><a href="mostrarproductos.php?pagina='.$i.'">'.$i.'</a></li> ';
		}
		if ($pagina != $total_paginas)
			echo '<li><a href="mostrarproductos.php?pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	}
	echo '</p>';


?>
	</ul>
</nav>
</div>
</body>

    </html>
<?php 
cerrarconexion();
}


else{
	
	header('location:../index.html');
	
}

?>