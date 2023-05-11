<?php
    include('dbcon.php'); 
    include('head-nav.php');
?>
<link rel="stylesheet" type="text/css" href="./css/estilos.css">
<header>
            <span><h1>Historia del CECYTEM Ixtapaluca II.</h1></span>
            <br>
            <video src="./img/CECYTEMVIDEOPROMOCIONAL.mp4" width="640" height="480" controls muted loop autoplay title="Video sobre el
            CECYTEM"></video>
</header>
<section>
        <div class="text-center">
            <br>
            <p>El Colegio de Estudios Científicos y Tecnológicos del Estado de México, Plantel Ixtapaluca II,</p>
            <p>inicio actividades en el mes de Noviembre del 2000 en instalaciones provisionales en la Escuela Secundaria Enrique C. Rebsamen,</p>
            <p>Ubicada en Brisa s/n esq. con Huracán, Unidad Habitacional Ara Cuatro Vientos; con las especialidades de COMPUTACIÓN y CONSTRUCCIÓN </p>
            <p>con una población de 80 alumnos con una plantilla de 9 profesores.</p>
            <img src="./img/placa.jpg" class="img-fija img-fluid" alt="Imagen Edificio C CECYTEM" title="Placa del CECYTEM IXTAPALUCA II">
            <p>El 11 de Noviembre del 2003 el Lic. Arturo Montiel Rojas, Gobernador en turno del Estado de México, Inaguró las instalaciones actuales,</p>
            <p> con ello, dejó en claro el propósito emprendedor y de lucha al que debemos entregarnos Alumnos, Administrativos y Docentes</p>
            <p>Despues se agrego la carrera de ANIMACION DIGITAL el cual daba mas opciones a los alumnos,</p>
            <p>también, después de tiempo se inicio la construcción del edificio de administración el cuál ayudaria al personal para tener un mejor orden o una mejor organización.</p>
            <br>
            <p>Hasta el momento llevan <span class="color-1">7 generaciones egresadas</span> las cuales son:</p>
            <ul>
                <p class="color-1">"2000-2003"</p>
                <p class="color-1">"2003-2006"</p>
                <p class="color-1">"2006-2009"</p>
                <p class="color-1">"2009-2012"</p>
                <p class="color-1">"2012-2015"</p>
                <p class="color-1">"2015-2018"</p>
                <p class="color-1">"2018-2021"</p>
                <p class="color-cursante">"2021-2024"</p>
            </ul>
            <br>
            <img id="imagen" src="./img/imagen1.jpg" class="img-fluid img-slider" alt="Imagen Del CECYTEM" title="Imagenes del CECYTEM">
            <br>
            <button class="text-center btn-img" id="boton-imagen"> Imagenes del CECYTEM <span class="badge"> Da Click aquí</span></button>
            
            <div>
                <table border="1" align="center">
                    <tr>
                        <th>
                            <div id="miElemento">Antes</div>
                        </th>
                        <th>
                            <div id="miOtroElemento">Ahora</div>
                        </th>
                    </tr>
                    <tr>
                        <td>Antes el CECYTEM sus instalaciones provicionales eran en una escuela secundaria.</td>
                        <td>Ahora el CECYTEM es un plantel el cual opera de una mejor manera.</td>
                    </tr>
                    <tr>
                        <td>Antes el CECYTEM solamente contaba solo con 2 edificios</td>
                        <td>Ahora el CECYTEM cuenta con 3 edificios los cuales, 2 de ellos son salones y el tercero es administrativo.</td>
                    </tr>
                    <tr>
                        <td>Antes el CECYTEM, su plantilla era solo de 9 profesores.</td>
                        <td>Ahora el CECYTEM, su plantilla de profesores es de 26 aproximadamente.</td>
                    </tr>
                    <tr>
                        <td>Antes el CECYTEM solamente contaba con la capacidad de 80 alumnos.</td>
                        <td>Ahora el CECYTEM cuenta con la capacidad hasta para 612 alumnos.</td>
                    </tr>
                </table>
            </div>
            <a href="./carreras.php">
                <h2 class="text-center link">¿Quiéres escribir una nueva historia con nosotros?</h2>
            </a>
            <div class="text-center">
                <button class="btn-Print" onclick="imprimir();">Imprimir Esta Pagina</button>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="./js/historiaCECYTEM.js"></script>
<?php
    include('footer.php');
?>