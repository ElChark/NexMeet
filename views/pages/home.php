<?php require_once './views/partials/head.php' ?>
<?php require_once './views/partials/session-start.php' ?>

<?php
// Verificar si el usuario está autenticado
//if(!isset($_SESSION['id'])) {
    // Redireccionar al login si no hay sesión
    //header("Location: " . APP_URL . "login");
  //  exit();
//}
?>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f2f5;
    color: #1c1e21;
    line-height: 1.5;
    height: 100%;
}

a {
    text-decoration: none;
    color: inherit;
}



/* MAIN LAYOUT */
.main-container {
    display: grid;
    grid-template-columns: 250px 1fr 300px;
    gap: 20px;
    max-width: 1300px;
    margin: 80px auto 20px;
    padding: 0 20px;
}

/* LEFT SIDEBAR */
.sidebar-left {
    position: sticky;
    top: 80px;
    height: calc(100vh - 100px);
    overflow-y: auto;
}

.sidebar-section {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    padding: 15px;
    margin-bottom: 20px;
}

.sidebar-heading {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #1c1e21;
}

.event-card {
    border-radius: 6px;
    padding: 12px;
    background-color: #f0f2f5;
    margin-bottom: 10px;
    transition: transform 0.2s, box-shadow 0.2s;
}

.event-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
}

.event-title {
    font-weight: 600;
    font-size: 15px;
    margin-bottom: 5px;
}

.event-date, .event-category {
    font-size: 13px;
    color: #65676b;
    margin-bottom: 3px;
}

.event-button {
    background-color: #e4e6eb;
    color: #050505;
    border: none;
    border-radius: 4px;
    padding: 6px 0;
    width: 100%;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    margin-top: 8px;
    transition: background-color 0.2s;
}

.event-button:hover {
    background-color: #d8dadf;
}

.navigation-menu {
    list-style: none;
}

.navigation-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.2s;
    margin-bottom: 5px;
}

.navigation-item:hover {
    background-color: #f0f2f5;
}

.navigation-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: #e4e6eb;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 10px;
}

.navigation-icon i {
    font-size: 16px;
    color: #1877f2;
}

.navigation-text {
    font-size: 15px;
    font-weight: 500;
}

/* MAIN CONTENT */
.main-content {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* FILTROS DE CATEGORÍA */
.category-filters {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    padding: 15px;
}

.filters-heading {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #1c1e21;
}

.filter-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.filter-button {
    background-color: #e4e6eb;
    border: none;
    border-radius: 20px;
    padding: 8px 15px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.2s, color 0.2s;
}

.filter-button:hover {
    background-color: #d8dadf;
}

.filter-button.active {
    background-color: #1877f2;
    color: #fff;
}

/* CREAR PUBLICACIÓN */
.create-post {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    padding: 15px;
}

.create-post-header {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
    align-items: center;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #e4e6eb;
    overflow: hidden;
}

.avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.create-post-input {
    flex: 1;
    border: none;
    background-color: #f0f2f5;
    border-radius: 20px;
    padding: 10px 15px;
    font-size: 15px;
    outline: none;
}

.create-post-form {
    padding-top: 15px;
    border-top: 1px solid #e4e6eb;
    display: none;
}

.create-post-form.active {
    display: block;
}

.form-group {
    margin-bottom: 15px;
}

.form-label {
    display: block;
    font-size: 14px;
    color: #65676b;
    margin-bottom: 6px;
}

.form-control {
    width: 100%;
    border: 1px solid #e4e6eb;
    border-radius: 6px;
    padding: 10px;
    font-size: 15px;
    outline: none;
    transition: border-color 0.2s;
    font-family: inherit;
}

.form-control:focus {
    border-color: #1877f2;
}

textarea.form-control {
    min-height: 120px;
    resize: none;
}

.form-row {
    display: flex;
    gap: 10px;
}

.form-group-half {
    flex: 1;
}

.form-buttons {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.btn {
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    border: none;
    transition: all 0.2s;
}

.btn-primary {
    background-color: #1877f2;
    color: #fff;
    flex: 1;
}

.btn-primary:hover {
    background-color: #166fe5;
}

.btn-secondary {
    background-color: #e4e6eb;
    color: #050505;
}

.btn-secondary:hover {
    background-color: #d8dadf;
}

/* PUBLICACIONES */
.post {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    overflow: hidden;
}

.post-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 16px;
}

.post-author {
    display: flex;
    align-items: center;
}

.post-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #e4e6eb;
    margin-right: 10px;
    overflow: hidden;
}

