<!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8" />
      <link rel="shortcut icon" href="assets\image\joystick.png" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Tienda</title>
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
  </head>

  <body class="sb-nav-fixed main-body">
      <!--Barra de navegacion -->
      <div id="nav-placeholder">
      </div>
      <script>
          $(function(){
              $("#nav-placeholder").load("nav.php");
          });
      </script>
      <!--Termina Barra de navegacion -->

      <div class="text-center fs-1 fw-bold" style="color:#102e82">Detalles del producto</div>  

      
      <div class="container">
        <div class="row">
          <?php
            include_once 'conection.php';
            session_start();

            $id_videojuego = isset($_GET['id']) ? $_GET['id'] : null;
            $sql = $mdb->prepare("SELECT * FROM videojuegos WHERE id_videojuego = :id");
            $sql->bindParam(':id', $id_videojuego, PDO::PARAM_INT);
            $sql->execute();
            $detalle_producto = $sql->fetch(PDO::FETCH_ASSOC);
          ?>
          <div class="col-md-6 order-md-1">
            <!--Inicia carrusel de imagenes-->
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-50" src="data:image/jpeg;base64,<?php echo base64_encode($detalle_producto['imagen_1']); ?>"/>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="data:image/jpeg;base64,<?php echo base64_encode($detalle_producto['imagen_2']); ?>"/>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
              </button>
            </div>
            <<!--Termina carrusel de imagenes-->
          </div>

          <div class="col-md-6 order-md-2">
            <h2><?php echo $detalle_producto['nombre_juego']; ?></h2>
            <h2>Precio $<?php echo $detalle_producto['precio']; ?></h2>
            <h3>Categoría: <?php echo $detalle_producto['categoria']; ?></h3>
            <h3>Descripción:</h3>
            <p class="lead">
              <?php echo $detalle_producto['descripcion']; ?>
            </p>
            <div class="d-grid gap-3 col-10 mx-auto">
              <a href="procesar_cuenta.php?id=<?php echo $detalle_producto['id_videojuego']; ?>" class="btn btn-primary ">Comprar</a>
            </div>
          </div>

        </div>   
      </div>
    
  </body>
</html>
