<?php
session_start();
include_once 'conection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];

    // Realizar la actualización en la base de datos para marcar al usuario como inhabilitado
    $sql = "UPDATE users SET disabled=1 WHERE user_id = ?";
    $stmt = $mdb->prepare($sql);
    $stmt->execute([$userId]);

    // Verificar si la actualización fue exitosa
    $affectedRows = $stmt->rowCount();
    if ($affectedRows > 0) {
        // La actualización fue exitosa
        echo 'Usuario inhabilitado correctamente';
        // Puedes devolver otros datos si es necesario
    } else {
        // La actualización falló
        echo 'Error al inhabilitar el usuario';
    }
} else {
    echo 'Solicitud incorrecta';
}
?>