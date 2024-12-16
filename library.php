<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="assets\image\joystick.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Juegos Guardados</title>
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

  <body>
    <!--Barra de navegacion -->
      <div id="nav-placeholder">
      </div>
      <script>
          $(function(){
              $("#nav-placeholder").load("nav.php");
          });
      </script>
<div class="container">      
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include_once 'conection.php';

if( isset($_SESSION['user']) ){
    try{
        $usuario = $_SESSION['user'];
        $sql = 'SELECT * FROM users where user_id=?';
        $sentencia = $mdb->prepare($sql);
        $sentencia->execute(array($usuario));
        $resultado = $sentencia->fetch();
        //$user_id = $resultado['user_id'];
        //Otra consulta
        $sql = 'SELECT * FROM library l INNER JOIN videojuegos v ON l.id_videojuego = v.id_videojuego WHERE l.user_id=?';
        $sentencia = $mdb->prepare($sql);
        $sentencia->execute(array($usuario));
        $resultado2 = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $ex){
        echo $ex->getMessage();
    }

    if(count($resultado2) > 0) {
        foreach ($resultado2 as $row) { ?>
            <div class="row">
                <div class="col-md-12">
                    <h3>Listado de videojuegos</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre del videojuego</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $row["nombre_juego"] ; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>    
        <?php } 
    } else { ?>
        <div class="row">
            <div class="col-md-12">
                <h3>Listado de videojuegos</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre del videojuego</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>No tiene juegos guardados</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php }
} else { ?>
    <div class="row">
        <div class="col-md-12">
            <h3>No hay usuario iniciado en sesión.</h3>
        </div>
    </div>
<?php } ?>
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a href="restricted.php" type="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>

</body>
</html>