.post-info {
    display: flex;
    flex-direction: column;
}

.post-author-name {
    font-weight: 600;
    font-size: 15px;
}

.post-time {
    font-size: 13px;
    color: #65676b;
}

.post-more {
    color: #65676b;
    cursor: pointer;
    font-size: 20px;
    height: 32px;
    width: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.post-more:hover {
    background-color: #f0f2f5;
}

.post-image {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
}

.post-content {
    padding: 12px 16px;
}

.post-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 8px;
}

.post-description {
    margin-bottom: 10px;
    font-size: 15px;
}

.post-details {
    font-size: 14px;
    color: #65676b;
}

.post-details p {
    margin-bottom: 5px;
}

.post-stats {
    display: flex;
    justify-content: space-between;
    padding: 12px 16px;
    border-top: 1px solid #e4e6eb;
    border-bottom: 1px solid #e4e6eb;
}

.post-likes {
    display: flex;
    align-items: center;
}

.post-likes i {
    color: #1877f2;
    margin-right: 5px;
}

.post-comments-count {
    color: #65676b;
    cursor: pointer;
}

.post-actions {
    display: flex;
    padding: 4px 16px;
}

.post-action {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 8px 0;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.2s;
    color: #65676b;
}

.post-action:hover {
    background-color: #f0f2f5;
}

.post-action i {
    margin-right: 6px;
}

.post-action.active {
    color: #1877f2;
}

.post-comment-area {
    padding: 12px 16px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.comment-input-wrapper {
    flex: 1;
    position: relative;
}

.comment-input {
    width: 100%;
    border: none;
    background-color: #f0f2f5;
    border-radius: 20px;
    padding: 8px 40px 8px 12px;
    font-size: 14px;
    outline: none;
}

.comment-send {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #1877f2;
    background: none;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

/* RIGHT SIDEBAR */
.sidebar-right {
    position: sticky;
    top: 80px;
    height: calc(100vh - 100px);
    overflow-y: auto;
}

.profile-card {
    padding: 15px;
}

.profile-header {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.profile-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-color: #e4e6eb;
    margin-right: 12px;
    overflow: hidden;
}

.profile-info {
    flex: 1;
}

.profile-name {
    font-weight: 600;
    font-size: 17px;
    margin-bottom: 3px;
}

.profile-email {
    font-size: 14px;
    color: #65676b;
}

.profile-details {
    list-style: none;
}

.profile-item {
    display: flex;
    padding: 8px 0;
    border-bottom: 1px solid #e4e6eb;
}

.profile-item-label {
    width: 80px;
    color: #65676b;
    font-size: 14px;
}

.profile-item-value {
    flex: 1;
    font-size: 14px;
    font-weight: 500;
}

.popular-events .event-card {
    padding: 10px;
    margin-bottom: 10px;
}

.popular-events .event-title {
    font-size: 14px;
    margin-bottom: 3px;
}

.popular-events .event-description {
    font-size: 12px;
    color: #65676b;
    margin-bottom: 3px;
}

/* FOOTER */
.footer {
    text-align: center;
    padding: 15px;
    background-color: #fff;
    border-top: 1px solid #e4e6eb;
    margin-top: 20px;
}

.footer h3 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 5px;
}

.footer p {
    font-size: 14px;
    color: #65676b;
}

/* MODAL */
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s;
}

.modal-backdrop.active {
    opacity: 1;
    visibility: visible;
}

.modal {
    background-color: #fff;
    border-radius: 8px;
    width: 90%;
    max-width: 700px;
    max-height: 90vh;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transform: translateY(20px);
    opacity: 0;
    transition: all 0.3s;
}

.modal-backdrop.active .modal {
    transform: translateY(0);
    opacity: 1;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    border-bottom: 1px solid #e4e6eb;
}

.modal-title {
    font-size: 20px;
    font-weight: 600;
    color: #1c1e21;
}

.modal-close {
    background: none;
    border: none;
    font-size: 22px;
    cursor: pointer;
    color: #65676b;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-close:hover {
    background-color: #f0f2f5;
}

.modal-body {
    padding: 20px;
    overflow-y: auto;
    flex: 1;
}

