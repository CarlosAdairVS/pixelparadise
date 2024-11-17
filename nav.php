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
<nav>
    <div>
        <!-- Navbar Brand-->
        <a href="index.php"></a>
        <!--Barra de navegación siempre visible-->
        <div>
            <ul>
                <li>
                    <!-- Navbar Search-->
                    <form>
                        <div>
                            <input type="text" placeholder="Busqueda"/>
                            <button id="btnNavbarSearch" type="button">Buscar</i></button>
                        </div>
                    </form>
                </li>
                <li><a href="index.php">Inicio<span></span></a></li>
                <li><a href="biblioteca.php">Tienda</a></li>
                <li><a href="setting.php" style="<?= (isset($_SESSION['user'])) ? 'display: block' : 'display:none'; ?>">Configuración</a></li>
                <li><a href="restricted.php" style="<?= (isset($_SESSION['user'])) ? 'display: block' : 'display:none'; ?>">Perfil</a></li>
                <li><a href="admin.php" style="<?=($resultado2['type_user'] == TRUE) ? 'display: block' : 'display:none'; ?>">Administración</a></li>
                <li><a href="biblioteca.php" style="<?= (isset($_SESSION['user'])) ? 'display: block' : 'display:none'; ?>">Biblioteca</a></li>
                <li><a href="<?= (isset($_SESSION['user'])) ? 'close.php' : 'login.php'; ?>">Sesión</a></li>
            </ul>
        </div>
    </div>
</nav>
