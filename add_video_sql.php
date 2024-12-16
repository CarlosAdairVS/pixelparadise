<?php
session_start();
include_once 'conection.php';

// Mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Recibir y sanitizar datos del formulario
$nombre_juego = $_POST['nombre_juego'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];

// Verificar si los archivos existen en $_FILES
if (!isset($_FILES['img_port']['tmp_name'], $_FILES['img_ref1']['tmp_name'], $_FILES['img_ref2']['tmp_name'])) {
    die('Por favor suba todas las imágenes.');
}

$img_port = file_get_contents($_FILES['img_port']['tmp_name']);
$img_ref1 = file_get_contents($_FILES['img_ref1']['tmp_name']);
$img_ref2 = file_get_contents($_FILES['img_ref2']['tmp_name']);

// Verificar si el juego ya existe
$sql = 'SELECT * FROM videojuegos WHERE nombre_juego=?';
$sentencia = $mdb->prepare($sql);
$sentencia->execute([$nombre_juego]);
$resultado = $sentencia->fetch();

if ($resultado) {
    echo '</br>El videojuego que deseas agregar ya existe';
    die();
} else {
    // Agregar a la base de datos
    try {
        $sql_agregar = "INSERT INTO videojuegos (nombre_juego, descripcion, categoria, precio, imagen_portada, imagen_1, imagen_2) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $sentencia_agregar = $mdb->prepare($sql_agregar);
        $sentencia_agregar->execute([$nombre_juego, $descripcion, $categoria, $precio, $img_port, $img_ref1, $img_ref2]);
        echo 'Se han agregado los datos del videojuego<br>';
        header('Location: add_video.php');
        exit();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}
?>
