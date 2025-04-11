<?php require_once './views/partials/head.php' ?>

<body>
    <div class="login-container">
        <div class="login-logo">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <h1>Bienvenido a NexEvent</h1>
        <p>Conecta y descubre eventos emocionantes</p>
        
        <form id="login-form" method="post" action="#" enctype="multipart/form-data">
            <input type="text" id="username" placeholder="Usuario o correo" value="" required>
            <input type="password" id="password" placeholder="Contraseña" value="" required>
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
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('login-form');
            const loginBtn = document.getElementById('button');
            
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const username = document.getElementById('username').value;
                const password = document.getElementById('password').value;
                
                // Simulación de inicio de sesión (en un sistema real, esto enviaría una solicitud AJAX)
                loginBtn.textContent = "Iniciando sesión...";
                
                setTimeout(() => {
                    // Redireccionar a la página de inicio (esto es solo para demostración)
                    window.location.href = "<?php echo APP_URL; ?>home";
                }, 1500);
            });
            
            // Animación para los botones sociales
            const socialBtns = document.querySelectorAll('.social-btn');
            socialBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    Swal.fire({
                        icon: 'info',
                        title: 'Próximamente',
                        text: 'El inicio de sesión con redes sociales estará disponible pronto',
                        confirmButtonColor: '#ff5a5f'
                    });
                });
            });
        });
    </script>
</body>
</html>