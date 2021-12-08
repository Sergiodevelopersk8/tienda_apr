<?php
session_start(); 


if(!isset($_SESSION['administrador'])){
	if($_POST['nombre']=="admin" && $_POST['password']=="123"){
	
		$_SESSION['administrador']=$_POST['nombre'];
	
	}
}

if (isset($_SESSION['administrador'])){
	
	
	echo "<a href='categorias/formcategorias.php'> Añadir/modificar/eliminar Categorias </a>";
	echo "<br>";
	echo "<a href='productos/formaniadirproductos.php'> Añadir productos </a>";
	echo "<br>";
	echo "<a href='productos/mostrarproductos.php'>mostrar productos</a>";
	
	
	}
	
	else {
		
		header('location:index.html');
		
		}

?>