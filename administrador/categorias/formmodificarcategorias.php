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
    
   
  
    
</head>

<body>

    <a href="../../index.php"> <div style="text-align: center" class="ellogo"><img  src="../../imagenes/cajaderegalo3.png" alt="aprlogo" class="nav-brand">
    </a>  
   
  <div class="tcat">  Actualizar  Categorias</div> 
   <div class="formulario">
    <form class="form-horizontal" method="post" action="modificarcategorias.php" >
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">categorias</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" placeholder="<?php echo $_GET['categoriavieja'] ?>" name="categorianueva">
      <input type="hidden" name="categoriavieja" value="<?php  echo $_GET['categoriavieja'] ?>">
    
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Editar</button>
        </div>
      </div>
    </form>
    </div>

    </body>
    </html>
<?php } 
else{header('location:../index.html');}

?>

