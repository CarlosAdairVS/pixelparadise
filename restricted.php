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
    <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
    crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets\css\style.css"/>
    <!-- Usando fontawesome para iconos-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- --->
    <script src="assets\js\script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body class="sb-nav-fixed main-body">
    <!--Barra de navegacion -->
    <div id="nav-placeholder">
    </div>
    <script>
        $(function(){
            $("#nav-placeholder").load("nav.php");
        });
    </script>
    <!--Termina Barra de navegacion -->

    <!--Perfil de Usuario -->
    <div class="container px-4">
        <div class=" fs-1 fw-bold ms-4 mt-3" style="color:#102e82">Bienvenido <?=$resultado2['real_name']?></div>
        <div class="row gx-5 justify-content-md-center">
            <div class="col-md-4 mb-3 p-5">
                <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <?php
                        $datosBinarios = $resultado['profile_pic'];
                        if (isset($_SESSION['user'])) {
                            $datosBase64 = base64_encode($datosBinarios);
                            $tipoImagen = 'image/png';
                            $urlDatos = 'data:' . $tipoImagen . ';base64,' . $datosBase64;
                            echo '<img src="data:' . $urlDatos . '" class="rounded-circle" style="width: 8rem; aspect-ratio: 1/1;" alt="foto">';
                        } else {
                            echo '<img src="assets/image/userW.png" class="rounded-circle" style="width: 8rem; aspect-ratio: 1/1;" alt="foto">';
                        }
                        ?>
                        <div class="mt-3">
                            <h4><?=$resultado['user_name']?></h4>
                            <br>
                            <p class="text-secondary mb-1">Descripcion</p>
                            <p class="text-muted font-size-sm"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Otra columna-->
        <div class="col-md-8 p-5">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Nombre completo</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?=$resultado2['real_name']." ".$resultado2['l_name']." ".$resultado2['ml_name']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Correo</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?=$resultado2['email']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Usuario</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?=$resultado['user_name']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Cumpleaños</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?=$resultado['birthday_date']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-info " target="__blank" href="setting.php">Editar</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- -->    
        </div>
    </div>
    <div class=" fs-2 fw-bold ms-4 mt-3">Biblioteca</div>
    <a href="library.php">Juegos Guardados</a>
</div>

</body>

</html>
