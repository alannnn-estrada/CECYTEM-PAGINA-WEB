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
		<h1>Aquí puedes localizarnos en un horario de 7:00 am a 7:30 pm aproximadamente</h1>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15062.899536183097!2d-98.8473032!3d19.294326650000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce1e6ee63b2085%3A0xdd1848e0392f8407!2sCECYTEM%20Ixtapaluca%20II!5e0!3m2!1ses!2smx!4v1683748999688!5m2!1ses!2smx" style="border:0;"  loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</aside>
</div>
<!--Seccion para div de carrusel-->
<section>
	<br>
	<h1>¿No tienes cuenta? <a class="linkss" href="registro">¡Registrate aquí! </a></h1>
	<br>
	<h2>Recuerda que esta pagina es hecha por alumnos del CECYTEM para alumnos del CECYTEM</h2>
	<br>
</section>

<?php include('footer.php');?>