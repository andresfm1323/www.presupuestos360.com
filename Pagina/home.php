<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Acerca de</title>

    <link rel="stylesheet" href="CSS/styleacerca.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
      <a href="home.php" class="logo"> <img src="img/Logo.png" />PRESUPUESTOS360</a>

      <ul class="lista-naveg">
        <li><a href="home.php" class="activo">Inicio</a></li>
        <li><a href="acerca.php">Acerca de</a></li>
        <li><a href="soporte.php">Soporte</a></li>
      </ul>

      <div class="sesion">
      <a href="cerrarsesion.php" class="sesion-boton">Cerrar sesión, <?php echo $user; ?></a>
        <i class="ri-moon-fill" id="darkmode"></i>
      </div>
    </header>
    <main>
      <div class="main-row">
        <div class="main-text">
          <div class="container">
            <h2>Página en Construcción</h2>
            <p>Estamos trabajando para traerte esta sección pronto. ¡Gracias por tu paciencia!</p>
            <div class="imgconstruction">
              <img src="img/Pagina en construccion.jpeg"/>
            </div>
          </div>
        </div>
        <div class="main-img">
          <img src="img/Logo.png"/>
        </div>        
      </div>
    </main>
    <footer class="footer">
        <div class="footer-row">
          <div class="footer-text">
          </div>
          <div class="footer-text1">
            <p>&copy; 2024 PRESUPUESTOS360</p>
          </div>
          <div class="footer-text">
            <ul>
              <li class="creado">CREADO POR</li>
        <li class="creadonombre">Andrés Felipe Marín Martínez</li>
        <li class="creado">CREADO PARA</li>
        <li class="creadonombre">Goverment S.A.</li>
          </div>
      </div>
    </footer>
    <script src="js/app.js"></script>
  </body>
</html>
