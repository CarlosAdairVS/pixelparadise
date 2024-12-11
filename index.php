<?php
include_once 'conection.php';
session_start();
if(isset($_SESSION['user'])){
	$usuario = $_SESSION['user'];
    $sql = 'SELECT * FROM user_inf where user_id=?';
    $sentencia = $mdb->prepare($sql);
    $sentencia->execute(array($usuario));
    $resultado = $sentencia->fetch();
        //Otra consulta
	$sql = 'SELECT * FROM users where user_id=?';
	$sentencia = $mdb->prepare($sql);
	$sentencia->execute(array($usuario));
	$resultado2 = $sentencia->fetch();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="assets\image\joystick.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
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

    <div class="container-fluid pt-5 hero-header mb-5" style="background: linear-gradient(0deg, rgba(190, 14, 209, 100) 0%, rgba(67,1,70,100)  80%);">
        <div class="container pt-1">
            <div class="row g-5 pt-1">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Pixel Paradise: Tu destino para videojuegos</h1>
                    <p class="text-white mb-4 animated slideInRight">Descubre y explora una gran variedad de videojuegos</p>
                    <a href="registro.php" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Registrate</a>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="assets\image\pixelLogo.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="assets\image\consolas.jpeg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="text-white px-3 py-2 mb-3 d-inline-block" style="background-color: #430146; border-radius: 10px;">Acerca de nosotros</div>
                    <h1 class="mb-4">Bienvenidos a Pixel Paradise</h1>
                    <p class="mb-4">Bienvenidos a Pixel Paradise, tu destino definitivo para todo lo relacionado con videojuegos. Somos un apasionado equipo de gamers dedicados a traerte las últimas novedades, los clásicos inolvidables y todo lo que necesitas para disfrutar al máximo de tu experiencia de juego.</p>    
                    <p class="mb-4">En Pixel Paradise, creemos en el poder de los videojuegos para conectar a las personas y crear mundos nuevos. Nos esforzamos por ofrecerte un servicio de primera calidad y una selección de productos que te inspiren y emocionen.</p>
                    <p class="mb-4">Gracias por ser parte de nuestra comunidad. ¡Vamos a explorar juntos el universo de los videojuegos!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Team Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="mb-4">Conoce a los miembros del equipo</h1>
                    <a class="btn rounded-pill px-4" href="https://github.com/CarlosAdairVS/pixelparadise" style="background-color: #430146; color: white; border: none;">GitHub Proyecto</a>
                </div>
                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" src="https://avatars.githubusercontent.com/u/182252158?v=4" alt="">
                                        <h5 class="mb-0">Carlos Adair Vargas Sosa</h5>
                                        <small>Programador</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary m-1" href="https://github.com/CarlosAdairVS" style="background-color: #430146; color: white; border: none;"><i class="fab fa-github"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

</body>
<footer>
<div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Seguridad</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Variedad</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Soporte</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Precios bajos</h6>
                        </div>
                    </div>
    <div class="d-flex align-items-center mt-4">
        <a class="btn btn-outline-primary btn-square me-3" href="" style="color: #430146; border-color: #430146;"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-outline-primary btn-square me-3" href="" style="color: #430146; border-color: #430146;"><i class="fab fa-twitter"></i></a>
        <a class="btn btn-outline-primary btn-square me-3" href="" style="color: #430146; border-color: #430146;"><i class="fab fa-instagram"></i></a>
        <a class="btn btn-outline-primary btn-square" href="" style="color: #430146; border-color: #430146;"><i class="fab fa-linkedin-in"></i></a>
    </div>
</footer>
</html>