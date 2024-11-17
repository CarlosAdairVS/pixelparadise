<?php
session_start();
include_once 'conection.php';

if( isset($_SESSION['user']) ){
    $usuario = $_SESSION['user'];
    $sql = 'SELECT * FROM users where user_id=?';
    $sentencia = $mdb->prepare($sql);
    $sentencia->execute(array($usuario));
    $resultado = $sentencia->fetch();
        //Otra consulta
    $id_videojuego = isset($_GET['id']) ? $_GET['id'] : null;
    $sql1 = $mdb->prepare("SELECT * FROM videojuegos WHERE id_videojuego = :id");
    $sql1->bindParam(':id', $id_videojuego, PDO::PARAM_INT);
    $sql1->execute();
    $detalle_producto = $sql1->fetch(PDO::FETCH_ASSOC);
}else{
    header('Location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="assets\image\joystick.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Procesar Cuenta</title>
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

    <!-- Replace the "test" client-id value with your client-id -->
    <script src="https://www.paypal.com/sdk/js?client-id=Aa1fhkxTiFe-QgtHi9EiKsMR-fGq6M1Tzs4r5mo_968Th7LvhRdDPIO-nO33zycS7hKBQ1NDwvCrYajv&currency=MXN"></script>
    <!--<script src="app.js"></script>-->
  </head>

  <body>
  	<!--Barra de navegacion -->
      <div id="nav-placeholder">
      </div>
      <script>
          $(function(){
              $("#nav-placeholder").load("nav.php");
          });
      </script>
      <!--Termina Barra de navegacion -->

  	<div class="text-center fs-1 fw-bold mt-2" style="color:#102e82">Pagar con PayPal</div> 
  	<div class="order-md-1 text-center">
  		<h2><?php echo $detalle_producto['nombre_juego']; ?></h2>
        <h2>Precio $<?php echo $detalle_producto['precio']; ?> MXN</h2><br>
    </div>

    <div class="d-flex justify-content-center">
      <div id="paypal-button-container" style="width:50%;"></div>
    </div>

    <script>


      paypal.Buttons({
        style:{
          color: 'blue',
          shape: 'pill',
          label: 'pay'
        },
        createOrder: function(data, actions){
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: <?php echo $detalle_producto['precio']; ?>
              }
            }]
          });
        },
        onApprove: function(data, actions){
          actions.order.capture().then(function(detalles){
              console.log(detalles);
          });
        },

        onCancel: function(data){
          alert("Pago cancelado");
          console.log(data);
        }
      }).render('#paypal-button-container');
    </script>
    <p id="result-message"></p>
  </body>
</html>