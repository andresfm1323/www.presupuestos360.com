<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="CSS/stylesesion.css" />
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
     <div class="iniciosesion">
        <h1>Inicio de Sesión</h1>
        <form action="validaruser.php" method="post">
            <div class="usuario">
                <input type="text" name="user" placeholder="" required>
                <label>Nombre de usuario</label>
            </div> 
            <div class="usuario">
                <input type="password" name="password" placeholder="" required>
                <label>Contraseña</label>
                <i class="ri-eye-off-fill" id="verPassword"></i>
            </div> 
            <?php
           if (isset($_GET['status'])) {
            if ($_GET['status'] == 'success') {
                echo '<div class="mensaje-error">Tu Registro se ha completado</div>';
            } elseif ($_GET['status'] == 'error') {
                echo '<div class="mensaje-error">Usuario y/o Contraseña No Válida</div>';
            } elseif ($_GET['status'] == 'send') {
                  echo '<div class="mensaje-exito">Se ha enviado la información a <br>su Correo Electronico</div>';
        }
      }
            ?>
            <div class="olvido">
            <a href="recordar.php">¿Olvidó su usuario y/o contraseña?</a>
            </div> 
            <input name="btniniciar" type="submit" value="Iniciar">
            <div class="registro">
              <a href="registro.php">Registrarse</a>
            </div> 
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