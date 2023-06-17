<?php include('dbcon.php');
include('session.php')?>
<?php
  $maintenanceMode = false; //*modo mantenimiento

  if ($maintenanceMode) {
    include('mantenimiento.php');
    exit;
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Historia del CECYTEM">
    <link rel="icon" href="./img/CECYTEMLOGO.png" type="image">
    <title>CECYTEM PLANTEL IXTAPALUCA II</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
    function addMarginTop() {
      var elements = document.querySelectorAll('[id="nav-foto"]');
      elements.forEach(function(element) {
        element.classList.add('mt-5');
      });
    }
    document.addEventListener("DOMContentLoaded", function() {
        // Mostrar el spinner de carga al cargar la página
        document.querySelector(".html").style.visibility = "hidden";
        
        document.getElementById("spinner").classList.add("d-block");
        document.querySelector(".overlay").classList.add("d-block");

        setTimeout(function() {
            // Agregar clase para animar el desvanecimiento
            document.getElementById("spinner").classList.add("fade-out");
            document.querySelector(".overlay").classList.add("fade-out");

            // Esperar a que finalice la animación de desvanecimiento
            setTimeout(function() {
            // Ocultar el spinner y la overlay
            document.getElementById("spinner").classList.remove("d-block");
            document.getElementById("spinner").classList.add("d-none");
            document.querySelector(".overlay").classList.remove("d-block");
            document.querySelector(".overlay").classList.add("d-none");

            // Mostrar el contenido del HTML
            document.querySelector(".html").style.visibility = "visible";
            }, 1000);
        }, 1000);
        
    });
  </script>
</head>
<body>
        <div class="scroll" id="SCROLLD"></div>
        <div class="overlay d-flex flex-column align-items-center">
            <div class="mb-3">
                <img src="img/CECYTEMLOGO.png" alt="Logo" class="img-fluid">
            </div>
            <div id="spinner" class="mb-3">
                <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-xl p-0 navbar-cecytem">
            <div class="container bg-cecytem-color">
                <img class="imgs text-center m-5" src="./img/CECYTEMLOGO.png">
                <a class="navbar-brand m-5 logo" href="index"><strong>CECYTEM</strong>
                <h3><span class="badge text-success">"Plantel Ixtapaluca II"</span></h3>
                </a>

                <button class="navbar-toggler btn border-0 animate__animated animate__pulse" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li id="nav-foto" class=" m-2 navbar-item"><a class="nav-link a" href="index">Inicio</a></li>
                        <li id="nav-foto" class=" m-2 nav-item"><a class="nav-link a" href="historiaCECYTEM">Historia</a></li>
                        <li id="nav-foto" class=" m-2 nav-item"><a class="nav-link a" href="carreras">Carreras</a></li>
                        <li id="nav-foto" class=" m-2 nav-item"><a class="nav-link a" href="administrativo">Administrativo</a><li>
                        <li id="nav-foto" class=" m-2 nav-item"><a class="nav-link a" href="comunidad">Comunidad</a></li>
                        <?php include('session.php');
                        if($rol == 'Admin'){
                            echo '
                            <li class="nav-item dropdown mt-2 mx-2">
                                    <a class="nav-link dropdown-toggle d-flex align-items-center dropdown-toggle-arrow text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="    margin-left: -34px;">
                                        <img class="rounded-circle img-fluid" src="'.$_SESSION['imagen'].'" style="width: 50px;">
                                        <p class="text-white mb-0">'.$primerNombre.'</p>
                                    </a>
                                    <ul class="dropdown-menu bg-secondary text-primary" aria-labelledby="navbarDropdown">
                                        <li><a href="verperfil" class="text-white dropdown-item">Ver Perfil</a></li>
                                        <li><a class="dropdown-item text-white" id="nombre" href="panelcontrol">Panel de Control '.$_SESSION['rol'].'</a></li>
                                        <li><a href="cerrarsesion" class="text-white dropdown-item">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                                <script>addMarginTop();</script>
                            ';
                        }else if(isset($_SESSION['id'])) { // si el usuario ha iniciado sesión
                            echo '
                               <li class="nav-item dropdown mt-2 mx-2">
                                    <a class="nav-link dropdown-toggle d-flex align-items-center dropdown-toggle-arrow text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="    margin-left: -34px;">
                                        <img class="rounded-circle img-fluid" src="'.$_SESSION['imagen'].'" style="width: 50px;">
                                        <p class="text-white mb-0">'.$primerNombre.'</p>
                                    </a>
                                    <ul class="dropdown-menu bg-secondary text-primary" aria-labelledby="navbarDropdown">
                                        <li><a href="verperfil" class="text-white dropdown-item">Ver Perfil</a></li>
                                        <li><a class="dropdown-item text-white" id="nombre" href="editarperfil">Editar perfil: '.$_SESSION['nombre'].'</a></li>
                                        <li><a href="cerrarsesion" class="text-white dropdown-item">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                                <script>addMarginTop();</script>
                            ';
                        } else { // si el usuario no ha iniciado sesión
                            echo '
                                <li class="m-2 nav-item"><a href="registro" class="nav-link a">Registrarse</a></li>
                            ';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="html">
        