<?php
session_start();
include_once 'conection.php';

$nombre_juego = $_POST['nombre_juego'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$img_port = addslashes(file_get_contents($_FILES['img_port']['img_p']));
$img_ref1 = addslashes(file_get_contents($_FILES['img_ref1']['img_1']));
$img_ref2 = addslashes(file_get_contents($_FILES['img_ref2']['img_2']));

$sql = 'SELECT * FROM videojuegos WHERE nombre_juego=?';
$sentencia=$mdb->prepare($sql);
$sentencia->execute(array($nombre_juego));
$resultado = $sentencia->fetch();

var_dump($resultado);

if($resultado){
    echo '</br>El videojuego que deseas agregar ya existe';
    die();
}

else{

	//Agregamos a la base de datos
	try{
	    	$sql_agregar = "INSERT INTO videojuegos (id_videojuego,nombre_juego,descripcion,categoria,precio,img_port,img_ref1,img_ref2) VALUES (NULL,?,?,?,?,?,?)";
	    	$sentencia_agregar = $mdb->prepare($sql_agregar);
	    	$sentencia_agregar->execute(array($nombre_juego,$descripcion,$categoria,$precio,$img_port,$img_ref1,$img_ref2));
	    	echo 'Se ha agregado los datos del videojuego<br>';
	    } catch(PDOException $ex){
	    	echo $ex->getMessage();
	    }
	    header('Location: add_video.php');
	}


?>