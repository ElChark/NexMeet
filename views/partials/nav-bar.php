<!-- views/partials/nav-bar.php -->
<style>
<<<<<<< Updated upstream
/* Estilos unificados para la barra de navegación */
.header {
    background-color: #fff;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    padding: 0 20px;
    height: 60px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100;
    display: flex;
    align-items: center;
}

.header-logo {
    font-size: 26px;
    font-weight: bold;
    color: #ff5a5f;
    margin-right: auto;
    text-decoration: none;
}

.header-nav {
    display: flex;
    gap: 20px;
    align-items: center;
}

.header-nav-item {
    color: #65676b;
    font-weight: 500;
    padding: 8px 12px;
    border-radius: 4px;
    transition: background-color 0.2s;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 5px;
}
=======
    /* Estilos unificados para la barra de navegación */
    .header {
        background-color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        padding: 0 20px;
        height: 60px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 100;
        display: flex;
        align-items: center;
    }

    .header-logo {
        font-size: 26px;
        font-weight: bold;
        color: #ff5a5f;
        margin-right: auto;
        text-decoration: none;
    }

    .header-nav {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .header-nav-item {
        color: #65676b;
        font-weight: 500;
        padding: 8px 12px;
        border-radius: 4px;
        transition: background-color 0.2s;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 5px;
    }
>>>>>>> Stashed changes

    .header-nav-item:hover {
        background-color: #f0f2f5;
    }

<<<<<<< Updated upstream
.header-nav-item.active {
    color: #ff5a5f;
    position: relative;
}

.header-nav-item.active::after {
    content: '';
    position: absolute;
    bottom: -12px;
    left: 0;
    right: 0;
    height: 3px;
    background-color: #ff5a5f;
}

/* Dropdown para Crear */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    min-width: 160px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    z-index: 101;
    margin-top: 5px;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-item {
    color: #65676b;
    padding: 12px 16px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: background-color 0.2s;
}

.dropdown-item:hover {
    background-color: #f0f2f5;
}

/* Estilos para notificaciones */
.notifications-dropdown {
    position: relative;
}

.notification-count {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: #ff5a5f;
    color: white;
    font-size: 11px;
    font-weight: bold;
    height: 18px;
    width: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.notifications-menu {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    width: 360px;
    max-height: 500px;
    overflow-y: auto;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    z-index: 101;
    margin-top: 10px;
}

.notifications-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    border-bottom: 1px solid #e4e6eb;
}

.notifications-title {
    font-size: 18px;
    font-weight: 600;
    color: #484848;
}

.mark-all-read {
    font-size: 13px;
    color: #ff5a5f;
    cursor: pointer;
    font-weight: 500;
}

.notification-item {
    display: flex;
    padding: 12px 15px;
    border-bottom: 1px solid #e4e6eb;
    transition: background-color 0.2s;
    cursor: pointer;
}

.notification-item:hover {
    background-color: #f7f7f7;
}

.notification-item.unread {
    background-color: rgba(255, 90, 95, 0.05);
}

.notification-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    margin-right: 12px;
    overflow: hidden;
    flex-shrink: 0;
}

.notification-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.notification-content {
    flex: 1;
}

.notification-text {
    font-size: 14px;
    margin-bottom: 4px;
    line-height: 1.4;
}

.notification-text strong {
    font-weight: 500;
    color: #484848;
}

.notification-time {
    font-size: 12px;
    color: #767676;
}

.notification-dot {
    width: 8px;
    height: 8px;
    background-color: #ff5a5f;
    border-radius: 50%;
    margin-left: 10px;
    align-self: center;
}

.view-all-notifications {
    padding: 12px;
    text-align: center;
    font-weight: 500;
    color: #ff5a5f;
    cursor: pointer;
    transition: background-color 0.2s;
}

.view-all-notifications:hover {
    background-color: #f7f7f7;
}

/* Barra de búsqueda */
.search-container {
    position: relative;
    margin-right: 10px;
}

.search-input {
    padding: 8px 15px 8px 35px;
    border: 1px solid #e4e6eb;
    border-radius: 20px;
    background-color: #f0f2f5;
    font-size: 14px;
    width: 240px;
    transition: all 0.3s;
}

.search-input:focus {
    outline: none;
    background-color: #fff;
    border-color: #ff5a5f;
    box-shadow: 0 0 0 2px rgba(255, 90, 95, 0.2);
    width: 280px;
}

