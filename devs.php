<?php include('head-nav.php')?>
<style>
    #lienzo {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .container {
        z-index: 99;
    }
    .divss{
        height: 50vh!important;
    }
</style>
<canvas id="lienzo"></canvas>
<div class="container">
    <div class="row divss m-4 d-flex justify-content-center align-items-center" id="divs">
        <div class="col-lg-3"> <!--Aqui solamente puedes modificar la informacion de los dev's, nada interesante-->
            <div class="card bg-danger text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title">ESTRADA MONROY ALAN JAVIER</h5>
                    <p class="card-text">Grupo 402</p>
                    <p class="card-text">Encargado del desarrollo Front-end y Backend del proyecto.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-success text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title">HERNÁNDEZ ALONSO ALAN YAIR</h5>
                    <p class="card-text">Grupo 402</p>
                    <p class="card-text">Creador e investigador de la pagina Administrativo</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-primary text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title">IBÁÑEZ LEZAMA ALAN</h5>
                    <br>
                    <p class="card-text">Grupo 402</p>
                    <p class="card-text">Creador e investigador de la pagina Carreras</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-info text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title">MORALES HERNÁNDEZ JOEL ALEXANDER</h5>
                    <p class="card-text">Grupo 402</p>
                    <p class="card-text">Creador e investigador de la pagina Administrativo</p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer id="footer" class="fixed-bottom">
    <?php include('footer.php')?>
</footer>
<script src="js/lienzo.js"></script>
<script>
  function checkScreenSize() {
    var footer = document.getElementById('footer');
    var divs =document.getElementById('divs');

    if (window.innerWidth >= 992) {
      footer.classList.add('fixed-bottom');
      divs.classList.add('divss');
    } else {
      footer.classList.remove('fixed-bottom');
      divs.classList.remove('divss');
    }
  }
  window.addEventListener('load', checkScreenSize);
  window.addEventListener('resize', checkScreenSize);
</script>
