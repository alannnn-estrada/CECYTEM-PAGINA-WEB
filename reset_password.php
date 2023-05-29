<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true); // Crea una nueva instancia con excepciones habilitadas
try {
    $mail->isSMTP(); // Establece el uso de SMTP
    $mail->Host       = 'smtp.mail.yahoo.com'; // Servidor SMTP de tu proveedor de correo
    $mail->SMTPAuth   = true;
    $mail->Username   = ''; // Tu correo electrónico
    $mail->Password   = ''; // Tu contraseña
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Opcional: establece el tipo de cifrado
    $mail->Port       = 587;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];

      include('dbcon.php');
      
      $sql = "SELECT * FROM `usuarios` WHERE correo='$email'";
      $result = mysqli_query($conn, $sql);

      if ($result && mysqli_num_rows($result) > 0) {
        // Generar un token único y almacenarlo en la base de datos
        $token = uniqid();
        $sql = "UPDATE `usuarios` SET token='$token' WHERE correo='$email'";
        mysqli_query($conn, $sql);

        // Enviar un correo electrónico al usuario con un enlace para restablecer la contraseña
        $to = $email;
        $subject = 'Restablecimiento de password';
        $message = "Haga clic en el siguiente enlace para restablecer su password: http://localhost:8080/PROYECTOPAGINAWEBCECY/recuperar_password?email=$email&token=$token 
         Le agradecemos por confiar en nuestro servicio:D";
        $mail->setFrom('enterpriseproyects@yahoo.com', 'PROYECTOS ESPECIALES'); // Configura el remitente
        $mail->addAddress($to); // Agrega el destinatario
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send(); // Envía el correo electrónico
        $response = array('success' => true);
        /*echo json_encode($response);*/
        echo ('<script>alert ("Se ha enviado un correo electrónico con instrucciones para restablecer su contraseña. En breve seras redirigido"); setTimeout(function() {
          window.location.href = "registro.php";
        }, 2000);</script>');
        exit();
      } else {
        $response = array('success' => false, 'message' => 'El correo electrónico no existe en nuestra base de datos.');
        echo ('<script>alert("OCURRIO UN ERROR EN LA BASE DE DATOS, POSIBLEMENTE EL USUARIO NO SE ENCUENTRE DISPONIBLE, VERIFIQUE EL CORREO"); setTimeout(function() {
          window.location.href = "registro.php";
        }, 2000);</script>');
        /*echo json_encode($response);*/
        exit();
      }
    }
} catch (Exception $e) {
    $response = array('success' => false, 'message' => 'No se pudo enviar el correo electrónico: ' . $mail->ErrorInfo);
    /*echo json_encode($response);*/
    exit();
}
?>

