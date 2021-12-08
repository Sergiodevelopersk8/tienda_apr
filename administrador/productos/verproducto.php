<?php

include('../../php/conexion.php');


$registros1=mysqli_query($conexion ,"select * from productos where id_producto='$_POST[idproducto]'") ;
echo $_POST['idproducto'];
$fila1=mysqli_fetch_array($registros1);

//seleccionar categoria

$registros2=mysqli_query($conexion ,"select categoria from categorias where id='$fila1[id_categoria]'") ;
//echo $_POST['idproducto'];
$fila2=mysqli_fetch_array($registros2);

echo "<b> nombre: </b>".utf8_encode($fila1['nombre']);

echo "<br><b> precio: </b>".utf8_encode($fila1['precio']);

echo "<br><b> categoria: </b>".utf8_encode($fila2['categoria']);

echo "<br><b> Descripción: </b>".utf8_encode($fila1['descripcion']);
echo "<br> <br>";

$registros3=mysqli_query($conexion ,"select * from imagenes where id_producto='$fila1[id_producto]'") or die ("error en la tabla".mysqli_error($link)) ;

if(mysqli_num_rows($registros3)!=0){

    while($fila3=mysqli_fetch_array($registros3))
    {
       echo $fila3['nombre'];
       echo "<img width='190px' src ='imagenes/".utf8_encode($fila3['nombre'])."'> <br> <br>";

    }
}

?>