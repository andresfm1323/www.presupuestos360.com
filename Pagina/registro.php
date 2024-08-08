<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="CSS/styleregister.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <script>
        function validarFormulario() {
            const formulario = document.getElementById('registroForm');
            const email = formulario.correo.value;
            const password = formulario.password.value;
            const confirmPassword = formulario.confirmPassword.value;

            // Validación de correo electrónico
            const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').innerText = 'Correo electrónico No Válido';
                document.getElementById('emailError').style.color = 'red';
                document.getElementById('emailError').style.fontSize = '0.7rem';
                return false;
            } else {
                document.getElementById('emailError').innerText = '';
            }

            // Validación de contraseña (al menos 8 caracteres)
            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordPattern.test(password)) {
                document.getElementById('passwordError').innerText = 'La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un carácter especial';
                document.getElementById('passwordError').style.color = 'red';
                document.getElementById('passwordError').style.fontSize = '0.7rem';
                return false;
            } else {
                document.getElementById('passwordError').innerText = '';
            }

            // Validación de coincidencia de contraseñas
            if (password !== confirmPassword) {
                document.getElementById('confirmPasswordError').innerText = 'Las contraseñas no coinciden';
                document.getElementById('confirmPasswordError').style.color = 'red';
                document.getElementById('confirmPasswordError').style.fontSize = '0.7rem';
                return false;
            } else {
                document.getElementById('confirmPasswordError').innerText = '';
            }

            // Si pasa todas las validaciones, se envía el formulario
            return true;
        }

        function togglePasswordVisibility(id, show, iconId) {
    const passwordField = document.getElementById(id);
    const icon = document.getElementById(iconId);
    if (show) {
        passwordField.type = 'text';
        icon.classList.remove('ri-eye-off-fill');
        icon.classList.add('ri-eye-fill');
    } else {
        passwordField.type = 'password';
        icon.classList.remove('ri-eye-fill');
        icon.classList.add('ri-eye-off-fill');
    }
}

