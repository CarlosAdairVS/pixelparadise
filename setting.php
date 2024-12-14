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
<html>
<head>
	<meta charset="UTF-8" />
	<link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Configuración</title>
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

	<div class="container px-4">
		<div class=" fs-2 fw-bold ms-4 mt-3" style="color:#102e82">Configuración</div>
		<div class="card mb-3">
			<div class="card-body">
				<!-- REGISTRO -->
				<form action="setting_sql.php" method="POST" enctype="multipart/form-data">

					<div class="input-group justify-content-center mt-4">
						<?php
                        $datosBinarios = $resultado['profile_pic'];
                        if (isset($_SESSION['user'])) {
                            $datosBase64 = base64_encode($datosBinarios);
                            $tipoImagen = 'image/png';
                            $urlDatos = 'data:' . $tipoImagen . ';base64,' . $datosBase64;
                            echo '<img id="selectedAvatar" src="data:' . $urlDatos . '" class="rounded-circle" style="width: 10rem; height: 10rem; object-fit: cover;" alt="perfil">';
                        } else {
                            echo '<img id="selectedAvatar" src="assets/image/userW.png" class="rounded-circle" style="width: 10rem; height: 10rem; object-fit: cover;" alt="perfil">';
                        }
                        ?>
					</div>
					<div class="mt-1">
						<label class="bg-light col-form-label form-control-sm" for="profile_pic">Foto de perfil:</label>
						<input type="file" class="form-control bg-light" id="profile_pic" name="profile_pic" onchange="displaySelectedImage(event, 'selectedAvatar')"/>
					</div>

					<label class="bg-light col-form-label form-control-sm" for="nombre_usuario">Nombre: </label>
					<div class="input-group">
						<input class="form-control bg-light" type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre" 
						pattern="^\s*[^0-9]+[a-zA-Z ]$" title="Ingrese solo letras, por favor" value="<?=$resultado2['real_name']?>" required>
					</div>
					<label class="bg-light col-form-label form-control-sm" for="apellido1_usuario">Apellidos: </label>
					<div class="row">
						<div class="col">
							<input class="form-control bg-light" type="text" id="apellido1_usuario" name="apellido1_usuario" placeholder="Apellido Paterno" pattern="^\s*[^0-9]+[a-zA-Z ]$" title="Ingrese solo letras, por favor" value="<?=$resultado2['l_name']?>" required>
						</div>
						<div class="col">
							<input class="form-control bg-light" type="text" id="apellido2_usuario" name="apellido2_usuario" placeholder="Apellido Materno" pattern="^\s*[^0-9]+[a-zA-Z ]$" title="Ingrese solo letras, por favor" value="<?=$resultado2['ml_name']?>" required>
						</div>
					</div>

					<label class="bg-light col-form-label form-control-sm" for="nombre_avatar">Nombre de usuario: </label>
					<div class="input-group">
						<input class="form-control bg-light" type="text" id="nombre_avatar" name="nombre_avatar" placeholder="Usuario" 
						pattern="^\s*[a-zA-Z0-9 ]*$" title="Ingrese solo letras, por favor" value="<?=$resultado['user_name']?>" required>
					</div>

					<div class="mt-1">
						<label class="bg-light col-form-label form-control-sm" for="birthday">Fecha de nacimiento: </label>
						<input class="form-control bg-light" type="date" name="birthday" id="birthday" min="1950-01-01" max="2010-01-01" 
						value="<?=$resultado['birthday_date']?>" required />
					</div>

					<label class="bg-light col-form-label form-control-sm" for="correo_usuario">Correo (Único): </label>
					<div class="mt-1">
						<input class="form-control bg-light" type="email" name="correo_usuario" placeholder="Correo"
						pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" value="<?=$resultado2['email']?>" readonly/>
					</div>

					<button class="btn text-white w-100 mt-4 fw-semibold shadow-sm" type="submit" style="background-color:#5911ED">
						Actualizar
					</button>

				</form>
			</div>

		</div>
	</div>
</body>
</html>