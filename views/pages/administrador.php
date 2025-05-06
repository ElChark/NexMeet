<?php require_once './views/partials/load.php' ?>
<?php require_once './views/partials/head.php' ?>

<style>
    :root {
        --primary-color: #ff5a5f;
        --secondary-color: #00a699;
        --dark-gray: #484848;
        --medium-gray: #767676;
        --light-gray: #f7f7f7;
        --text-color: #484848;
        --sidebar-width: 250px;
        --header-height: 60px;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        color: var(--text-color);
        background-color: #f9f9f9;
    }

    /* Contenedor principal que ajusta el contenido bajo el header */
    .admin-container {
        display: flex;
        min-height: calc(100vh - var(--header-height));
        margin-top: var(--header-height);
    }

    /* Sidebar de navegación para administración */
    .admin-sidebar {
        width: var(--sidebar-width);
        background-color: white;
        border-right: 1px solid #e4e6eb;
        padding: 20px 0;
        height: calc(100vh - var(--header-height));
        position: fixed;
        overflow-y: auto;
    }

    .admin-sidebar-section {
        margin-bottom: 25px;
    }

    .admin-sidebar-title {
        color: var(--medium-gray);
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 0 20px;
        margin-bottom: 10px;
    }

    .admin-sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .admin-sidebar-item {
        padding: 0;
    }

    .admin-sidebar-link {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        color: var(--dark-gray);
        text-decoration: none;
        transition: all 0.2s;
    }

    .admin-sidebar-link:hover {
        background-color: var(--light-gray);
        color: var(--primary-color);
    }

    .admin-sidebar-link.active {
        background-color: #fff5f5;
        color: var(--primary-color);
        border-left: 3px solid var(--primary-color);
    }

    .admin-sidebar-link i {
        width: 20px;
        margin-right: 10px;
        text-align: center;
    }

    /* Área de contenido principal */
    .admin-content {
        flex: 1;
        padding: 20px;
        margin-left: var(--sidebar-width);
    }

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .admin-title {
        font-size: 24px;
        font-weight: 600;
        color: var(--dark-gray);
    }

    .admin-actions {
        display: flex;
        gap: 10px;
    }

    .admin-button {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: background-color 0.2s;
    }

    .admin-button:hover {
        background-color: #e04a4f;
    }

    .admin-button.secondary {
        background-color: white;
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
    }

    .admin-button.secondary:hover {
        background-color: #fff5f5;
    }

    /* Tarjetas para dashboard */
    .admin-stats {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background-color: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .stat-title {
        color: var(--medium-gray);
        font-size: 14px;
        margin-bottom: 5px;
    }

    .stat-value {
        font-size: 24px;
        font-weight: 600;
        color: var(--dark-gray);
    }

    .stat-change {
        font-size: 12px;
        color: #00a699;
        display: flex;
        align-items: center;
        margin-top: 5px;
    }

    .stat-change.positive {
        color: #00a699;
    }

    .stat-change.negative {
        color: var(--primary-color);
    }

    /* Panel de contenido para listas y reportes */
    .content-panel {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .panel-header {
        padding: 15px 20px;
        border-bottom: 1px solid #e4e6eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .panel-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--dark-gray);
    }

    .panel-actions {
        display: flex;
        gap: 10px;
    }

    .panel-body {
        padding: 20px;
    }

    /* Formulario de búsqueda */
    .search-form {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .search-input {
        flex: 1;
        padding: 10px 15px;
        border: 1px solid #e4e6eb;
        border-radius: 4px;
        font-size: 14px;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(255, 90, 95, 0.2);
    }

    /* Tabla de datos */
    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        text-align: left;
        padding: 12px 15px;
        border-bottom: 1px solid #e4e6eb;
        color: var(--medium-gray);
        font-weight: 500;
    }

    .data-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #e4e6eb;
    }

    .data-table tr:last-child td {
        border-bottom: none;
    }

    .data-table tr:hover {
        background-color: #f9f9f9;
    }

    /* Estilos para botones de acción */
    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .action-button {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .action-button:hover {
        background-color: var(--light-gray);
    }

    .action-button.edit {
        color: #00a699;
    }

    .action-button.delete {
        color: var(--primary-color);
    }

    .action-button.view {
        color: #767676;
    }

    /* Estilos para badges */
    .status-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-badge.active {
        background-color: #e6f7f5;
        color: #00a699;
    }

    .status-badge.inactive {
        background-color: #fff5f5;
        color: var(--primary-color);
    }

    .status-badge.pending {
        background-color: #fff8e6;
        color: #f5a623;
    }

    /* Paginación */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        gap: 5px;
    }

    .pagination-item {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.2s;
        color: var(--medium-gray);
    }

    .pagination-item:hover {
        background-color: var(--light-gray);
    }

    .pagination-item.active {
        background-color: var(--primary-color);
        color: white;
    }

    /* Toggle Switch */
    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 24px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 24px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked+.toggle-slider {
        background-color: var(--secondary-color);
    }

    input:checked+.toggle-slider:before {
        transform: translateX(20px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .admin-sidebar {
            width: 60px;
            overflow: hidden;
        }

        .admin-sidebar-link span {
            display: none;
        }

        .admin-sidebar-title {
            display: none;
        }

        .admin-content {
            margin-left: 60px;
        }

        .admin-stats {
            grid-template-columns: 1fr;
        }
    }
</style>
<body>
    <?php require_once './views/partials/nav-bar.php'; ?>

    <div class="admin-container">
        <!-- Sidebar de navegación para administración -->
        <div class="admin-sidebar">
            <div class="admin-sidebar-section">
                <div class="admin-sidebar-title">General</div>
                <ul class="admin-sidebar-menu">
                    <li class="admin-sidebar-item">
                        <a href="#" class="admin-sidebar-link active">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="admin-sidebar-section">
                <div class="admin-sidebar-title">Gestión de usuarios</div>
                <ul class="admin-sidebar-menu">
                    <li class="admin-sidebar-item">
                        <a href="#" class="admin-sidebar-link">
                            <i class="fas fa-users"></i>
                            <span>Usuarios</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="admin-sidebar-section">
                <div class="admin-sidebar-title">Contenido</div>
                <ul class="admin-sidebar-menu">
                    <li class="admin-sidebar-item">
                        <a href="#" class="admin-sidebar-link">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Eventos</span>
                        </a>
                    </li>
                    <li class="admin-sidebar-item">
                        <a href="#" class="admin-sidebar-link">
                            <i class="fas fa-file-alt"></i>
                            <span>Publicaciones</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Área de contenido principal -->
        <div class="admin-content">
            <!-- Tarjetas de estadísticas -->
            <div class="admin-stats">
            </div>

            <!-- Lista de usuarios -->
            <div class="content-panel">
                <div class="panel-header">
                    <h2 class="panel-title">Gestión de usuarios</h2>
                </div>
                <div class="panel-body">
                    <form class="search-form">
                        <input type="text" class="search-input" placeholder="Buscar usuarios por nombre, email o ID...">
                        <button type="submit" class="admin-button">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </form>

                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Fecha registro</th>
                                <th>Último acceso</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($usuarios as $usuario) {?>
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <div style="width: 36px; height: 36px; border-radius: 50%; overflow: hidden;">
                                                <img src="../ajax/<?php echo isset($usuario['foto_perfil']) ? $usuario['foto_perfil'] : 'images/perfilPrueba.jpg' ?>" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                            <div>
                                                <div style="font-weight: 500;"><?php echo $usuario['nombre'] ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $usuario['email'] ?></td>
                                    <td><?php echo $usuario['fecha_reigstro'] ?></td>
                                    <td>Hace 2 horas</td>
                                    <td>

                                            <span class="status-badge <?php echo $usuario['estado']==1 ? 'active' : 'inactive' ?>"><?php echo $usuario['estado']==1 ? 'Activo' : 'Inactivo' ?></span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <label class="toggle-switch" title="Habilitar/Deshabilitar usuario">
                                                <input type="checkbox" <?php echo $usuario['estado'] == 1 ? 'checked' : ''?> >
                                                <span class="toggle-slider"></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>

                    <div class="pagination">
                        <div class="pagination-item">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="pagination-item active">1</div>
                        <div class="pagination-item">2</div>
                        <div class="pagination-item">3</div>
                        <div class="pagination-item">4</div>
                        <div class="pagination-item">5</div>
                        <div class="pagination-item">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lista de eventos -->
            <div class="content-panel">
                <div class="panel-header">
                    <h2 class="panel-title">Eventos recientes</h2>
                    <div class="panel-actions">
                    </div>
                </div>
                <div class="panel-body">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Evento</th>
                                <th>Organizador</th>
                                <th>Fecha de publicacion</th>
                                <th>Asistentes</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>


                                <td>
                                    <div style="font-weight: 500;">Festival de Música</div>
                                    <div style="font-size: 12px; color: var(--medium-gray);">ID: EVT-2589</div>
                                </td>
                                <td>Ana López</td>
                                <td>28/04/2025</td>
                                <td>187</td>
                                <td>
                                    <span class="status-badge active">Activo</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <div class="action-button delete" title="Eliminar evento">
                                            <i class="fas fa-trash-alt"></i>
                                        </div>
                                    </div>
                                </td>


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Lista de publicaciones -->
            <div class="content-panel">
                <div class="panel-header">
                    <h2 class="panel-title">Publicaciones recientes</h2>
                </div>
                <div class="panel-body">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Fecha de publicacion</th>
                                <th>Interacciones</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div style="font-weight: 500;">Cómo encontrar eventos interesantes</div>
                                    <div style="font-size: 12px; color: var(--medium-gray);">ID: POST-5678</div>
                                </td>
                                <td>Ana López</td>
                                <td>18/04/2025</td>
                                <td>52</td>
                                <td>
                                    <span class="status-badge active">Publicado</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <div class="action-button delete" title="Eliminar publicación">
                                            <i class="fas fa-trash-alt"></i>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script para funcionamiento de toggle de estado de usuario
        document.addEventListener('DOMContentLoaded', function() {
            const toggleSwitches = document.querySelectorAll('.toggle-switch input');

            toggleSwitches.forEach(switc => {
                switc.addEventListener('change', function() {
                    const row = this.closest('tr');
                    const userName = row.querySelector('div[style="font-weight: 500;"]').textContent;
                    const statusBadge = row.querySelector('.status-badge');

                    if (this.checked) {
                        Swal.fire({
                            title: "Habilitar usuario",
                            text: "Estas seguro que deseas habilitar a este usuario",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, habilitar!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const fetchOpt = {
                                    method: 'POST',
                                    headers: {
                                        'Content-type': 'Application/json'
                                    },
                                    body: JSON.stringify({name: userName, accion: 'Habilitar'})
                                }

                                fetch('../../ajax/estadoUsuario-ajax.php', fetchOpt)
                                    .then(res => res.json())
                                    .then(data => {
                                        if(data.tipo === "success") {
                                            Swal.fire({
                                                title: data.title,
                                                text: `El usuario ha ${userName} sido habilitado`,
                                                icon: data.icon
                                            });

                                            statusBadge.textContent = 'Activo';
                                            statusBadge.className = 'status-badge active';
                                            console.log(`Usuario ${userName} habilitado`);

                                        } else {
                                            Swal.fire({
                                                title: "Error",
                                                text: `Ha ocurrido un error a la hora de cambiar el estado del usuario`,
                                                icon: "error"
                                            });
                                        }
                                    })

                            }
                        });
                    } else {

                        Swal.fire({
                            title: "Deshabilitar usuario",
                            text: "Estas seguro que deseas deshabilitar a este usuario",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, deshabilitar!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const fetchOpt = {
                                    method: 'POST',
                                    headers: {
                                        'Content-type': 'Application/json'
                                    },
                                    body: JSON.stringify({name: userName, accion: 'Deshabilitar'})
                                }

                                fetch('../../ajax/estadoUsuario-ajax.php', fetchOpt)
                                    .then(res => res.json())
                                    .then(data => {
                                        if(data.tipo === "success") {
                                            Swal.fire({
                                                title: data.title,
                                                text: `El usuario ha ${userName} sido deshabilitado`,
                                                icon: data.icon
                                            });

                                            statusBadge.textContent = 'Inactivo';
                                            statusBadge.className = 'status-badge inactive';
                                            console.log(`Usuario ${userName} deshabilitado`);

                                        } else {
                                            Swal.fire({
                                                title: "Error",
                                                text: `Ha ocurrido un error a la hora de cambiar el estado del usuario`,
                                                icon: "error"
                                            });
                                        }
                                    })

                            }
                        });
                    }
                });
            });

            // Implementación de la funcionalidad de búsqueda
            const searchForm = document.querySelector('.search-form');
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const searchTerm = this.querySelector('.search-input').value.trim().toLowerCase();

                if (!searchTerm) return;

                const tableRows = document.querySelectorAll('.data-table tbody tr');

                tableRows.forEach(row => {
                    const userName = row.querySelector('div[style="font-weight: 500;"]').textContent.toLowerCase();
                    const userEmail = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

                    if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>