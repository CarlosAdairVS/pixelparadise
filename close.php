<?php
/*
* session_start() crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante 
* una petición GET o POST, o pasado mediante una cookie. 
*/
session_start();

//Destruir todas las variables de la sesion con un array vacio
$_SESSION = array();

//Destruimos la sesion pero no la informacion de la sesion
if(ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión.
session_destroy();
//Redirigimos a login.php
header('Location:login.php');
?>