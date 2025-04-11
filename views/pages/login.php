<?php require_once './views/partials/head.php' ?>
<style>
    body {
        background: linear-gradient(135deg, #4b7bc3, #2a5298);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        color: white;
    }
    .login-container {
        background: rgba(255, 255, 255, 0.1);
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        text-align: center;
        width: 20%;
        backdrop-filter: blur(10px);
    }
    .login-container h1 {
        margin-bottom: 10px;
    }
    .login-container p {
        margin-bottom: 20px;
    }
    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
    }
    button {
        width: 100%;
        padding: 10px;
        background: #00c6ff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        color: white;
        cursor: pointer;
        transition: background 0.3s ease;
    }
    button:hover {
        background: #0072ff;
    }
    .register-link {
        margin-top: 10px;
    }
    .register-link a {
        color: #00c6ff;
        text-decoration: none;
    }
    .register-link a:hover {
        text-decoration: underline;
    }
</style>
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