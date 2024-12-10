<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Personalización</title>
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
  <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 32rem">

    <div class="d-flex justify-content-center">
      <img class="img-logo" src="assets\image\LogoPalabras.png" alt="login-icon"/>
    </div>
    <div class="text-center fs-1 fw-bold" style="color:#102e82">Personalización</div>

    <!--LOGIN-->
    <form action="inituser_sql.php" method="POST" enctype="multipart/form-data">

      <div class="input-group justify-content-center mt-4">
        <img id="selectedAvatar" src="assets\image\userb.png"
        class="rounded-circle" style="width: 10rem; height: 10rem; object-fit: cover;" alt="example placeholder" />
      </div>
      <div class="mt-1">
        <label class="bg-light col-form-label form-control-sm" for="profile_pic">Foto de perfil:</label>
        <input type="file" class="form-control bg-light" id="profile_pic" name="profile_pic" onchange="displaySelectedImage(event, 'selectedAvatar')" />
      </div>

      <label class="bg-light col-form-label form-control-sm" for="nombre_avatar">Nombre de usuario:</label>
      <div class="input-group mt-1">
        <div class="input-group-text" style="background-color: #060636">
          <img src="assets\image\userW.png" alt="password-icon" style="height: 1rem"/>
        </div>
        <input class="form-control bg-light" type="text" id="nombre_avatar" name="nombre_avatar" placeholder="Nombre de usuario" 
        pattern="^\s*[a-zA-Z0-9 ]*$" title="Ingrese solo caracteres Alfanumericos" required>
      </div>

    <button class="btn text-white w-100 mt-4 fw-semibold shadow-sm" type="submit" style="background-color: #060636">
      Continuar
    </button>
  </form>

</div>
  <!-- -->
  <script src="assets\js\script.js"></script>
</body>
</html>