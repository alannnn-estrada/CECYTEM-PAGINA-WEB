<?php
    echo("<script>alert('comentario enviado, en breve seras redirigido');</script>");
    sleep(2);
    header("Location: comunidad.php");
?>