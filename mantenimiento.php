<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>En Mantenimiento</title>
  <link rel="icon" href="./img/CECYTEMLOGO.png" type="image">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/cookies.js"></script>
  <style>
    #particles-js {
      height: 100vh; 
      width: 100%;
      position: fixed;
      z-index: -1 !important;
    }
    body {
      background-color: #000;
    }

    .maintenance-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }

    .message {
      text-align: center;
      color: #fff;
      margin: 20px;
    }

    .logo-container {
      text-align: center;
      margin-bottom: 20px;
    }

    .logo {
      max-width: 100%;
      height: auto;
    }

    .loading {
      margin-top: 20px;
    }
    /* Estilos para el contenido nuevo */
    .contenido-nuevo {
      color: #fff;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
      animation: colorAnimation 5s linear infinite;
    }
    /* Animación de cambio de color */
      @keyframes colorAnimation {
        0%{ color: white;}
        20% { color: goldenrod; } /* dorado */
        40% { color: darkblue; } /* Azul */
        60% { color: darkgreen; } /* Verde */
        80% { color: darkmagenta; } /* magenta */
        100% { color: white; } /* Blanco */
      }

  </style>
</head>
<body>
  <div id="particles-js"></div>
  <div class="maintenance-container">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="message">
            <div class="logo-container">
              <img class="logo" src="img/CECYTEMLOGO.png" alt="Logo CECYTEM">
            </div>
            <h1>En Mantenimiento</h1>
            <p>Estamos realizando tareas de mantenimiento en este momento. Por favor, vuelve más tarde.</p>
            <div class="loading">
              <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Cargando...</span>
              </div>
            </div>
            <h4 class="contenido-nuevo">Contenido nuevo llegando proximamente</h4>
            <p>Modo de Mantenimiento: <?php $maintenanceMode=""; echo $maintenanceMode ? 'Activado' : 'Desactivado'; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/particles.min.js"></script>
  <script src="js/particlesOriginal.js"></script>
</body>
</html>
