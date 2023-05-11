<?php
    include('dbcon.php'); 
    include('head-nav.php');

?>
<link rel="stylesheet" type="text/css" href="./css/carreras.css">
<section>
            <div>
                <img src="./img/imagen1.jpg" alt="">
                <h1>PROGRAMACIÓN</h1>
                <p>La carrera de Programación tiene como objetivo formar expertos en los procesos involucrados en la creación y
                optimización de los códigos que conforman los distintos softwares, como páginas web, aplicaciones, robots o paqueterías
                como Microsoft Office.</p>
            </div>
            <div>
                <img src="./img/imagen2.jpg" alt="">
                <h1>CONSTRUCCIÓN</h1>
                <p>Tiene la finalidad de satisfacer la demanda de personal calificado, para supervisar y controlar la construcción y
                restauración de obras civiles privadas y públicas, aplicando las técnicas constructivas.</p>
            </div>
            <div>
                <img src="./img/imagen3.jpg" alt="">
                <h1>ANIMACIÓN DIGITAL</h1>
                <p>Es una profesión que mediante software especializado permite la creación, modelado y movimiento de imágenes, en formato
                2D o recientemente en 3D.</p>
            </div>
            <br>
        </section>
        <div>
            <h1>
				<marquee direction="left">Visita nuestras instalaciones!</marquee>
			</h1>
        </div>
        <script type="text/javascript">
            const scrolld = document.getElementById("SCROLLD");
            window.addEventListener("scroll", () =>{
              const { scrollTop, clientHeight, scrollHeight } = document.documentElement;
              const scrolled = (scrollTop/(scrollHeight-clientHeight)*100);
              scrolld.style.width = `${scrolled}%`;
            });
        </script>
<?php include('footer.php');?>