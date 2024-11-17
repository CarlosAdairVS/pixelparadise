<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Tienda</title>
  <script src="assets\js\script.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
  <!--Barra de navegación -->
  <div id="nav-placeholder"></div>
  <script>
    $(function() {
      $("#nav-placeholder").load("nav.php");
    });
  </script>
  <!--Termina Barra de navegación -->

  <div>Tienda de videojuegos</div>

  <div id="main">
    <div>
      <?php
        include_once 'conection.php';
        session_start();        
        $sql = $mdb->prepare("SELECT * FROM videojuegos");
        $sql->execute();
        $resultado1 = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($resultado1 as $item){ 
      ?>
      <div>
        <div>
          <div>
            <h4><?php echo $item['nombre_juego']; ?></h4>
          </div>
          <div>
            <p>Precio: $ <?php echo $item['precio']; ?></p>
          </div>
          <div>
            <a href="detalles.php?id=<?php echo $item['id_videojuego']; ?>">Detalles</a>
            <a href="procesar_cuenta.php?id=<?php echo $item['id_videojuego']; ?>">Comprar</a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>  
  </div>
</body>
</html>
