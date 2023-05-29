<?php
// Establecer la conexión con la base de datos
include('dbcon.php');

// Verificar la conexión
if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

// Procesar el formulario de registro
if (isset($_POST['nombre'])) {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"];
    $direccion = $_POST["direccion"];
    $numero = $_POST["numero"];
    $correo = $_POST["correo"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $codigo_postal = $_POST["codigo_postal"];
    $curp = $_POST["curp"];
    $contrasena = $_POST["contrasena"];

    // Verificar los campos requeridos
    if (empty($nombre) || empty($cedula) || empty($direccion) || empty($numero) || empty($correo) || empty($fecha_nacimiento) || empty($codigo_postal) || empty($curp) || empty($contrasena)) {
        echo "Por favor, complete todos los campos requeridos.";
        exit;
    }

    // Verificar el formato del campo "nombre"
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{10,50}$/", $nombre)) {
        echo "El nombre debe contener solo letras y tener entre 10 y 50 caracteres.";
        exit;
    }

    // Verificar el formato del campo "cedula"
    if (!preg_match("/^[0-9]{8}$/", $cedula)) {
        echo "La cédula profesional debe contener solo números y tener 8 caracteres.";
        exit;
    }

    // Verificar el formato del campo "direccion"
    if (!preg_match("/^[a-zA-Z0-9\s]{10,100}$/", $direccion)) {
        echo "La dirección debe contener solo letras, números y espacios, y tener entre 10 y 100 caracteres.";
        exit;
    }

    // Verificar el formato del campo "numero"
    if (!preg_match("/^[0-9]{10}$/", $numero)) {
        echo "El número de teléfono debe contener solo números y tener 10 caracteres.";
        exit;
    }

    // Verificar el formato del campo "correo"
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
        exit;
    }

    // Verificar el formato del campo "fecha_nacimiento"
    if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $fecha_nacimiento)) {
        echo "La fecha de nacimiento no es válida.";
        exit;
    }

    // Verificar el formato del campo "codigo_postal"
    if (!preg_match("/^[0-9]{5}$/", $codigo_postal)) {
        echo "El código postal debe contener solo números y tener 5 caracteres.";
        exit;
    }

    // Verificar el formato del campo "curp"
    if (!preg_match("/^[A-Z0-9]{16}$/", $curp)) {
        echo "El CURP debe contener solo mayúsculas y números y tener 16 caracteres.";
        exit;
    }

    // Verificar el formato del campo "contrasena"
    if (!preg_match("/^[a-zA-Z0-9]{8,22}$/", $contrasena)) {
        echo "La contraseña debe contener entre 8 y 22 caracteres y solo puede contener letras y números.";
        exit;
    }

    // Procesar la imagen
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;
    $error = "";

    // Verificar si se ha subido una imagen
    if(empty($_FILES["imagen"]["name"])) {
        $error .= "Debe seleccionar una imagen.<br>";
        $uploadOk = 0;
    }

    // Verificar si el archivo es una imagen real o una imagen falsa
    if($uploadOk == 1 && isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if($check === false) {
            $error .= "El archivo no es una imagen.<br>";
            $uploadOk = 0;
        }
    }

    // Verificar si el archivo ya existe
    if (file_exists($target_file)) {
        $error .= "El archivo ya existe.<br>";
        $uploadOk = 0;
    }

    // Verificar el tamaño máximo del archivo
    if ($_FILES["imagen"]["size"] > 500000) {
        $error .= "El archivo es demasiado grande.<br>";
        $uploadOk = 0;
    }

    // Permitir solo ciertos formatos de imagen
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $error .= "Solo se permiten archivos JPG, JPEG, PNG.<br>";
        $uploadOk = 0;
    }

    // Verificar si hay errores en la carga de archivos
    if ($uploadOk == 0) {
        echo "El archivo no se pudo subir. Razones:<br>" . $error;

    // Si todo está bien, sube el archivo y guarda la ubicación en la base de datos
    } else {
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
            // Cifrar la contraseña antes de guardarla en la base de datos
            $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

            // Guarda la ubicación del archivo en la base de datos
            $imagen = "upload/" . htmlspecialchars(basename($_FILES["imagen"]["name"]));

            // Inserta los datos en la tabla
            $sql = "INSERT INTO usuarios (rol, nombre, numero_control, cedula, direccion, numero, correo, fecha_nacimiento, codigo_postal, curp, contrasena, imagen, fecha_registro, token) 
                    VALUES ('Profesor', '$nombre', '', '$cedula', '$direccion', '$numero', '$correo', '$fecha_nacimiento', '$codigo_postal', '$curp', '$hashed_password', '$imagen', NOW(), '')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Registro Exitoso'); setTimeout(function() {
                    window.location.href = 'registro.php';
                }, 2000);</script>";
                exit;
            } else {
                echo "Error: " /*. $sql . "<br>" . mysqli_error($conn)*/;
            }

        } else {
            echo "Hubo un error al subir el archivo.";
        }
    }
}else{
    echo "<script>alert('Algo fallo!'); setTimeout(function() {
                    window.location.href = 'registro.php';
                }, 2000);</script>";
}
?>
<?php include('head-nav.php')?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
    <h2>Registro de usuario</h2>
    <label for="nombre">Nombre del alumno:</label>
    <input type="text" id="nombre" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{10,50}" title="Solo letras! De 10 a 50 caracteres." onkeyup="{this.value=this.value.toUpperCase();}" required>

    <label for="cedula">Cédula Profesional:</label>
    <input type="text" id="cedula" name="cedula" pattern="[0-9]{8}" title="Solo Numeros y 8 caracteres!" required>

    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" pattern="[a-zA-Z0-9\s]{10,100}" title="Solo letras, números y espacios! De 10 a 100 caracteres." onkeyup="{this.value=this.value.toUpperCase();}" required>

    <label for="numero">Número de teléfono:</label>
    <input type="tel" id="numero" name="numero" pattern="[0-9]{10}" title="Solo Numeros, solo 10 caracteres!" required>

    <label for="correo">Correo electrónico:</label>
    <input type="email" id="correo" name="correo" required>

    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

    <label for="codigo_postal">Código postal:</label>
    <input type="text" id="codigo_postal" name="codigo_postal" pattern="[0-9]{5}" title="Solo Numeros y maximo 5 numeros!" required>

    <label for="curp">CURP:</label>
    <input type="text" id="curp" name="curp" pattern="[A-Z0-9]{16}" title="Solo mayusculas y letras, 16 caracteres" onkeyup="{this.value=this.value.toUpperCase();}" required>

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" pattern="[a-zA-Z0-9]{8,22}" title="Debe tener entre 8 y 22 caracteres y solo puede contener letras y números." required>

    <label for="imagen">Foto:</label>
    <input type="file" id="imagen" name="imagen" accept="image/*" required>

    <input type="submit" value="Registrarse">
</form>
<?php include('footer.php')?>