.modal-section {
    margin-bottom: 20px;
}

.modal-section-title {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
}

.modal-section-content {
    background-color: #f0f2f5;
    padding: 15px;
    border-radius: 8px;
}

.modal-comments {
    max-height: 200px;
    overflow-y: auto;
    margin-top: 15px;
}

.comment {
    margin-bottom: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #e4e6eb;
}

.comment:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.comment-author {
    font-weight: 600;
    margin-right: 5px;
}

.modal-comment-form {
    display: flex;
    margin-top: 15px;
    gap: 10px;
}

.modal-comment-input {
    flex: 1;
    border: 1px solid #e4e6eb;
    border-radius: 20px;
    padding: 8px 15px;
    outline: none;
    font-size: 14px;
}

.modal-comment-btn {
    background-color: #1877f2;
    color: #fff;
    border: none;
    border-radius: 6px;
    padding: 0 15px;
    font-weight: 500;
    cursor: pointer;
}

/* RESPONSIVE */
@media (max-width: 1200px) {
    .main-container {
        grid-template-columns: 220px 1fr 250px;
    }
}

@media (max-width: 992px) {
    .main-container {
        grid-template-columns: 1fr;
    }
    
    .sidebar-left, .sidebar-right {
        display: none;
    }
}

@media (max-width: 576px) {
    .form-row {
        flex-direction: column;
    }
    
    .header-nav-item span {
        display: none;
    }
    
    .post-action span {
        display: none;
    }
}
</style>

