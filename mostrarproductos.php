
<?php

include('php/conexion.php');

$tener= $_GET ['id_Cat'];
//$registros1=mysqli_query($conexion,"select * from productos order by nombre asc") ;

$registros0=mysqli_query($conexion,"select id_producto from productos where id_categoria='$tener'") ;
$numero_total_registros=mysqli_num_rows($registros0);

$TAMANO_PAGINA=1;
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






$registros1=mysqli_query($conexion,"select * from categorias order by categoria asc");

if(isset($_GET['name'])&& $_GET['name']=="mayormenor"){
$registros2=mysqli_query($conexion,"select id_producto ,precio from productos 
where id_categoria= '$tener' order by precio desc LIMIT
".$inicio.",".$TAMANO_PAGINA);
}
else{

  $registros2=mysqli_query($conexion,"select id_producto ,precio from productos 
  where id_categoria= '$tener' order by precio asc LIMIT
  ".$inicio.",".$TAMANO_PAGINA);

  
  



}

$registros4=mysqli_query($conexion,"select categoria  from categorias 
where id= '$tener'");
$fila4=mysqli_fetch_array($registros4);
//$fila4cate=$fila4['categoria'];

//cerrarconexion();
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
    <!--custom css-->

    <link rel="stylesheet" href="css/carritocss.css">
    
    <link rel="stylesheet" href="css/stylef.css">
    
    
    <link rel="stylesheet" href="../../css/paginadormostrarproductos.css" important>
    <link rel="stylesheet" href="css/hover-min.css">
    
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="administrador/administracion.css">
    
<script type="text/javascript" src="js/paginar.js"></script>
    
<script type="text/javascript" src="js/ordenarselect.js"></script>
    
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <!---  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
</head>
<body>

<div class="menu-btn">
  <i class="fas fa-bars"></i>
  
</div>

<div class="container">
  <a href="index.php"> <div style="text-align: center" class="ellogo"><img  src="imagenes/cajaderegalo3.png" alt="aprlogo" class="nav-brand">
  </div></a>
  <header>
  <a href="productoscarrito.php"><div href="#" class="arrow arrow-left"> categorias</div></a>



  
      
  </header>
</div>
     
    <!--buscar-->
    <!-- <header class="showcase">show case-->

    <div class="main">
      <p class="iniciop"> <span style="color:black">Inicio</span> -> <?php echo utf8_encode($fila4['categoria']);?></p>
      <p><form name="form1">
      <select  onchange="f_ordenar('<?php echo $tener ?>')" class="form-control" name="ordenar">
      <option>oredenar por..</option>
      <option value="menormayor">Ordenar por precio de menor a mayor </option>
      <option value="mayormenor">Ordenar por precio de mayor a menor</option>
      </select>
      
      </form></p>
      <?php
while ($fila2=mysqli_fetch_array($registros2)){
  
$registros3=mysqli_query($conexion,"select nombre from imagenes where id_producto ='$fila2[id_producto]' and prioridad=1");
$fila3=mysqli_fetch_array($registros3);

      ?>
     <a href="detalleproducto.php?id_Cat=<?php echo $tener ?>&id_producto=<?php echo $fila2['id_producto'];?>"> 
     <div class="productosmain hvr-curl-top-left">
       <img src="administrador/productos/imagenes/<?php if(mysqli_num_rows($registros3)>0)echo $fila3['nombre']; else echo "no-disponible.jpg"; ?>" 
      width="100%" alt="portatil1">
      <div class="precio"> <?php echo $fila2 ['precio']." "."Mx";?>   </div></div></a>
      <?php
}

cerrarconexion();
      ?>
      <div class="limpiar"></div>

      <div class="centrar-pag">
<nav>
  <ul class="pagination"> 
<?php 
if(isset($_GET['name'])){

if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<li><a href="mostrarproductos.php?name='.$_GET['name'].'&id_Cat='.$tener.'&pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				
				echo '<li><a href="#"><div class="color-pag">'.$pagina.'</div></a></li>';
			else
				
				echo ' <li><a href="mostrarproductos.php?name='.$_GET['name'].'&id_Cat='.$tener.'&pagina='.$i.'">'.$i.'</a></li> ';
		}
		if ($pagina != $total_paginas)
			echo '<li><a href="mostrarproductos.php?name='.$_GET['name'].'&id_Cat='.$tener.'&pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	}
	echo '</p>';

}

else{
  if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<li><a href="mostrarproductos.php?id_Cat='.$tener.'&pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				
				echo '<li><a href="#"><div class="color-pag">'.$pagina.'</div></a></li>';
			else
				
				echo ' <li><a href="mostrarproductos.php?id_Cat='.$tener.'&pagina='.$i.'">'.$i.'</a></li> ';
		}
		if ($pagina != $total_paginas)
			echo '<li><a href="mostrarproductos.php?id_Cat='.$tener.'&pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	}
	echo '</p>';


}
?>

  </ul>
</nav>
      </div>
    </div>
 
    <!--buscar-->
    
   
   
  
  

 
  

<section class="social">

  
  
  <p>Envianos un mensaje para solicitar tu pedido por nuestras redes sociales</p>
  <div class="links">
    <a href="https://m.me/steph.lf0111"">
      
<i class="fab fa-facebook-f"></i>
    </a>
    
    <a href="https://www.instagram.com/direct/inbox/">
      
      <i class="fab fa-instagram"></i>
          </a>
          
   
  </div>

</section>
</div>

<div class="footer-div">
  <div class="footer-container">
    <ul>
      <li>
        <p>Gracias por confiar en nosotros</p>
      </li>
    </ul>
    <ul>
      <li>
        <p>Gracias por confiar en nosotros</p>
      </li>
    </ul>
    <ul>
      <li>
        <p>Gracias por confiar en nosotros</p>
      </li>
    </ul>
    <ul>
      <li>
        <p>Gracias por confiar en nosotros</p>
      </li>
    </ul>
  </div>
</div>

<footer class="footer">
  <h3> @Sergio Merino</h3>

</footer>
<!--para javascript-->
<script src="https://unpkg.com/scrollreveal"></script>

<script src="js/main.js"></script>
<script src="js/search.js"></script>
<script src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!--scrollreveal-->
<script src="https://unpkg.com/scrollreveal"></script>



</body>
</html>