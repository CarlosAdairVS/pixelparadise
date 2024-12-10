<?php
$link ='mysql:dbname=pixelparadise;host=127.0.0.1';
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