<!-- Font Awesome para iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<body>
    <!-- Header principal -->
    <header class="header">
        <a href="<?php echo APP_URL; ?>home" class="header-logo">NexMeet</a>
        
        <nav class="header-nav">
            <a href="<?php echo APP_URL; ?>home" class="header-nav-item active">
                <i class="fas fa-home"></i> <span>Inicio</span>
            </a>
            <a href="<?php echo APP_URL; ?>mensajes" class="header-nav-item">
                <i class="fas fa-comment"></i> <span>Mensajes</span>
            </a>
            <a href="<?php echo APP_URL; ?>perfil" class="header-nav-item">
                <i class="fas fa-user"></i> <span>Perfil</span>
            </a>
            <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin'): ?>
            <a href="<?php echo APP_URL; ?>admin" class="header-nav-item">
                <i class="fas fa-cog"></i> <span>Admin</span>
            </a>
            <?php endif; ?>
            <a href="<?php echo APP_URL; ?>logout" class="header-nav-item logout">
                <i class="fas fa-sign-out-alt"></i> <span>Salir</span>
            </a>
        </nav>
    </header>

    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Sidebar izquierda -->
        <aside class="sidebar-left">
            <!-- Tus eventos -->
            <section class="sidebar-section">
                <h3 class="sidebar-heading">Tus eventos</h3>
                <div id="eventos-feed">
                    <div class="event-card">
                        <h4 class="event-title">Torneo de fútbol 5vs5</h4>
                        <p class="event-date">15/05/2025</p>
                        <p class="event-category">Categoría: Deportes</p>
                        <button class="event-button ver-detalles" data-id="1">Ver detalles</button>
                    </div>
                    
                    <div class="event-card">
                        <h4 class="event-title">Curso de programación</h4>
                        <p class="event-date">20/06/2025</p>
                        <p class="event-category">Categoría: Tecnología</p>
                        <button class="event-button ver-detalles" data-id="2">Ver detalles</button>
                    </div>
                </div>
            </section>
            
            <!-- Explorar -->
            <section class="sidebar-section">
                <h3 class="sidebar-heading">Explorar</h3>
                <ul class="navigation-menu">
                    <li class="navigation-item">
                        <div class="navigation-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <span class="navigation-text">Eventos cercanos</span>
                    </li>
                    <li class="navigation-item">
                        <div class="navigation-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="navigation-text">Grupos</span>
                    </li>
                    <li class="navigation-item">
                        <div class="navigation-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="navigation-text">Destacados</span>
                    </li>
                    <li class="navigation-item">
                        <div class="navigation-icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <span class="navigation-text">Guardados</span>
                    </li>
                </ul>
            </section>
        </aside>
        
        <!-- Contenido principal -->
        <main class="main-content">
            <!-- Filtros de categoría -->
            <section class="category-filters">
                <h3 class="filters-heading">¿Qué te interesa?</h3>
                <div class="filter-buttons">
                    <button class="filter-button" data-category="deportes">Deportes</button>
                    <button class="filter-button" data-category="musica">Música</button>
                    <button class="filter-button" data-category="arte">Arte</button>
                    <button class="filter-button" data-category="tecnologia">Tecnología</button>
                    <button class="filter-button" data-category="viajes">Viajes</button>
                    <button class="filter-button" data-category="gastronomia">Gastronomía</button>
                </div>
            </section>
            
            <!-- Crear publicación -->
            <section class="create-post">
                <div class="create-post-header">
                    <div class="avatar">
                        <img src="https://via.placeholder.com/40" alt="Avatar">
                    </div>
                    <input type="text" class="create-post-input" placeholder="¿Qué evento quieres compartir?" id="create-post-trigger">
                </div>
                
                <div class="create-post-form" id="create-post-form">
                    <form id="evento-form">
                        <div class="form-group">
                            <label class="form-label" for="shareText">Título del evento</label>
                            <input type="text" class="form-control" id="shareText" name="titulo" placeholder="¿De qué trata tu evento?" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="shareDesc">Descripción</label>
                            <textarea class="form-control" id="shareDesc" name="descripcion" placeholder="Describe los detalles de tu evento..." required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="shareLoc">Ubicación</label>
                            <input type="text" class="form-control" id="shareLoc" name="ubicacion" placeholder="¿Dónde se realizará?" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group-half">
                                <label class="form-label" for="shareCategory">Categoría</label>
                                <select class="form-control" id="shareCategory" name="categoria">
                                    <option value="deportes">Deportes</option>
                                    <option value="musica">Música</option>
                                    <option value="arte">Arte</option>
                                    <option value="tecnologia">Tecnología</option>
                                    <option value="gastronomia">Gastronomía</option>
                                    <option value="viajes">Viajes</option>
                                </select>
                            </div>
                            
                            <div class="form-group-half">
                                <label class="form-label" for="eventDate">Fecha</label>
                                <input type="date" class="form-control" id="eventDate" name="fecha" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="eventImage">Imagen del evento</label>
                            <input type="file" class="form-control" id="eventImage" name="imagen" accept="image/*">
                        </div>
                        
                        <div class="form-buttons">
                            <button type="button" class="btn btn-secondary" id="cancel-post">Cancelar</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Publicar evento
                            </button>
                        </div>
                    </form>
                </div>
            </section>
            
            <!-- Eventos sugeridos -->
            <section id="eventos-sugeridos">
                <!-- Post 1 -->
                <article class="post" data-id="1">
                    <div class="post-header">
                        <div class="post-author">
                            <div class="post-avatar">
                                <img src="https://via.placeholder.com/40" alt="Avatar">
                            </div>
                            <div class="post-info">
                                <div class="post-author-name">Usuario</div>
                                <div class="post-time">Hace 2 horas</div>
                            </div>
                        </div>
                        <div class="post-more">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                    </div>
                    
                    <img src="https://via.placeholder.com/800x400" alt="Imagen del evento" class="post-image">
                    
                    <div class="post-content">
                        <h3 class="post-title">Torneo de fútbol amateur</h3>
                        <p class="post-description">Ven y participa en nuestro torneo mensual de fútbol 5vs5. ¡Habrá premios para los ganadores!</p>
                        <div class="post-details">
                            <p><strong>Ubicación:</strong> Campo Municipal, Calle Principal #123</p>
                            <p><strong>Fecha:</strong> 15/05/2025</p>
                        </div>
                    </div>
                    
                    <div class="post-stats">
                        <div class="post-likes">
                            <i class="fas fa-thumbs-up"></i> 42 Me gusta
                        </div>
                        <div class="post-comments-count">15 comentarios</div>
                    </div>
                    
                    <div class="post-actions">
                        <div class="post-action like-action" data-id="1">
                            <i class="far fa-thumbs-up"></i>
                            <span>Me gusta</span>
                        </div>
                        <div class="post-action comment-action" data-id="1">
                            <i class="far fa-comment-alt"></i>
                            <span>Comentar</span>
                        </div>
                        <div class="post-action attend-action" data-id="1">
                            <i class="far fa-calendar-check"></i>
                            <span>Asistir</span>
                        </div>
                    </div>
                    
                    <div class="post-comment-area">
                        <div class="avatar">
                            <img src="https://via.placeholder.com/32" alt="Avatar">
                        </div>
                        <div class="comment-input-wrapper">
                            <input type="text" class="comment-input" placeholder="Escribe un comentario...">
                            <button class="comment-send">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </article>
                
                <!-- Post 2 -->
                <article class="post" data-id="2">
                    <div class="post-header">
                        <div class="post-author">
                            <div class="post-avatar">
                                <img src="https://via.placeholder.com/40" alt="Avatar">
                            </div>
                            <div class="post-info">
                                <div class="post-author-name">otro_usuario</div>
                                <div class="post-time">Hace 5 horas</div>
                            </div>
                        </div>
                        <div class="post-more">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                    </div>
                    
                    <img src="https://via.placeholder.com/800x400" alt="Imagen del evento" class="post-image">
                    
                    <div class="post-content">
                        <h3 class="post-title">Concierto de música clásica</h3>
                        <p class="post-description">Disfruta de una velada con las mejores piezas de Mozart y Beethoven.</p>
                        <div class="post-details">
                            <p><strong>Ubicación:</strong> Auditorio Municipal, Avenida Central #456</p>
                            <p><strong>Fecha:</strong> 20/05/2025</p>
                        </div>
                    </div>
                    
                    <div class="post-stats">
                        <div class="post-likes">
                            <i class="fas fa-thumbs-up"></i> 18 Me gusta
                        </div>
                        <div class="post-comments-count">3 comentarios</div>
                    </div>
                    
                    <div class="post-actions">
                        <div class="post-action like-action" data-id="2">
                            <i class="far fa-thumbs-up"></i>
                            <span>Me gusta</span>
                        </div>
                        <div class="post-action comment-action" data-id="2">
                            <i class="far fa-comment-alt"></i>
                            <span>Comentar</span>
                        </div>
                        <div class="post-action attend-action" data-id="2">
                            <i class="far fa-calendar-check"></i>
                            <span>Asistir</span>
                        </div>
                    </div>
                    
                    <div class="post-comment-area">
                        <div class="avatar">
                            <img src="https://via.placeholder.com/32" alt="Avatar">
                        </div>
                        <div class="comment-input-wrapper">
                            <input type="text" class="comment-input" placeholder="Escribe un comentario...">
                            <button class="comment-send">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </article>
            </section>
        </main>
        
        <!-- Sidebar derecha -->
        <aside class="sidebar-right">
            <!-- Perfil -->
            <section class="sidebar-section profile-card">
                <div class="profile-header">
                    <div class="profile-avatar">
                        <img src="https://via.placeholder.com/60" alt="Avatar de perfil">
                    </div>
                    <div class="profile-info">
                        <div class="profile-name">Usuario</div>
                        <div class="profile-email">email@ejemplo.com</div>
                    </div>
                </div>
                
                <ul class="profile-details">
                    <li class="profile-item">
                        <div class="profile-item-label">Usuario:</div>
                        <div class="profile-item-value"><?php echo $_SESSION['nombre'] ?? 'Usuario'; ?></div>
                    </li>
                    <li class="profile-item">
                        <div class="profile-item-label">Email:</div>
                        <div class="profile-item-value"><?php echo $_SESSION['email'] ?? 'email@ejemplo.com'; ?></div>
                    </li>
                    <li class="profile-item">
                        <div class="profile-item-label">Tipo:</div>
                        <div class="profile-item-value"><?php echo $_SESSION['tipo'] ?? 'usuario'; ?></div>
                    </li>
                </ul>
            </section>
            
            <!-- Eventos populares -->
            <section class="sidebar-section popular-events">
                <h3 class="sidebar-heading">Eventos populares</h3>
                
                <div class="event-card">
                    <h4 class="event-title">Festival de Cine</h4>
                    <p class="event-description">Proyección de películas independientes</p>
                    <p class="event-date">10/06/2025</p>
                </div>
                
                <div class="event-card">
                    <h4 class="event-title">Feria del Libro</h4>
                    <p class="event-description">Presentaciones de autores y venta de libros</p>
                    <p class="event-date">15/07/2025</p>
                </div>
            </section>
        </aside>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <h3>Gracias por visitar nuestra página</h3>
        <p>Todos los derechos reservados &copy; <?php echo date('Y'); ?> NexMeet</p>
    </footer>
    
    <!-- Modal de detalles de evento -->
    <div class="modal-backdrop" id="event-details-modal">
        <div class="modal">
            <div class="modal-header">
                <div class="modal-title" id="evento-detalle-titulo">Detalles del evento</div>
                <button class="modal-close" id="modal-close">&times;</button>
            </div>
            
            <div class="modal-body">
                <div class="modal-section">
                    <h4 class="modal-section-title">Descripción</h4>
                    <p id="evento-detalle-descripcion">Descripción del evento</p>
                </div>
                
                <div class="modal-section">
                    <h4 class="modal-section-title">Organizador</h4>
                    <div class="modal-section-content">
                        <p>Nombre: <span id="nombreOrganizador">Nombre del organizador</span></p>
                    </div>
                </div>
                
                <div class="modal-section">
                    <h4 class="modal-section-title">Detalles</h4>
                    <div class="modal-section-content">
                        <p>Fecha: <span id="evento-detalle-fecha">Fecha del evento</span></p>
                        <p>Categoría: <span id="evento-detalle-categoria">Categoría del evento</span></p>
                        <p>Ubicación: <span id="evento-detalle-ubicacion">Ubicación del evento</span></p>
                        <p>Me gusta: <span id="evento-detalle-likes">0</span></p>
                    </div>
                </div>
                
                <div class="modal-section">
                    <h4 class="modal-section-title">Comentarios</h4>
                    <div id="comentarios" class="modal-comments">
                        <!-- Los comentarios se cargarán dinámicamente aquí -->
                        <div class="comment">
                            <span class="comment-author">Juan Pérez:</span>
                            <span>¡Este evento está increíble!</span>
                        </div>
                        <div class="comment">
                            <span class="comment-author">Ana López:</span>
                            <span>Me parece una gran oportunidad para conocer gente nueva.</span>
                        </div>
                    </div>
                    
                    <div class="modal-comment-form">
                        <input type="text" id="nuevoComentario" class="modal-comment-input" placeholder="Escribe un comentario...">
                        <button id="enviarComentario" class="modal-comment-btn" data-evento-id="">Comentar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Variables globales
            const createPostTrigger = document.getElementById('create-post-trigger');
            const createPostForm = document.getElementById('create-post-form');
            const cancelPostButton = document.getElementById('cancel-post');
            const eventDetailsModal = document.getElementById('event-details-modal');
            const modalClose = document.getElementById('modal-close');
            
            // Abrir formulario de creación de eventos
            createPostTrigger.addEventListener('click', function() {
                createPostForm.classList.add('active');
                this.blur();
            });
            
            // Cerrar formulario de creación de eventos
            cancelPostButton.addEventListener('click', function() {
                createPostForm.classList.remove('active');
                document.getElementById('evento-form').reset();
            });
            
            // Abrir modal de detalles de evento
            const detallesButtons = document.querySelectorAll('.ver-detalles, .comment-action');
            detallesButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const eventoId = this.getAttribute('data-id');
                    document.getElementById('enviarComentario').setAttribute('data-evento-id', eventoId);
                    
                    // Cargar datos de ejemplo
                    if (eventoId === '1') {
                        document.getElementById('evento-detalle-titulo').textContent = 'Torneo de fútbol amateur';
                        document.getElementById('evento-detalle-descripcion').textContent = 'Ven y participa en nuestro torneo mensual de fútbol 5vs5. ¡Habrá premios para los ganadores!';
                        document.getElementById('nombreOrganizador').textContent = 'Club Deportivo Local';
                        document.getElementById('evento-detalle-fecha').textContent = '15/05/2025';
                        document.getElementById('evento-detalle-categoria').textContent = 'Deportes';
                        document.getElementById('evento-detalle-likes').textContent = '42';
                        document.getElementById('evento-detalle-ubicacion').textContent = 'Campo Municipal, Calle Principal #123';
                    } else {
                        document.getElementById('evento-detalle-titulo').textContent = 'Concierto de música clásica';
                        document.getElementById('evento-detalle-descripcion').textContent = 'Disfruta de una velada con las mejores piezas de Mozart y Beethoven.';
                        document.getElementById('nombreOrganizador').textContent = 'Asociación Cultural Música Viva';
                        document.getElementById('evento-detalle-fecha').textContent = '20/05/2025';
                        document.getElementById('evento-detalle-categoria').textContent = 'Música';
                        document.getElementById('evento-detalle-likes').textContent = '18';
                        document.getElementById('evento-detalle-ubicacion').textContent = 'Auditorio Municipal, Avenida Central #456';
                    }
                    
                    eventDetailsModal.classList.add('active');
                });
            });
            
            // Cerrar modal
            modalClose.addEventListener('click', function() {
                eventDetailsModal.classList.remove('active');
            });
            
            // Cerrar modal al hacer clic fuera de su contenido
            eventDetailsModal.addEventListener('click', function(e) {
                if (e.target === eventDetailsModal) {
                    eventDetailsModal.classList.remove('active');
                }
            });
            
            // Enviar comentario en modal
            const enviarComentario = document.getElementById('enviarComentario');
            const nuevoComentario = document.getElementById('nuevoComentario');
            const comentariosContainer = document.getElementById('comentarios');
            
            enviarComentario.addEventListener('click', function() {
                if (nuevoComentario.value.trim() !== '') {
                    const eventoId = this.getAttribute('data-evento-id');
                    
                    // Crear y añadir el comentario al DOM
                    const comentarioDiv = document.createElement('div');
                    comentarioDiv.className = 'comment';
                    comentarioDiv.innerHTML = `
                        <span class="comment-author"><?php echo $_SESSION['nombre'] ?? 'Usuario'; ?>:</span>
                        <span>${nuevoComentario.value}</span>
                    `;
                    comentariosContainer.appendChild(comentarioDiv);
                    
                    // Limpiar campo
                    nuevoComentario.value = '';
                }
            });
            
            // Comentarios en posts
            const commentInputs = document.querySelectorAll('.comment-input');
            const commentSendButtons = document.querySelectorAll('.comment-send');
            
            commentSendButtons.forEach((button, index) => {
                button.addEventListener('click', function() {
                    const input = commentInputs[index];
                    if (input.value.trim() !== '') {
                        alert(`Comentario enviado: ${input.value}`);
                        input.value = '';
                    }
                });
            });
            
            // Me gusta en posts
            const likeButtons = document.querySelectorAll('.like-action');
            
            likeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const postId = this.getAttribute('data-id');
                    const icon = this.querySelector('i');
                    const likesContainer = document.querySelector(`.post[data-id="${postId}"] .post-likes`);
                    
                    if (icon.classList.contains('far')) {
                        // Dar me gusta
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        this.classList.add('active');
                        
                        // Actualizar contador
                        const currentLikes = parseInt(likesContainer.textContent.match(/\d+/)[0]);
                        likesContainer.innerHTML = `<i class="fas fa-thumbs-up"></i> ${currentLikes + 1} Me gusta`;
                    } else {
                        // Quitar me gusta
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        this.classList.remove('active');
                        
                        // Actualizar contador
                        const currentLikes = parseInt(likesContainer.textContent.match(/\d+/)[0]);
                        likesContainer.innerHTML = `<i class="fas fa-thumbs-up"></i> ${currentLikes - 1} Me gusta`;
                    }
                });
            });
            
            // Asistencia a eventos
            const attendButtons = document.querySelectorAll('.attend-action');
            
            attendButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const postId = this.getAttribute('data-id');
                    const icon = this.querySelector('i');
                    
                    if (icon.classList.contains('far')) {
                        // Confirmar asistencia
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        this.classList.add('active');
                        alert('Has confirmado tu asistencia al evento');
                    } else {
                        // Cancelar asistencia
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        this.classList.remove('active');
                        alert('Has cancelado tu asistencia al evento');
                    }
                });
            });
            
            // Filtros de categoría
            const categoryButtons = document.querySelectorAll('.filter-button');
            
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');
                    
                    // Resetear estado de todos los botones
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Activar este botón
                    this.classList.add('active');
                    
                    // Filtrar eventos (simulado)
                    alert(`Filtrando eventos por categoría: ${category}`);
                });
            });
            
            // Envío del formulario de evento
            const eventoForm = document.getElementById('evento-form');
            
            eventoForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Aquí enviarías los datos al servidor
                // Por ahora, solo mostramos un mensaje de éxito
                alert('¡Evento creado con éxito!');
                
                // Resetear y cerrar formulario
                createPostForm.classList.remove('active');
                this.reset();
            });
        });
    </script>
</body>
</html>