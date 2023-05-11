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
    <div class="container">
        <?php include('head-nav.php');?>
        <div class="DIV1">
            <div class="DIV1 ask">
                <h1>Bienvenido, seleccione su tipo de usuario</h1>
                <label for="user-type">Selecciona tu tipo de usuario:</label>
                <select id="user-type">
                    <option value="none">-- Selecciona una opción --</option>
                    <option value="Alumno">Alumno</option>
                    <option value="Profesor">Profesor</option>
                </select>
            </div>
            <div id="FORM"></div>
        </div>
        <?php include('footer.php');?>
    </div>
    <script src="./js/iniciarsesion.js"></script>
</body>
</html>