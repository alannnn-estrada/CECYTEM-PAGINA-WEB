<?php
include('dbcon.php');
include('session.php');

// Función para limpiar y validar entradas de usuario
function limpiar_entrada($entrada) {
    $entrada = trim($entrada);
    $entrada = stripslashes($entrada);
    return $entrada;
}

function validar_textarea($texto) {
    // Solo se permiten letras, números y espacios
    if (!preg_match("/^[a-zA-Z0-9\s]+$/", $texto)) {
        return false;
    }
    return true;
}

// Establecer la conexión a la base de datos
// Procesar el formulario de publicación solo para profesores
if (isset($_POST['publicar'])) {
    if ($rol == 'Profesor') {
        $titulo = limpiar_entrada($_POST['titulo']);
        $contenido = limpiar_entrada($_POST['contenido']);

        // Validar que se haya subido una imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            // Obtener la información de la imagen
            $imagenp = $_FILES['imagen'];
            $nombre_imagenp = $imagenp['name'];
            $tipo_imagenp = $imagenp['type'];
            $tamaño_imagenp = $imagenp['size'];
            $temp_imagenp = $imagenp['tmp_name'];

            // Validar que sea una imagen
            $es_imagenp = getimagesize($temp_imagenp);
            if (!$es_imagenp || !in_array($tipo_imagenp, ['image/jpeg', 'image/png', 'image/gif'])) {
                echo "El archivo seleccionado no es una imagen válida.";
            } else {
                // Crear una imagen a partir del contenido de la imagen subida
                $imagen = imagecreatefromstring(file_get_contents($temp_imagenp));
                if (!$imagen) {
                    echo "Ha ocurrido un error al procesar la imagen. Por favor inténtelo de nuevo.";
                    exit();
                }

                // Limitar el tamaño máximo de la imagen
                $tamaño_maximo = 5 * 1024 * 1024; // 5MB
                if ($tamaño_imagenp > $tamaño_maximo) {
                    echo "La imagen seleccionada es demasiado grande. Por favor seleccione una imagen más pequeña.";
                } else {
                    // Crear un nombre único para la imagen
                    $nombre_imagenp = uniqid() . '.' . pathinfo($nombre_imagenp, PATHINFO_EXTENSION);

                    // Mover la imagen a la carpeta de imágenes del servidor
                    $ruta_imagenp = 'upload/' . $nombre_imagenp;
                    if (move_uploaded_file($temp_imagenp, $ruta_imagenp)) {
                        echo "La imagen se ha subido correctamente. Ruta: " . $ruta_imagenp;
                    } else {
                        echo "Ha ocurrido un error al subir la imagen. Por favor inténtelo de nuevo.";
                        exit();
                    }
                }
            }
        } else {
            $ruta_imagenp = "";
        }

        // Mostrar la imagen en la página
        if (!empty($ruta_imagenp)) {
            // Crear una imagen a partir del archivo de imagen
            $imagen = imagecreatefromstring(file_get_contents($ruta_imagenp));
            if (!$imagen) {
                echo "Ha ocurrido un error al procesar la imagen. Por favor inténtelo de nuevo.";
                exit();
            }

            // Mostrar la imagen en la página
            echo '<img src="' . $ruta_imagenp . '" alt="Imagen subida">';
        }

        if (!validar_textarea($contenido)) {
            $error = "<p>El contenido del textarea solo puede contener letras, números y espacios.</p>";
        }else{
            // Preparar la consulta SQL
            $query = "INSERT INTO publicaciones (titulo, contenido, imagen, autor_id) VALUES ( ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            /*if (!$stmt) {
                die("Error en la preparación de la consulta: " . mysqli_error($conn));
            }*/

            // Vincular los parámetros y ejecutar la consulta
            $idPersona = $_SESSION['id'];
            mysqli_stmt_bind_param($stmt, "sssi", $titulo, $contenido, $ruta_imagenp, $idPersona);
            $resultado = mysqli_stmt_execute($stmt);

            if ($resultado) {
                $resultado_publicacion_eject = "Se ha creado la publicación con éxito :D";
                header('Location: enviado.php');
                exit();
            } else {
                echo "Ha ocurrido un error al crear la publicación. Por favor inténtelo de nuevo.";
                exit();
            }
        }
        

    } else {
        echo "Solo los profesores pueden publicar en esta sección.";
    }
}

