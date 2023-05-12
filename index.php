<?php 
	include('dbcon.php');
	include('head-nav.php');
?>
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/carrusel.css">
<div class="contenedor-aside">
	<aside id="izq">
		<h1>Puedes contactarnos por nuestras redes sociales:</h1>
		<br>
		<h3><a class="linkss" href="https://twitter.com/CecytemIxtapal2"><img id="logosR" src="img/twitter.png" alt="facebook link"><b id="txtlg">CECYTEM IXTAPALUCA II</b></a></h1>
		<br>
		<h3><a class="linkss" href="https://www.facebook.com/CecytemPlantelIxtapaluca2"><img id="logosR" src="img/facebook.png" alt="twiter link"><b id="txtlg">CECYTEM Plantel Ixtapaluca II</b></a></h3>
	</aside>
	<div class="carrusel">
		<figure class="icon-cards">
			<div class="icon-cards__content">
				<div class="icon-cards__item d-flex align-items-center justify-content-center"><span class="h1"><a class="text-center" href="historiaCECYTEM">Pulsa aquí para ver nuestra historia</a></span></div>
				<div class="icon-cards__item d-flex align-items-center justify-content-center"><span class="h1"><a class="text-center" href="carreras">Pulsa aquí para ver nuestras carreras</a></span></div>
				<div class="icon-cards__item d-flex align-items-center justify-content-center"><span class="h1"><a class="text-center" href="administrativo">Pulsa aqui para ver informacion administrativa</a></span></div>
				<div class="icon-cards__item d-flex align-items-center justify-content-center"><span class="h1"><a class="text-center" href="comunidad">Pulsa aqui para ver nuestra comunidad</a></span></div>
			</div>
		</figure>
	</div>
	<aside id="der">
		<h1>Oferta educativa:</h1>
		<h3><a class="linkss" href="carreras.php#PROGRAMACIÓN">Programación</a></h3>
		<h3><a class="linkss" href="carreras.php#CONSTRUCCIÓN">Construcción</a></h3>
		<h3><a class="linkss" href="carreras.php#ANIMACIÓN DIGITAL">Animación digital</a></h3>
	</aside>
	
</div>
<div class="contenedor-aside">
	<aside id="izqq">
		<h1>Tramites:</h1>
		<h3><a href="https://cecytem.mx:8443/quizz/gui/LogIn.jsp?continue=56Q4aluWrpg_jspread_" class="linkss"><img class="logosT" src="img/encuesta.png" alt="Encuesta link">Sistema Integral de Aplicación de Encuestas (QUIZZ)</a></h3>
		<h3><a href="https://cecytem.mx/deo/gui/LogIn.jsp?continue=lF95L1wxenE_jspread_" class="linkss"><img class="logosT" src="img/deo.png" alt="DEO link">Sistema de Control Escolar WEB (DEO)</a></h3>
		<h3><a href="https://cecytem.mx:8443/Zeit/gui/LogIn.jsp?continue=uE1H77Ym5Eo_jspread_" class="linkss"><img class="logosT" src="img/zeit.png" alt="ZEIT link">Sistema de Seguimiento de Egresados, Becas y Servicio Social (ZEIT)</a></h3>
		<h3><a href="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&service=mail&hd=soycecytem.mx&sacu=1&flowName=GlifWebSignIn&flowEntry=AddSession" class="linkss"><img class="logosT" src="img/gmail.png" alt="CORREO">CORREO INSTITUCIONAL <b>@soycecytem.mx</b></a></h3>
	</aside>
	<aside id="derr">
		<h1>Aquí puedes ver nuestro calendario escolar y normas de convivencia vigentes de éste año 2023</h1>
		<br>
		<h3><a href="downloads/calendarioescolar.pdf" class="linkss">- Desde este link podras ver el calendario escolar vigente desde Febrero de 2023 - Agosto 2023</a></h3>
		<br>
		<h3><a href="downloads/normasdeconvivencia.pdf" class="linkss">- Desde este link podrás encontrar las normas de convivencia en nuestra institución</a></h3>
	</aside>
</div>
<section>
	<br>
	<h1>¿No tienes cuenta? <a class="linkss" href="registro">¡Registrate aquí! </a></h1>
	<br>
	<h2>Recuerda que esta pagina es hecha por alumnos del CECYTEM para alumnos del CECYTEM</h2>
	<br>
	<h2>Puedes ver algunas noticias mas relevantes es la sección de comunidad. <a href="comunidad.php" class="linkss"> Puedes dar click aquí para ver la pagina</a></h2>
	<br>
	<h1 style="color:blueviolet;">Informacion Relevante Para Ti:</h1>
	<br>
