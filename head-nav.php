<?php include('dbcon.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Historia del CECYTEM">
    <link rel="icon" href="./img/CECYTEMLOGO.png" type="image">
    <title>CECYTEM PLANTEL IXTAPALUCA II</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <style>nav .imgs {width: 120px;margin: 25px;}nav .imgs{height: unset;width: 120px;}@media screen and (max-width: 863px) {nav .imgs {display: block;margin: auto;} #foto{margin: auto;}}</style>
    
</head>
<body>
    <div class="container">
        <div class="scroll" id="SCROLLD"></div>
        <nav>
            <ul>
                <li><img  class="imgs" src="./img/CECYTEMLOGO.png"></li>
                <li><p class="logo">Colegio De Estudios Científicos Y Tecnológios Del Estado De México "Plantel Ixtapaluca II"</p></li>
                <li><a href="index" >Inicio</a></li>
                <li><a href="historiaCECYTEM">Historia</a></li>
                <li><a href="carreras">Carreras</a></li>
                <li><a href="administrativo">Administrativo</a></li>
                <li><a href="comunidad">Comunidad</a></li>
                <?php include('session.php');
                if(isset($_SESSION['id'])) { // si el usuario ha iniciado sesión
                    echo '
                        <li><a class="perfil-nav" href="verperfil"><img id="foto" src="'.$_SESSION['imagen'].'"></img></a></li>
                        <li><a id="nombre" href="editarperfil">'.$_SESSION['nombre'].'</a></li>
                    ';
                } else { // si el usuario no ha iniciado sesión
                    echo '
                        <li><a href="registro">Regístrate</a></li>
                    ';
                }
                ?>
            </ul>
        </nav>
        