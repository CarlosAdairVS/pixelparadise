<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login de proyecto</title>
  <link rel="stylesheet" href="assets\css\style.css"/>
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
  crossorigin="anonymous"
  />
  <!-- Usando fontawesome para iconos-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>
<body class=" d-flex justify-content-center align-items-center vh-100" style="background: linear-gradient(0deg, rgba(190, 14, 209, 100) 0%, rgba(67,1,70,100)  80%);">
  <!-- --->
  <script src="assets\js\script.js"></script>
  <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 32rem">

    <div class="d-flex justify-content-center">
      <img class="img-logo" src="assets\image\LogoPalabras.png" alt="login-icon"/>
    </div>
    <div class="text-center fs-1 fw-bold" style="color:#102e82">Iniciar sesión</div>

    <!--LOGIN-->
    <form action="login_sql.php" method="POST">
      <!-- <div class="input-group mt-4">
        <div class="input-group-text" style="background-color:#660022">
          <img src="\php\login_WE\assets\userW.png" alt="username-icon"style="height: 1rem"/>
        </div>
        <input class="form-control bg-light" type="text" name="nombre_usuario" placeholder="Nombre"/>
      </div> -->
      <div class="input-group mt-4">
        <div class="input-group-text" style="background-color: #060636">
          <img src="assets\image\email_icon.png" alt="email-icon" style="width: 1rem"/>
        </div>
        <input class="form-control bg-light" type="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
        name="correo_usuario" placeholder="Correo" required/>
      </div>
      <div class="input-group mt-1">
        <div class="input-group-text" style="background-color: #060636">
          <img src="assets\image\passW.png" alt="password-icon" style="height: 1rem"/>
        </div>
        <input class="form-control bg-light" type="password" id="contrasena" name="contrasena" placeholder="Contraseña" 
        required/>
        <div class="input-group-text" style="background-color:#ffffff" onclick="hide('contrasena', 'img-passis')">
          <img src="assets\image\view.png" alt="show-password" id="img-passis" style="width:1.5rem; opacity: 0.3;">
        </div>
      </div>
      
      <div class="d-flex gap-1 justify-content mt-1">
        <a
        href="forget.php"
        class="text-decoration-none fw-semibold fst-italic"
        style="font-size: 0.9rem;"
        target=”_blank”
        >¿Olvidaste tu contraseña?
      </a>
    </div>

    <button class="btn text-white w-100 mt-4 fw-semibold shadow-sm" type="submit" style="background-color: #060636">
      Ingresar
    </button>
  </form>

  <div class="d-flex gap-1 justify-content-center mt-1">
    <div>¿No tienes una cuenta?</div>
    <a href="signup.php" class="text-decoration-none fw-semibold">
      Registrarse
    </a>
  </div>

</div>
</body>
</html>