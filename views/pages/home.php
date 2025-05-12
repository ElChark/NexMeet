<?php require_once './views/partials/head.php' ?>
<?php require_once './views/partials/load.php' ?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<body>
    <?php require_once './views/partials/nav-bar.php'; ?>

    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Sidebar izquierda -->
        <aside class="sidebar-left">
            <!-- Tus eventos -->
  
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


            <section id="eventos-sugeridos">

                <?php foreach ($publicaciones as $publicacion): ?>
                    <article class="post" data-id="<?= $publicacion['id_publicacion'] ?>" data-category="deportes">
                        <div class="post-header">
                            <div class="post-author">
                                <div class="post-avatar">
                                    <img src="<?= $publicacion['foto_perfil'] ?>" alt="Avatar" class="post-image" >
                                </div>
                                <div class="post-info">
                                    <div class="post-author-name"><?= $publicacion['nombre'] ?></div>
                                    <div class="post-time"><?= date('d/m/Y', strtotime($publicacion['fecha_publicacion'])) ?></div>
                                </div>
                            </div>
                            <div class="post-more">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>

                        <?php if($publicacion['foto_portada'] !== 'No Foto'): ?>
                            <img src="<?= $publicacion['foto_portada']?>" alt="Imagen de la publicación" class="post-image">
                        <?php endif;?>
                        <div class="post-content">
                            <h3 class="post-title"><?= $publicacion['titulo'] ?></h3>
                            <p class="post-description"><?= $publicacion['contenido'] ?></p>
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
                            <!-- <div class="post-action comment-action" data-id="<?= $publicacion['id_publicacion'] ?>">
                                <i class="far fa-comment-alt"></i>
                                <span>Comentar</span>
                            </div> -->
                        </div>

                        <div class="post-comment-area">
                            <div class="avatar">
                                <img src="<?php echo $_SESSION['fotoPerfil'] ?? '../../images/perfilPrueba.jpg'; ?>" alt="Avatar">
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
            <section class="sidebar-section popular-events">
                <h3 class="sidebar-heading">Eventos populares</h3>
                <?php foreach ($eventosPopulares as $evento): ?>       
                    <article class="event-card">
                        <h4 class="event-title"><?= $evento['titulo']?></h4>
                        <p class="event-description"><?= $evento['descripcion_evento']?></p>
                        <p class="event-date"><i class="far fa-calendar-alt"></i> <?= $evento['fecha_publicacion']?></p>
                        <a href="/eventos/?id=<?=$evento['id_evento']?>" style="text-decoration: underline; color: blue; font-size: 14px;">Mas Info</a>
                    </article>
                <?php endforeach; ?>

            </section>
        </aside>
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
            detallesButtons.forEach(button => {});


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

   
            // Me gusta
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