// Procesar el formulario de comentario
if (isset($_POST['publicar_comentario'])) {
    $usuario = limpiar_entrada($_POST['usuario']);
    $publicacion_id = limpiar_entrada($_POST['publicacion_id']);
    $comentario = limpiar_entrada($_POST['comentario']);
    
    // Validar campos obligatorios
    if (empty($usuario) || empty($publicacion_id) || empty($comentario)) {
        $error_comentario = "Por favor complete todos los campos.";
    } else {
        if (validar_textarea($contenido)) {
            $error = "El contenido del textarea solo puede contener letras, números y espacios.";
        }else{
            // Preparar la consulta para insertar el comentario en la base de datos
            $sql = "INSERT INTO comentarios (contenido, autor_id, publicacion_id, fecha) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sii", $comentario, $idPersona, $publicacion_id);

            if (mysqli_stmt_execute($stmt)) {
                // Redirigir al usuario a una página diferente
                header('Location: enviado.php');
                exit();
            } else {
                $error_comentario = "Error al agregar el comentario: " /*. mysqli_error($conn)*/;
            }
            mysqli_stmt_close($stmt);
        }
        
    }
}

// Procesar el formulario de respuesta
if (isset($_POST['publicar_respuesta'])) {
    $usuario = limpiar_entrada($_POST['usuario']);
    $comentario_id = limpiar_entrada($_POST['comentario_id']);
    $respuesta = limpiar_entrada($_POST['respuesta']);

    // Validar campos obligatorios
    if (empty($usuario) || empty($respuesta) || empty($comentario_id)) {
        $error_respuesta = "Por favor complete todos los campos.";
    } else {
        if (!validar_textarea($respuesta)) {
            $error = "El contenido del textarea solo puede contener letras, números y espacios.";
        }else{
                // Preparar la consulta para insertar el comentario en la base de datos
            $sql = "INSERT INTO respuestas (respuesta, fecha, autor_id, comentario_id) VALUES (?, CURRENT_TIMESTAMP, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sii", $respuesta, $idPersona, $comentario_id);

            if (mysqli_stmt_execute($stmt)) {
                // Redirigir al usuario a una página diferente
                header('Location: enviado.php');
                exit();
            } else {
                $error_respuesta = "Error al agregar el comentario: " /*. mysqli_error($conn)*/;
            }
            mysqli_stmt_close($stmt);
        }
    }
}

// Obtener todas las publicaciones de la base de datos
$sql = "SELECT p.*, u.nombre as nombre_autor
FROM publicaciones p
JOIN usuarios u ON p.autor_id = u.id ORDER BY fecha ASC";
$resultado = mysqli_query($conn, $sql);
/*if (!$resultado) {
    die("Error en la consulta SQL: " . mysqli_error($conn));
} */

// Obtener todos los comentarios de la base de datos
$sql_comentarios = "SELECT comentarios.id, comentarios.contenido, usuarios.nombre AS autor, publicaciones.titulo, comentarios.publicacion_id, comentarios.fecha
FROM comentarios
JOIN usuarios ON comentarios.autor_id = usuarios.id
JOIN publicaciones ON comentarios.publicacion_id = publicaciones.id
ORDER BY comentarios.fecha ASC";
$resultado_comentarios = mysqli_query($conn, $sql_comentarios);

