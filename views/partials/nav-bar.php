<!-- views/partials/nav-bar.php -->
<?php require_once './views/partials/load.php' ?>
<style>
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

    .header-nav-item:hover {
        background-color: #f0f2f5;
    }

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
        min-width: 200px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border-radius: 8px;
        z-index: 101;
        margin-top: 10px;
        transition: transform 0.2s, opacity 0.2s;
        transform: translateY(-10px);
        opacity: 0;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 16px;
        color: var(--text-color);
        text-decoration: none;
        transition: background-color 0.2s;
    }

    .dropdown-item:first-child {
        border-radius: 8px 8px 0 0;
    }

    .dropdown-item:last-child {
        border-radius: 0 0 8px 8px;
    }

    .dropdown-item:hover {
        background-color: var(--light-gray);
    }

    .dropdown-item i {
        width: 20px;
        text-align: center;
        color: var(--primary-color);
    }

    /* Flecha indicadora para dropdown */
    .dropdown .header-nav-item:after {
        content: "\f0d7";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        margin-left: 5px;
        font-size: 12px;
        transition: transform 0.2s;
    }

    .dropdown .header-nav-item.active:after {
        transform: rotate(180deg);
    }

    .dropdown:hover .header-nav-item:after {
        transform: none;
    }

    .dropdown-content.show {
        display: block;
        transform: translateY(0);
        opacity: 1;
        animation: fadeInUp 0.2s ease-out;
    }

    /* Animación para los dropdown */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-content {
        animation: fadeInUp 0.2s ease-out;
    }

    /* Estilos para notificaciones */
    .notifications-dropdown {
        position: relative;
    }

    .notifications-dropdown:hover {
        cursor:default;
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

    .search-container {
        position: relative;
        width: 300px;
        margin: 0 auto;
    }

    .search-input {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 25px;
        font-size: 16px;
        outline: none;
        transition: all 0.3s;
    }

    .search-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .search-results {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        max-height: 300px;
        overflow-y: auto;
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        display: none;
        margin-top: 5px;
    }

    .search-item {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        transition: background 0.2s;
    }

    .search-item:hover {
        background-color: #f5f5f5;
    }

    .search-item-image {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 10px;
    }

    .search-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .search-item-name {
        font-weight: 500;
    }

    .search-item-button, .aceptar-btn, .rechazar-btn {
        border: none;
        border-radius: 8px;
        padding: 5px;
        background-color: #ff5a5f;
        color: #f7f7f7;
    }
    .aceptar-btn:hover {
        cursor: pointer
    }

    .rechazar-btn:hover {
        cursor: pointer
    }

    .search-item-button:hover {
        background-color: rgb(250, 153, 157);
        cursor: pointer;
    }


    .no-results {
        padding: 15px;
        text-align: center;
        color: #666;
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
</style>

<header class="header">
    <a href="<?php echo APP_URL; ?>home" class="header-logo">NexMeet</a>

    <div class="search-container">
        <!-- <i class="fas fa-search search-icon"></i> -->
        <input id="search-input" type="text" class="search-input" placeholder="Buscar eventos, personas...">
        <div class="search-results" id="searchResults"></div>
    </div>

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
            </div>

            <div class="notifications-menu" id="notifications-menu">
                <div class="notifications-header">
                    <div class="notifications-title">Notificaciones</div>
                </div>

                <?php foreach($notificaciones as $noti) {?>
                    <div class="notification-item unread" data-id="<?php echo $noti['id_seguidor'] ?>">
                        <div class="notification-avatar">
                            <img src="../../<?php echo $noti['foto_emisor'] ?>" alt="Avatar">
                        </div>
                        <div class="notification-content">
                            <div class="notification-text"><strong><?php echo $noti['nombre_emisor'] ?></strong><strong>  quiere ser tu amigo</strong>.</div>
                            <div class="notification-time"><?php echo $noti['fecha_seguimiento'] ?></div>
                        </div>
                        <div style="display: flex; flex-direction:column; gap: 5px;">
                            <button class="aceptar-btn" type="button">Aceptar</button>
                            <button class="rechazar-btn" type="button">Rechazar</button>
                        </div>
                        <div class="notification-dot"></div>
                    </div>
                <?php }?>

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
                <a href="<?php echo APP_URL . 'perfil?id=' . $_SESSION['id_usuario']; ?>" class="dropdown-item">
                    <i class="fas fa-user"></i> Mi perfil
                </a>
                <a href="<?php echo APP_URL; ?>configuracion" class="dropdown-item">
                    <i class="fas fa-cog"></i> Configuración
                </a>
                <a href="<?php echo APP_URL ?>views/partials/logout.php" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                </a>
            </div>
        </div>

        <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'Administrador'): ?>
            <a href="<?php echo APP_URL; ?>admin" class="header-nav-item <?php echo isset($url[0]) && $url[0] == 'admin' ? 'active' : ''; ?>">
                <i class="fas fa-cog"></i> <span>Admin</span>
            </a>
        <?php endif; ?>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Funcionalidad para el toggle de notificaciones
        const notificationsToggle = document.getElementById('notifications-toggle');
        const notificationsMenu = document.getElementById('notifications-menu');

        notificationsToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            notificationsMenu.style.display = notificationsMenu.style.display === 'block' ? 'none' : 'block';
        });

        // Cerrar el menú al hacer clic fuera
        document.addEventListener('click', function(e) {
            if (!notificationsMenu.contains(e.target) && e.target !== notificationsToggle) {
                notificationsMenu.style.display = 'none';
            }
        });


        // Funcionalidad para la barra de búsqueda
        const searchInput = document.querySelector('.search-input');
        searchInput.addEventListener('keyup', async (e) => {
            if (e.key === 'Enter') {
                const searchTerm = document.getElementById('search-input');

                if (searchTerm.value.trim().length < 3) {
                    alert('Ingresa mas de 3 caracteres');
                    return;
                }


                console.log('Enviando Formulario...');
                const response = await fetch("<?php echo  APP_URL; ?>controllers/BusquedaController.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        input: searchTerm.value
                    })
                });
                searchTerm.value = '';
                const data = await response.json();
                console.log('Data recibida...', data);

                if (data.length > 0) {
                    let html = '';
                    data.forEach(usuario => {
                        html += `
                                <div class="search-item" data-id="${usuario.id_usuario}">
                                    <div class="search-item-image">
                                        <img src="${usuario.foto_perfil}" alt="Usuario">
                                    </div>
                                    <div class="search-item-info">
                                        <div class="search-item-name">${usuario.nombre}</div>
                                        <button class="search-item-button" type="button">Enviar Solicitud</button>  
                                    </div>
                                </div>`;
                    });
                    searchResults.innerHTML = html;
                    searchResults.style.display = 'block';

                    // 🔁 Asignamos el evento manualmente a cada botón
                    const botones = document.querySelectorAll('.search-item-button');
                    botones.forEach(boton => {
                        boton.addEventListener('click', enviarSolicitud);
                    });

                } else {
                    searchResults.innerHTML = '<div class="no-results">No se encontraron usuarios</div>';
                    searchResults.style.display = 'block';
                }



            }
        });



        document.addEventListener('click', async (event)=>{
        if (event.target.classList.contains('aceptar-btn')) {

            const notificationItem = event.target.closest('.notification-item');
            const notiId = notificationItem.getAttribute('data-id');
            
            console.log('ID del seguidor:', notiId);

            const response = await fetch("<?= APP_URL ?>controllers/SolicitudController.php", {
                method:'POST',
                headers:{
                    "Content-Type":"application/json"
                },
                body: JSON.stringify({
                    notiId: notiId,
                    estado: 'Aceptada'
                })
            });

            const data = await response.json();

            if(data.tipo == 'success') {
                notificationItem.style.display = 'none'
            } 

        }
    });



        document.addEventListener('click', function(e) {
            if (!e.target.closest('.search-container')) {
                searchResults.style.display = 'none';
            }
        });


        async function enviarSolicitud(e) {
            const otherUser = e.currentTarget.closest('.search-item').dataset.id;

            const response = await fetch("<?= APP_URL ?>controllers/SolicitudController.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    otherUser,
                    estado: 'Enviar'
                })
            });

            const data = await response.json();

            if (data.tipo === "success") {
                Swal.fire({
                    icon: data.icono,
                    title: data.titulo,
                    text: data.texto,
                    timer: 1000,
                    confirmButtonText: 'Aceptar',
                    showConfirmButton: false
                });
            } else if (data.tipo === "error") {
                Swal.fire({
                    icon: data.icono,
                    title: data.titulo,
                    text: data.texto,
                    confirmButtonText: 'Aceptar'
                });
            }
        }



    });
