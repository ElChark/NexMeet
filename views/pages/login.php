<?php require_once './views/partials/head.php' ?>

<body>
    <div class="login-container">
        <h1>Bienvenido a NexMeet</h1>
        <p>Inicia sesión para continuar</p>
        <form id="login-form" method="post" action="#" enctype="multipart/form-data">
            <input type="text" id="username" placeholder="Usuario o correo" value="" required>
            <input type="password" id="password" placeholder="Contraseña" value="" required>
            <button type="submit" id="button">Iniciar Sesión</button>
        </form>
        <p class="register-link">¿No tienes cuenta? <a href="<?php echo APP_URL; ?>register">Regístrate</a></p>
    </div>

</body>
</html>