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

   <div class="text-center fs-1 fw-bold" style="color:#102e82">Panel de videojuegos</div>  

  <div class="container" id="main">
    <div class="row">
      <?php
        include_once 'conection.php';
        session_start();        
        $sql = $mdb->prepare("SELECT * FROM videojuegos");
        $sql->execute();
        $resultado1 = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($resultado1 as $item){ 
      ?>
      <div class="col-md-3 p-3 mb-2 bg-info text-white">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="text-center mt-2"><?php echo $item['nombre_juego']; ?></h4>
          </div>
          <div class="card-text text-center mt-2">
            <p>Precio: $ <?php echo $item['precio']; ?></p>
          </div>
          <div class="panel-body">
            <img class="img-responsive rounded mx-auto d-block mt-2" height="150px" width="220px" src="data:image/png;base64,<?php echo base64_encode($item['imagen_portada']); ?>"/>
          </div>
          <div class="panel-footer d-flex justify-content-between align-items-center mt-3"> 
            <a href="delete_video_sql.php?id=<?php echo $item['id_videojuego']; ?>" class="btn btn-primary ">Eliminar</a>            
          </div>
        </div>
      </div>
      <?php } ?>
    </div>  
  </div> 

</body>
</html>