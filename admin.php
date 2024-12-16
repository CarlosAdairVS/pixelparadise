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
    <link rel="shortcut icon" href="assets\image\joystick.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aministración</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

    <div class="container px-4">
        <div class=" fs-1 fw-bold ms-4 mt-3" style="color:#102e82">Bienvenido al panel de administración</div>
        <br>
        <div class="card mb-3">
            <div class=" fs-4 fw-bold ms-4">Habilitar o deshablilitar usuario</div>
            <div class=" ms-4">Para poder habilitar o deshabilitar usuarios es necesario conocer el correo con el cual se registraron, ya que no se puede modificar debido a que es considerado como identificador único del usuario. Por favor ingrese el correo para realizar la acción necesaría.</div>
            
            <div class="input-group mx-4 my-4" style="width: 95%;">
                <input onkeyup="buscar_ahora($('#buscar').val());" type="text" class="form-control" placeholder="Ingrese correo" id="buscar">
                <div class="input-group-append">
                    <button onclick="buscar_ahora($('#buscar').val());" class="btn btn-outline-secondary" type="button">Button</button>
                </div>
            </div>

        <div class="card">
            <div class="card-body">
                <div id="datos_buscador" class="container pl-5 pr-5"></div>
            </div>
        </div>
    </div>
</div>
</body>


<script type="text/javascript">
    function buscar_ahora(buscar){
        var parametros = {"buscar":buscar};
        $.ajax({
            data:parametros,
            type:'POST',
            url: 'buscador.php',
            success:function(data){
                document.getElementById("datos_buscador").innerHTML = data;
            }
        });
    }
</script>

<script type="text/javascript">
    function inhabilitarUsuario(userId) {
        $.ajax({
            type: 'POST',
            url: 'inhabilitar_usuario.php',
            data: { user_id: userId },
            success: function(response) {
                // Aquí puedes realizar acciones después de inhabilitar al usuario, si es necesario
                alert('Usuario inhabilitado correctamente');
                // Puedes recargar la página para reflejar los cambios
                location.reload();
            },
            error: function(xhr, status, error) {
                // Manejo de errores
                console.error(error);
            }
        });
    }
</script>
</html>