.search-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #767676;
}

/* Avatar del usuario */
.user-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 8px;
}

.user-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-menu-item {
    display: flex;
    align-items: center;
}

/* Responsive */
@media (max-width: 768px) {
    .header {
        padding: 0 10px;
    }
    
    .header-nav-item span {
        display: none;
    }
    
    .search-container {
        display: none;
    }
    
    .search-mobile {
        display: block;
    }
    
    .notifications-menu {
        width: 100%;
        position: fixed;
        top: 60px;
        right: 0;
        left: 0;
        margin-top: 0;
        border-radius: 0;
    }
}
=======
    .header-nav-item.active {
        color: #ff5a5f;
        position: relative;
    }

    .header-nav-item.active::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 0;
        right: 0;
        height: 3px;
        background-color: #ff5a5f;
    }

    /* Dropdown para Crear */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: white;
        min-width: 160px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        z-index: 101;
        margin-top: 5px;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-item {
        color: #65676b;
        padding: 12px 16px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: background-color 0.2s;
    }

    .dropdown-item:hover {
        background-color: #f0f2f5;
    }

    /* Estilos para notificaciones */
    .notifications-dropdown {
        position: relative;
    }

    .notification-count {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: #ff5a5f;
        color: white;
        font-size: 11px;
        font-weight: bold;
        height: 18px;
        width: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .notifications-menu {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: white;
        width: 360px;
        max-height: 500px;
        overflow-y: auto;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        z-index: 101;
        margin-top: 10px;
    }

    .notifications-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid #e4e6eb;
    }

    .notifications-title {
        font-size: 18px;
        font-weight: 600;
        color: #484848;
    }

    .mark-all-read {
        font-size: 13px;
        color: #ff5a5f;
        cursor: pointer;
        font-weight: 500;
    }

    .notification-item {
        display: flex;
        padding: 12px 15px;
        border-bottom: 1px solid #e4e6eb;
        transition: background-color 0.2s;
        cursor: pointer;
    }

    .notification-item:hover {
        background-color: #f7f7f7;
    }

    .notification-item.unread {
        background-color: rgba(255, 90, 95, 0.05);
    }

    .notification-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        margin-right: 12px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .notification-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .notification-content {
        flex: 1;
    }

    .notification-text {
        font-size: 14px;
        margin-bottom: 4px;
        line-height: 1.4;
    }

    .notification-text strong {
        font-weight: 500;
        color: #484848;
    }

    .notification-time {
        font-size: 12px;
        color: #767676;
    }

    .notification-dot {
        width: 8px;
        height: 8px;
        background-color: #ff5a5f;
        border-radius: 50%;
        margin-left: 10px;
        align-self: center;
    }

    .view-all-notifications {
        padding: 12px;
        text-align: center;
        font-weight: 500;
        color: #ff5a5f;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .view-all-notifications:hover {
        background-color: #f7f7f7;
    }

    /* Barra de búsqueda */
    .search-container {
        position: relative;
        margin-right: 10px;
    }

    .search-input {
        padding: 8px 15px 8px 35px;
        border: 1px solid #e4e6eb;
        border-radius: 20px;
        background-color: #f0f2f5;
        font-size: 14px;
        width: 240px;
        transition: all 0.3s;
    }

    .search-input:focus {
        outline: none;
        background-color: #fff;
        border-color: #ff5a5f;
        box-shadow: 0 0 0 2px rgba(255, 90, 95, 0.2);
        width: 280px;
    }

    .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #767676;
    }

    /* Avatar del usuario */
    .user-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 8px;
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .user-menu-item {
        display: flex;
        align-items: center;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .header {
            padding: 0 10px;
        }

        .header-nav-item span {
            display: none;
        }

        .search-container {
            display: none;
        }

        .search-mobile {
            display: block;
        }

        .notifications-menu {
            width: 100%;
            position: fixed;
            top: 60px;
            right: 0;
            left: 0;
            margin-top: 0;
            border-radius: 0;
        }
    }
>>>>>>> Stashed changes
</style>

<header class="header">
    <a href="<?php echo APP_URL; ?>home" class="header-logo">NexEvent</a>
<<<<<<< Updated upstream
    
=======

>>>>>>> Stashed changes
    <div class="search-container">
        <i class="fas fa-search search-icon"></i>
        <input type="text" class="search-input" placeholder="Buscar eventos, personas...">
    </div>
