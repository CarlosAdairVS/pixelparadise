<?php
// Mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conectar a la base de datos
require 'conection.php'; // Asegúrate de que este archivo contenga la conexión a la base de datos

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificar si el juego existe
    $sql = 'SELECT * FROM videojuegos WHERE id_videojuego = ?';
    $sentencia = $mdb->prepare($sql);
    $sentencia->execute([$id]);
    $resultado = $sentencia->fetch();

    if ($resultado) {
        // Eliminar de la base de datos
        try {
            $sql_eliminar = 'DELETE FROM videojuegos WHERE id_videojuego = ?';
            $sentencia_eliminar = $mdb->prepare($sql_eliminar);
            $sentencia_eliminar->execute([$id]);
            header('Location: delete_video.php');
            exit();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    } else {
        echo 'El videojuego que deseas eliminar no existe';
    }
} else {
    echo 'ID no válido';
}
?>
