<?php require_once './views/partials/head.php' ?>
<body>
    <div class="login-container">
        <div class="login-logo">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <h1>Bienvenido a NexEvent</h1>
        <p>Conecta y descubre eventos emocionantes</p>

        <form id="login-form">
            <input type="text" id="username" placeholder="Correo" name="nombre" required>
            <input type="password" id="password" placeholder="Contraseña" name="contra" required>
            <button type="submit" id="button">Iniciar Sesión</button>
        </form>

        <div class="divider">
            <span>O inicia sesión con</span>
        </div>

        <div class="social-login">
            <div class="social-btn">
                <i class="fab fa-google"></i>
            </div>
            <div class="social-btn">
                <i class="fab fa-facebook-f"></i>
            </div>
            <div class="social-btn">
                <i class="fab fa-apple"></i>
            </div>
        </div>

        <p class="register-link">¿No tienes cuenta? <a href="<?php echo APP_URL; ?>register">Regístrate</a></p>
    </div>

    <script>
        document.getElementById('login-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            console.log('Formulario enviado');

            const formData = new FormData(this);

            console.log(formData);

            try {
                const response = await fetch("<?php echo  APP_URL; ?>api/user/login-ajax.php", {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();
                console.log('Respuesta recibida:', data);

                document.getElementById('username').value = '';
                document.getElementById('password').value = '';

                if (data.estado == "ok") {
                    window.location.href = data.redirect;
                } else if (data.tipo == "error") {
                    Swal.fire({
                        icon: data.icono,
                        title: data.titulo,
                        text: data.texto,
                        confirmButtonText: 'Aceptar'
                    });
                }

            } catch (error) {
                console.error('Error:', error);
                document.getElementById('error-message').style.display = 'block';
                document.getElementById('error-message').textContent = 'Error de conexión con el servidor';
            }
        });
    </script>
</body>

</html>