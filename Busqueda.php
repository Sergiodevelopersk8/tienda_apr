<?php
if (!isset($_POST['buscar'])) header('location:index.php');
include('php/conexion.php');
$registros1 = mysqli_query($conexion, "select * from categorias order by categoria asc");
$buscar = mysqli_real_escape_string($conexion, $_POST['buscar']);
$buscar = utf8_decode($buscar);
$registros2 = mysqli_query($conexion, "SELECT id_producto,precio,id_categoria,categoria,nombre FROM `productos` inner join categorias on id_categoria=id
 WHERE nombre like'%$buscar%' or categoria like'%$buscar%';");







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

  <link rel="stylesheet" href="css/buscadorcss.css">

  <link rel="stylesheet" href="css/stylef.css">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">

  <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">

  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

  <script src="js/saltosbr.js"></script>
  <link rel="stylesheet" href="css/menu.css">

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
          <li><a href="#"><span class="primero"><i class="icon icon-gift"></i></span>hola</a>
            <ul>
              <li><a href="#">Item #1</a></li>
              <li><a href="#">Item #2</a></li>
              <li><a href="#">Item #3</a></li>
              <li><a href="#">Item #4</a></li>
              <li><a href="#">Item #5</a></li>
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
              <li><a href="#">Item #1</a></li>
              <li><a href="#">Item #2</a></li>
              <li><a href="#">Item #3</a></li>
              <li><a href="#">Item #4</a></li>
              <li><a href="#">Item #5</a></li>
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


    <!--buscar-->
    <!--show case-->
    <header class="showcase">

      <div>
        <!--buscar-->

        <!--<div class="search-box">
      <input class="search-txt"   type="text" name="buscar" value="" placeholder="buscar aqui" id="obtener" >
      <button class="search-btn"   href="#" >
        
      <i class="fas fa-search"></i>
      </button>
     
      </div>-->

        <div class="lupa">
          <form action="Busqueda.php" method="post">
            <input class="busq" type="search" name="buscar" value="" placeholder="buscar aqui">
            <button class="busquedaprod" type="submit">

              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>

    </header>
    <div class="main">

      <?php

      if ($_POST['buscar'] != "") {
        if (mysqli_num_rows($registros2) > 0) {
          while ($fila2 = mysqli_fetch_array($registros2)) {

            $registros3 = mysqli_query($conexion, "select nombre from imagenes where id_producto ='$fila2[id_producto]' and prioridad=1");
            $fila3 = mysqli_fetch_array($registros3);

      ?>
            <a href="detalleproducto.php?id_Cat=<?php echo $fila2['id_categoria']; ?>
     &id_producto=<?php echo $fila2['id_producto']; ?>">
              <div class="productosmain hvr-curl-top-left">
                <img src="administrador/productos/imagenes/<?php if (mysqli_num_rows($registros3) > 0) echo $fila3['nombre'];
                                                            else echo "no-disponible.jpg"; ?>" width="100%" alt="portatil1">
                <div class="precio"> <?php echo $fila2['precio'] . " " . "Mx" . " <br> <span style=color:red; font-family:ceviche One,,cursive>" . $fila2['nombre'] . "</br>"; ?>
                </div>
              </div>
            </a>
          <?php
          }
        } else { ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <p class="centrarp">No ha encontrado <?php echo $buscar ?> </p>

          </div>
        <?php
        }
      } else { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
          <p class="centrarp">No escribio nada</p>

        </div>
      <?php
      }
      cerrarconexion();
      ?>


    </div>

  </div>

  <div class="uncontenedor">
    <div class="buscadordiv1">

    </div>


    <div id="resultado1"></div>



  </div>



  <section class="social">

    <div id="saltosdelinea"></div>

    <p>Envianos un mensaje para solicitar tu pedido por nuestras redes sociales</p>
    <div class="links">
      <a class="redessociales" href="https://m.me/steph.lf0111"">
      
<i class=" fab fa-facebook-f"></i>
      </a>

      <a class="redessociales" href="https://www.instagram.com/direct/inbox/">

        <i class="fab fa-instagram"></i>
      </a>


    </div>

  </section>
  </div>

  <div class="footer-div">
    <div class="footer-container">
      <ul>
        <li style="color:white">
          <p>Gracias por confiar en nosotros</p>
        </li>
      </ul>
      <ul>
        <li style="color:white">
          <p>Gracias por confiar en nosotros</p>
        </li>
      </ul>
      <ul>
        <li style="color:white">
          <p>Gracias por confiar en nosotros</p>
        </li>
      </ul>
      <ul>
        <li style="color:white">
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

  <!--scrollreveal-->
  <script src="https://unpkg.com/scrollreveal"></script>



</body>

</html>