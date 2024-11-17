<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Agregar videojuego</title>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
  
  <!--Barra de navegación -->
  <nav>
    <div>
      <!--Boton al colapsar -->
      <button type="button">
        <span></span>
      </button>
      <!--Barra que se colapsa-->
      <div>
        <ul>
          <li>
            <!-- Navbar Search-->
            <form>
              <div>
                <input type="text" placeholder="Busqueda" aria-label="Busqueda" />
                <button type="button"><i></i></button>
              </div>
            </form>
          </li>
          <li>
            <a href="#">Inicio</a>
          </li>
          <li>
            <a href="#">Biblioteca</a>
          </li>
          <li>
            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?=$resultado['pic_path'] ?>" alt="">
            </a>
            <ul>
              <li><a href="restricted.php">Perfil</a></li>
              <li><a href="setting.php">Configuración</a></li>
              <li><hr></li>
              <li><a href="close.php">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div>Ingrese los datos del videojuego</div>  
    
  <form action="add_video_sql.php" method="POST" enctype="multipart/form-data">
    <div>
      <div>
        <label for="nombre_juego">Nombre del videojuego:</label>
        <input type="text" id="nombre_juego" name="nombre_juego" required>
      </div>
    </div>

    <div>
      <div>
        <label for="descripcion">Descripción:</label>
        <textarea cols="15" rows="10" id="descripcion" name="descripcion" required></textarea>
      </div>
    </div>

    <div>
      <div>
        <label for="categoria">Categoría:</label>
      </div>
      <div>
        <div>
          <select id="categoria" name="categoria" required>
            <option selected>Otro</option>
            <option value="1">Acción</option>
            <option value="2">Aventura</option>
            <option value="3">Deportes</option>
            <option value="4">Terror</option>
          </select>
        </div>
      </div>
    </div>

    <div>
      <div>
        <label for="precio">Precio del videojuego:</label>
        <input type="text" id="precio" name="precio" placeholder="Ejemplo '12.30'" pattern="^\d+([,.]\d+)?$" title="Ingrese el precio en decimales" required>
      </div>
    </div>
      
    <div>
      <div>
        <label for="img_port">Imagen portada:</label>
        <input type="file" id="img_port" name="img_port">
      </div>
    </div>
        
    <div>
      <div>
        <label for="img_ref1">Imagen ref 1:</label>
        <input type="file" id="img_ref1" name="img_ref1">
      </div>
    </div>
        
    <div>
      <div>
        <label for="img_ref2">Imagen ref 2:</label>
        <input type="file" id="img_ref2" name="img_ref2">
      </div> 
    </div>
    
    <div>
      <div>
        <button type="submit">Guardar</button> 
      </div> 
    </div>
  </form>
</body>
</html>

