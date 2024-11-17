<?php
include_once 'conection.php';
session_start();
if(isset($_SESSION['user'])){
    $usuario = $_SESSION['user'];
    $sql = 'SELECT * FROM user_inf where user_id=?';
    $sentencia = $mdb->prepare($sql);
    $sentencia->execute(array($usuario));
    $resultado = $sentencia->fetch();
        //Otra consulta
    $sql = 'SELECT * FROM users where user_id=?';
    $sentencia = $mdb->prepare($sql);
    $sentencia->execute(array($usuario));
    $resultado2 = $sentencia->fetch();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Perfil de Usuario</title>
</head>
<body>
    <!-- Barra de navegación -->
    <div id="nav-placeholder"></div>
    <script>
        $(function(){
            $("#nav-placeholder").load("nav.php");
        });
    </script>
    <!-- Termina Barra de navegación -->

    <div>
        <div>
            <div>
                <div>
                    <h1>Pixel Paradise: Tu destino para videojuegos</h1>
                    <p>Descubre y explora una gran variedad de videojuegos</p>
                    <a href="signup.php">Regístrate</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Acerca de nosotros -->
    <div>
        <div>
            <div>
                <div>
                    <div>Acerca de nosotros</div>
                    <h1>Apasionados por ofrecer la mejor experiencia</h1>
                    <p>Comprometidos a ser el destino predilecto para todos los jugadores ávidos de nuevas aventuras y clásicos atemporales.</p>
                    <p>¡Únete a nosotros y descubre un oasis de juegos y diversión!</p>
                    <div>
                        <div>
                            <h6>Seguridad</h6>
                            <h6>Variedad</h6>
                        </div>
                        <div>
                            <h6>Soporte 24/7</h6>
                            <h6>Precios bajos</h6>
                        </div>
                    </div>
                    <div>
                        <a href="https://www.facebook.com/?locale=es_LA">Fcaebook</a>
                        <a href="https://x.com/?lang=es">Twitter</a>
                        <a href="https://www.instagram.com/">Instagram</a>
                        <a href="https://mx.linkedin.com/">Linkedin-in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>