<<<<<<< Updated upstream
    
=======

>>>>>>> Stashed changes
    <nav class="header-nav">
        <a href="<?php echo APP_URL; ?>home" class="header-nav-item <?php echo isset($url[0]) && $url[0] == 'home' ? 'active' : ''; ?>">
            <i class="fas fa-home"></i> <span>Inicio</span>
        </a>
        <a href="<?php echo APP_URL; ?>explorar" class="header-nav-item <?php echo isset($url[0]) && $url[0] == 'explorar' ? 'active' : ''; ?>">
            <i class="fas fa-compass"></i> <span>Explorar</span>
        </a>
        <div class="dropdown">
            <a href="#" class="header-nav-item <?php echo isset($url[0]) && $url[0] == 'crear' ? 'active' : ''; ?>">
                <i class="fas fa-plus-circle"></i> <span>Crear</span>
<<<<<<< Updated upstream
            </a>
            <div class="dropdown-content">
                <a href="<?php echo APP_URL; ?>crearevento" class="dropdown-item">
                    <i class="fas fa-calendar-plus"></i> Evento
                </a>
                <a href="<?php echo APP_URL; ?>publicacion" class="dropdown-item">
                    <i class="fas fa-edit"></i> Publicación
                </a>
            </div>
        </div>
        <a href="<?php echo APP_URL; ?>mensajes" class="header-nav-item <?php echo isset($url[0]) && $url[0] == 'mensajes' ? 'active' : ''; ?>">
            <i class="fas fa-comment"></i> <span>Mensajes</span>
        </a>
        
        <!-- Nuevo botón de notificaciones -->
        <div class="notifications-dropdown">
            <div class="header-nav-item" id="notifications-toggle">
                <i class="fas fa-bell"></i>
                <span>Notificaciones</span>
                <div class="notification-count">3</div>
            </div>
            
            <div class="notifications-menu" id="notifications-menu">
                <div class="notifications-header">
                    <div class="notifications-title">Notificaciones</div>
                    <div class="mark-all-read">Marcar todas como leídas</div>
                </div>
                
                <div class="notification-item unread">
                    <div class="notification-avatar">
                        <img src="https://via.placeholder.com/48/ff5a5f/ffffff?text=AL" alt="Avatar">
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>Ana López</strong> te ha invitado al evento <strong>Festival de Música</strong>.</div>
                        <div class="notification-time">Hace 5 minutos</div>
                    </div>
                    <div class="notification-dot"></div>
                </div>
                
                <div class="notification-item unread">
                    <div class="notification-avatar">
                        <img src="https://via.placeholder.com/48/00a699/ffffff?text=CM" alt="Avatar">
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>Carlos Méndez</strong> ha comentado en tu evento <strong>Taller de Cocina</strong>.</div>
                        <div class="notification-time">Hace 1 hora</div>
                    </div>
                    <div class="notification-dot"></div>
                </div>
                
                <div class="notification-item unread">
                    <div class="notification-avatar">
                        <img src="https://via.placeholder.com/48/484848/ffffff?text=TM" alt="Avatar">
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>TechMeetup</strong> ha publicado un nuevo evento <strong>Hackathon 2025</strong> que podría interesarte.</div>
                        <div class="notification-time">Hace 3 horas</div>
                    </div>
                    <div class="notification-dot"></div>
                </div>
                
                <div class="notification-item">
                    <div class="notification-avatar">
                        <img src="https://via.placeholder.com/48/ff5a5f/ffffff?text=MR" alt="Avatar">
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>María Rodríguez</strong> asistirá a tu evento <strong>Exposición de Arte</strong>.</div>
                        <div class="notification-time">Ayer</div>
                    </div>
                </div>
                
                <div class="notification-item">
                    <div class="notification-avatar">
                        <img src="https://via.placeholder.com/48/00a699/ffffff?text=JS" alt="Avatar">
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>Juan Sánchez</strong> te ha enviado un mensaje nuevo.</div>
                        <div class="notification-time">Hace 2 días</div>
                    </div>
                </div>
                
                <div class="view-all-notifications">
                    Ver todas las notificaciones
                </div>
            </div>
        </div>
        
        <!-- Perfil con avatar -->
        <div class="dropdown">
            <a href="<?php echo APP_URL; ?>perfil" class="header-nav-item user-menu-item <?php echo isset($url[0]) && $url[0] == 'perfil' ? 'active' : ''; ?>">
                <div class="user-avatar">
                    <img src="https://via.placeholder.com/36" alt="Tu foto de perfil">
                </div>
                <span>Perfil</span>
            </a>
            <div class="dropdown-content">
