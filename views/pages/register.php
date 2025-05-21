<?php require_once './views/partials/head.php' ?>
<body>
    <div class="register-container">
        <div class="login-logo">
            <i class="fas fa-user-plus"></i>
        </div>
        <h1>Únete a NexEvent</h1>

        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>

        <div id="error-message" class="error-message"></div>

        <form method="post" enctype="multipart/form-data" action="/user">
            <input type="text" id="new-username" name="nombre" placeholder="Nombre completo" required>
            <input type="email" id="new-email" name="email" placeholder="Correo electrónico" required>
            <input type="password" id="new-password" name="contra" placeholder="Contraseña" required>
            <input type="password" id="new-password2" name="contra2" placeholder="Confirmar contraseña" required>
            <input type="date" id="new-birth" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required>
            <button type="submit">Crear cuenta</button>
        </form>

        <p class="terms">Al registrarte, aceptas nuestros <a href="#">Términos y Condiciones</a> y <a href="#">Política de Privacidad</a></p>

        <p class="login-link">¿Ya tienes cuenta? <a href="<?php echo APP_URL; ?>login">Iniciar Sesión</a></p>
    </div>

</body>

</html>