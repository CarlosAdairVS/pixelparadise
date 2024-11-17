<?php
session_start();
include_once 'conection.php';

//Capturar datos por POST
$usuario_nuevo =$_POST['nombre_usuario'];
$apellido_nuevo =$_POST['apellido1_usuario'];
$apellidom_nuevo =$_POST['apellido2_usuario'];
$fecha_nac = $_POST['birthday'];
$correo_nuevo = $_POST['correo_usuario'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];

//Verificar duplicidad de usuarios
$sql = 'SELECT * FROM users WHERE email=?';
$sentencia=$mdb->prepare($sql);
$sentencia->execute(array($correo_nuevo));
$resultado = $sentencia->fetch();

var_dump($resultado);
//SI EXISTE USUARIO MATAMOS LA OPERACIÓN
if($resultado){
    echo '</br>Existe este usuario';
    die();
}

//HASH DE CONTRASEÑA
$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

echo '<pre>';
var_dump($usuario_nuevo);
var_dump($apellido_nuevo);
var_dump($apellidom_nuevo);
var_dump($fecha_nac);
var_dump($correo_nuevo);
var_dump($contrasena);
var_dump($contrasena2);
echo '</pre>';

//VERIFICAR CONTRASEÑA
if (password_verify($contrasena2, $contrasena)) {
    echo '¡La contraseña es válida!<br>';

    //AGREGAR A LA BASE DE DATOS
    $tipo = 0;
    try{
    	$sql_agregar = "INSERT INTO users (user_id,type_user,real_name,l_name,ml_name,email,password) VALUES (NULL,?,?,?,?,?,?)";
    	$sentencia_agregar = $mdb->prepare($sql_agregar);
    	$sentencia_agregar->execute(array($tipo,$usuario_nuevo,$apellido_nuevo,$apellidom_nuevo,$correo_nuevo,$contrasena));
    	echo 'Agregado<br>';

    	//Ahora se obtiene el user_id del nuevo usuario
    	$sql = 'SELECT user_id FROM users WHERE email=?';
    	$sentencia = $mdb->prepare($sql);
    	$sentencia->execute(array($correo_nuevo));
    	$resultado = $sentencia->fetch();
    	var_dump($resultado);
    	//Ahora se creara una entrada en la tabla "user_inf"
    	$fecha_creacion = date("Y-m-d");
    	//NOTA:Modificar el campo de user_name,profile_pic DEFAULT ''
    	$sql_agregar = "INSERT INTO user_inf (avatar_id,user_id,birthday_date,create_date) VALUES (NULL,?,?,?)";
    	$sentencia_agregar = $mdb->prepare($sql_agregar);
    	$sentencia_agregar->execute(array($resultado[0],$fecha_nac,$fecha_creacion));
    	echo 'Agregado en user_inf<br>';
    	$_SESSION['user'] = $resultado[0];

    } catch(PDOException $ex){
    	echo $ex->getMessage();
    }
    //cerramos conexión base de datos y sentencia
    $sentencia_agregar = null;
    $mdb = null;
    header('location:init_user.php');


} else {
    //echo 'La contraseña no es válida.';
}
?>