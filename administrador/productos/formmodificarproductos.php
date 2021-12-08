<?php
session_start();
if(isset($_SESSION['administrador']) && $_GET['id_producto'] !=""){
include('../../php/conexion.php');
$registros= mysqli_query($conexion," SELECT id_producto,precio,descripcion FROM productos WHERE 
id_producto='$_GET[id_producto]'    ");
$fila=mysqli_fetch_array($registros);

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
   
<!--boostrap-->
<link rel="stylesheet" href="../../css/bootstrap.min.css">

<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>

<script src="../../js/alertasproductos.js"></script>

    <!--custom css-->

    
   <!-- <link rel="stylesheet" href=" ../../css/carritocss.css">
    <link rel="stylesheet" href="../../css/buscadorcss.css">-->
    
    <link rel="stylesheet" href="../../css/stylef.css">
    
<link rel="stylesheet" href="../../css/carg.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../administracion.css">
    
    <link rel="stylesheet" href="../categorias/dessing.css">
    <link rel="stylesheet" href="productos.css">

    <body>



<a href="../../index.html">
<div style="text-align: center" class="ellogo"><img  src="../../imagenes/cajaderegalo3.png" alt="aprlogo" class="nav-brand"> 
    </a>  
   
  <div class="tcat">  <strong> Actualizar  Productos </strong></div> 
  
  <div class="formulario">
  <form class="form-horizontal"  method="post"  action="modificarproductos.php"   >
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">PRECIO</label>
        <div class="col-sm-10">
          <input  type="number" step="any" class="form-control" id="inputEmail3" placeholder="Nombre del producto" name="precionuevo" 
          value="<?php echo $fila ['precio'];?>">
        </div>
      </div>


      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">descripcion</label>
        <div class="col-sm-10">
          <textarea onkeyup="validadodescripcion()" class="form-control" rows="3" placeholder="descripcion del producto" name="descripcionnueva"><?php echo utf8_encode($fila['descripcion']);?></textarea>
          
        </div>
      </div>

<input type="hidden" name="id_producto" value="<?php echo $fila['id_producto'];  ?>"

<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button  type="submit" name="actualizar" class="btn btn-primary">ACTUALIZAR</button>
          
        </div>
      </div>
    </form>

<?php
}
else{

    header('location:../index.html');
}



?>