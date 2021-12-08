<?php

include('php/conexion.php');
$registros1 = mysqli_query($conexion, "select * from categorias order by categoria asc");
$registros2 = mysqli_query($conexion, "select categoria from categorias where id='$_GET[id_Cat]'");
$fila2 = mysqli_fetch_array($registros2);
$registros3 = mysqli_query($conexion, "select * from productos where id_producto='$_GET[id_producto]'");
$fila3 = mysqli_fetch_array($registros3);

$registrosimagen = mysqli_query($conexion, "select nombre from imagenes where id_producto='$_GET[id_producto]' && prioridad=1");
$filaimagen = mysqli_fetch_array($registrosimagen);

$referenciaimg1 = mysqli_num_rows($registrosimagen);
$referenciaimg2 =  $filaimagen['nombre'];

$registrosimagenes = mysqli_query($conexion, "select nombre from imagenes where id_producto='$_GET[id_producto]' && prioridad=2");
$filaimagenes = mysqli_fetch_array($registrosimagenes);

$referenciaimagenes = mysqli_num_rows($registrosimagenes);
$referenciaimagenes2 =  $filaimagenes['nombre'];




$registros4 = mysqli_query($conexion, "select nombre from imagenes where id_producto='$_GET[id_producto]' && prioridad=3");
$fila4 = mysqli_fetch_array($registros4);




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
  <link rel="stylesheet" href="css/buscadorcss.css">

  <link rel="stylesheet" href="css/stylef.css">

  <link rel="stylesheet" href="css/menu.css">

  <link rel="stylesheet" href="css/hover-min.css">

  <link rel="stylesheet" href="css/animate.css">


  <link rel="stylesheet" href="les.css">
  <link rel="stylesheet" href="lightbox.min.css">
  <script type="text/javascript" src="js/ordenarselect.js"></script>


  <script type="text/javascript" src="js/mostracaracteri.js"></script>



  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

  <!-- Empieza LightBox  -->
  <link rel="stylesheet" href="lightbox/lightbox.min.css" />
  <link rel="stylesheet" href="lightbox/lightbox.min.css" />
  <link rel="stylesheet" href="lightbox/les.css" />
  <script src="lightbox/lightbox-plus-jquery.min.js" type="text/javascript"></script>
  <!-- Termina LightBox -->
  <!---  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">-->

</head>

