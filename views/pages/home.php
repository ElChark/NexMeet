<?php require_once './views/partials/head.php' ?>
<?php require_once './views/partials/publicaciones-load.php' ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<body>
    <?php require_once './views/partials/nav-bar.php'; ?>

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
                        <p class="event-date"><i class="far fa-calendar-alt"></i> 15/05/2025</p>
                        <p class="event-category"><i class="fas fa-tag"></i> Deportes</p>
                        <button class="event-button ver-detalles" data-id="1">Ver detalles</button>
                    </div>

                    <div class="event-card">
                        <h4 class="event-title">Curso de programación</h4>
                        <p class="event-date"><i class="far fa-calendar-alt"></i> 20/06/2025</p>
                        <p class="event-category"><i class="fas fa-tag"></i> Tecnología</p>
                        <button class="event-button ver-detalles" data-id="2">Ver detalles</button>
                    </div>
                </div>
            </section>

            <!-- Explorar -->
            <!-- <section class="sidebar-section">
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
            </section> -->
        </aside>

        <!-- Contenido principal -->
        <main class="main-content">
            <!-- Historias -->
            <div class="stories-container">
                <div class="story-item" data-id="new" data-owner="Tú">
                    <div class="story-avatar no-story" style="position: relative;">
                        <img src="https://via.placeholder.com/60" alt="Tu avatar">
                        <div class="add-story">+</div>
                    </div>
                    <div class="story-username">Tu historia</div>
                </div>

                <div class="story-item" data-id="1" data-owner="Ana López">
                    <div class="story-avatar has-story">
                        <img src="https://via.placeholder.com/60/ff5e00" alt="Avatar de Ana">
                    </div>
                    <div class="story-username">Ana López</div>
                </div>

                <div class="story-item" data-id="2" data-owner="Carlos Pérez">
                    <div class="story-avatar has-story">
                        <img src="https://via.placeholder.com/60/00a2ff" alt="Avatar de Carlos">
                    </div>
                    <div class="story-username">Carlos Pérez</div>
                </div>

                <div class="story-item" data-id="3" data-owner="María García">
                    <div class="story-avatar has-story">
                        <img src="https://via.placeholder.com/60/a200ff" alt="Avatar de María">
                    </div>
                    <div class="story-username">María García</div>
                </div>

                <div class="story-item" data-id="4" data-owner="Juan Rodríguez">
                    <div class="story-avatar has-story">
                        <img src="https://via.placeholder.com/60/00ba21" alt="Avatar de Juan">
                    </div>
                    <div class="story-username">Juan Rodríguez</div>
                </div>

                <div class="story-item" data-id="5" data-owner="Laura Martínez">
                    <div class="story-avatar has-story">
                        <img src="https://via.placeholder.com/60/ffd900" alt="Avatar de Laura">
                    </div>
                    <div class="story-username">Laura Martínez</div>
                </div>

                <div class="story-item" data-id="6" data-owner="Miguel Sánchez">
                    <div class="story-avatar has-story">
                        <img src="https://via.placeholder.com/60/ff00d4" alt="Avatar de Miguel">
                    </div>
                    <div class="story-username">Miguel Sánchez</div>
                </div>
            </div>

            <!-- Filtros de categoría -->
            <section class="category-filters">
                <div class="filter-buttons">
                    <button class="filter-button active" data-category="all">Todos</button>
                    <button class="filter-button" data-category="deportes">Deportes</button>
                    <button class="filter-button" data-category="musica">Música</button>
                    <button class="filter-button" data-category="arte">Arte</button>
                    <button class="filter-button" data-category="tecnologia">Tecnología</button>
                    <button class="filter-button" data-category="viajes">Viajes</button>
                    <button class="filter-button" data-category="gastronomia">Gastronomía</button>
                    <button class="filter-button" data-category="educacion">Educación</button>
                    <button class="filter-button" data-category="networking">Networking</button>
                </div>
            </section>

            <!-- Crear publicación -->
            <!-- <section class="create-post">
                <div class="create-post-header">
                    <div class="avatar">
                        <img src="https://via.placeholder.com/40" alt="Avatar">
                    </div>
                    <input type="text" class="create-post-input" placeholder="¿Qué evento quieres compartir?" id="create-post-trigger" readonly>
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
                                    <option value="educacion">Educación</option>
                                    <option value="networking">Networking</option>
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
             -->
            <!-- Eventos sugeridos -->
            <section id="eventos-sugeridos">
                <!-- Post 1 -->

                <?php foreach ($publicaciones as $publicacion): ?>
                    <article class="post" data-id="<?= $publicacion['id_publicacion'] ?>" data-category="deportes">
                        <div class="post-header">
                            <div class="post-author">
                                <div class="post-avatar">
                                    <img src="https://via.placeholder.com/40/1877f2" alt="Avatar">
                                </div>
                                <div class="post-info">
                                    <div class="post-author-name">Usuario #<?= $publicacion['id_usuario'] ?></div>
                                    <div class="post-time"><?= date('d/m/Y', strtotime($publicacion['fecha_publicacion'])) ?></div>
                                </div>
                            </div>
                            <div class="post-more">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>

                        <img src="../../ajax/<?= $publicacion['foto_portada'] ?>" alt="Imagen del evento" class="post-image">

                        <div class="post-content">
                            <h3 class="post-title"><?= $publicacion['titulo'] ?></h3>
                            <p class="post-description"><?= $publicacion['contenido'] ?></p>
                            <div class="post-details">
                                <p><i class="far fa-calendar-alt"></i> <strong>Fecha:</strong> <?= date('d/m/Y', strtotime($publicacion['fecha_publicacion'])) ?></p>
                            </div>
                        </div>

                        <div class="post-stats">
                            <div class="post-likes">
                                <i class="fas fa-thumbs-up"></i> 0 Me gusta
                            </div>
                            <div class="post-comments-count">0 comentarios</div>
                        </div>

                        <div class="post-actions">
                            <div class="post-action like-action" data-id="<?= $publicacion['id_publicacion'] ?>">
                                <i class="far fa-thumbs-up"></i>
                                <span>Me gusta</span>
                            </div>
                            <div class="post-action comment-action" data-id="<?= $publicacion['id_publicacion'] ?>">
                                <i class="far fa-comment-alt"></i>
                                <span>Comentar</span>
                            </div>
                            <div class="post-action attend-action" data-id="<?= $publicacion['id_publicacion'] ?>">
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
                <?php endforeach; ?>





            </section>
        </main>
        <!-- Sidebar derecha -->
        <aside class="sidebar-right">
            <!-- Perfil -->
            <!-- <section class="sidebar-section profile-card">
                <div class="profile-header">
                    <div class="profile-avatar">
                        <img src="https://via.placeholder.com/60" alt="Avatar de perfil">
                    </div>
                    <div class="profile-info">
                        <div class="profile-name"><?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Usuario'; ?></div>
                        <div class="profile-email"><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'email@ejemplo.com'; ?></div>
                    </div>
                </div>

                <ul class="profile-details">
                    <li class="profile-item">
                        <div class="profile-item-label">Eventos:</div>
                        <div class="profile-item-value">12 creados</div>
                    </li>
                    <li class="profile-item">
                        <div class="profile-item-label">Asistiendo:</div>
                        <div class="profile-item-value">8 eventos</div>
                    </li>
                    <li class="profile-item">
                        <div class="profile-item-label">Tipo:</div>
                        <div class="profile-item-value"><?php echo isset($_SESSION['tipo']) ? $_SESSION['tipo'] : 'usuario'; ?></div>
                    </li>
                </ul>

                <div style="text-align: center; margin-top: 10px;">
                    <a href="<?php echo APP_URL; ?>perfil" class="btn btn-primary" style="width: 100%;">
                        <i class="fas fa-user-edit"></i> Editar perfil
                    </a>
                </div>
            </section> -->

            <!-- Eventos populares -->
            <section class="sidebar-section popular-events">
                <h3 class="sidebar-heading">Eventos populares</h3>

                <div class="event-card">
                    <h4 class="event-title">Festival de Cine</h4>
                    <p class="event-description">Proyección de películas independientes y premiadas internacionalmente</p>
                    <p class="event-date"><i class="far fa-calendar-alt"></i> 10/06/2025</p>
                    <p><i class="fas fa-map-marker-alt"></i> Centro Cultural Metropolitano</p>
                </div>

                <div class="event-card">
                    <h4 class="event-title">Feria del Libro</h4>
                    <p class="event-description">Presentaciones de autores y venta de libros con descuentos especiales</p>
                    <p class="event-date"><i class="far fa-calendar-alt"></i> 15/07/2025</p>
                    <p><i class="fas fa-map-marker-alt"></i> Parque Central</p>
                </div>

                <div class="event-card">
                    <h4 class="event-title">Maratón Urbana</h4>
                    <p class="event-description">Recorrido de 42km por las principales avenidas de la ciudad</p>
                    <p class="event-date"><i class="far fa-calendar-alt"></i> 22/08/2025</p>
                    <p><i class="fas fa-map-marker-alt"></i> Plaza Principal</p>
                </div>
            </section>

            <!-- Sugerencias de personas -->
            <!-- <section class="sidebar-section">
                <h3 class="sidebar-heading">Personas que quizás conozcas</h3>

                <div style="display: flex; align-items: center; margin-bottom: 15px;">
                    <div class="avatar" style="margin-right: 10px;">
                        <img src="https://via.placeholder.com/40/9c27b0" alt="Avatar">
                    </div>
                    <div style="flex: 1;">
                        <div style="font-weight: 600; font-size: 14px;">Laura Sánchez</div>
                        <div style="font-size: 12px; color: #65676b;">5 eventos en común</div>
                    </div>
                    <button class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">Seguir</button>
                </div>

                <div style="display: flex; align-items: center; margin-bottom: 15px;">
                    <div class="avatar" style="margin-right: 10px;">
                        <img src="https://via.placeholder.com/40/3f51b5" alt="Avatar">
                    </div>
                    <div style="flex: 1;">
                        <div style="font-weight: 600; font-size: 14px;">Carlos Méndez</div>
                        <div style="font-size: 12px; color: #65676b;">3 eventos en común</div>
                    </div>
                    <button class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">Seguir</button>
                </div>

                <div style="display: flex; align-items: center;">
                    <div class="avatar" style="margin-right: 10px;">
                        <img src="https://via.placeholder.com/40/ff9800" alt="Avatar">
                    </div>
                    <div style="flex: 1;">
                        <div style="font-weight: 600; font-size: 14px;">Ana Torres</div>
                        <div style="font-size: 12px; color: #65676b;">7 eventos en común</div>
                    </div>
                    <button class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">Seguir</button>
                </div>
            </section> -->
        </aside>
    </div>

    <!-- Modal de detalles de evento -->
    <div class="modal-backdrop" id="event-details-modal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); display: none; justify-content: center; align-items: center; z-index: 1000;">
        <div class="modal" style="background: white; border-radius: 10px; width: 90%; max-width: 700px; max-height: 90vh; overflow: hidden; display: flex; flex-direction: column;">
            <div class="modal-header" style="display: flex; justify-content: space-between; align-items: center; padding: 15px 20px; border-bottom: 1px solid #e4e6eb;">
                <div class="modal-title" id="evento-detalle-titulo" style="font-weight: 600; font-size: 20px;">Detalles del evento</div>
                <button class="modal-close" id="modal-close" style="background: none; border: none; font-size: 22px; cursor: pointer; color: #65676b;">&times;</button>
            </div>

            <div class="modal-body" style="padding: 20px; overflow-y: auto; flex: 1;">
                <div class="modal-section" style="margin-bottom: 20px;">
                    <h4 class="modal-section-title" style="font-size: 16px; font-weight: 600; margin-bottom: 10px;">Descripción</h4>
                    <p id="evento-detalle-descripcion">Descripción del evento</p>
                </div>

                <div class="modal-section" style="margin-bottom: 20px;">
                    <h4 class="modal-section-title" style="font-size: 16px; font-weight: 600; margin-bottom: 10px;">Organizador</h4>
                    <div class="modal-section-content" style="background-color: #f0f2f5; padding: 15px; border-radius: 8px;">
                        <p>Nombre: <span id="nombreOrganizador">Nombre del organizador</span></p>
                    </div>
                </div>

                <div class="modal-section" style="margin-bottom: 20px;">
                    <h4 class="modal-section-title" style="font-size: 16px; font-weight: 600; margin-bottom: 10px;">Detalles</h4>
                    <div class="modal-section-content" style="background-color: #f0f2f5; padding: 15px; border-radius: 8px;">
                        <p>Fecha: <span id="evento-detalle-fecha">Fecha del evento</span></p>
                        <p>Categoría: <span id="evento-detalle-categoria">Categoría del evento</span></p>
                        <p>Ubicación: <span id="evento-detalle-ubicacion">Ubicación del evento</span></p>
                        <p>Me gusta: <span id="evento-detalle-likes">0</span></p>
                    </div>
                </div>

                <div class="modal-section">
                    <h4 class="modal-section-title" style="font-size: 16px; font-weight: 600; margin-bottom: 10px;">Comentarios</h4>
                    <div id="comentarios" class="modal-comments" style="max-height: 200px; overflow-y: auto; margin-top: 15px;">
                        <div class="comment" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #e4e6eb;">
                            <span class="comment-author" style="font-weight: 600; margin-right: 5px;">Juan Pérez:</span>
                            <span>¡Este evento está increíble!</span>
                        </div>
                        <div class="comment" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #e4e6eb;">
                            <span class="comment-author" style="font-weight: 600; margin-right: 5px;">Ana López:</span>
                            <span>Me parece una gran oportunidad para conocer gente nueva.</span>
                        </div>
                    </div>

                    <div class="modal-comment-form" style="display: flex; margin-top: 15px; gap: 10px;">
                        <input type="text" id="nuevoComentario" class="modal-comment-input" placeholder="Escribe un comentario..." style="flex: 1; border: 1px solid #e4e6eb; border-radius: 20px; padding: 8px 15px; outline: none; font-size: 14px;">
                        <button id="enviarComentario" class="modal-comment-btn" data-evento-id="" style="background-color: #1877f2; color: #fff; border: none; border-radius: 6px; padding: 0 15px; font-weight: 500; cursor: pointer;">Comentar</button>
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
                        document.getElementById('evento-detalle-descripcion').textContent = 'Ven y participa en nuestro torneo mensual de fútbol 5vs5. ¡Habrá premios para los ganadores! Inscribe a tu equipo antes del 10 de mayo.';
                        document.getElementById('nombreOrganizador').textContent = 'Club Deportivo Local';
                        document.getElementById('evento-detalle-fecha').textContent = '15/05/2025';
                        document.getElementById('evento-detalle-categoria').textContent = 'Deportes';
                        document.getElementById('evento-detalle-likes').textContent = '42';
                        document.getElementById('evento-detalle-ubicacion').textContent = 'Campo Municipal, Calle Principal #123';
                    } else if (eventoId === '2') {
                        document.getElementById('evento-detalle-titulo').textContent = 'Concierto de música clásica';
                        document.getElementById('evento-detalle-descripcion').textContent = 'Disfruta de una velada con las mejores piezas de Mozart y Beethoven interpretadas por la Orquesta Filarmónica de la ciudad. Una experiencia única para los amantes de la música clásica.';
                        document.getElementById('nombreOrganizador').textContent = 'Asociación Cultural Música Viva';
                        document.getElementById('evento-detalle-fecha').textContent = '20/05/2025';
                        document.getElementById('evento-detalle-categoria').textContent = 'Música';
                        document.getElementById('evento-detalle-likes').textContent = '18';
                        document.getElementById('evento-detalle-ubicacion').textContent = 'Auditorio Municipal, Avenida Central #456';
                    } else if (eventoId === '3') {
                        document.getElementById('evento-detalle-titulo').textContent = 'Hackathon 2025: Innovación y Tecnología';
                        document.getElementById('evento-detalle-descripcion').textContent = 'Participa en nuestro Hackathon anual donde desarrolladores, diseñadores y emprendedores se reúnen para crear soluciones innovadoras. Este año el tema es "Tecnología para el bienestar".';
                        document.getElementById('nombreOrganizador').textContent = 'TechMeetup';
                        document.getElementById('evento-detalle-fecha').textContent = '10/06/2025 - 12/06/2025';
                        document.getElementById('evento-detalle-categoria').textContent = 'Tecnología';
                        document.getElementById('evento-detalle-likes').textContent = '64';
                        document.getElementById('evento-detalle-ubicacion').textContent = 'Centro de Innovación Digital, Plaza Tecnológica #789';
                    }

                    eventDetailsModal.style.display = 'flex';
                });
            });

            // Cerrar modal
            modalClose.addEventListener('click', function() {
                eventDetailsModal.style.display = 'none';
            });

            // Cerrar modal al hacer clic fuera de su contenido
            eventDetailsModal.addEventListener('click', function(e) {
                if (e.target === eventDetailsModal) {
                    eventDetailsModal.style.display = 'none';
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
                    comentarioDiv.style = 'margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #e4e6eb;';
                    comentarioDiv.innerHTML = `
                        <span class="comment-author" style="font-weight: 600; margin-right: 5px;"><?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Usuario'; ?>:</span>
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
                        const post = button.closest('.post');
                        const commentsCountEl = post.querySelector('.post-comments-count');
                        const currentCount = parseInt(commentsCountEl.textContent);

                        // Actualizar contador de comentarios
                        commentsCountEl.textContent = `${currentCount + 1} comentarios`;

                        // Agregar el comentario visualmente (en un sistema real, enviarías esto al servidor)
                        Swal.fire({
                            icon: 'success',
                            title: 'Comentario publicado',
                            text: 'Tu comentario ha sido añadido correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        });

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

                        Swal.fire({
                            icon: 'success',
                            title: '¡Asistencia confirmada!',
                            text: 'Has confirmado tu asistencia al evento',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        // Cancelar asistencia
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        this.classList.remove('active');

                        Swal.fire({
                            icon: 'info',
                            title: 'Asistencia cancelada',
                            text: 'Has cancelado tu asistencia al evento',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            });

            // Filtros de categoría
            const categoryButtons = document.querySelectorAll('.filter-button');
            const eventPosts = document.querySelectorAll('.post');

            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');

                    // Resetear estado de todos los botones
                    categoryButtons.forEach(btn => btn.classList.remove('active'));

                    // Activar este botón
                    this.classList.add('active');

                    // Filtrar eventos
                    eventPosts.forEach(post => {
                        if (category === 'all' || post.getAttribute('data-category') === category) {
                            post.style.display = 'block';
                        } else {
                            post.style.display = 'none';
                        }
                    });
                });
            });

            // Envío del formulario de evento
            const eventoForm = document.getElementById('evento-form');

            eventoForm.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    icon: 'success',
                    title: '¡Evento creado!',
                    text: 'Tu evento ha sido publicado correctamente',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Resetear y cerrar formulario
                        createPostForm.classList.remove('active');
                        this.reset();
                        window.location.reload();
                    }
                });
            });

            // Manejo de historias
            const storyItems = document.querySelectorAll('.story-item');

            storyItems.forEach(item => {
                item.addEventListener('click', function() {
                    const storyId = this.getAttribute('data-id');
                    const storyOwner = this.getAttribute('data-owner');

                    if (storyId === 'new') {
                        // Modal para crear nueva historia
                        Swal.fire({
                            title: 'Crear nueva historia',
                            html: `
                                <div style="text-align: left; margin-bottom: 15px;">
                                    <label for="story-content" style="display: block; margin-bottom: 5px; font-weight: 500;">Contenido:</label>
                                    <textarea id="story-content" class="swal2-input" placeholder="¿Qué quieres compartir?" style="height: 100px;"></textarea>
                                </div>
                                <div style="text-align: left;">
                                    <label for="story-image" style="display: block; margin-bottom: 5px; font-weight: 500;">Imagen (opcional):</label>
                                    <input type="file" id="story-image" class="swal2-file" accept="image/*">
                                </div>
                            `,
                            showCancelButton: true,
                            confirmButtonText: 'Publicar',
                            cancelButtonText: 'Cancelar',
                            showLoaderOnConfirm: true,
                            preConfirm: () => {
                                const content = document.getElementById('story-content').value;
                                if (!content.trim()) {
                                    Swal.showValidationMessage('Por favor, ingresa algo para compartir');
                                    return false;
                                }
                                return {
                                    content
                                };
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡Historia publicada!',
                                    text: 'Tu historia estará visible durante 24 horas',
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                            }
                        });
                    } else {
                        // Ver historia existente
                        Swal.fire({
                            title: storyOwner,
                            imageUrl: `https://via.placeholder.com/500x800?text=Historia+de+${storyOwner}`,
                            imageWidth: 400,
                            imageHeight: 600,
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            footer: '<div style="text-align: center; width: 100%;"><input type="text" placeholder="Enviar mensaje..." style="width: 80%; padding: 8px; border-radius: 20px; border: 1px solid #ccc;"></div>'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>