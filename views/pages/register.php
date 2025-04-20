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

        <form id="register-form" method="post" enctype="multipart/form-data" action="../../ajax/usuario-ajax.php">
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


    <script>
        document.getElementById('register-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            console.log('Formulario enviado');

            const formData = new FormData(this);

            console.log(formData);

            try {
                const response = await fetch('../../ajax/usuario-ajax.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                document.getElementById('new-username').value = '';
                document.getElementById('new-email').value = '';
                document.getElementById('new-password').value = '';
                document.getElementById('new-password2').value = '';
                document.getElementById('new-birth').value = '';

                if (data.tipo == "error") {
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