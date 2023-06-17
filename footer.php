<footer class="bg-cecytem-color text-light">
    <div class="container py-2">
    	<div class="row text-center bg-cecytem-color">
    		<div class="col-md-6 m-0">
    			<a class="text-decoration-none text-cecytem-color" href="http://cecytem.edomex.gob.mx/ixtapaluca_ii" class="link">http://cecytem.edomex.gob.mx/ixtapaluca_ii</a>
    			<p>Direccion: Calle Cielo Mz.53, Lt. 221, Unidad Hab. Cuatro Vientos, Ixtapaluca, Estado de Mexico, C.P. 56589</p>
    			<p>CCT: 15ETC0047C</p>
    		</div>
    		<div class="col-md-6">
    			<h3>Información de contacto</h3>
    			<p>Telefono: (55) 59427592</p>
    			<p>E-mail: plantel.ixtapaluca2@cecytem.mx</p>
    		</div>
    		<br>
    		<p class="mb-0 text-center"><span class="badge bg-info">PAGINA NO OFICIAL DEL CECYTEM</span></p>
    		<p class="mb-0 text-center">&copy Derechos reservados, creditos a quien correspondan.</p>
    	</div>
    </div>
	<?php include('session.php');
		if(!isset($_SESSION['id'])) {
			echo '<script src="js/cookies.js"></script>';
		}
	?>
	<script src="js/scroll.js"></script>
</footer>