</section>
<?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'Estudiante'):?>
	<div class="contenedor-vape">
		<div class="informacion1">
			<div class="infotext">
				<h2>¿Acaso quieres saber cómo hacer marihuana con Maicena y JavaScript? Éste no es el lugar, pero te hablaremos de un tema relevante para ti.</h2>
				<br>
				<h3>¿Qué son los vapeadores?</h3>
				<p>Se cree que los vapeadores son un medio para 
				reducir el consumo de tabaco; sin embargo, 
				estudios recientes reportan que el uso de 
				vapeadores es tóxico y genera adicción.
				El uso dual (vapeo y cigarro convencional) 
				se asoció con la progresión de 
				Enfermedad Pulmonar Obstructiva 
				Crónica (EPOC), bronquitis y disminución 
				de la función pulmonar.</p>
				<p>Los vapeadores (cigarrillos electrónicos o e-cigs) son dispositivos electrónicos que administran 
				nicotina, sustancia psicoactiva 
				estimulante y con un alto poten-cial adictivo. Estos dispositivos 
				incluyen un cartucho desechable 
				o recargable que es calentado 
				para permitir la inhalación de un 
				líquido compuesto por nicotina, 
				formaldehído, propilenglicol, saborizantes y aromatizantes. </p>
			</div>
			<div id="contenedor-img"><img src="img/vape1.jpg" alt="imagen de vape" title="imagen de vape" id="vape1"></div>
		</div>
		<br>
		<center><h2>Video sobre el Vape:</h2></center>
		<video src="img/vaper.mp4" width="640" height="480" controls muted loop autoplay></video>
		<br>
		<br>
		<div class="informacion2">
			<div class="infrotextt">
				<h3>Modo de consumo y riesgos para la salud.</h3>
				<p>Existe una amplia variedad de 
				vapeadores. Los SEAN se comercializan en forma de cigarrillos,cigarros, puritos, pipas o narguiles; 
				otros tienen la forma de objetos 
				del día a día como bolígrafos, lápices, USB y dispositivos cilíndricos o 
				prismáticos.
				La cantidad de nicotina que consume una persona a través de los 
				SEAN depende de factores como 
				la duración de la calada, la profundidad de la inhalación y la frecuencia de uso.
				Efectos durante su consumo
				El uso de vapeadores con o sin nicotina genera una percepción de 
				relajación. Sin embargo, algunos 
				daños relacionados son vómitos, 
				mareos, irritación ocular, en boca 
				y en nariz.
				La mayoría de las personas que 
				usan los SEAN regularmente son 
				dependientes de la nicotina, la 
				cual genera ligeros efectos estimulantes, aumento de la frecuencia cardiaca y de la presión arterial. 
				En dosis altas y con un consumo 
				prolongado puede ocasionar un 
				infarto al corazón y la muerte.</p>
				<p>Los principales riesgos para la salud es:
				El uso de vapeadores, con y sin nicotina, provoca lesiones en el tejido del sistema respiratorio, principalmente en las vías respiratorias 
				altas. Asimismo, disminuye la cantidad de oxígeno en la respiración 
				de personas que eran no fumadoras y vapearon.</p>
				<br>
				<h4><a href="https://www.gob.mx/cms/uploads/attachment/file/793364/Revista_EneroFebrero__2_.pdf" class="linkss">Si deseas obtener mas información del tema puedes dar click e ingresar a una revista especializada en el tema :D</a></h4>
			</div>
			<div class="contenedor-imgg"><img src="img/vape2.jpg" alt="imagen de vape" title="imagen de vape" id="vape2"></div>
		</div>
	</div>
	<br>
	<center><h2>Y recuerda: “Vapeadores, ¡neta son tóxicos!”. 🚬</h2></center>
	<br>
	<center><h3><a href="formulario-vape.php" class="linkss">Pon a prueba tu conocimiento sobre el tema!</a></h3></center>
	<br>
<?php elseif(isset($_SESSION['rol']) && $_SESSION['rol'] == 'Profesor'):?>
	<div class="contenedor-recursos">
		<div class="contenidos">
			<h2>Estimado/a Profesor/a aquí puede encontrar algunos contenidos los cuales les puede ayudar para abordar ésta estrategia de "Si Te Drogas Te Dañas"</h2>
			<br>
			<h3><a href="https://estrategiaenelaula.sep.gob.mx/" class="linkss">Desde este link puede acceder a la pagina oficial de los contenidos</a></h3>
			<br>
			<h3><a href="https://youtube.com/playlist?list=PLma1qE9e_y03-0kIRAf_HsKp2pgUgY9DV" class="linkss">Presionando aqui puede encontrar un playlist sobre los diferentes videos que la SEP a preparado cómo apoyo para los estudiantes</a></h3>
			<br>
			<h3><a href="downloads/guia-para-docentes-si-te-drogas-te-dañas.pdf" class="linkss">Aquí podras encontrar el PDF directo de la guia para docentes Guía para docentes. Esta guía ha sido diseñada para las y los docentes como figuras clave que, desde su cercanía con el estudiantado, contribuyen a prevenir situaciones de riesgo. Para cumplir con este propósito, el documento brinda información sobre las consecuencias y daños irreversibles que ocasiona el consumo de las drogas presentadas en cada apartado.</a></h3>
		</div>
	</div>
	<br>
<?php else: ?>
	<center><h1 style="color:blue;">Inicia sesión para ver contenido exclusivo en las páginas :D</h1></center>
	<br>
<?php endif?>

<?php include('footer.php');?>