<?php
session_start();
include_once 'conection.php';

$correo_login = $_POST['correo_usuario'];
$contrasena_login = $_POST['contrasena'];

//Verfica la duplicidad de usuarios
$sql = 'SELECT * FROM users where email=?';
$sentencia = $mdb->prepare($sql);
$sentencia->execute(array($correo_login));
$resultado = $sentencia->fetch();

if($resultado[7] == 1){
	header('Location:aviso.php');
}

if( password_verify($contrasena_login, $resultado['password']) && ($resultado[7] != 1)){
	//Las contrasenas son iguales
	$_SESSION['user'] = $resultado['user_id'];
	//$_SESSION['mail'] = $correo_login;
	header('Location:restricted.php');
} else if(password_verify($contrasena_login, $resultado['password']) && $resultado["disabled"] == 1){
	header('Location:aviso.php');
} else{
	//Las contrasenas no son iguales
	header('Location:login.php');
}
?>