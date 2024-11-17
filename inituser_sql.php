<?php
session_start();
include_once 'conection.php';
$user_name = $_POST['nombre_avatar'];

if( isset($_SESSION['user'])){
	if ($_FILES['profile_pic']['size'] > 0){
		$filename = $_FILES['profile_pic']['tmp_name'];
		$file = fopen($filename, 'r');
		$fileContent = fread($file, $_FILES['profile_pic']['size']);
		fclose($file);
		try{
			//Preparamos la sentencia
			$sql_agregar = "UPDATE user_inf SET user_name=?,profile_pic=? WHERE user_id=?";
            $sentencia_agregar = $mdb->prepare($sql_agregar);
            $sentencia_agregar->bindParam(1, $user_name);
            $sentencia_agregar->bindParam(2, $fileContent, PDO::PARAM_LOB);
            $sentencia_agregar->bindParam(3, $_SESSION['user']);
            $sentencia_agregar->execute();
			//echo "Informacion valida.";
			header('Location:restricted.php');
		} catch(PDOException $ex){
			echo $ex->getMessage();
		}
	}
} else{
	header('Location:signup.php');
	//echo "error con SESSION";
}
?>