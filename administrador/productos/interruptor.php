<?php
sleep(1);
session_start();
if(isset($_SESSION['administrador']) && isset($_POST['interruptor']) ){
include('../../php/conexion.php');

if($_POST['interruptor']=="activado"){ 

    mysqli_query($conexion,"update productos set inicio='1' where id_producto='$_POST[id_producto]'");
    
echo "producto activado correctamente";
    cerrarconexion();
}
else if ($_POST['interruptor']=="desactivado"){ 
    
mysqli_query($conexion,"update productos set inicio='0' where id_producto='$_POST[id_producto]'");

echo "producto desactivado ";
cerrarconexion();
}
header('location:mostrarproductos.php');


}
else{
    header('location:../index.html');
}

?>