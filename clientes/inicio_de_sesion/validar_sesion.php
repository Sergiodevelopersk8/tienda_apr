<?php 
session_start();
if(isset($_POST['email']) && isset($_POST['password'])){
	include('../../php/conexion.php');
	sleep(2);
	$email=mysqli_real_escape_string($conexion,$_POST['email']);
	$password=mysqli_real_escape_string($conexion,$_POST['password']);
	$email=utf8_decode($email);
	$password1=utf8_decode($password);
	//$passfuerte = password_hash($password1,PASSWORD_DEFAULT);
	//$passvery = password_verify($password1,$passfuerte['password']);
	$registros=mysqli_query($conexion,"SELECT id_clientes,nombre,email,password FROM clientes WHERE email='$email' AND password='$password'");
	
		if(mysqli_num_rows($registros)==0)	{
			echo "fallo";}
		
		
		else {	
			$fila=mysqli_fetch_array($registros);
			/*
			$_SESSION['id_cliente']=$fila['id_cliente'];
			$_SESSION['nombre_cliente']=utf8_encode($fila['nombre']);
				
					
			if($_POST['crear_cookie']=="true"){
				
				if(!isset($_COOKIE['nombre_cliente']))
				
				setcookie("nombre_cliente",utf8_encode($fila['nombre']),time()+300,"/");
				setcookie("password_cliente",utf8_encode($fila['password']),time()+300,"/");
				setcookie("email_cliente",utf8_encode($fila['email']),time()+300,"/");	
				setcookie("id_cliente",$fila['id_cliente'],time()+300,"/");		
			}*/
			
			echo "exito";
			
		}
}
cerrarconexion();
?>