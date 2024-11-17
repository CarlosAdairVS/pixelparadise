<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
  <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro</title>
  <script src="assets/js/script.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
  <div>

    <div>Registro</div>

    <!-- REGISTRO -->
    <form action="add_user.php" method="POST">
      <div>
        <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre" pattern="^\s*[^0-9]+[a-zA-Z ]$" title="Ingrese solo letras, por favor" required>
      </div>

      <div>
        <input type="text" id="apellido1_usuario" name="apellido1_usuario" placeholder="Apellido Paterno" pattern="^\s*[^0-9]+[a-zA-Z ]$" title="Ingrese solo letras, por favor" required>
      </div>

      <div>
        <input type="text" id="apellido2_usuario" name="apellido2_usuario" placeholder="Apellido Materno" pattern="^\s*[^0-9]+[a-zA-Z ]$" title="Ingrese solo letras, por favor" required>
      </div>

      <div>
        <label for="birthday">Fecha de nacimiento: </label>
        <input type="date" name="birthday" id="birthday" min="1950-01-01" max="2010-01-01" required />
      </div>

      <div>
        <input type="email" name="correo_usuario" placeholder="Correo" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required />
      </div>

      <div>
        <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" oninput="checkSyntax()" required />
        <div onclick="hide('contrasena', 'img-pass')">
        </div>
      </div>

      <div>
        <input type="password" id="contrasena2" name="contrasena2" placeholder="Repetir contraseña" oninput="check()" required/>
        <div onclick="hide('contrasena2', 'img-pass2')">
        </div>
      </div>

      <button type="submit">Registrarse</button>

    </form>

  </div>
</body>
</html>
