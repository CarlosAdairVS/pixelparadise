<?php
session_start();
include_once 'conection.php';
$user_name = $_POST['nombre_usuario'];
$last_name = $_POST['apellido1_usuario'];
$mlast_name = $_POST['apellido2_usuario'];
$avatar = $_POST['nombre_avatar'];
$birthday = $_POST['birthday'];

if( isset($_SESSION['user'])){
	if ($_FILES['profile_pic']['size'] > 0) {
		$filename = $_FILES['profile_pic']['tmp_name'];
		$file = fopen($filename, 'r');
		$fileContent = fread($file, $_FILES['profile_pic']['size']);
		fclose($file);
		try{
			//Actualizacion de informacion de usuario con imagen
			//Preparamos la sentencia
			$sql_agregar = "UPDATE user_inf SET user_name=?, birthday_date=?, profile_pic=? WHERE user_id=?";
            $sentencia_agregar = $mdb->prepare($sql_agregar);
            $sentencia_agregar->bindParam(1, $avatar);
            $sentencia_agregar->bindParam(2, $birthday);
            $sentencia_agregar->bindParam(3, $fileContent, PDO::PARAM_LOB);
            $sentencia_agregar->bindParam(4, $_SESSION['user']);
            $sentencia_agregar->execute();
		} catch(PDOException $ex){
			echo $ex->getMessage();
		}
	} else{
		//Actualizacion de informacion de usuario sin imagen
		try{
			$sql_agregar = "UPDATE user_inf SET user_name=?,birthday_date=? WHERE user_id=?";
			$sentencia_agregar = $mdb->prepare($sql_agregar);
			$sentencia_agregar->execute(array($avatar,$birthday,$_SESSION['user']));
		} catch(PDOException $ex){
			echo $ex->getMessage();
		}
	}
	//Actualizacion de nombre
	try {
		$sql_agregar = "UPDATE users SET real_name=?,l_name=?,ml_name=? WHERE user_id=?";
		$sentencia_agregar = $mdb->prepare($sql_agregar);
		$sentencia_agregar->execute(array($user_name,$last_name,$mlast_name,$_SESSION['user']));
	} catch (PDOException $ex) {
		echo $ex->getMessage();
	}
	header('Location:restricted.php');
} else{
	header('Location:registro.php');
	//echo "error con SESSION";
}
?>