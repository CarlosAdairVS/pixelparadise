<?php
//Conectandose a la BD con PDO
//Definimos los parametros del constructor, usamos un usuario con privilegios
// $link ='mysql:dbname=oasis;host=127.0.0.1';
// $usuario='root';
// $password='root';
$link ='mysql:dbname=oasis;host=127.0.0.1';
$usuario='root';
$password='123qwe';

try{
	//Creamos una instancia de PDO
	$mdb=new PDO($link, $usuario, $password);
	//echo 'Conectado</br>';
}catch(PDOException $e){
	//print "Error: ". $e->getmessage() ."</br>";
	header('Location:index.php');
	die();
}
?>