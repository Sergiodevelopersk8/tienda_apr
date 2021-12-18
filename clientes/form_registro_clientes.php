<?php
session_start();
if(isset($_SESSION['id_clientes'])){
  header('location:zona_clientes/index.php');
}
include('../php/conexion.php');
$registros1=mysqli_query($conexion,"select*from categorias order by categorias asc");

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/stylef.css">
  <link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
<!-- bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

<script src="../javascript/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/menu.css">  
  <link rel="stylesheet" href="clientes.css">
  <title>Document</title>
</head>

<body>
  <div class="menu-btn">
    <i class="fas fa-bars"></i>
  </div>

  <div class="container">
    <!--buscar-->

    <!--buscar-->
    <div style="text-align: center" class="ellogo"> <img src="../imagenes/cajaderegalo3.png" alt="aprlogo" class="nav-brand">
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
          <li><a href="#"><span class="tercero"><i class="icon icon-gift"></i></span>3</a>

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
</body>
<!-- alert debe estar registrado para poder comprar-->
<div style="margin-top:30px">
	<div class="alert alert-success alert-dismissible" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span 			    aria-hidden="true">&times;</span></button>
    <p style="text-align:center"><strong>Debe estar registrado</strong> para poder comprar. Gracias.</p>
    </div>
</div>



<div class="main">

<form name="formregistro" action="registro_clientes.php" method="post">
  <div class="form-group">
    <label>Nombre*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadonombre()" type="tex" name="nombre" class="form-control" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label>Apellidos*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadoapellidos()" type="tex" name="apellidos" class="form-control"  placeholder="Apellidos">
  </div>
  <div class="form-group">
    <label>Email*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadoemail()" type="email" name="email" class="form-control"  placeholder="Email">
  </div>

<!-- alert email -->
  <div class="alert alert-danger alert-dismissible ocultar" id="avisomail" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Email no valido.</p>
    </div>

  </br>
  <div class="form-inline">
   <div class="form-group">
    <label>Dirección*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadodireccion()" type="text" name="direccion" class="form-control"  placeholder="Dirección completa">
  </div>
  <div class="form-group">
    <label>C. P.*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadocp()" type="text" name="cp" class="form-control" >
  </div>
  	<label>Estado*</label>
  <select onChange="validadocampos()" onClick="validadoestado()" class="form-control" name="estado">
  <option value=""></option>
  <option value="Puebla">Puebla</option>
  <option value="DF">DF</option>
  <option value="Monterrey">Monterrey</option>
  <option value="Oaxaca">Oaxaca</option>
  <option value="Guadalajara">Guadalajara</option>
  <option value="Cuernavaca">Cuernavaca</option>
  </select>
 </div>
  </br>
  
  <div class="form-group">
    <label>Teléfono</label>
    <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
  </div>
  <div class="form-group">
    <label>Contraseña*</label>
    <input onKeyPress="validadocampos()" onBlur="validadopassword1()" type="password" name="password1" class="form-control" placeholder="Contraseña">
  </div>
  <div class="form-group">
  
<!-- alert contraseñas no coinciden -->

 <div class="alert alert-danger alert-dismissible ocultar" id="avisopassword2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Las contraseña no puede tener espacios en blanco y debe tener como mínimo 8 caracteres y un número</p>
    </div>
  
    <label>Repetir Contraseña*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadopassword2()" type="password" name="password2" class="form-control" placeholder="Contraseña">
  </div>
  
<!-- alert contraseñas no coinciden -->

 <div class="alert alert-danger alert-dismissible ocultar" id="avisopassword" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Las contraseñas no coinciden</p>
    </div>

    <div class="checkbox">
    <label>
      <input  onClick="validadoprivacidad()" type="checkbox" id="acepto" name="aceptar"> Acepto la política de privacidad.<a href="#">Leer</a>
    </label>
  </div>
  
<!-- alert campos vacios -->
  <div class="alert alert-danger alert-dismissible ocultar" id="avisocampos" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Debe rellenar todos los campos con * obligatoriamente</p>
    </div>
    
<!-- alert política de privacidad -->

 <div class="alert alert-danger alert-dismissible ocultar" id="avisoprivacidad" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Debe aceptar nuestra política de privacidad</p>
    </div>
 <!-- carga-->
<div class="ocultar" id="carga"><img src="../imagenes/cargando.gif"/></div>

<!-- aler exito-->
<div class="alert alert-success alert-dismissible ocultar" id="exito" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span 			    aria-hidden="true">&times;</span></button>
    <p style="text-align:center"><strong>Gracias por registrarse.</strong></p>
    </div>
    
<!-- email repetido-->

  <div class="alert alert-danger alert-dismissible ocultar" id="emailrepetido" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>Este email ya se encuentra en nuestra base de datos.</strong></p>
    </div>
    


  <button type="button" onClick="validarformulario()" class="btn btn-default">Enviar</button>
</form>

</div>

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

  <script src="../js/main.js"></script>
  
<script src="../js/registro_clientes.js"></script>
  <!--scrollreveal-->
  <script src="https://unpkg.com/scrollreveal"></script>

<script>
  
</script>

</body>

</html>