=======
            </a>
            <div class="dropdown-content">
                <a href="<?php echo APP_URL; ?>crear" class="dropdown-item">
                    <i class="fas fa-calendar-plus"></i> Evento
                </a>
                <a href="<?php echo APP_URL; ?>publicacion" class="dropdown-item">
                    <i class="fas fa-edit"></i> Publicación
                </a>
            </div>
        </div>
        <a href="<?php echo APP_URL; ?>mensajes" class="header-nav-item <?php echo isset($url[0]) && $url[0] == 'mensajes' ? 'active' : ''; ?>">
            <i class="fas fa-comment"></i> <span>Mensajes</span>
        </a>

        <!-- Nuevo botón de notificaciones -->
        <div class="notifications-dropdown">
            <div class="header-nav-item" id="notifications-toggle">
                <i class="fas fa-bell"></i>
                <span>Notificaciones</span>
                <div class="notification-count">3</div>
            </div>

            <div class="notifications-menu" id="notifications-menu">
                <div class="notifications-header">
                    <div class="notifications-title">Notificaciones</div>
                    <div class="mark-all-read">Marcar todas como leídas</div>
                </div>

                <div class="notification-item unread">
                    <div class="notification-avatar">
                        <img src="https://via.placeholder.com/48/ff5a5f/ffffff?text=AL" alt="Avatar">
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>Ana López</strong> te ha invitado al evento <strong>Festival de Música</strong>.</div>
                        <div class="notification-time">Hace 5 minutos</div>
                    </div>
                    <div class="notification-dot"></div>
                </div>

                <div class="notification-item unread">
                    <div class="notification-avatar">
                        <img src="https://via.placeholder.com/48/00a699/ffffff?text=CM" alt="Avatar">
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>Carlos Méndez</strong> ha comentado en tu evento <strong>Taller de Cocina</strong>.</div>
                        <div class="notification-time">Hace 1 hora</div>
                    </div>
                    <div class="notification-dot"></div>
                </div>

                <div class="notification-item unread">
                    <div class="notification-avatar">
                        <img src="https://via.placeholder.com/48/484848/ffffff?text=TM" alt="Avatar">
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>TechMeetup</strong> ha publicado un nuevo evento <strong>Hackathon 2025</strong> que podría interesarte.</div>
                        <div class="notification-time">Hace 3 horas</div>
                    </div>
                    <div class="notification-dot"></div>
                </div>

                <div class="notification-item">
                    <div class="notification-avatar">
                        <img src="https://via.placeholder.com/48/ff5a5f/ffffff?text=MR" alt="Avatar">
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>María Rodríguez</strong> asistirá a tu evento <strong>Exposición de Arte</strong>.</div>
                        <div class="notification-time">Ayer</div>
                    </div>
                </div>

                <div class="notification-item">
                    <div class="notification-avatar">
                        <img src="https://via.placeholder.com/48/00a699/ffffff?text=JS" alt="Avatar">
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>Juan Sánchez</strong> te ha enviado un mensaje nuevo.</div>
                        <div class="notification-time">Hace 2 días</div>
                    </div>
                </div>

                <div class="view-all-notifications">
                    Ver todas las notificaciones
                </div>
            </div>
        </div>

        <!-- Perfil con avatar -->
        <div class="dropdown">
            <a href="#" class="header-nav-item user-menu-item <?php echo isset($url[0]) && $url[0] == 'perfil' ? 'active' : ''; ?>">
                <div class="user-avatar">
                </div>
                <span>Perfil</span>
            </a>
            <div class="dropdown-content">
>>>>>>> Stashed changes
                <a href="<?php echo APP_URL; ?>perfil" class="dropdown-item">
                    <i class="fas fa-user"></i> Mi perfil
                </a>
                <a href="<?php echo APP_URL; ?>configuracion" class="dropdown-item">
                    <i class="fas fa-cog"></i> Configuración
                </a>
<<<<<<< Updated upstream
                <a href="<?php echo APP_URL; ?>login" class="dropdown-item">
=======
                <a href="<?php echo APP_URL ?>views/partials/logout.php" class="dropdown-item">
>>>>>>> Stashed changes
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                </a>
            </div>
        </div>
