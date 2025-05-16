<?php
    // views/pages/landing_page.php
    require_once __DIR__ . '/../partials/head.php'; // Asegúrate que head.php cargue el CSS de la landing y APP_URL
?>
<body>
    <nav class="navbar landing-navbar">
        <div class="container nav-container">
            <a href="<?php echo APP_URL; ?>#home" class="nav-logo">
                <img src="<?php echo APP_URL; ?>images/logo_nexmeet_blanco.png" alt="NexMeet Logo">
            </a>
            <ul class="nav-menu">
                <li><a href="#home">Inicio</a></li>
                <li><a href="#features">Características</a></li> <?php // Cambiado de Servicios a Características ?>
                <li><a href="#how-it-works">¿Cómo Funciona?</a></li> <?php // Cambiado de Producto ?>
                <li><a href="#about">Nosotros</a></li>
            </ul>
            <div class="nav-actions"> <?php // Contenedor para los botones ?>
                <a href="<?php echo APP_URL; ?>login" class="btn btn-outline nav-button-login">Ingresar</a>
                <a href="<?php echo APP_URL; ?>register" class="btn btn-primary nav-button-register">Registrarse</a>
            </div>
        </div>
    </nav>

    <header class="hero-section" id="home">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <h1>Conéctate Sin Fronteras con NexMeet</h1>
            <p>Tu plataforma ideal para reuniones virtuales, colaboración en tiempo real y comunicación fluida. Únete a la nueva era de la interacción digital.</p>
            <a href="<?php echo APP_URL; ?>register" class="btn btn-primary hero-button">Crea tu Cuenta Gratis</a>
            <div class="social-icons-hero">
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>
    </header>

    <section id="features" class="content-section">
        <div class="container">
            <h2>Características Destacadas</h2>
            <div class="services-grid">
                <div class="service-item card-style">
                    <i class="fas fa-video fa-3x service-icon"></i>
                    <h3>Videoconferencias HD</h3>
                    <p>Calidad de audio y video superior para reuniones claras y productivas.</p>
                </div>
                <div class="service-item card-style">
                    <i class="fas fa-comments fa-3x service-icon"></i>
                    <h3>Chat Integrado</h3>
                    <p>Mensajería instantánea, emojis y compartición de archivos durante tus reuniones.</p>
                </div>
                <div class="service-item card-style">
                    <i class="fas fa-screen-share fa-3x service-icon"></i> <?php // Icono no existe en FA por defecto, usa 'fas fa-desktop' o 'fas fa-share-square' ?>
                    <i class="fas fa-desktop fa-3x service-icon" style="display:none;"></i> <h3>Compartir Pantalla</h3>
                    <p>Presenta tus ideas y colabora fácilmente compartiendo tu pantalla con un clic.</p>
                </div>
                <div class="service-item card-style">
                    <i class="fas fa-users fa-3x service-icon"></i>
                    <h3>Salas Personalizadas</h3>
                    <p>Crea y únete a salas de reunión con enlaces personalizados y controles de acceso.</p>
                </div>
                <div class="service-item card-style">
                    <i class="fas fa-shield-alt fa-3x service-icon"></i>
                    <h3>Seguridad Robusta</h3>
                    <p>Comunicaciones encriptadas y opciones de privacidad para tu tranquilidad.</p>
                </div>
                <div class="service-item card-style">
                    <i class="fas fa-mobile-alt fa-3x service-icon"></i>
                    <h3>Acceso Multiplataforma</h3>
                    <p>Únete a reuniones desde tu computadora, tablet o smartphone donde quiera que estés.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="content-section alternate-bg-landing">
        <div class="container">
            <h2>Simple, Rápido y Eficaz</h2>
            <div class="how-it-works-steps">
                <div class="step-item card-style">
                    <div class="step-number">1</div>
                    <i class="fas fa-user-plus fa-2x step-icon"></i>
                    <h3>Regístrate</h3>
                    <p>Crea tu cuenta en segundos y accede a todas las funcionalidades.</p>
                </div>
                <div class="step-item card-style">
                    <div class="step-number">2</div>
                    <i class="fas fa-plus-circle fa-2x step-icon"></i>
                    <h3>Crea una Reunión</h3>
                    <p>Agenda o inicia una reunión instantánea y comparte el enlace.</p>
                </div>
                <div class="step-item card-style">
                    <div class="step-number">3</div>
                    <i class="fas fa-handshake fa-2x step-icon"></i>
                    <h3>Colabora</h3>
                    <p>Conéctate, comparte y colabora con tu equipo o clientes sin complicaciones.</p>
                </div>
            </div>
            <a href="<?php echo APP_URL; ?>register" class="btn btn-primary cta-button">Empieza a Usar NexMeet Ahora</a>
        </div>
    </section>

    <section id="about" class="content-section">
        <div class="container">
            <h2>Sobre NexMeet</h2>
            <div class="about-content card-style">
                <p>En NexMeet, creemos que la distancia no debería ser una barrera para la comunicación efectiva. Nuestra misión es proporcionar una plataforma de reuniones en línea intuitiva, segura y llena de funciones que facilite la conexión y colaboración entre personas, sin importar dónde se encuentren. Desarrollado con pasión por la tecnología y un enfoque en la experiencia del usuario.</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> NexMeet. Conectando Ideas, Uniendo Personas.</p>
            <div class="footer-social-icons">
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <script src="<?php echo APP_URL; ?>views/js/landing_page_script.js"></script>
</body>
</html>