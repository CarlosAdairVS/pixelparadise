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
    header('Location:registro.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Administración</title>
    <script src="assets\js\script.js"></script>
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

    <div>
        <div>Bienvenido al panel de administración</div>
        <br>
        <div>
            <div>Habilitar o deshablilitar usuario</div>
            <div>Para poder habilitar o deshabilitar usuarios es necesario conocer el correo con el cual se registraron, ya que no se puede modificar debido a que es considerado como identificador único del usuario. Por favor ingrese el correo para realizar la acción necesaría.</div>
            
            <div>
                <input onkeyup="buscar_ahora($('#buscar').val());" type="text" class="form-control" placeholder="Ingrese correo" id="buscar">
                <div>
                    <button onclick="buscar_ahora($('#buscar').val());" class="btn btn-outline-secondary" type="button">Button</button>
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