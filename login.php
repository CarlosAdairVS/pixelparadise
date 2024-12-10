<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
</head>
<body>
  <!-- --->  
  <script src="assets\js\script.js"></script>
  <div>
    <div>Iniciar sesión</div>

    <!--LOGIN-->
    <form action="login_sql.php" method="POST">
      <div>
        <input type="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" name="correo_usuario" placeholder="Correo" required/>
      </div>
      <div>
        <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required/>
      </div>
      <div>
        <a href="forget.php" target=”_blank”>¿Olvidaste tu contraseña?</a>
      </div>
      <button type="submit">Ingresar</button>
    </form>
    <div>
      <div>¿No tienes una cuenta?</div>
      <a href="registro.php">Registrarse</a>
    </div>
  </div>
</body>
</html>