</script>

<script>
    // Agregar al final del archivo nav-bar.php o en un script separado
    document.addEventListener('DOMContentLoaded', function() {
        // Para el botón de Crear
        const createDropdownToggle = document.querySelector('.dropdown .header-nav-item[href="#"]:not(.user-menu-item)');
        const createDropdownContent = createDropdownToggle.nextElementSibling;

        // Para el botón de Perfil
        const profileDropdownToggle = document.querySelector('.dropdown .user-menu-item');
        const profileDropdownContent = profileDropdownToggle.nextElementSibling;

        // Función para cerrar todos los menús desplegables
        function closeAllDropdowns() {
            document.querySelectorAll('.dropdown-content').forEach(dropdown => {
                dropdown.classList.remove('show');
            });
        }

        // Manejador para el botón de Crear
        createDropdownToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            // Cerrar el menú de perfil si está abierto
            profileDropdownContent.classList.remove('show');

            // Alternar la visibilidad del menú de crear
            createDropdownContent.classList.toggle('show');
        });

        // Manejador para el botón de Perfil
        profileDropdownToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            // Cerrar el menú de crear si está abierto
            createDropdownContent.classList.remove('show');

            // Alternar la visibilidad del menú de perfil
            profileDropdownContent.classList.toggle('show');
        });

        // Cerrar menús al hacer clic en cualquier parte del documento
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                closeAllDropdowns();
            }
        });
    });
</script>