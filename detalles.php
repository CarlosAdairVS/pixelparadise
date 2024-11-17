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

  <div>Detalles del producto</div>  

  <div>
    <div>
      <?php
        include_once 'conection.php';
        session_start();

        $id_videojuego = isset($_GET['id']) ? $_GET['id'] : null;
        $sql = $mdb->prepare("SELECT * FROM videojuegos WHERE id_videojuego = :id");
        $sql->bindParam(':id', $id_videojuego, PDO::PARAM_INT);
        $sql->execute();
        $detalle_producto = $sql->fetch(PDO::FETCH_ASSOC);
      ?>
      <div>
        <!--Inicia carrusel de imágenes-->
        <div>
          <button>Anterior</button>
          <button> Siguiente</button>
        </div>
        <!--Termina carrusel de imágenes-->
      </div>

      <div>
        <h2><?php echo $detalle_producto['nombre_juego']; ?></h2>
        <h2>Precio $<?php echo $detalle_producto['precio']; ?></h2>
        <h3>Categoría: <?php echo $detalle_producto['categoria']; ?></h3>
        <h3>Descripción:</h3>
        <p>
          <?php echo $detalle_producto['descripcion']; ?>
        </p>
        <div>
          <a href="procesar_cuenta.php?id=<?php echo $detalle_producto['id_videojuego']; ?>" class="btn btn-primary">Comprar</a>
        </div>
      </div>
    </div>   
  </div>
</body>
</html>

