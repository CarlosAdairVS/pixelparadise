<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
  <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro</title>
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
  crossorigin="anonymous"
  />
  <!-- Usando fontawesome para iconos-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
  <link rel="stylesheet" href="assets\css\style.css"/>
  <!-- --->
  <script src="assets\js\script.js"></script>
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background: linear-gradient(0deg, rgba(190, 14, 209, 100) 0%, rgba(67,1,70,100)  80%);">
  <div class="bg-white p-4 rounded-5 text-secondary shadow" style="width: 32rem">

    <div class="d-flex justify-content-center">
      <img class="img-logo" src="assets\image\LogoPalabras.png" alt="login-icon" style="height: 15rem;" />
    </div>
    <div class="text-center fs-2 fw-bold" style="color:#102e82">Registro</div>

    <!-- REGISTRO -->
    <form action="add_user.php" method="POST">
      <div class="input-group mt-2">
        <div class="input-group-text" style="background-color: #060636">
          <img src="assets\image\userW.png" alt="username-icon"style="height: 1rem"/>
        </div>
        <input class="form-control bg-light" type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre" 
        pattern="^\s*[^0-9]+[a-zA-Z ]$" title="Ingrese solo letras, por favor" required>
      </div>

      <div class="input-group mt-1">
        <div class="input-group-text" style="background-color: #060636">
          <img src="assets\image\userW.png" alt="username-icon"style="height: 1rem"/>
        </div>
        <input class="form-control bg-light" type="text" id="apellido1_usuario" name="apellido1_usuario" placeholder="Apellido Paterno" pattern="^\s*[^0-9]+[a-zA-Z ]$" title="Ingrese solo letras, por favor" required>
      </div>

      <div class="input-group mt-1">
        <div class="input-group-text" style="background-color: #060636">
          <img src="assets\image\userW.png" alt="username-icon"style="height: 1rem"/>
        </div>
        <input class="form-control bg-light" type="text" id="apellido2_usuario" name="apellido2_usuario" placeholder="Apellido Materno" pattern="^\s*[^0-9]+[a-zA-Z ]$" title="Ingrese solo letras, por favor" required>
      </div>

      <div class="mt-1">
        <label class="bg-light col-form-label form-control-sm" for="birthday">Fecha de nacimiento: </label>
        <input class="form-control bg-light" type="date" name="birthday" id="birthday" min="1950-01-01" max="2010-01-01" required />
      </div>

      <div class="input-group mt-1">
        <div class="input-group-text" style="background-color:#060636">
          <img src="assets\image\email_icon.png" alt="username-icon"style="width: 1rem">
        </div>
        <input class="form-control bg-light" type="email" name="correo_usuario" placeholder="Correo"
        pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required />
      </div>

      <div class="input-group mt-1">
        <div class="input-group-text" style="background-color:#060636">
          <img src="assets\image\passW.png" alt="password-icon" style="height: 1rem"/>
        </div>
        <input class="form-control bg-light" type="password" id="contrasena" name="contrasena" placeholder="Contraseña" oninput="checkSyntax()" required />
        <div class="input-group-text" style="background-color:#ffffff" onclick="hide('contrasena', 'img-pass')">
          <img src="assets\image\view.png" alt="show-password" id="img-pass" style="width:1.5rem; opacity: 0.3;">
        </div>
      </div>

      <div class="input-group mt-1">
        <div class="input-group-text" style="background-color:#060636">
          <img src="assets\image\passW.png" alt="password-icon" style="height: 1rem"/>
        </div>
        <input class="form-control bg-light" type="password" id="contrasena2" name="contrasena2" placeholder="Repetir contraseña" oninput="check()" required/>
        <div class="input-group-text" style="background-color:#ffffff" onclick="hide('contrasena2', 'img-pass2')">
          <img src="assets\image\view.png" alt="show-password" id="img-pass2" style="width:1.5rem; opacity: 0.3;">
        </div>
      </div>

      <button class="btn text-white w-100 mt-4 fw-semibold shadow-sm" type="submit" style="background-color:#060636">
        Registrarse
      </button>

    </form>

  </div>
</body>
</html>
