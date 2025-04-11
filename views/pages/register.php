<?php require_once './views/partials/head.php' ?>

<body>
    <div class="register-container">
        <h1>Regístrate en NexMeet</h1>
        <div id="error-message" class="error-message"></div>
        <form id="register-form" method="post" enctype="multipart/form-data" action="../../ajax/usuario-ajax.php">
            <input type="text" id="new-username" name="nombre" placeholder="Usuario" required>
            <input type="email" id="new-email" name="email" placeholder="Correo electrónico" required>
            <input type="password" id="new-password" name="contra" placeholder="Contraseña" required>
            <input type="password" id="new-password2" name="contra2" placeholder="Repite la Contraseña" required>
            <input type="date" id="new-birth" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required>
            <button type="submit">Registrarse</button>
        </form>
        <p class="login-link">¿Ya tienes cuenta? <a href="<?php echo APP_URL; ?>login">Iniciar Sesión</a></p>
    </div>
</body>
</html>