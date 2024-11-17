<?php
include_once 'conection.php';
session_start();
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
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Configuración</title>
</head>
<body>
    <!--Barra de navegación -->
    <div id="nav-placeholder"></div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var navPlaceholder = document.getElementById("nav-placeholder");
            fetch("nav.php")
                .then(response => response.text())
                .then(data => {
                    navPlaceholder.innerHTML = data;
                });
        });
    </script>
    <!--Termina Barra de navegación -->

    <div>
        <div>Configuración</div>
        <div>
            <div>
                <!-- REGISTRO -->
                    <label for="nombre_usuario">Nombre: </label>
                    <div>
                        <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre" 
                        pattern="^\s*[^0-9]+[a-zA-Z ]$" title="Ingrese solo letras, por favor" value="<?=$resultado2['real_name']?>" required>
                    </div>
                    <label for="apellido1_usuario">Apellidos: </label>
                    <div>
                        <div>
                            <input type="text" id="apellido1_usuario" name="apellido1_usuario" placeholder="Apellido Paterno" pattern="^\s*[^0-9]+[a-zA-Z ]$" title="Ingrese solo letras, por favor" value="<?=$resultado2['l_name']?>" required>
                        </div>
                        <div>
                            <input type="text" id="apellido2_usuario" name="apellido2_usuario" placeholder="Apellido Materno" pattern="^\s*[^0-9]+[a-zA-Z ]$" title="Ingrese solo letras, por favor" value="<?=$resultado2['ml_name']?>" required>
                        </div>
                    </div>

                    <label for="nombre_avatar">Nombre de usuario: </label>
                    <div>
                        <input type="text" id="nombre_avatar" name="nombre_avatar" placeholder="Usuario" 
                        pattern="^\s*[a-zA-Z0-9 ]*$" title="Ingrese solo letras, por favor" value="<?=$resultado['user_name']?>" required>
                    </div>

                    <div>
                        <label for="birthday">Fecha de nacimiento: </label>
                        <input type="date" name="birthday" id="birthday" min="1950-01-01" max="2010-01-01" 
                        value="<?=$resultado['birthday_date']?>" required />
                    </div>

                    <label for="correo_usuario">Correo (Único): </label>
                    <div>
                        <input type="email" name="correo_usuario" placeholder="Correo"
                        pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" value="<?=$resultado2['email']?>" readonly/>
                    </div>

                    <button type="submit">Actualizar</button>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
