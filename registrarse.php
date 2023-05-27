<?php
// Establecer la conexión con la base de datos
include('dbcon.php');

// Verificar la conexión
if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

// Recupera los datos del formulario
$nombre = $_POST["nombre"];
$numero_control = $_POST["numero_control"];
$municipio = $_POST["municipio"];
$numero = $_POST["numero"];
$correo = $_POST["correo"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$codigo_postal = $_POST["codigo_postal"];
$curp = $_POST["curp"];
$contrasena = $_POST["contrasena"];

// Procesar la imagen
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;
$error = "";

// Verificar si el archivo es una imagen real o una imagen falsa
if(isset($_POST["submit"])) {
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

        // Verificar si ya existe el usuario en la base de datos
        $query = "SELECT * FROM usuarios WHERE correo = ? OR numero = ? OR numero_control = ? OR cedula = ? OR curp = ? OR nombre = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $correo, $numero, $numero_control, $cedula, $curp, $nombre);
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Ya existe un usuario con el mismo correo, número, número de control, cédula, CURP o nombre.'); setTimeout(function() {
                    window.location.href = 'registro.php';
                }, 000);</script>";
        } else {
            // Guarda la ubicación del archivo en la base de datos
            $imagen = "upload/" . htmlspecialchars(basename($_FILES["imagen"]["name"]));

            // Inserta los datos en la tabla
            $sql = "INSERT INTO usuarios (rol, nombre, numero_control, cedula, municipio, numero, correo, fecha_nacimiento, codigo_postal, curp, contrasena, imagen, fecha_registro, token) VALUES ('Estudiante','$nombre', '$numero_control', '', '$municipio', '$numero', '$correo', '$fecha_nacimiento', '$codigo_postal', '$curp', '$hashed_password', '$imagen', NOW(),'')";

            if (mysqli_query($conn, $sql)) {
                // Mostrar mensaje de éxito
                echo "<script>alert('Registro exitoso');</script>";
                
                // Redirigir al usuario después de 2 segundos
                echo "<script>setTimeout(function() {
                    window.location.href = 'registro.php';
                }, 2000);</script>";
                
                exit;
            } else {
                echo "Error: ";
            }
        }
    } else {
        echo "Hubo un error al subir el archivo.";
    }
}

// Verificar que la ruta de la imagen se esté guardando correctamente en la base de datos
if ($uploadOk == 1) {
    $sql = "SELECT imagen FROM usuarios WHERE correo = '$correo'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['imagen'] != $target_file) {
        echo "Hubo un error al guardar la ruta de la imagen en la base de datos.";
    }
}
?>
