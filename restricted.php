<?php
session_start();
include_once 'conection.php';

if( isset($_SESSION['user']) ){
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
}else{
    header('Location:signup.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Perfil de Usuario</title>
    <script src="assets/js/script.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <!--Barra de navegacion -->
    <div id="nav-placeholder"></div>
    <script>
        $(function(){
            $("#nav-placeholder").load("nav.php");
        });
    </script>
    <!--Termina Barra de navegacion -->

    <!--Perfil de Usuario -->
    <div>
        <div>Bienvenido <?=$resultado2['real_name']?></div>
        <div>
            <div>
                <div>
                    <div>
                        <?php
                        // Eliminada la visualización de la imagen
                        ?>
                        <div>
                            <h4><?=$resultado['user_name']?></h4>
                            <br>
                            <p>Descripcion</p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Otra columna-->
        <div>
            <div>
                <div>
                    <div>
                        <div>Nombre completo</div>
                        <div><?=$resultado2['real_name']." ".$resultado2['l_name']." ".$resultado2['ml_name']?></div>
                    </div>
                    <hr>
                    <div>
                        <div>Correo</div>
                        <div><?=$resultado2['email']?></div>
                    </div>
                    <hr>
                    <div>
                        <div>Usuario</div>
                        <div><?=$resultado['user_name']?></div>
                    </div>
                    <hr>
                    <div>
                        <div>Cumpleaños</div>
                        <div><?=$resultado['birthday_date']?></div>
                    </div>
                    <hr>
                    <div>
                        <div>
                            <a href="setting.php">Editar</a>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <div>Biblioteca</div>
    <a href="library.php">Juegos Guardados</a>
</div>

</body>

</html>