$sql_respuestas = "SELECT respuestas.id, respuestas.respuesta, usuarios.nombre AS autor, comentarios.contenido, respuestas.comentario_id, respuestas.fecha
FROM respuestas
JOIN usuarios ON respuestas.autor_id = usuarios.id
JOIN comentarios ON respuestas.comentario_id = comentarios.id
ORDER BY respuestas.fecha ASC";
$resultado_respuestas = mysqli_query($conn, $sql_respuestas);
/*if (!$resultado_respuestas) {
    die("Error en la consulta SQL: " . mysqli_error($conn));
} */
?>


    <?php include('head-nav.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/comunidad.css">
<div class="comunidad">
    <h1>Comunidad CECYTEM</h1>

    <?php if(isset($_SESSION['id']) && $_SESSION['rol'] == 'Profesor'): ?>
        <h2>Crear Publicación</h2>
        <?php if ($resultado_publicacion_eject = 'Se ha creado la publicacion con exito:D'): ?>
            <p style="color: green;"><?php echo $resultado_publicacion_eject; ?></p>
        <?php $resultado_publicacion_eject = ""; endif; ?>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if (isset($exito)): ?>
            <p style="color: green;"><?php echo $exito; ?></p>
        <?php endif; ?>
        <div class="formpublicaciones">
            <form method="POST" enctype="multipart/form-data">
                <div>
                    <label>Título:</label>
                    <input type="text" name="titulo" required>
                </div>
                <div>
                    <label for="contenido">Contenido:</label>
                    <textarea name="contenido" pattern="^[0-9A-Za-z.,!?'\s]+$" required></textarea>
                </div>
                <div>
                    <label>Imagen:</label>
                    <input type="file" name="imagen">
                </div>
                <button type="submit" name="publicar" id="Publicar">Publicar</button>
            </form>
        <?php else: ?>
            <p>No tiene permisos para crear publicaciones o posiblemente no ha iniciado sesión!</p>
        <?php endif; ?>
            <?php if(isset($error)):
                echo "<script>alert('$error')</script>";
            endif; ?>
        </div>
    
    <h2>Publicaciones</h2>
    <?php while ($publicacion = mysqli_fetch_assoc($resultado)): ?>
        <div class="publicacion">
            <div class="publicacioncontenido">
                <br>
                <h3><?php echo $publicacion['titulo']; ?></h3>
                <p><?php echo $publicacion['contenido']; ?></p>
                <?php if (!empty($publicacion['imagen'])): ?>
                    <img class="imagenp" src="<?php echo $publicacion['imagen']; ?>" width="200">
                <?php endif; ?>
                <p>Por <?php echo $publicacion['nombre_autor'];?> el <?php echo $publicacion['fecha']; ?></p>
            </div>
            
            <h2>Comentarios</h2>
            <?php
                $publicacion_id = $publicacion['id'];
                $sql_comentarios = "SELECT comentarios.id, comentarios.contenido, usuarios.nombre AS autor, publicaciones.titulo, comentarios.publicacion_id, comentarios.fecha
                    FROM comentarios
                    JOIN usuarios ON comentarios.autor_id = usuarios.id
                    JOIN publicaciones ON comentarios.publicacion_id = publicaciones.id
                    WHERE comentarios.id IN (SELECT id FROM comentarios WHERE publicacion_id = $publicacion_id)
                    ORDER BY comentarios.fecha ASC";
                $resultado_comentarios = mysqli_query($conn, $sql_comentarios);
            ?>
            <div class="comentarios">
                <?php while ($comentarios = mysqli_fetch_assoc($resultado_comentarios)): ?>
                    <?php if ($comentarios['publicacion_id'] == $publicacion['id']): ?>
                        <div class="comentario">
                            <p><strong>Comentario: <?php echo $comentarios['contenido']; ?></strong></p>
                            <p>Por <?php echo $comentarios['autor']; ?> el <?php echo $comentarios['fecha']; ?></p>
                        </div>

                        <?php
                            $comentario_id = $comentarios['id'];
                            $sql_respuestas = "SELECT * FROM respuestas WHERE comentario_id = $comentario_id";
                            $resultados_respuestas = mysqli_query($conn, $sql_respuestas);
                        ?>
                        <div class="respuestas">
                                <?php $comentario_id = $comentarios['id'];
                                mysqli_data_seek($resultado_respuestas, 0); // Mueve el puntero al inicio del resultado de la consulta

                                while ($respuestas = mysqli_fetch_assoc($resultado_respuestas)):
                                    if ($respuestas['comentario_id'] == $comentario_id): ?>
                                        <?php 
                                        $respuesta_comentario_id = $respuestas['comentario_id'];
                                        $sql_comentario = "SELECT * FROM comentarios WHERE id = $respuesta_comentario_id";
                                        $resultado_comentario = mysqli_query($conn, $sql_comentario);
                                        $comentario = mysqli_fetch_assoc($resultado_comentario);
                                        ?>
                                        <div class="respuesta">
                                            <h4><strong>En respuesta a "<?php echo $comentario['contenido']; ?>"</strong> </h4>
                                            <p><?php echo $respuestas['respuesta']; ?></p>
                                            <p>Comentario por <?php echo $respuestas['autor']; ?> el <?php echo $respuestas['fecha']; ?></p>
                                        </div>
                                    <?php endif;
                                endwhile; ?>
                            </div>

                            <?php  if(isset($_SESSION['id'])): ?>
                                <div class="agregarrespuesta">
                                        <h3>Agregar respuesta:</h3>
                                        <?php if (isset($error_respuesta)): ?>
                                            <p style="color: red;"><?php echo $error_respuesta; ?></p>
                                        <?php endif; ?>
                                        <?php if (isset($exito_respuesta)): ?>
                                            <p style="color: green;"><?php echo $exito_respuesta; ?></p>
                                        <?php endif; ?>
                                        <div class="formrespuestas">
                                            <form method="POST">
                                                <div>
                                                    <label>Usuario:</label>
                                                    <input type="hidden" name="usuario" value="<?php echo $nombreUsuario; ?>" readonly>
                                                </div>
                                                <div>
                                                    <label for="respuesta">Respuesta:</label>
                                                    <textarea name="respuesta" pattern="^[0-9A-Za-z.,!?'\s]+$" required></textarea>
                                                </div>
                                                <input type="hidden" name="comentario_id" value="<?php echo $comentarios['id']; ?>">
                                                <button type="submit" name="publicar_respuesta" id="Responder">Responder</button>
                                            </form>
                                        </div>
                                        <?php else:?>
                                            <h3>Inicie sesion para ingresar una respuesta!</h3>
                                    <?php endif; ?>
                                </div>
                                
                    <?php endif; ?>
                <?php endwhile; ?>

                <?php  if(isset($_SESSION['id'])): ?>
                    <div class="agregarcomentarios">
                        <h4>Agregar Comentario</h4>
                        <div class="formcomentarios">
                            <?php if (isset($error_comentario)): ?>
                                <p style="color: red;"><?php echo $error_comentario; ?></p>
                            <?php endif; ?>
                            <?php if (isset($exito_comentario)): ?>
                                <p style="color: green;"><?php echo $exito_comentario; ?></p>
                            <?php endif; ?>
                            <form method="POST">
                                <div>
                                    <label>Usuario:</label>
                                    <input type="hidden" name="usuario" value="<?php echo $nombreUsuario; ?>" readonly>
                                </div>
                                <div>
                                    <label for="comentario">Respuesta:</label>
                                    <textarea name="comentario" pattern="^[0-9A-Za-z.,!?'\s]+$" required></textarea>
                                </div>
                                <input type="hidden" name="publicacion_id" value="<?php echo $publicacion['id']; ?>">
                                <button type="submit" name="publicar_comentario">Comentar</button>
                            </form>
                        </div>
                        <?php else:?>
                            <h4 style="margin-bottom: 10px;">Inicie sesión para poder comentar!</h4>
                        <?php endif; ?>
                    </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php include('footer.php');?>