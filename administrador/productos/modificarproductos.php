<?php

session_start();

if(isset($_SESSION['administrador']) && isset($_POST['actualizar'])){

include('../../php/conexion.php');

$id_producto=$_POST['id_producto'];
$precio_nuevo=$_POST['precionuevo'];
$descripcion_nueva=utf8_decode($_POST['descripcionnueva']);

mysqli_query($conexion,"update productos set precio='$precio_nuevo', descripcion='$descripcion_nueva' where id_producto='$id_producto'");


header('location:mostrarproductos.php?alert');

}


else{

    header('location:../index.html');
}

?>