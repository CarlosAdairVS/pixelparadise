<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="assets\image\pixelLogo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets\css\style.css"/>
    <!-- Usando fontawesome para iconos-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- --->
    <script src="assets\js\script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="justify-content-center vh-100">
    <!-- Barra de navegacion -->
    <div id="nav-placeholder"></div>
    <script>
      $(function(){
        $("#nav-placeholder").load("nav.php");
      });
    </script>
    <!-- Termina Barra de navegacion -->

    <div class="text-center fs-1 fw-bold" style="color:#102e82">Ingrese los datos del videojuego</div>  
    <form action="add_video_sql.php" method="POST" enctype="multipart/form-data">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <label for="nombre_juego" class="form-label">Nombre del videojuego:</label>
                <input type="text" class="form-control" id="nombre_juego" name="nombre_juego" aria-describedby="nombre_juego" required>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <label for="descripcion" class="form-label mt-4">Descripcion:</label>
                <textarea cols="15" rows="10" id="descripcion" name="descripcion" class="form-control" required></textarea>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <label for="categoria" class="form-label mt-4">Categoría:</label><br>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4">
                    <select class="form-select" id="categoria" name="categoria" required>
                        <option selected>Otro</option>
                        <option value="Accion">Accion</option>
                        <option value="Aventura">Aventura</option>
                        <option value="Deportes">Deportes</option>
                        <option value="Terror">Terror</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <label for="precio" class="form-label mt-4">Precio del videojuego:</label>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="Ejemplo '12.30'" pattern="^\d+([,.]\d+)?$" title="Ingrese el precio en decimales" required>
            </div>
        </div>
        
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <label class="col-md-4 mt-3" for="img_port">Imagen portada:</label>
                <input type="file" class="form-control bg-light" id="img_port" name="img_port">
            </div>
        </div>
        
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <label class="col-md-4 mt-3" for="img_ref1">Imagen ref 1:</label>
                <input type="file" class="form-control bg-light" id="img_ref1" name="img_ref1">
            </div>
        </div>
        
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <label class="col-md-4 mt-3" for="img_ref2">Imagen ref 2:</label>
                <input type="file" class="form-control bg-light" id="img_ref2" name="img_ref2">
            </div> 
        </div>
    
        <div class="row justify-content-center align-items-center">
            <div class="col-md-2">
                <button class="btn text-white w-100 mt-3 fw-semibold shadow-sm" type="submit" style="background-color: #B80606">Guardar</button> 
            </div> 
        </div>
    </form>
</body>
</html>
