<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Configuracion de perfil</title>
  <script src="assets/js/script.js"></script>
</head>
<body>
  <div>
    <div>Configuracion de perfil</div>

    <!--LOGIN-->
    <form action="inituser_sql.php" method="POST" enctype="multipart/form-data">
      <label for="nombre_avatar">Nombre de usuario:</label>
      <div>
        <input type="text" id="nombre_avatar" name="nombre_avatar" placeholder="Nombre de usuario" pattern="^\s*[a-zA-Z0-9 ]*$" title="Ingrese solo caracteres Alfanumericos" required>
      </div>

      <button type="submit">
        Continuar
      </button>
    </form>

  </div>
  <script src="assets/js/script.js"></script>
</body>
</html>
