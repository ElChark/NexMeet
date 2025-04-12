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
        document.addEventListener('DOMContentLoaded', function() {
            // Manejar el envío del formulario
            const registerForm = document.getElementById('register-form');
            const errorMessage = document.getElementById('error-message');
            const progressBar = document.querySelector('.progress-bar');
            const passwordInput = document.getElementById('new-password');
            const confirmPasswordInput = document.getElementById('new-password2');
            
            // Actualizar barra de progreso al completar campos
            const formInputs = registerForm.querySelectorAll('input');
            
            formInputs.forEach(input => {
                input.addEventListener('input', updateProgressBar);
            });
            
            function updateProgressBar() {
                let filledInputs = 0;
                formInputs.forEach(input => {
                    if (input.value.trim() !== '') {
                        filledInputs++;
                    }
                });
                
                const progress = (filledInputs / formInputs.length) * 100;
                progressBar.style.width = `${progress}%`;
            }
            
            // Validar contraseña en tiempo real
            confirmPasswordInput.addEventListener('input', function() {
                if (this.value !== passwordInput.value) {
                    this.style.borderColor = 'rgba(255, 87, 87, 0.7)';
                } else {
                    this.style.borderColor = '';
                }
            });
            
            // Manejar errores de registro
            registerForm.addEventListener('submit', function(e) {
                if (passwordInput.value !== confirmPasswordInput.value) {
                    e.preventDefault();
                    errorMessage.textContent = 'Las contraseñas no coinciden';
                    errorMessage.style.display = 'block';
                    return;
                }
                
                if (passwordInput.value.length < 6) {
                    e.preventDefault();
                    errorMessage.textContent = 'La contraseña debe tener al menos 6 caracteres';
                    errorMessage.style.display = 'block';
                    return;
                }
            });
        });
    </script>
</body>
</html>