<body>
  <script></script>
  <div class="menu-btn">
    <i class="fas fa-bars"></i>

  </div>

  <div class="container">
    <a href="index.php">
      <div style="text-align: center" class="ellogo"><img src="imagenes/cajaderegalo3.png" alt="aprlogo" class="nav-brand">
      </div>
    </a>
    <header>
      <nav>
        <ul>

          <li><a href="#"><span class="primero"><i class="icon icon-gift"></i></span>Productos</a>
            <ul>

              <!--<li><a href="#">Item #2</a></li>
            <li><a href="#">Item #3</a></li>
            <li><a href="#">Item #4</a></li>
            <li><a href="#">Item #5</a></li>-->
            </ul>
          </li>
          <li><a href="#"><span class="segundo"><i class="icon icon-gift"></i></span>Regalo2</a>
            <ul>
              <li><a href="#">Item #1</a></li>
              <li><a href="#">Item #2</a></li>
              <li><a href="#">Item #3</a></li>
              <li><a href="#">Item #4</a></li>
              <li><a href="#">Item #5</a></li>
            </ul>
          </li>
          <li><a href="#"><span class="tercero"><i class="icon icon-gift"></i></span>Regalo3</a>
            <ul>
              <?php
              while ($fila1 = mysqli_fetch_array($registros1)) {

              ?>
                <li><a href="mostrarproductos.php?id_Cat=<?php echo $fila1['id']; ?>"> <?php echo utf8_encode($fila1['categoria']); ?></a></li>
              <?php } ?>
            </ul>
          </li>
          <li><a href="#"><span class="cuarto"><i class="icon icon-gift"></i></span>Regalo4</a>
            <ul>
              <li><a href="#">Item #1</a></li>
              <li><a href="#">Item #2</a></li>
              <li><a href="#">Item #3</a></li>
              <li><a href="#">Item #4</a></li>
              <li><a href="#">Item #5</a></li>
            </ul>
          </li>
          <li><a href="#"><span class="quinto"><i class="icon icon-gift"></i></span>Regalo5</a>
            <ul>
              <li><a href="#">Item #1</a></li>
              <li><a href="#">Item #2</a></li>
              <li><a href="#">Item #3</a></li>
              <li><a href="#">Item #4</a></li>
              <li><a href="#">Item #5</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
  </div>

  <!--buscar-->
  <!-- <header class="showcase">show case-->

  <div class="main">
    <p class="iniciop"> <span style="color:black">Inicio</span> -> <?php echo utf8_encode($fila2['categoria']);
                                                                    ?> -><span style="color:blue"><?php echo utf8_encode($fila3['nombre']); ?></span></p>
    <br>

    <!---<img src="administrador/productos/imagenes/1598590938_ 02.jpg"/>-->
    <div class="titulobotonprecio">
      <p style="font-size: 45px; font-family:'Ceviche one',cursive;"><?php echo utf8_encode($fila3['nombre']); ?></p>

      <p style="font-size: 45px; font-family:'Ceviche one',cursive;"><?php echo utf8_encode($fila3['precio']); ?></p>

      <br>
      <input style="width: 175px; font-size: 45px; font-family:'Ceviche one',cursive;" type="number" min="1" max="10" value="1" />
      <br>


      <button type="button" class="btn btn-danger" style="width: 175px; font-size: 45px; font-family:'Ceviche one',cursive; ">Comprar</button>
      <br>

    </div>
    <div class="titulobotonprecio1">
      <p style="width: 175px; font-size: 45px; font-family:'Ceviche one',cursive;">*Caracteristicas:</p>
      <br>
      <div>

        <p class="detallecaracteristica1">
          <?php
          $datadescrpcion = explode(" ", utf8_encode($fila3['descripcion']));
          for ($i = 0; $i < 35; $i++) {
            echo ($datadescrpcion[$i] . " ");
          }
          echo "..."
          ?>

          <div id="mostraroculto" class="detallecaracteristica"> <?php for ($i = 35; $i < count($datadescrpcion); $i++) {
                                                                    echo $datadescrpcion[$i] . " ";
                                                                  } ?></div>
        </p> <br>
        <button onClick="infoss()" id="mastexto" type="button" class="btn btn-info">Mostrar mas...</button>

        <button style="display:none;" id="menostexto" onClick="infoss2()" type="button" class="btn btn-info">Mostrar menos...</button>
      </div>
    </div>



    <!--if(mysqli_num_rows($registrosimagen)>0) echo $filaimagen['nombre'];else echo "no-disponible.jpg";-->
    <div class="imagenesmostrarproductosphp">

      <div class="galery">
        <a href="administrador/productos/imagenes/<?php if ($referenciaimg1 > 0) echo $referenciaimg2;
                                                  else echo "no-disponible.jpg"; ?>" data-lightbox="mygallery" title="<?php echo utf8_encode($fila3['nombre']); ?>">
          <img width="461px" height="352px" src="administrador/productos/imagenes/<?php if ($referenciaimg1 > 0) echo $referenciaimg2;
                                                                                  else echo "no-disponible.jpg"; ?>" alt="image-1" /></a>

        <a href="administrador/productos/imagenes/<?php if ($referenciaimagenes > 0) echo $referenciaimagenes2;
                                                  else echo "no-disponible.jpg"; ?>" data-lightbox="mygallery" title="<?php echo utf8_encode($fila3['nombre']);; ?>"><img width="160px" height="120px" src="administrador/productos/imagenes/<?php if ($referenciaimagenes > 0) echo $referenciaimagenes2;
                                                                                                                                                                                                                                                                                                        else echo "no-disponible.jpg"; ?>" alt="image-1" /></a>
        <a href="administrador/productos/imagenes/<?php if (mysqli_num_rows($registros4) > 0) echo $fila4['nombre'];
                                                  else echo "no-disponible.jpg"; ?>" data-lightbox="mygallery" title="<?php echo utf8_encode($fila3['nombre']); ?>"><img width="160px" height="120px" src="administrador/productos/imagenes/<?php if (mysqli_num_rows($registros4) > 0) echo $fila4['nombre'];
                                                                                                                                                                                                                                                                                                            else echo "no-disponible.jpg"; ?>" alt="image-1" /></a>
        <!-- <a  href="administrador/productos/imagenes/?php if($referenciala3imagen>0) echo $referenciaimagenessihay3;else echo "no-disponible.jpg";?>" data-lightbox="mygallery" title="?php echo utf8_encode( $fila3 ['nombre']);?>"><img  width="160px" height="120px" src="administrador/productos/imagenes/<php if($referenciala3imagen>0) echo $referenciaimagenessihay3;else echo "no-disponible.jpg";?>" alt="image-1" /></a>
   -->

      </div>
    </div>


    <?php
    cerrarconexion();



    ?>
    <div id="sal">
      <br> <br> <br> <br> <br> <br>
      <br> <br> <br> <br> <br> <br>
      <br><br><br><br><br><br><br>
      <br><br><br><br><br><br><br>
      <br><br><br><br> <br>
      <br> <br>
      <br> <br>
      <br> <br>
    </div>
  </div>

  <!--buscar-->









  <section class="social">



    <p>Envianos un mensaje para solicitar tu pedido por nuestras redes sociales</p>
    <div class="links">
      <a href="https://m.me/steph.lf0111"">
      
<i class=" fab fa-facebook-f"></i>
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