<?php
    include('dbcon.php'); 
    include('head-nav.php');

?>
<link rel="stylesheet" type="text/css" href="./css/carreras.css">
<div class="container">
    <div class="row">
        <section class="row m-auto text-center mt-5">
            <div class="col ">
                <img src="./img/imagen1.jpg" alt="Programación">
                <h4 class="mt-2"><a href="" class="link">PROGRAMACIÓN</a></h4>
                <p>La carrera de Programación tiene como objetivo formar expertos en los procesos involucrados en la creación y optimización de los códigos que conforman los distintos softwares, como páginas web, aplicaciones, robots o paqueterías como Microsoft Office.</p>
            </div>
            <div class="col ">
                <img src="./img/imagen2.jpg" alt="Construcción">
                <h4 class="mt-2"><a href="" class="link">CONSTRUCCIÓN</a></h4>
                <p>Tiene la finalidad de satisfacer la demanda de personal calificado, para supervisar y controlar la construcción y restauración de obras civiles privadas y públicas, aplicando las técnicas constructivas.</p>
            </div>
            <div class="col ">
                <img src="./img/imagen3.jpg" alt="Animación">
                <h4 class="mt-2"><a href="" class="link">ANIMACIÓN DIGITAL</a></h4>
                <p>Es una profesión que mediante software especializado permite la creación, modelado y movimiento de imágenes, en formato 2D o recientemente en 3D.</p>
            </div>
        </section>
        <div class="row">
            <h3 class="col-12">
                <marquee direction="left">Visita nuestras instalaciones!</marquee>
            </h3>
        </div>
    </div>
</div>

<?php include('footer.php');?>