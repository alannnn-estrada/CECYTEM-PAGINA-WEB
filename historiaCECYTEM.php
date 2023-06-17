<?php
    include('dbcon.php'); 
    include('head-nav.php');
?>
<link rel="stylesheet" type="text/css" href="./css/estilos.css">
<header>
            <span><h1 class="col-12 mb-4">Historia del CECYTEM Ixtapaluca II.</h1></span>
            <br>
            <video src="./img/CECYTEMVIDEOPROMOCIONAL.mp4" width="640" height="480" controls muted loop autoplay title="Video sobre el
            CECYTEM"></video>
</header>
<section>
        <div id="text-center">
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
            <h3>Conoce nuestra: Misión, Visión y Objetivos:</h3>
            <h5>Misión</h5>
            <p>Impartir educación media superior de calidad, en su modalidad de bachillerato tecnológico bivalente, con el objeto de que los egresados cuenten con educación tecnológica terminal que les permita incorporarse a una actividad productiva, o bien, continuar sus estudios de nivel superior.</p>
            <br>
            <h5>Visión</h5>
            <p>Ser la mejor opción en educación media superior en su modalidad de bachillerato tecnológico bivalente en el Sistema Nacional de los CECyTE’s, así como en el Estado de México.</p>
            <br>
            <h5>Objetivos</h5>
            <ul>
                <p><strong>- Impartir educación media superior terminal, terminal por convenio y bivalente de carácter tecnológico.</strong></p>
                <p><strong>- Promover un mejor aprovechamiento social de los recursos naturales y contribuir a su utilización racional.</strong></p>
                <p><strong>- Reforzar el proceso de enseñanza-aprendizaje con actividades curriculares y extracurriculares debidamente planeadas y ejecutadas.</strong></p>
                <p><strong>- Promover y difundir la actitud crítica derivada de la verdad científica, la previsión y búsqueda del futuro con base en el objeto de nuestra realidad y valores nacionales.</strong></p>
                <p><strong>- Promover la cultura estatal, nacional y universal, especialmente la de carácter tecnológico.</strong></p>
                <p><strong>- Realizar programas de vinculación con los sectores público, privado y social que contribuyan a la consolidación del desarrollo tecnológico y social de ser humano.</strong></p>
                <p><strong>- Elevar la calidad educativa de forma permanente.</strong></p>
                <p><strong>- Ampliar la cobertura social y territorial en favor de la juventud del Estado de México.</strong></p>
                <p><strong>- Innovar y diversificar la oferta educativa.</strong></p>
            </ul>
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
            <button class="text-center btn-img" id="boton-imagen"> Imagenes del CECYTEM <span id="badge"> Da Click aquí</span></button>
            
            <div class="container">
                <table class="table table-bordered" align="center">
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
            <a href="./carreras.php" class="link"><h3 class="text-center">¿Quiéres escribir una nueva historia con nosotros?</h3></a>
            <div class="text-center">
                <button class="btn-Print" onclick="imprimir();">Imprimir Esta Pagina</button>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="./js/historiaCECYTEM.js"></script>
<?php
    include('footer.php');
?>