<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Agregar videojuego</title>
  <link rel="stylesheet" href="assets\css\style.css"/>
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
  crossorigin="anonymous"
  />

 
</head>

<body class="justify-content-center vh-100">
  
  <!--Barra de navegacion -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background: #060636">
    <div class="container-fluid">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="index.php">
        <img src="assets\image\logob.png" alt="logo oasis" style="height: 3rem;">
      </a>
      <!--Boton al colapsar -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon navbar-light"></span>
      </button>
      <!--Barra que se colapsa-->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mt-3">
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
              <div class="input-group">
                <input class="form-control" type="text" placeholder="Busqueda" aria-label="Busqueda" aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
              </div>
            </form>
          </li>
          <li class="nav-item active mx-3 mt-2">
            <a class="nav-link text-white fs-5" href="#">Inicio<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item mx-3 mt-2">
            <a class="nav-link text-white fs-5" href="#">Biblioteca</a>
          </li>
          <li class="nav-item dropdown me-5 pe-5 ps-3">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?=$resultado['pic_path'] ?>" alt="" style="height: 3rem; border-radius: 50%; aspect-ratio:1/1;">
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="restricted.php">Perfil</a></li>
              <li><a class="dropdown-item" href="setting.php">Configuración</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="close.php">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!--
    <div class="d-flex justify-content-center">
      <img class="img-logo" src="assets\image\logo1.png" alt="login-icon"/>
    </div>
    -->
    <div class="text-center fs-1 fw-bold" style="color:#102e82">Ingrese los datos del videojuego</div>  
    

    <form action="add_video_sql.php" method="POST" enctype="multipart/form-data">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-4">
        <label for="nombre_juego" class="form-label">Nombre del videojuego:</label>
        <input type="text" class="form-control" id="nombre_juego" aria-describedby="nombre_juego" required>
      </div>
    </div>

    <div class="row justify-content-center align-items-center">
      <div class="col-md-4">
        <label for="descripcion" class="form-label mt-4">Descripcion:</label>
        <textarea cols="15" rows="10" id="descripcion" class="form-control" required></textarea>
      </div>
    </div>

    <div class="row justify-content-center align-items-center">
      <div class="col-md-4">
        <label for="categoria" class="form-label mt-4">Categoría:</label><br>
      </div>

      <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
          <select class="form-select" id="categoria" required>
            <option selected>Otro</option>
            <option value="1">Accion</option>
            <option value="2">Aventua</option>
            <option value="3">Deportes</option>
            <option value="4">Terror</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row justify-content-center align-items-center">
      <div class="col-md-4">
        <label for="precio" class="form-label mt-4">Precio del videojuego:</label>
        <input type="text" class="form-control"  id="precio" placeholder="Ejemplo '12.30'" pattern="^\d+([,.]\d+)?$" title="Ingrese el precio en decimales" required>
      </div>
    </div>
      
      <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
          <label class="col-md-4 mt-3" for="img_port">Imagen portada:</label>
          <input type="file" class="form-control bg-light " id="img_port" name="img_port">
        </div>
      </div>
        
      <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
          <label class="col-md-4 mt-3" for="img_port">Imagen ref 1:</label>
          <input type="file" class="form-control bg-light " id="img_ref1" name="img_ref1"  >
        </div>
      </div>
        
      <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
          <label class="col-md-4 mt-3" for="img_port">Imagen ref 2:</label>
          <input type="file" class="form-control bg-light" id="img_ref2" name="img_ref2"  >
        </div> 
      </div>
    
    <div class=" row justify-content-center align-items-center">
      <div class="col-md-2">
        <button class="btn text-white w-100 mt-3 fw-semibold shadow-sm" type="submit" style="background-color: #B80606">Guardar</button> 
      </div> 
    </div>

  </form>

</body>
</html>