<?php

$conexion = mysqli_connect("localhost", "root", "", "www.presupuestos360.com");

if (isset($_POST['btnregister'])) {
    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $cedula = trim($_POST['cedula']);
    $correo = trim($_POST['correo']);
    $cargo = trim($_POST['cargo']);
    $user = trim($_POST['user']);
    $password = trim($_POST['password']);
    $fecha = date("d/m/y");

    // Verificar si el usuario ya existe
    $query_user = "SELECT * FROM usuarios WHERE Usuario = '$user'";
    $result_user = mysqli_query($conexion, $query_user);

    // Verificar si el correo electrónico ya existe
    $query_email = "SELECT * FROM usuarios WHERE Correo = '$correo'";
    $result_email = mysqli_query($conexion, $query_email);

    // Verificar si la cédula ya existe
    $query_cedula = "SELECT * FROM usuarios WHERE Cedula = '$cedula'";
    $result_cedula = mysqli_query($conexion, $query_cedula);

    // Comprobar si se encontraron resultados para usuario, correo o cédula
    if (mysqli_num_rows($result_user) > 0) {
        header("Location: registro.php?status=user_exist");
        exit;
    } elseif (mysqli_num_rows($result_email) > 0) {
        header("Location: registro.php?status=email_exist");
        exit;
    } elseif (mysqli_num_rows($result_cedula) > 0) {
        header("Location: registro.php?status=cedula_exist");
        exit;
    } else {
        // Hash de la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertar nuevo usuario en la base de datos
        $consulta = "INSERT INTO usuarios(Nombre, Apellidos, Cedula, Correo, Cargo, Usuario, Contraseña, Fecha)
          VALUES('$nombres', '$apellidos', '$cedula', '$correo', '$cargo', '$user', '$hashed_password', '$fecha')";
        
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            header("Location: iniciosesion.php?status=success");
            exit;
        } else {
            header("Location: registro.php?status=error");
            exit;
        }
    }
}

?>
