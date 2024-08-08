<?php

// Usar los namespaces de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluye los archivos de PHPMailer
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "www.presupuestos360.com");

if (isset($_POST['btnenviar'])) {
    $pass = bin2hex(random_bytes(5)); // Genera la contraseña temporal
    $correo = trim($_POST['email']);
    $cedula = trim($_POST['cedula']);

    // Obtener el usuario asociado con la cédula y el correo electrónico
    $sql_usuario = "SELECT Usuario, Nombre, Apellidos FROM Usuarios WHERE Correo='$correo' AND Cedula='$cedula'";
    $result_usuario = mysqli_query($conexion, $sql_usuario);

    if (mysqli_num_rows($result_usuario) > 0) {
        // El usuario existe, actualizar la contraseña
        $row = mysqli_fetch_assoc($result_usuario);
        $usuario = $row['Usuario'];
        $nombre = $row['Nombre'];
        $apellido = $row['Apellidos'];
        $nombreCompleto = $nombre . ' ' . $apellido;

        // Cifrar la contraseña antes de guardarla en la base de datos
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "UPDATE Usuarios SET Contraseña='$hashed_pass' WHERE Correo='$correo' AND Cedula='$cedula'";
        $result = mysqli_query($conexion, $sql);

        // Crear una instancia de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host       = 'smtp.office365.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'andresf1323@hotmail.com';
            $mail->Password   = 'crd8tv1094926338';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

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
            $mail->setFrom('andresf1323@hotmail.com', 'PRESUPUESTOS360');
            $mail->addAddress($correo, $nombreCompleto);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = "Recuperación de Usuario y/o Contraseña PRESUPUESTOS360";
            $mail->Body    = "Hola $nombreCompleto,<br><br>Tu usuario es:<br><br><div style='text-align: center;'><b><i><span style='font-size: 3em;'>$usuario</span></i></b></div><br>Se le ha asignado la siguiente Contraseña Temporal:<br><br><div style='text-align: center;'><b><i><span style='font-size: 3em;'>$pass</span></i></b></div><br><br>Por favor, cambie su contraseña después de iniciar sesión.<br><br>Saludos,<br>El equipo de PRESUPUESTOS360";

            // Enviar correo
            $mail->send();
            header("Location: iniciosesion.php?status=send");
            exit;
        } catch (Exception $e) {
            echo "Error al enviar el mensaje. Detalles del error: " . $mail->ErrorInfo;
            header("Location: recordar.php?status=error");
            exit;
        }
    } else {
        // Si no se encontró el usuario
        header("Location: recordar.php?status=no_exist");
        exit;
    }
}
?>
