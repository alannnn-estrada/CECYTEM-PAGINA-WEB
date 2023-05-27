<?php
    include('dbcon.php'); 
    include('head-nav.php');
?>
<link rel="stylesheet" type="text/css" href="./css/administrativo.css">
<div class="container">
    <div class="row text-center">
        <section class="mt-3 col-12">
            <h3>Aquí podras encontrar la informacion sobre todo tipo de becas que el CECYTEM y el Gobierno ofrecen para ti.</h3>
            <h4>Ademas de información sobre el servicio     social y servicio social comunitario.</h4>
            <br>
            <h5><span class="badges">Para enterarte de fechas, novedades y avisos te invitamos a dirigirte a   la pagina de Comunidad, ahi se subiran todo tipo de informacion recomendada   para ti</span></h5>
            <label for="user-select">De que tipo de información deseas saber:</label>
            <select id="user-select">
                <option value="">-- Selecciona una opción --</option>
                <option value="Becas">Becas</option>
                <option value="ServicioS">Servicio Social</option>
            </select>
            <div id="SELECT"></div>
        </section>
    </div>
    <script type="text/javascript" src="./js/administrativo.js"></script>
</div>
<footer id="footer" class="fixed-bottom">
    <?php include('footer.php')?>
</footer>
<script>
  function checkScreenSize() {
    var footer = document.getElementById('footer');

    if (window.innerWidth >= 768) {
      footer.classList.add('fixed-bottom');
    } else {
      footer.classList.remove('fixed-bottom');
    }
  }
  window.addEventListener('load', checkScreenSize);
  window.addEventListener('resize', checkScreenSize);
</script>