window.onload = function() {
    // Contraseña principal
    const passwordIcon = document.getElementById('verPassword');
    const passwordField = document.getElementById('password');

    passwordIcon.addEventListener('mouseover', function() {
        togglePasswordVisibility('password', true, 'verPassword');
    });
    passwordIcon.addEventListener('mouseout', function() {
        togglePasswordVisibility('password', false, 'verPassword');
    });

    // Confirmar contraseña
    const confirmPasswordIcon = document.getElementById('verConfirmPassword');
    const confirmPasswordField = document.getElementById('confirmPassword');

    confirmPasswordIcon.addEventListener('mouseover', function() {
        togglePasswordVisibility('confirmPassword', true, 'verConfirmPassword');
    });
    confirmPasswordIcon.addEventListener('mouseout', function() {
        togglePasswordVisibility('confirmPassword', false, 'verConfirmPassword');
    });
};

    </script>
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
            <div class="registro">
                <h1>Registro</h1>
                <?php
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'cedula_exist') {
                        echo '<div class="mensaje-error">Cedula Existente</div>';
                    } elseif ($_GET['status'] == 'email_exist') {
                        echo '<div class="mensaje-error">Correo Electronico Existente</div>';
                    } elseif ($_GET['status'] == 'user_exist') {
                        echo '<div class="mensaje-error">Usuario Existente</div>';
                    }
                }
                ?>
                <form id="registroForm" action="registeruser.php" method="post" onsubmit="return validarFormulario()">
                    <div class="usuario">
                        <input type="text" name="nombres" placeholder="" required>
                        <label>Nombre(s)</label>
                    </div>
                    <div class="usuario">
                        <input type="text" name="apellidos" placeholder="" required>
                        <label>Apellido(s)</label>
                    </div>
                    <div class="usuario">
                        <input type="number" name="cedula" placeholder="" min="1000000" required>
                        <label>Cedula</label>
                    </div>
                    <div class="usuario">
                        <input type="text" name="correo" placeholder="" required>
                        <label>Correo Electronico</label>
                        <div class="mensaje-error" id="emailError"></div>
                    </div>
                    <div class="usuario">
                        <select name="cargo" required>
                            <option value="" disabled selected>Seleccione</option>
                            <option value="Secretario">Secretario</option>
                            <option value="Gerente">Gerente</option>
                            <option value="Subsecretario">Subsecretario</option>
                            <option value="Subgerente">Subgerente</option>
                            <option value="Jefe de Oficina">Jefe de Oficina</option>
                            <optgroup label="Arquitecto">
                                <option value="Arquitecto - Contratista">Arquitecto - Contratista</option>
                                <option value="Arquitecto - Nombrado">Arquitecto - Nombrado</option>
                                <option value="Arquitecto - en Provisionalidad">Arquitecto - En Provisionalidad</option>
                                <option value="Arquitecto - Especializado Contratista">Arquitecto - Especializado Contratista</option>
                                <option value="Arquitecto - Especializado Nombrado">Arquitecto - Especializado Nombrado</option>
                                <option value="Arquitecto - Especializado en Provisionalidad">Arquitecto - Especializado en Provisionalidad</option>
                            </optgroup>
                            <optgroup label="Ingeniero Civil">
                                <option value="Ingeniero Civil - Contratista">Ingeniero Civil - Contratista</option>
                                <option value="Ingeniero Civil - Nombrado">Ingeniero Civil - Nombrado</option>
                                <option value="Ingeniero Civil - en Provisionalidad">Ingeniero Civil - En Provisionalidad</option>
                                <option value="Ingeniero Civil - Especializado Contratista">Ingeniero Civil - Especializado Contratista</option>
                                <option value="Ingeniero Civil - Especializado Nombrado">Ingeniero Civil - Especializado Nombrado</option>
                                <option value="Ingeniero Civil - Especializado en Provisionalidad">Ingeniero Civil - Especializado en Provisionalidad</option>
                            </optgroup>
                            <optgroup label="Profesional - otro">
                                <option value="Profesional - otro - Contratista">Profesional - otro - Contratista</option>
                                <option value="Profesional - otro - Nombrado">Profesional - otro - Nombrado</option>
                                <option value="Profesional - otro - en Provisionalidad">Profesional - otro - En Provisionalidad</option>
                                <option value="Profesional - otro - Especializado Contratista">Profesional - otro - Especializado Contratista</option>
                                <option value="Profesional - otro - Especializado Nombrado">Profesional - otro - Especializado Nombrado</option>
                                <option value="Profesional - otro - Especializado en Provisionalidad">Profesional - otro - Especializado en Provisionalidad</option>
                            </optgroup>
                            <optgroup label="Tecnologo en obras civiles">
                                <option value="Tecnologo en obras civiles - Contratista">Tecnologo en obras civiles - Contratista</option>
                                <option value="Tecnologo en obras civiles - Nombrado">Tecnologo en obras civiles - Nombrado</option>
                                <option value="Tecnologo en obras civiles - en Provisionalidad">Tecnologo en obras civiles - En Provisionalidad</option>
                            </optgroup>
                            <optgroup label="Topografo">
                                <option value="Topografo - Contratista">Topografo - Contratista</option>
                                <option value="Topografo - Nombrado">Topografo - Nombrado</option>
                                <option value="Topografo - en Provisionalidad">Topografo - En Provisionalidad</option>
                            </optgroup>
                            <optgroup label="Tecnologo - otro">
                                <option value="Tecnologo - otro - Contratista">Tecnologo - otro - Contratista</option>
                                <option value="Tecnologo - otro - Nombrado">Tecnologo - otro - Nombrado</option>
                                <option value="Tecnologo - otro - en Provisionalidad">Tecnologo - otro - En Provisionalidad</option>
                            </optgroup>
                            <optgroup label="Tecnico - otro">
                                <option value="Tecnico - otro - Contratista">Tecnico - otro - Contratista</option>
                                <option value="Tecnico - otro - Nombrado">Tecnico - otro - Nombrado</option>
                                <option value="Tecnico - otro - en Provisionalidad">Tecnico - otro - En Provisionalidad</option>
                            </optgroup>
                        </select>
                        <label>Cargo</label>
                    </div>
                    <div class="usuario">
                        <input type="text" name="user" placeholder="" required>
                        <label>Nombre de usuario</label>
                    </div>
                    <div class="usuario password-container">
                        <input type="password" id="password" name="password" required>
                        <label>Contraseña</label>
                        <i class="ri-eye-off-fill" id="verPassword"></i>
                        <div class="mensaje-error" id="passwordError"></div>
                    </div>
                    <div class="usuario password-container">
    <input type="password" id="confirmPassword" name="confirmPassword" required>
    <label>Confirmar Contraseña</label>
    <i class="ri-eye-off-fill" id="verConfirmPassword"></i>
    <div class="mensaje-error" id="confirmPasswordError"></div>
</div>
                    <input name="btnregister" type="submit" value="Registrar">
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
                <!-- Text or links for the footer if needed -->
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
                </ul>
            </div>
        </div>
    </footer>
    <script src="js/app.js"></script>
</body>
</html>
