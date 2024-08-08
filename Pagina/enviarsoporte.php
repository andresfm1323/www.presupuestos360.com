<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluye los archivos de PHPMailer
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Verifica si se ha enviado el formulario
if (isset($_POST['submit-btn'])) {
    // Datos Ingresados
    $nombre = $_POST['nombre'];
    $asunto = $_POST['asunto'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->SMTPDebug = 2;   
        $mail->isSMTP();                                            // Usar SMTP
        $mail->Host       = 'smtp.office365.com';                      // Servidor SMTP de Gmail
        $mail->SMTPAuth   = true;                                   // Habilitar autenticación SMTP
        $mail->Username   = 'andresf1323@hotmail.com';                // Tu correo de Gmail
        $mail->Password   = 'crd8tv1094926338';                        // Tu contraseña de Gmail (o una contraseña de aplicación si usas autenticación de dos factores)
        $mail->SMTPSecure = 'tls';           // Habilitar cifrado TLS
        $mail->Port       = 587;                                    // Puerto TCP para TLS

 // Desactivar temporalmente la verificación de certificados (solo para pruebas)
 $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

        // Establecer la codificación de caracteres
        $mail->CharSet = 'UTF-8';

        // Remitente y destinatario
        $mail->setFrom('andresf1323@hotmail.com', 'PRESUPUESTOS360'); // Cambia a tu cuenta
        $mail->addAddress('andresf1323@hotmail.com', 'Andrés Felipe Marín Martínez'); // Agrega un destinatario
        $mail->addCC($email, $nombre);

        // Contenido del correo
        $mail->isHTML(true);                                        // Enviar en formato HTML
        $mail->Subject = $asunto;
        $mail->Body    = "Correo enviado desde Soporte www.presupuestos360.com por el usuario: $nombre<br>Email: $email<br><br>Mensaje:<br>$mensaje";
        $mail->AltBody = "Correo enviado desde Soporte www.presupuestos360.com Nombre: $nombre\nEmail: $email\n\nMensaje:\n$mensaje";

        // Enviar correo
        ob_start(); // Inicia el buffer de salida
        $mail->send();
        $output = ob_get_clean(); // Obtiene el contenido del buffer y limpia el buffer
        // Redirige al usuario
        header("Location: soporte.php?status=send");
        exit;
    } catch (Exception $e) {
        ob_start(); // Inicia el buffer de salida
        echo "Error al enviar el mensaje. Detalles del error: " . $mail->ErrorInfo;
        $output = ob_get_clean(); // Obtiene el contenido del buffer y limpia el buffer
        // Redirige al usuario
        header("Location: soporte.php?status=error");
        exit;
        }
       
       
    }
?>
