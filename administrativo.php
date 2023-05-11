<?php
    include('dbcon.php'); 
    include('head-nav.php');
?>
<link rel="stylesheet" type="text/css" href="./css/administrativo.css">

 <section>
            <h1>Aquí podras encontrar la informacion sobre todo tipo de becas que el CECYTEM y el Gobierno ofrecen para ti.</h1>
            <h2>Ademas de información sobre el servicio     social y servicio social comunitario.</h2>
            <br>
            <h3><span class="badge">Para enterarte de fechas, novedades y avisos te invitamos a dirigirte a   la pagina de Comunidad, ahi se subiran todo tipo de informacion recomendada   para ti</span></h3>
            <label for="user-select">De que tipo de información deseas saber:</label>
            <select id="OSELECT">
                <option value="">-- Selecciona una opción --</option>
                <option value="Becas">Becas</option>
                <option value="ServicioS">Servicio Social</option>
            </select>
            <div id="SELECT"></div>
</section>
    <script type="text/javascript" src="./js/administrativo.js"></script>
<?php
    include('footer.php');
?>