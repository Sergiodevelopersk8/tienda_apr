<?php 
include('../php/conexion.php');
include('../php/funciones.php');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

	sleep(2);

	$nombre=mysqli_real_escape_string($conexion,$_POST['nombre']);
	$apellidos=mysqli_real_escape_string($conexion,$_POST['apellidos']);
	$email=mysqli_real_escape_string($conexion,$_POST['email']);
	$direccion=mysqli_real_escape_string($conexion,$_POST['direccion']);
	$estado=mysqli_real_escape_string($conexion,$_POST['estado']);
	$cp=mysqli_real_escape_string($conexion,$_POST['cp']);
	$telefono=mysqli_real_escape_string($conexion,$_POST['telefono']);
	$password=mysqli_real_escape_string($conexion,$_POST['password']);
	
//------------------------------------------------------//
	
	//$nombre=ucwords($nombre);
	//$apellidos=ucwords($apellidos);
	
	
	$nombre=utf8_decode($nombre);
	$apellidos=utf8_decode($apellidos);
	$email=utf8_decode($email);
	$direccion=utf8_decode($direccion);
	$estado=utf8_decode($estado);
	$cp=utf8_decode($cp);
	$telefono=utf8_decode($telefono);
	$password=utf8_decode($password);
	$passfuerte = password_hash($password,PASSWORD_DEFAULT);

//Verificación de clientes

$registros = mysqli_query($conexion,"SELECT email FROM clientes WHERE email='$email'");

if(mysqli_num_rows($registros)==0){


	mysqli_query($conexion,"INSERT INTO clientes (nombre,apellido,email,direccion,cp,estado,telefono,password) VALUES 	('$nombre','$apellidos','$email','$direccion','$cp','$estado','$telefono','$passfuerte')");
echo ("exito");
}

else{
	echo ("falso");
}


cerrarconexion();
?>