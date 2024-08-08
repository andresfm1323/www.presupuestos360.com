<?php
session_start();

$user = $_POST['user'];
$password = $_POST['password'];

$_SESSION['user'] = $user;

$conexion = mysqli_connect("localhost", "root", "", "www.presupuestos360.com");

$consulta = "SELECT * FROM usuarios WHERE Usuario = '$user'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $hashed_password = $fila['Contraseña'];

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user'] = $user;
        header("Location: home.php");
    } else {
        header("Location: iniciosesion.php?status=error");
    }
} else {
    header("Location: iniciosesion.php?status=error");
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
