<?php
session_start();


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
   
<!--boostrap-->
<link rel="stylesheet" href="../../css/bootstrap.min.css">

<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->

    <!--custom css-->

    
   <!-- <link rel="stylesheet" href=" ../../css/carritocss.css">
    <link rel="stylesheet" href="../../css/buscadorcss.css">-->
    
    <link rel="stylesheet" href="../../css/stylef.css">
    
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../administracion.css">
    
    <link rel="stylesheet" href="dessing.css">
    <script src="../../js/metodoeliminar.js"></script>
   
  
    
</head>

<body>

  <?php
  
  if(isset($_GET['alert'])) { 
    $alert=$_GET['alert'];

    switch ($alert){

      case 1:

  ?>


  
<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <p class="centrarp"><strong>Bien</strong> la categoria <strong><?php echo utf8_encode ($_GET['categoria']);?></strong> se agrego correctamente</p>

    </div>
  <?php 
   break;
   case 2:
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
  </button>
  <p class="centrarp">No se a añadido ninguna categoria perro estupido</p>

  </div>
  <?php
  break;
  case 3:
    ?>
     <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
  </button>
  <p class="centrarp">La categoria <strong><?php echo $_GET['categoria'];?></strong> ya existe perro estupido</p>

  </div>
    <?php
    break;
    case 4:

?>
  
  <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <p class="centrarp"><strong>Bien</strong> la categoria <strong><?php  echo utf8_encode( $_GET['categoriavieja']);?></strong>
     se actualizo correctamente
      por <strong><?php echo utf8_encode ($_GET['categorianueva']);?></strong>  </p>

    </div>
<?php
break;
case 5:


?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
  </button>
  <p class="centrarp">No has actualizado ninguna categoria</p>

  </div>


<?php
   break;

  }
}

?>


    <a href="../../index.php"> <div style="text-align: center" class="ellogo"><img  src="../../imagenes/cajaderegalo3.png" alt="aprlogo" class="nav-brand">
    </a>  
   
  <div class="tcat">  <strong> Añadir  Categorias </strong></div> 
   <div class="formulario">
    <form class="form-horizontal" method="post" action="anadircategorias.php" >
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">categorias</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="categoria" name="categoria">
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Añadir</button>
        </div>
      </div>
    </form>
    </div>

    <div class="mostrarcat">
<?php

include('../../php/conexion.php');
$registros=mysqli_query($conexion,"select * from categorias order by id desc");
cerrarconexion();
?>

  
  <table class="table table-hover">
<?php
  while($fila=mysqli_fetch_array($registros)){
 ?>
    <tr class="activate" id=<?php echo  $fila['id'];?>>
    <td> <strong>   <?php echo utf8_encode($fila['categoria']);?>   </strong></td>
    <td> <a href="formmodificarcategorias.php?categoriavieja=<?php echo utf8_encode($fila['categoria']);   ?>" ><button type="button" class="btn btn-success">Editar</button></a></td>

    <td> <a onclick="eliminar('<?php echo utf8_encode ($fila['id']);?>')" > <button type="button" class="btn btn-danger">Eliminar</button> </a></td>
  </tr>
  
  <?php
}
?>
  </table>


    </div>
    </body>
    </html>
<?php 
}


else{
	
	header('location:../index.html');
	
}

?>

