<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte</title>
    <link rel="stylesheet" href="CSS/stylesoporte.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
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
        
<div class="container-form">
    <div class="info-form">
        <h2>SOPORTE</h2>
<p class="texto">Si durante la ejecución de la aplicación PRESUPUESTOS360 encontraste algún tipo de fallo o tienes sugerencia para el mejoramiento del software favor haznoslo saber a través de nuestros datos de contacto a continuación, o mediante el cajon de PQRS a la derecha.</p>
<p><i class="fa fa-phone">
</i> 314-893-6357</p>
<p><i class="fa fa-envelope">
</i>andresf1323@gmail.com</p>  
<p><i class="fa fa-map-marked">
    </i>Armenia, Colombia</p>  
</div>
<?php
           if (isset($_GET['status'])) {
            if ($_GET['status'] == 'send') {
                echo '<div class="mensaje">El mensaje ha sido enviado exitosamente.</div>';
            } elseif ($_GET['status'] == 'error') {
                echo '<div class="mensaje">Ha ocurrido un error. El correo no pudo ser enviado.</div>';
            }
        }
            ?>
<form action="enviarsoporte.php" method="post" autocomplete="off" id="contact-form">

    <input type="text" name="nombre" placeholder="Ingrese su nombre o nombre de Usuario" class="campo" id="nombre">
    <div class="email-container">
        <input type="email" name="email" placeholder="Ingrese su correo electrónico" class="campo" id="email">
        <span id="email-error" class="error-message"></span>
    </div>
    <input type="text" name="asunto" placeholder="Ingrese el asunto" class="campo" id="asunto">
    <textarea name="mensaje" placeholder="Ingrese su mensaje" id="mensaje"></textarea>
    <input type="submit" name="submit-btn" value="Enviar mensaje" class="btn-enviar" id="submit-btn" disabled>
</form>
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
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contact-form');
        const nombre = document.getElementById('nombre');
        const email = document.getElementById('email');
        const asunto = document.getElementById('asunto');
        const mensaje = document.getElementById('mensaje');
        const submitBtn = document.getElementById('submit-btn');
        const emailError = document.getElementById('email-error');

        function validateForm() {
            const nombreValue = nombre.value.trim();
            const emailValue = email.value.trim();
            const asuntoValue = asunto.value.trim();
            const mensajeValue = mensaje.value.trim();
            const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;

            if (emailValue === "") {
                // Si el campo de correo está vacío, no mostrar el mensaje de error
                emailError.style.display = 'none';
            } else if (emailPattern.test(emailValue)) {
                // Si el correo es válido, ocultar el mensaje de error
                emailError.style.display = 'none';
            } else {
                // Si el correo no es válido, mostrar el mensaje de error
                emailError.textContent = 'Correo electrónico no válido';
                emailError.style.display = 'block';
            }

            // Validar si todos los campos están llenos y el correo es válido
            if (nombreValue !== "" && emailPattern.test(emailValue) && asuntoValue !== "" && mensajeValue !== "") {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        }

        form.addEventListener('input', validateForm);
    });
</script>

</body>
</html>