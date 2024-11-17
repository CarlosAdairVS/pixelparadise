<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Restablecer Contraseña</title>
</head>
<body>
	<script src="assets\js\script.js"></script>
	<div>
		<div>Restablecer Contraseña</div>
		<?php
		session_start();
		include_once 'conection.php';
		if(isset($_POST["email"])){
			$error="";
			$contrasena = $_POST["contrasena"];
			$contrasena2 = $_POST["contrasena2"];
			$email = $_POST["email"];

			$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
			if (!password_verify($contrasena2, $contrasena)){
				$error.= "<p>Las contraseñas no son iguales<br /><br /></p>";
			}
			if($error!=""){
				echo "<div>".$error."</div><br />";
			}else{
				try{
					$sql_agregar = "UPDATE users SET password=? WHERE email=?";
					$sentencia_agregar = $mdb->prepare($sql_agregar);
					$sentencia_agregar->execute(array($contrasena,$email));

					$sql_eliminar = "DELETE FROM password_reset_temp WHERE email=?";
					$sentencia_eliminar = $mdb->prepare($sql_eliminar);
					$sentencia_eliminar->execute(array($email));
				}catch (PDOException $ex) {
					echo $ex->getMessage().'</br>';
				}

				echo '<div><p>Tu contraseña se ha actualizado de manera exitosa.</p>
				<p><a href="https://oasisingweb.hopto.org/login.php">
				Click aqui</a> para iniciar sesion.</p></div><br />';
			}		
		}
		?>
	</div>
</body>
</html>
