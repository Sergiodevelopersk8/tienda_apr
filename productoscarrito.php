<?php

include('php/conexion.php');
$registros1 = mysqli_query($conexion, "select * from categorias order by categoria asc");

$registros2 = mysqli_query($conexion, "select id_producto ,precio from productos where inicio=1 limit 0,12 ");

$unide1 = mysqli_query($conexion, "select id_producto ,precio,id_categoria from productos where inicio=1 limit 0,12 ");

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



  <!--custom css-->

  <link rel="stylesheet" href="css/carritocss.css">

  <link rel="stylesheet" href="css/stylef.css">

  <link rel="stylesheet" href="css/menu.css">

  <link rel="stylesheet" href="css/hover-min.css">

  <link rel="stylesheet" href="css/animate.css">
  <!---  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
</head>

<body>

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

          <li><a href="#"><span class="primero"><i class="icon icon-gift"></i></span>Categorias</a>
            <ul>
              <?php
              while ($fila1 = mysqli_fetch_array($registros1)) {

              ?>
                <li><a href="mostrarproductos.php?id_Cat=<?php echo $fila1['id']; ?>"> <?php echo utf8_encode($fila1['categoria']); ?></a></li>
              <?php } ?>
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
          <li><a href="#"><span class="tercero"><i class="icon icon-gift"></i></span>udemy</a>
            <ul>

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
    <?php
    while ($fila2 = mysqli_fetch_array($unide1)) {

      $registros3 = mysqli_query($conexion, "select nombre from imagenes where id_producto ='$fila2[id_producto]' and prioridad=1");
      $fila3 = mysqli_fetch_array($registros3);

    ?>
      <a href="detalleproducto.php?id_Cat=<?php echo $fila2['id_categoria']; ?>&id_producto=<?php echo $fila2['id_producto']; ?>">
        <div class="productosmain hvr-buzz-out">
          <img src="administrador/productos/imagenes/<?php if (mysqli_num_rows($registros3) > 0) echo $fila3['nombre'];
                                                      else echo "no-disponible.jpg"; ?>" width="100%" alt="portatil1">
          <div class="precio"> <?php echo $fila2['precio'] . " " . "Mx"; ?> </div>
        </div>
      </a>
    <?php
    }

    cerrarconexion();
    ?>
    <div class="limpiar"></div>
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