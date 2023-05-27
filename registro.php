<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ALANES-LEX HRDZ-IBAÑEZ AL-YA HRDZ">
    <meta name="description" content="Historia del CECYTEM">
    <link rel="icon" href="./img/CECYTEMLOGO.png" type="image">
    <title>Inicio/Registro</title>
    <link rel="stylesheet" type="text/css" href="./css/inicioss.css">
</head>
<body>
    <?php include('head-nav.php');?>
    <div class="container">
        <div class="DIV1 col-12">
            <div class="DIV1 ask mt-2">
                <h1>Bienvenido, seleccione su tipo de usuario</h1>
                <label for="user-type">Selecciona tu tipo de usuario:</label>
                <select id="user-type">
                    <option value="none">-- Selecciona una opción --</option>
                    <option value="Alumno">Alumno</option>
                    <option value="Profesor">Profesor</option>
                </select>
            </div>
            <div id="FORM" class="mt-3"></div>
        </div>
    </div>
    <footer class="fixed-bottom">
        <?php include('footer.php');?>
    </footer>
    <script src="./js/iniciarsesion.js"></script>
</body>
</html>