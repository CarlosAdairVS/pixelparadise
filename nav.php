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
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #430146">
    <div class="container-fluid">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">
            <img src="assets\image\pixelLogo.png" alt="logo pixelparadise" style="height: 6rem;">
        </a>
        <!--Boton al colapsar -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon navbar-light"></span>
        </button>
        <!--Barra que se colapsa-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mt-3">
                    <!-- Navbar Search-->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Busqueda" aria-label="Busqueda" aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="button" style="background-color: #fdb9ff; color: white; border: none;"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </li>
                <li class="nav-item active mx-3 mt-2">
                    <a class="nav-link text-white fs-5" href="index.php">Inicio<span class="sr-only"></span></a>
                </li>
                <li class="nav-item mx-3 mt-2">
                    <a class="nav-link text-white fs-5" href="biblioteca.php">Tienda</a>
                </li>
                <li class="nav-item dropdown me-5 pe-5 ps-3">
                    <a class="nav-link dropdown-toggle text-white" href="" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        $datosBinarios = $resultado['profile_pic'];
                        if (isset($_SESSION['user'])) {
                            $datosBase64 = base64_encode($datosBinarios);
                            $tipoImagen = 'image/png';
                            $urlDatos = 'data:' . $tipoImagen . ';base64,' . $datosBase64;
                            echo '<img src="data:' . $urlDatos . '" alt="Imagen" style="height: 3rem; border-radius: 50%; aspect-ratio: 1/1;">';
                        } else {
                            echo '<img src="assets/image/userW.png" alt="" style="height: 3rem; border-radius: 50%; aspect-ratio: 1/1;">';
                        }
                        ?>

                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="restricted.php" style="<?= (isset($_SESSION['user'])) ?'display: block':'display:none';?>">Perfil</a></li>
                        <li><a class="dropdown-item" href="setting.php" style="<?= (isset($_SESSION['user'])) ?'display: block':'display:none';?>">Configuración</a></li>
                        <li><a class="dropdown-item" href="biblioteca.php" style="<?= (isset($_SESSION['user'])) ?'display: block':'display:none';?>">Biblioteca</a></li>
                        <li><a class='dropdown-item' href="admin.php" style="<?=($resultado2['type_user']==TRUE) ?'display: block':'display:none';?>">Administración</a></li>
                        <li><hr class="dropdown-divider" style="<?= (isset($_SESSION['user'])) ?'display: block':'display:none';?>"></li>
                        <li style="display: block;"><a class="dropdown-item" href="<?=(isset($_SESSION['user'])) ? 'close.php':'login.php';?>">Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
