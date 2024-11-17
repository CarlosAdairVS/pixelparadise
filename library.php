<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Juegos Guardados</title>
</head>
<body>
    <!--Barra de navegación -->
    <div id="nav-placeholder"></div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var navPlaceholder = document.getElementById("nav-placeholder");
            fetch("nav.php")
                .then(response => response.text())
                .then(data => {
                    navPlaceholder.innerHTML = data;
                });
        });
    </script>

    <div class="container">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        session_start();
        include_once 'conection.php';

        if (isset($_SESSION['user'])) {
            try {
                $usuario = $_SESSION['user'];
                $sql = 'SELECT * FROM users WHERE user_id=?';
                $sentencia = $mdb->prepare($sql);
                $sentencia->execute([$usuario]);
                $resultado = $sentencia->fetch();

                $sql = 'SELECT * FROM library l INNER JOIN videojuegos v ON l.id_videojuego = v.id_videojuego WHERE l.user_id=?';
                $sentencia = $mdb->prepare($sql);
                $sentencia->execute([$usuario]);
                $resultado2 = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }

            if (count($resultado2) > 0) {
                echo '<div class="row">
                        <div class="col-md-12">
                            <h3>Listado de videojuegos</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre del videojuego</th>
                                    </tr>
                                </thead>
                                <tbody>';
                foreach ($resultado2 as $row) {
                    echo '<tr>
                            <td>' . $row["nombre_juego"] . '</td>
                          </tr>';
                }
                echo '      </tbody>
                            </table>
                        </div>
                    </div>';
            } else {
                echo '<div class="row">
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
                    </div>';
            }
        }
        ?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a href="restricted.php" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>
</body>
</html>