<<<<<<< Updated upstream
        
        <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin'): ?>
        <a href="<?php echo APP_URL; ?>admin" class="header-nav-item <?php echo isset($url[0]) && $url[0] == 'admin' ? 'active' : ''; ?>">
            <i class="fas fa-cog"></i> <span>Admin</span>
        </a>
=======

        <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin'): ?>
            <a href="<?php echo APP_URL; ?>admin" class="header-nav-item <?php echo isset($url[0]) && $url[0] == 'admin' ? 'active' : ''; ?>">
                <i class="fas fa-cog"></i> <span>Admin</span>
            </a>
>>>>>>> Stashed changes
        <?php endif; ?>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Funcionalidad para el toggle de notificaciones
        const notificationsToggle = document.getElementById('notifications-toggle');
        const notificationsMenu = document.getElementById('notifications-menu');
<<<<<<< Updated upstream
        
=======

>>>>>>> Stashed changes
        notificationsToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            notificationsMenu.style.display = notificationsMenu.style.display === 'block' ? 'none' : 'block';
        });
<<<<<<< Updated upstream
        
=======

>>>>>>> Stashed changes
        // Cerrar el menú al hacer clic fuera
        document.addEventListener('click', function(e) {
            if (!notificationsMenu.contains(e.target) && e.target !== notificationsToggle) {
                notificationsMenu.style.display = 'none';
            }
        });
<<<<<<< Updated upstream
        
        // Funcionalidad para marcar como leídas
        const markAllRead = document.querySelector('.mark-all-read');
        
        markAllRead.addEventListener('click', function() {
            const unreadItems = document.querySelectorAll('.notification-item.unread');
            const notificationCount = document.querySelector('.notification-count');
            
=======

        // Funcionalidad para marcar como leídas
        const markAllRead = document.querySelector('.mark-all-read');

        markAllRead.addEventListener('click', function() {
            const unreadItems = document.querySelectorAll('.notification-item.unread');
            const notificationCount = document.querySelector('.notification-count');

>>>>>>> Stashed changes
            unreadItems.forEach(item => {
                item.classList.remove('unread');
                const dot = item.querySelector('.notification-dot');
                if (dot) {
                    dot.remove();
                }
            });
<<<<<<< Updated upstream
            
            notificationCount.style.display = 'none';
        });
        
        // Funcionalidad para la barra de búsqueda
        const searchInput = document.querySelector('.search-input');
        
=======

            notificationCount.style.display = 'none';
        });

        // Funcionalidad para la barra de búsqueda
        const searchInput = document.querySelector('.search-input');

>>>>>>> Stashed changes
        searchInput.addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                const searchTerm = this.value.trim();
                if (searchTerm) {
<<<<<<< Updated upstream
                    alert(`Buscando: ${searchTerm}`);
                }
            }
        });
        
        // Ejemplo de item de notificación al hacer clic
        const notificationItems = document.querySelectorAll('.notification-item');
        
=======
                    // Simular búsqueda (en producción, redirigirías a una página de resultados)
                    alert(`Buscando: ${searchTerm}`);

                    // Ejemplo de redirección a página de resultados
                    // window.location.href = `${APP_URL}buscar?q=${encodeURIComponent(searchTerm)}`;
                }
            }
        });

        // Ejemplo de item de notificación al hacer clic
        const notificationItems = document.querySelectorAll('.notification-item');

>>>>>>> Stashed changes
        notificationItems.forEach(item => {
            item.addEventListener('click', function() {
                // Marcar como leída al hacer clic
                this.classList.remove('unread');
                const dot = this.querySelector('.notification-dot');
                if (dot) {
                    dot.remove();
                }
<<<<<<< Updated upstream
                
                // Actualizar contador
                const unreadCount = document.querySelectorAll('.notification-item.unread').length;
                const notificationCount = document.querySelector('.notification-count');
                
=======

                // Actualizar contador
                const unreadCount = document.querySelectorAll('.notification-item.unread').length;
                const notificationCount = document.querySelector('.notification-count');

>>>>>>> Stashed changes
                if (unreadCount === 0) {
                    notificationCount.style.display = 'none';
                } else {
                    notificationCount.textContent = unreadCount;
                }
<<<<<<< Updated upstream
                
            });
        });
=======

                // Aquí iría la redirección a la página relacionada con la notificación
                // window.location.href = 'url-destino';
            });
        });

>>>>>>> Stashed changes
    });
</script>