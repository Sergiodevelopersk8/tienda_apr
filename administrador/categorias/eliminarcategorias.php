<?php

session_start();
if(isset($_SESSION['administrador'])){

$idcategoria=$_POST['idcategoria'];
include('../../php/conexion.php');
$registros1=mysqli_query($conexion,"select id_producto from productos  where id_categoria ='$idcategoria'");
while($fila1=mysqli_fetch_array($registros1)){

    $registros2=mysqli_query($conexion," select nombre from imagenes where id_producto='$fila1[id_producto]'");

    while($fila2 =mysqli_fetch_array($registros2)){
        unlink("../productos/imagenes/".$fila2['nombre']);
    }

    mysqli_query($conexion,"delete from imagenes where id_producto='$fila1[id_producto]'");
mysqli_query($conexion,"delete from productos where id_producto='$fila1[id_producto]'");


}
mysqli_query($conexion,"delete from categorias where id='$idcategoria'");
cerrarconexion();


//header('location:formcategorias.php');




}

else{
    header('location:../index.html');
}


?>