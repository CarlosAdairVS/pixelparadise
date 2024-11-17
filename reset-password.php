<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Restablecer Contraseña</title>
</head>
<body>
  <script src="assets\js\script.js"></script>
<?php
session_start();
include_once 'conection.php';

if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
  $key = $_GET["key"];
  $email = $_GET["email"];
  date_default_timezone_set('America/Mexico_City');
  $curDate = date("Y-m-d H:i:s");

  $sql = 'SELECT * FROM password_reset_temp WHERE keyr=? AND email=?';
  $sentencia=$mdb->prepare($sql);
  $sentencia->execute(array($key,$email));
  $resultado = $sentencia->fetch();

  $row = $sentencia->rowCount();
  if ($row=""){
  $error .= '<h2>Link invalido</h2>
<p>El link es invalido o expiro. O no copiaste el enlace correcto
desde el correo electrónico, o ya ha utilizado la clave en cuyo caso es
desactivado.</p>
<p><a href="https://pixelparadise.hopto.org/forget.php">
Click aqui</a> para restablecer contraseña.</p>';
	}else{
  $row = $resultado;
  $expDate = $row[2];
  if ($expDate >= $curDate){
  ?>
  <!-- --->

  <div>
    <div>Restablecer Contraseña</div>

    <!--LOGIN-->
    <form action="reset_password.php" method="POST" name="update">
      <div>
        <div>
          <img src="assets\image\email_icon.png" alt="email-icon"/>
        </div>
        <input type="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
        name="email" id="email" placeholder="Correo" value="<?=$resultado[0];?>" required readonly />
      </div>

      <div>
        <div>
          <img src="assets\image\passW.png" alt="password-icon"/>
        </div>
        <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" oninput="checkSyntax()" required />
        <div onclick="hide('contrasena', 'img-pass')">
          <img src="assets\image\view.png" alt="show-password" id="img-pass">
        </div>
      </div>

      <div>
        <div>
          <img src="assets\image\passW.png" alt="password-icon"/>
        </div>
        <input type="password" id="contrasena2" name="contrasena2" placeholder="Repetir contraseña" oninput="check()" required/>
        <div onclick="hide('contrasena2', 'img-pass2')">
          <img src="assets\image\view.png" alt="show-password" id="img-pass2">
        </div>
      </div>

    <button type="submit">
      Ingresar
    </button>
  </form>
</div>
<?php
}else{
$error .= "<h2>Link expirado/invalido</h2>
<p>El link es invalido o expiro.</p>
<p>Posiblemente no copiaste el enlace de forma correcto
desde el correo electrónico, o ya ha utilizado la clave en cuyo caso es
desactivado.<br></p>";
            }
      }
if($error!=""){
  echo "<div>".$error."</div><br />";
  }			
}
?>
</body>
</html>
