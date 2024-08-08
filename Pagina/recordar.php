<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordar</title>
    <link rel="stylesheet" href="CSS/stylerecordar.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
</head>
<body>
    <header>
        <a href="index.html" class="logo">
          <img src="img/Logo.png">PRESUPUESTOS360</a
        >
  
        <ul class="lista-naveg">
          <li><a href="index.html" class="activo">Inicio</a></li>
          <li><a href="acerca.php">Acerca de</a></li>
          <li><a href="soporte.php">Soporte</a></li>
        </ul>
  
        <div class="sesion">
          <a href="iniciosesion.php" class="sesion-boton">Iniciar Sesión</a>
          <i class="ri-moon-fill" id="darkmode"></i>
        </div>
      </header>
  <main>
    <div class="main-row">
     <div class="recordar">
        <h1>¿Olvidó Usuario Y/O contraseña?</h1>
        <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'no_exist') {
                    echo '<div class="mensaje-error">No se encontró la combinación de cédula y correo electrónico</div>';
                } elseif ($_GET['status'] == 'error') {
                    echo '<div class="mensaje-error">Lo sentimos, hubo un error al intentar enviar el correo</div>';
                }
            }
        ?>
        <form action="recordarsql.php" method="post">
            <div class="usuario">
                <input type="text" name="email" placeholder="" required>
                <label>Correo Electronico</label>
            </div> 
            <div class="usuario">
                <input type="number" name="cedula" placeholder="" required>
                <label>Cedula</label>
            </div> 
            <input name="btnenviar" type="submit" value=" Recordar Usuario/Contraseña ">
            </form>   
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