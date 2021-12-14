<?php
session_start();


include('php/conexion.php');
$registros1 = mysqli_query($conexion, "select * from categorias order by categoria asc");

$registros2 = mysqli_query($conexion, "select id_producto ,precio from productos where inicio=1 limit 0,12 ");
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
  <!--font oswald-->

  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet">



  <!--custom css-->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/stylef.css">

  <link rel="stylesheet" href="css/menu.css">



</head>

<body>

  <style>
    form {
      position: absolute;
      width: 60px;
      left: 48%;
      background: #2f3640;
      height: 60px;
      border-radius: 40px;
      padding: 10px;
      transform: translate(-50%, -50%);
      border-radius: 50px;
      border: 4px solid #2f3640;
      box-sizing: border-box;
      background: #2f3640;
      transition: 1.5s;
    }

    .busq {
      position: absolute;
      border: 0;
      left: 0;
      border: 0;
      width: 100%;
      height: 52px;
      line-height: 75px;
      outline: 0;
      display: none;
      font-size: 16px;
      border-radius: 25px;
      padding: 0 20px;
      margin-top: -9px;
      background: #2f3640;
    }

    i.fas {
      margin-top: -15px;
    }

    .busquedaprod {
      position: absolute;
      top: -1px;
      right: 0;
      width: 52px;
      height: 52px;
      box-sizing: border-box;
      border-radius: 50%;
      font-size: 25px;
      text-align: center;
      transition: _1.5s;
      color: red;
      padding: 15px;
      background: #2f3640;
    }

    form:hover {
      width: 400px;
      cursor: pointer;

    }


    form:hover .busq {
      display: block;
    }

    .lupa {
      float: right;
      margin-right: 300px;
    }
  </style>
  <div class="menu-btn">
    <i class="fas fa-bars"></i>
  </div>

  <div class="container">
    <!--buscar-->

    <!--buscar-->
    <div style="text-align: center" class="ellogo"> <img src="imagenes/cajaderegalo3.png" alt="aprlogo" class="nav-brand">
    </div>

    <header>
      <nav>
        <ul>
          <li><a href="administrador/index.html"><span class="primero"><i class="icon icon-gift"></i></span>principal</a>
            <ul>
              <li><a href="php/conexion.php">Item #1</a></li>
              <li><a href="#">Item #2</a></li>
              <li><a href="#">Item #3</a></li>
              <li><a href="#">Item #4</a></li>
              <li><a href="#">Item #5</a></li>
            </ul>
          </li>
          <li><a href="productoscarrito.php"><span class="segundo"><i class="icon icon-gift"></i></span>Productos</a>
            <!---  <ul>
                <li><a href="#">Item #1</a></li>
                <li><a href="#">Item #2</a></li>
                <li><a href="#">Item #3</a></li>
                <li><a href="#">Item #4</a></li>
                <li><a href="#">Item #5</a></li>
              </ul>-->
          </li>
          <li><a href="clientes/form_registro_clientes.php"><span class="tercero"><i class="icon icon-gift"></i></span>clientes</a>
          <ul>
              <li><a href="login.php">Login</a></li>
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
    <!---inicio Bucador lupa---->
    <div class="lupa">
      <form action="Busqueda.php" method="post">
        <input class="busq" type="search" name="buscar" value="" placeholder="buscar aqui">
        <button class="busquedaprod" type="submit">

          <i class="fas fa-search"></i>
        </button>
      </form>
    </div>
    <!---fin Bucador lupa---->
    <br> <br> <br> <br> <br> <br> <br> <br>
    <!--slider prueba-->
    <div class="hola">
      <div class="wrapper">
        <input checked type=radio name="slider" id="slide1" />
        <input type=radio name="slider" id="slide2" />
        <input type=radio name="slider" id="slide3" />
        <input type=radio name="slider" id="slide4" />
        <input type=radio name="slider" id="slide5" />

        <div class="slider-wrapper">
          <div class=inner>
            <article>
              <div class="info top-left">
                <h3>Producto1</h3>
              </div>
              <img class="Pasar" src="imagenes/regalo.jpg" />
            </article>

            <article>
              <div class="info bottom-right">
                <h3>Producto2</h3>
              </div>
              <img class="Pasar" src="imagenes/regalos.jpg" />
            </article>

            <article>
              <div class="info bottom-left">
                <h3>Producto3</h3>
              </div>
              <img class="Pasar" src="imagenes/regalo2.jpg" />
            </article>

            <article>
              <div class="info top-right">
                <h3>Producto4</h3>
              </div>
              <img class="Pasar" src="imagenes/regalo2.jpg" />
            </article>

            <article>
              <div class="Pasar" class="info bottom-left">
                <h3>Producto5</h3>
              </div>
              <img class="Pasar" src="imagenes/regalo2.jpg" />
            </article>
          </div>
          <!-- .inner -->

        </div>
        <!-- .slider-wrapper -->
        <div class="slider-prev-next-control">
          <label for=slide1></label>
          <label for=slide2></label>
          <label for=slide3></label>
          <label for=slide4></label>
          <label for=slide5></label>
        </div>
        <!-- .slider-prev-next-control -->

        <div class="slider-dot-control">
          <label for=slide1></label>
          <label for=slide2></label>
          <label for=slide3></label>
          <label for=slide4></label>
          <label for=slide5></label>
        </div>

        <!-- .slider-dot-control -->
      </div>

    </div>
    <!--cartas de regalos-->

    <div class="aquiva">

      <div class="primeraimagen">
        <img src="imagenes/regalo1.jpg" class="imagenizquierda">
        <p class="paquetereg1">Paquete1</p>
      </div>

      <div class="segundaimagen">
        <img src="imagenes/regalo2.jpg" class="imagenderecha">
        <p class="paquetereg2">Paquete2</p>
      </div>

      <div class="terceraimagen">
        <img src="imagenes/regalo2.jpg" class="imagenderechaabajo">
        <p class="paquetereg2">Paquete3</p>
      </div>

      <div class="ultimo">
        <img src="imagenes/regalos.jpg" class="ultmaimagen">
        <p class="paquetereg2">Paquete4</p>
      </div>



    </div>

    <div class="news-cards">

      <div>
        <img src="imagenes/regalo1.jpg" alt="Newsregalos1">
        <h3>seccion de los regalos muestra</h3>
        <p>texto plus</p>
        <a href="#">leran more <i class="fas fa-angle-double-right"></i></a>
      </div>

      <div>
        <img src="imagenes/regalo.jpg" alt="Newsregalos1">
        <h3>seccion de los regalos muestra</h3>
        <p>texto plus</p>
        <a href="#">leran more <i class="fas fa-angle-double-right"></i></a>
      </div>
      <div>
        <img src="imagenes/regalo2.jpg" alt="Newsregalos1">
        <h3>seccion de los regalos muestra</h3>
        <p>texto plus</p>
        <a href="#">leran more <i class="fas fa-angle-double-right"></i></a>
      </div>
      <div>
        <img src="imagenes/regalos1.jpg" alt="Newsregalos1">
        <h3>seccion de los regalos muestra</h3>
        <p>texto plus</p>
        <a href="#">leran more <i class="fas fa-angle-double-right"></i></a>
      </div>
      <div>
        <img src="imagenes/regalo1.jpg" alt="Newsregalos1">
        <h3>seccion de los regalos muestra</h3>
        <p>texto plus</p>
        <a href="#">leran more <i class="fas fa-angle-double-right"></i></a>
      </div>

      <div>
        <img src="imagenes/regalo.jpg" alt="Newsregalos1">
        <h3>seccion de los regalos muestra</h3>
        <p>texto plus</p>
        <a href="#">leran more <i class="fas fa-angle-double-right"></i></a>
      </div>
      <div>
        <img src="imagenes/regalo2.jpg" alt="Newsregalos1">
        <h3>seccion de los regalos muestra</h3>
        <p>texto plus</p>
        <a href="#">leran more <i class="fas fa-angle-double-right"></i></a>
      </div>
      <div>
        <img src="imagenes/regalos1.jpg" alt="Newsregalos1">
        <h3>seccion de los regalos muestra</h3>
        <p>texto plus</p>
        <a href="#">leran more <i class="fas fa-angle-double-right"></i></a>
      </div>
      <div>
        <img src="imagenes/regalo1.jpg" alt="Newsregalos1">
        <h3>seccion de los regalos muestra</h3>
        <p>texto plus</p>
        <a href="#">leran more <i class="fas fa-angle-double-right"></i></a>
      </div>

      <div>
        <img src="imagenes/regalo.jpg" alt="Newsregalos1">
        <h3>seccion de los regalos muestra</h3>
        <p>texto plus</p>
        <a href="#">leran more <i class="fas fa-angle-double-right"></i></a>
      </div>
      <div>
        <img src="imagenes/regalo2.jpg" alt="Newsregalos1">
        <h3>seccion de los regalos muestra</h3>
        <p>texto plus</p>
        <a href="#">leran more <i class="fas fa-angle-double-right"></i></a>
      </div>
      <div>
        <img src="imagenes/regalos1.jpg" alt="Newsregalos1">
        <h3>seccion de los regalos muestra</h3>
        <p>texto plus</p>
        <a href="#">leran more <i class="fas fa-angle-double-right"></i></a>
      </div>

    </div>
    <!--lo separa para otra prueba de otro slider despues-->

    <!--lo separa para otra prueba de otro slider despues-->



    <!--redes sociales-->


    <section class="social">
      <p>Envianos un mensaje para solicitar tu pedido por nuestras redes sociales</p>
      <div class="links">
        <a href="https://m.me/steph.lf0111"">
      
<i class=" fab fa-facebook-f"></i>
        </a>

        <a href="https://www.instagram.com/samsamblackcat/">

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
  <!--scrollreveal-->
  <script src="https://unpkg.com/scrollreveal"></script>



</body>

</html>