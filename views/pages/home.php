<?php require_once './views/partials/head.php' ?>
<?php require_once './views/partials/session-start.php' ?>

<body>
    <?php require_once './views/partials/nav-bar.php'; ?>

    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Sidebar izquierda -->
        <aside class="sidebar-left">
                        <!-- Eventos populares -->
            <div class="popular-events-container">
                <h3 class="sidebar-heading">Eventos populares</h3>
                
                <div class="event-mini-card">
                    <div class="event-mini-image">
                        <img src="https://via.placeholder.com/100/ff5a5f/ffffff?text=Evento" alt="Evento">
                    </div>
                    <div class="event-mini-info">
                        <h4>Festival de Cine</h4>
                        <p><i class="far fa-calendar-alt"></i> 10/06/2025</p>
                    </div>
                </div>
                
                <div class="event-mini-card">
                    <div class="event-mini-image">
                        <img src="https://via.placeholder.com/100/00a699/ffffff?text=Evento" alt="Evento">
                    </div>
                    <div class="event-mini-info">
                        <h4>Feria del Libro</h4>
                        <p><i class="far fa-calendar-alt"></i> 15/07/2025</p>
                    </div>
                </div>
                
                <a href="<?php echo APP_URL; ?>explorar" class="see-more-link">Ver más eventos <i class="fas fa-chevron-right"></i></a>
            </div>
        </aside>
        
        <!-- Contenido principal -->
        <main class="main-content">
            <!-- Historias -->
            <div class="stories-container">
                <div class="story-item" data-id="new">
                    <div class="story-avatar-container your-story">
                        <div class="story-avatar">
                            <img src="https://via.placeholder.com/60" alt="Tu avatar">
                        </div>
                        <div class="add-story">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                    <div class="story-username">Tu historia</div>
                </div>
                
                <div class="story-item" data-id="1">
                    <div class="story-avatar-container has-story">
                        <div class="story-avatar">
                            <img src="https://via.placeholder.com/60/ff5e00" alt="Avatar de Ana">
                        </div>
                    </div>
                    <div class="story-username">Ana</div>
                </div>
                
                <div class="story-item" data-id="2">
                    <div class="story-avatar-container has-story">
                        <div class="story-avatar">
                            <img src="https://via.placeholder.com/60/00a2ff" alt="Avatar de Carlos">
                        </div>
                    </div>
                    <div class="story-username">Carlos</div>
                </div>
                
                <div class="story-item" data-id="3">
                    <div class="story-avatar-container has-story">
                        <div class="story-avatar">
                            <img src="https://via.placeholder.com/60/a200ff" alt="Avatar de María">
                        </div>
                    </div>
                    <div class="story-username">María</div>
                </div>
                
                <div class="story-item" data-id="4">
                    <div class="story-avatar-container has-story">
                        <div class="story-avatar">
                            <img src="https://via.placeholder.com/60/00ba21" alt="Avatar de Juan">
                        </div>
                    </div>
                    <div class="story-username">Juan</div>
                </div>
                
                <div class="story-item" data-id="5">
                    <div class="story-avatar-container has-story">
                        <div class="story-avatar">
                            <img src="https://via.placeholder.com/60/ffd900" alt="Avatar de Laura">
                        </div>
                    </div>
                    <div class="story-username">Laura</div>
                </div>
                
                <div class="story-item" data-id="6">
                    <div class="story-avatar-container has-story">
                        <div class="story-avatar">
                            <img src="https://via.placeholder.com/60/ff00d4" alt="Avatar de Miguel">
                        </div>
                    </div>
                    <div class="story-username">Miguel</div>
                </div>
            </div>
            
            <!-- Crear publicación -->
            <div class="create-post">
                <div class="create-post-header">
                    <div class="user-avatar">
                        <img src="https://via.placeholder.com/40" alt="Avatar">
                    </div>
                    <div class="create-post-input" id="create-post-trigger">
                        <span>¿Qué evento quieres compartir?</span>
                    </div>
                </div>
                
                <div class="create-post-actions">
                    <a href="<?php echo APP_URL; ?>crearevento" class="create-action">
                        <i class="fas fa-calendar-plus"></i> Evento
                    </a>
                    <a href="<?php echo APP_URL; ?>publicacion" class="create-action">
                        <i class="fas fa-image"></i> Publicación
                    </a>
                    <a href="#" class="create-action">
                        <i class="fas fa-video"></i> Historia
                    </a>
                </div>
            </div>
            
            <!-- Feed de eventos -->
            <div class="events-feed">
                <!-- Post 1 -->
                <article class="post" data-id="1" data-category="deportes">
                    <div class="post-header">
                        <div class="post-author">
                            <div class="post-avatar">
                                <img src="https://via.placeholder.com/40/1877f2" alt="Avatar">
                            </div>
                            <div class="post-info">
                                <div class="post-author-name">Club Deportivo Local</div>
                                <div class="post-time">2h</div>
                            </div>
                        </div>
                        <div class="post-more">
                            <i class="fas fa-ellipsis"></i>
                        </div>
                    </div>
                    
                    <div class="post-image-container">
                        <img src="https://via.placeholder.com/800x600/1877f2/ffffff?text=Torneo+de+Fútbol" alt="Imagen del evento" class="post-image">
                    </div>
                    
                    <div class="post-actions">
                        <div class="post-action like-action" data-id="1">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="post-action comment-action" data-id="1">
                            <i class="far fa-comment"></i>
                        </div>
                        <div class="post-action attend-action" data-id="1">
                            <i class="far fa-calendar-check"></i>
                        </div>
                        <div class="post-action share-action">
                            <i class="far fa-paper-plane"></i>
                        </div>
                        <div class="post-action save-action">
                            <i class="far fa-bookmark"></i>
                        </div>
                    </div>
                    
                    <div class="post-likes">
                        <span>42 Me gusta</span>
                    </div>
                    
                    <div class="post-content">
                        <div class="post-caption">
                            <span class="post-author-name">Club Deportivo Local</span>
                            <span class="post-description">Torneo de fútbol amateur - Ven y participa en nuestro torneo mensual de fútbol 5vs5. ¡Habrá premios para los ganadores! Inscribe a tu equipo antes del 10 de mayo.</span>
                        </div>
                        
                        <div class="post-event-details">
                            <p><i class="fas fa-map-marker-alt"></i> Campo Municipal, Calle Principal #123</p>
                            <p><i class="far fa-calendar-alt"></i> 15/05/2025</p>
                            <p><i class="fas fa-tag"></i> Deportes • <i class="fas fa-users"></i> 8 equipos</p>
                        </div>
                    </div>
                    
                    <div class="post-comments-preview">
                        <a href="#" class="view-comments">Ver los 15 comentarios</a>
                        <div class="comment">
                            <span class="comment-author">Juan_Pérez</span>
                            <span class="comment-text">¡Genial! ¿Hay límite de edad para participar?</span>
                        </div>
                    </div>
                    
                    <div class="post-comment-area">
                        <div class="comment-input-wrapper">
                            <input type="text" class="comment-input" placeholder="Añade un comentario...">
                            <button class="comment-send">Publicar</button>
                        </div>
                    </div>
                </article>
                
                <!-- Post 2 -->
                <article class="post" data-id="2" data-category="musica">
                    <div class="post-header">
                        <div class="post-author">
                            <div class="post-avatar">
                                <img src="https://via.placeholder.com/40/e91e63" alt="Avatar">
                            </div>
                            <div class="post-info">
                                <div class="post-author-name">Asociación Cultural Música Viva</div>
                                <div class="post-time">5h</div>
                            </div>
                        </div>
                        <div class="post-more">
                            <i class="fas fa-ellipsis"></i>
                        </div>
                    </div>
                    
                    <div class="post-image-container">
                        <img src="https://via.placeholder.com/800x600/e91e63/ffffff?text=Concierto+de+Música+Clásica" alt="Imagen del evento" class="post-image">
                    </div>
                    
                    <div class="post-actions">
                        <div class="post-action like-action" data-id="2">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="post-action comment-action" data-id="2">
                            <i class="far fa-comment"></i>
                        </div>
                        <div class="post-action attend-action" data-id="2">
                            <i class="far fa-calendar-check"></i>
                        </div>
                        <div class="post-action share-action">
                            <i class="far fa-paper-plane"></i>
                        </div>
                        <div class="post-action save-action">
                            <i class="far fa-bookmark"></i>
                        </div>
                    </div>
                    
                    <div class="post-likes">
                        <span>18 Me gusta</span>
                    </div>
                    
                    <div class="post-content">
                        <div class="post-caption">
                            <span class="post-author-name">Asociación Cultural Música Viva</span>
                            <span class="post-description">Concierto de música clásica - Disfruta de una velada con las mejores piezas de Mozart y Beethoven interpretadas por la Orquesta Filarmónica de la ciudad. Una experiencia única para los amantes de la música clásica.</span>
                        </div>
                        
                        <div class="post-event-details">
                            <p><i class="fas fa-map-marker-alt"></i> Auditorio Municipal, Avenida Central #456</p>
                            <p><i class="far fa-calendar-alt"></i> 20/05/2025</p>
                            <p><i class="fas fa-tag"></i> Música • <i class="fas fa-ticket-alt"></i> $150 - $300</p>
                        </div>
                    </div>
                    
                    <div class="post-comments-preview">
                        <a href="#" class="view-comments">Ver los 3 comentarios</a>
                        <div class="comment">
                            <span class="comment-author">María_García</span>
                            <span class="comment-text">¿Hay descuentos para estudiantes?</span>
                        </div>
                    </div>
                    
                    <div class="post-comment-area">
                        <div class="comment-input-wrapper">
                            <input type="text" class="comment-input" placeholder="Añade un comentario...">
                            <button class="comment-send">Publicar</button>
                        </div>
                    </div>
                </article>
                
                <!-- Post 3 -->
                <article class="post" data-id="3" data-category="tecnologia">
                    <div class="post-header">
                        <div class="post-author">
                            <div class="post-avatar">
                                <img src="https://via.placeholder.com/40/4caf50" alt="Avatar">
                            </div>
                            <div class="post-info">
                                <div class="post-author-name">TechMeetup</div>
                                <div class="post-time">1d</div>
                            </div>
                        </div>
                        <div class="post-more">
                            <i class="fas fa-ellipsis"></i>
                        </div>
                    </div>
                    
                    <div class="post-image-container">
                        <img src="https://via.placeholder.com/800x600/4caf50/ffffff?text=Hackathon+2025" alt="Imagen del evento" class="post-image">
                    </div>
                    
                    <div class="post-actions">
                        <div class="post-action like-action" data-id="3">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="post-action comment-action" data-id="3">
                            <i class="far fa-comment"></i>
                        </div>
                        <div class="post-action attend-action" data-id="3">
                            <i class="far fa-calendar-check"></i>
                        </div>
                        <div class="post-action share-action">
                            <i class="far fa-paper-plane"></i>
                        </div>
                        <div class="post-action save-action">
                            <i class="far fa-bookmark"></i>
                        </div>
                    </div>
                    
                    <div class="post-likes">
                        <span>64 Me gusta</span>
                    </div>
                    
                    <div class="post-content">
                        <div class="post-caption">
                            <span class="post-author-name">TechMeetup</span>
                            <span class="post-description">Hackathon 2025: Innovación y Tecnología - Participa en nuestro Hackathon anual donde desarrolladores, diseñadores y emprendedores se reúnen para crear soluciones innovadoras. Este año el tema es "Tecnología para el bienestar".</span>
                        </div>
                        
                        <div class="post-event-details">
                            <p><i class="fas fa-map-marker-alt"></i> Centro de Innovación Digital, Plaza Tecnológica #789</p>
                            <p><i class="far fa-calendar-alt"></i> 10/06/2025 - 12/06/2025</p>
                            <p><i class="fas fa-tag"></i> Tecnología • <i class="fas fa-users"></i> Equipos de 3-5 personas</p>
                        </div>
                    </div>
                    
                    <div class="post-comments-preview">
                        <a href="#" class="view-comments">Ver los 27 comentarios</a>
                        <div class="comment">
                            <span class="comment-author">Carlos_Dev</span>
                            <span class="comment-text">¿Cuál es el premio para los ganadores?</span>
                        </div>
                    </div>
                    
                    <div class="post-comment-area">
                        <div class="comment-input-wrapper">
                            <input type="text" class="comment-input" placeholder="Añade un comentario...">
                            <button class="comment-send">Publicar</button>
                        </div>
                    </div>
                </article>
            </div>
        </main>
        
        <!-- Sidebar derecha -->
        <aside class="sidebar-right">            
            <!-- Sugerencias de personas -->
            <div class="suggestions-container">
                <div class="suggestions-header">
                    <span>Sugerencias para ti</span>
                    <a href="#">Ver todo</a>
                </div>
                
                <div class="suggestion-item">
                    <div class="suggestion-user">
                        <div class="user-avatar">
                            <img src="https://via.placeholder.com/40/9c27b0" alt="Avatar">
                        </div>
                        <div class="user-info">
                            <div class="user-name">Laura Sánchez</div>
                            <div class="user-stats">5 eventos en común</div>
                        </div>
                    </div>
                    <button class="follow-btn">Seguir</button>
                </div>
                
                <div class="suggestion-item">
                    <div class="suggestion-user">
                        <div class="user-avatar">
                            <img src="https://via.placeholder.com/40/3f51b5" alt="Avatar">
                        </div>
                        <div class="user-info">
                            <div class="user-name">Carlos Méndez</div>
                            <div class="user-stats">3 eventos en común</div>
                        </div>
                    </div>
                    <button class="follow-btn">Seguir</button>
                </div>
                
                <div class="suggestion-item">
                    <div class="suggestion-user">
                        <div class="user-avatar">
                            <img src="https://via.placeholder.com/40/ff9800" alt="Avatar">
                        </div>
                        <div class="user-info">
                            <div class="user-name">Ana Torres</div>
                            <div class="user-stats">7 eventos en común</div>
                        </div>
                    </div>
                    <button class="follow-btn">Seguir</button>
                </div>
                
                <div class="suggestion-item">
                    <div class="suggestion-user">
                        <div class="user-avatar">
                            <img src="https://via.placeholder.com/40/4caf50" alt="Avatar">
                        </div>
                        <div class="user-info">
                            <div class="user-name">Pedro Ramírez</div>
                            <div class="user-stats">2 eventos en común</div>
                        </div>
                    </div>
                    <button class="follow-btn">Seguir</button>
                </div>
                
                <div class="suggestion-item">
                    <div class="suggestion-user">
                        <div class="user-avatar">
                            <img src="https://via.placeholder.com/40/f44336" alt="Avatar">
                        </div>
                        <div class="user-info">
                            <div class="user-name">Sofía Hernández</div>
                            <div class="user-stats">4 eventos en común</div>
                        </div>
                    </div>
                    <button class="follow-btn">Seguir</button>
                </div>
            </div>
            
            <!-- Enlaces de interés -->
            <div class="footer-links">
                <div class="links-row">
                    <a href="#">Información</a> • 
                    <a href="#">Ayuda</a> • 
                    <a href="#">Privacidad</a> • 
                    <a href="#">Términos</a>
                </div>
                <div class="copyright">
                    © 2025 NexEvent
                </div>
            </div>
        </aside>
    </div>
    
    <!-- Modal de historias -->
    <div class="stories-modal" id="stories-modal">
        <div class="stories-modal-container">
            <div class="stories-modal-close">
                <i class="fas fa-times"></i>
            </div>
            
            <div class="stories-content">
                <div class="stories-view">
                    <img src="" alt="Historia" id="story-image">
                    <div class="story-progress">
                        <div class="story-progress-bar"></div>
                    </div>
                    <div class="story-header">
                        <div class="story-user">
                            <div class="user-avatar">
                                <img src="" alt="" id="story-user-avatar">
                            </div>
                            <div class="user-info">
                                <div class="user-name" id="story-user-name"></div>
                                <div class="story-time" id="story-time"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="story-actions">
                    <div class="story-reply">
                        <input type="text" placeholder="Responder a la historia...">
                        <button><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Variables globales
            const createPostTrigger = document.getElementById('create-post-trigger');
            const storiesModal = document.getElementById('stories-modal');
            const storiesModalClose = document.querySelector('.stories-modal-close');
            const storyImage = document.getElementById('story-image');
            const storyUserAvatar = document.getElementById('story-user-avatar');
            const storyUserName = document.getElementById('story-user-name');
            const storyTime = document.getElementById('story-time');
            const storyProgressBar = document.querySelector('.story-progress-bar');
            
            // Abrir formulario de creación 
            createPostTrigger.addEventListener('click', function() {
                window.location.href = '<?php echo APP_URL; ?>crearevento';
            });
            
            // Manejo de historias
            const storyItems = document.querySelectorAll('.story-item');
            
            storyItems.forEach(item => {
                item.addEventListener('click', function() {
                    const storyId = this.getAttribute('data-id');
                    
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
                                return { content };
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
                        // Ver historia existente en modal personalizado
                        const storyUser = this.querySelector('.story-username').textContent;
                        const storyAvatar = this.querySelector('.story-avatar img').src;
                        
                        // Configurar modal de historia
                        storyImage.src = `https://via.placeholder.com/600x800?text=Historia+de+${storyUser}`;
                        storyUserAvatar.src = storyAvatar;
                        storyUserName.textContent = storyUser;
                        storyTime.textContent = 'hace 2h';
                        
                        // Mostrar modal
                        storiesModal.style.display = 'flex';
                        
                        // Animar barra de progreso
                        storyProgressBar.style.width = '0%';
                        setTimeout(() => {
                            storyProgressBar.style.transition = 'width 5s linear';
                            storyProgressBar.style.width = '100%';
                        }, 100);
                        
                        // Auto cerrar después de 5 segundos
                        setTimeout(() => {
                            storiesModal.style.display = 'none';
                        }, 5100);
                    }
                });
            });
            
            // Cerrar modal de historias
            storiesModalClose.addEventListener('click', function() {
                storiesModal.style.display = 'none';
            });
            
            // Me gusta en posts
            const likeButtons = document.querySelectorAll('.like-action');
            
            likeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const postId = this.getAttribute('data-id');
                    const icon = this.querySelector('i');
                    const likesContainer = this.closest('.post').querySelector('.post-likes span');
                    const currentLikes = parseInt(likesContainer.textContent);
                    
                    if (icon.classList.contains('far')) {
                        // Dar me gusta
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        icon.classList.add('liked');
                        
                        // Actualizar contador
                        likesContainer.textContent = (currentLikes + 1) + ' Me gusta';
                    } else {
                        // Quitar me gusta
                        icon.classList.remove('fas');
                        icon.classList.remove('liked');
                        icon.classList.add('far');
                        
                        // Actualizar contador
                        likesContainer.textContent = (currentLikes - 1) + ' Me gusta';
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
                        icon.classList.add('attending');
                        
                        Swal.fire({
                            icon: 'success',
                            title: '¡Asistencia confirmada!',
                            text: 'Te has registrado para este evento',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        // Cancelar asistencia
                        icon.classList.remove('fas');
                        icon.classList.remove('attending');
                        icon.classList.add('far');
                        
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
            
            // Comentarios en posts
            const commentInputs = document.querySelectorAll('.comment-input');
            const commentSendButtons = document.querySelectorAll('.comment-send');
            
            commentSendButtons.forEach((button, index) => {
                button.addEventListener('click', function() {
                    const input = commentInputs[index];
                    if (input.value.trim() !== '') {
                        const post = button.closest('.post');
                        const commentsPreview = post.querySelector('.post-comments-preview');
                        const viewCommentsLink = commentsPreview.querySelector('.view-comments');
                        
                        // Crear nuevo comentario
                        const newComment = document.createElement('div');
                        newComment.className = 'comment';
                        newComment.innerHTML = `
                            <span class="comment-author"><?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Usuario'; ?></span>
                            <span class="comment-text">${input.value}</span>
                        `;
                        
                        // Insertar el nuevo comentario
                        commentsPreview.appendChild(newComment);
                        
                        // Actualizar contador en el enlace
                        const currentCount = parseInt(viewCommentsLink.textContent.match(/\d+/)[0]);
                        viewCommentsLink.textContent = `Ver los ${currentCount + 1} comentarios`;
                        
                        // Limpiar input
                        input.value = '';
                        
                        // Notificación sutil
                        const notification = document.createElement('div');
                        notification.className = 'toast-notification';
                        notification.textContent = 'Comentario publicado';
                        document.body.appendChild(notification);
                        
                        setTimeout(() => {
                            notification.classList.add('show');
                        }, 10);
                        
                        setTimeout(() => {
                            notification.classList.remove('show');
                            setTimeout(() => {
                                notification.remove();
                            }, 300);
                        }, 2000);
                    }
                });
                
                // Enviar comentario al presionar Enter
                commentInputs[index].addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        commentSendButtons[index].click();
                    }
                });
            });
            
            // Seguir/dejar de seguir a usuarios sugeridos
            const followButtons = document.querySelectorAll('.follow-btn');
            
            followButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (this.textContent === 'Seguir') {
                        this.textContent = 'Siguiendo';
                        this.classList.add('following');
                    } else {
                        this.textContent = 'Seguir';
                        this.classList.remove('following');
                    }
                });
            });
            
            // Abrir el modal de comentarios completos al hacer clic en "Ver todos los comentarios"
            const viewCommentsLinks = document.querySelectorAll('.view-comments');
            
            viewCommentsLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const post = this.closest('.post');
                    const postId = post.getAttribute('data-id');
                    const postAuthor = post.querySelector('.post-author-name').textContent;
                    
                    Swal.fire({
                        title: 'Comentarios',
                        html: `
                            <div class="comments-modal">
                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="https://via.placeholder.com/32" alt="Avatar">
                                    </div>
                                    <div class="comment-content">
                                        <span class="comment-author">Juan_Pérez</span>
                                        <span class="comment-text">¡Genial! ¿Hay límite de edad para participar?</span>
                                        <div class="comment-actions">
                                            <span class="comment-time">2h</span>
                                            <span class="comment-like">Me gusta</span>
                                            <span class="comment-reply">Responder</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="https://via.placeholder.com/32/1877f2" alt="Avatar">
                                    </div>
                                    <div class="comment-content">
                                        <span class="comment-author">${postAuthor}</span>
                                        <span class="comment-text">No hay límite de edad, pero es recomendable ser mayor de 16 años.</span>
                                        <div class="comment-actions">
                                            <span class="comment-time">1h</span>
                                            <span class="comment-like">Me gusta</span>
                                            <span class="comment-reply">Responder</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="https://via.placeholder.com/32/e91e63" alt="Avatar">
                                    </div>
                                    <div class="comment-content">
                                        <span class="comment-author">Ana_López</span>
                                        <span class="comment-text">¿Cuánto cuesta la inscripción por equipo?</span>
                                        <div class="comment-actions">
                                            <span class="comment-time">45m</span>
                                            <span class="comment-like">Me gusta</span>
                                            <span class="comment-reply">Responder</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="new-comment-box">
                                <textarea placeholder="Escribe un comentario..."></textarea>
                                <button class="swal2-confirm swal2-styled">Publicar</button>
                            </div>
                        `,
                        showConfirmButton: false,
                        showCloseButton: true,
                        customClass: {
                            container: 'comments-modal-container',
                            popup: 'comments-modal-popup',
                            closeButton: 'comments-modal-close'
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>