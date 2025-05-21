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
            <section id="eventos-sugeridos">

                <?php foreach ($publicaciones as $publicacion): ?>
                    <article class="post" data-id="<?= $publicacion['id_publicacion'] ?>" data-category="deportes">
                        <div class="post-header">
                            <div class="post-author">
                                <div class="post-avatar">
                                    <img src="<?= $publicacion['foto_perfil'] ?>" alt="Avatar" class="post-image">
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

                        <?php if ($publicacion['foto_portada'] !== 'images/notFound.jpg' && str_starts_with($publicacion['foto_portada'], 'images/imagen')) { ?>
                            <img src="<?= $publicacion['foto_portada'] ?>" alt="Imagen de la publicación" class="post-image">
                        <?php } else if ($publicacion['foto_portada'] !== 'images/notFound.jpg' && str_starts_with($publicacion['foto_portada'], 'images/video')) { ?>
                            <video src="<?= $publicacion['foto_portada'] ?>" controls preload="metadata" style="width:100%;max-height:400px;object-fit:cover;display:block;border-radius:8px;background:#000;">
                                Tu navegador no soporta la etiqueta de video.
                            </video>
                        <?php } ?>
                        <div class="post-content">
                            <h3 class="post-title"><?= $publicacion['titulo'] ?></h3>
                            <p class="post-description"><?= $publicacion['contenido'] ?></p>
                        </div>

                        <div class="post-stats">
                            <div class="post-likes">
                                <i class="fas fa-thumbs-up"></i>0 Me gusta
                            </div>
                            <div class="post-comments-count">0 comentarios</div>
                        </div>

                        <div class="post-actions">
                            <button class="post-action like-action" data-id="<?= $publicacion['id_publicacion'] ?>" onclick=handleLike(this.dataset.id)>
                                <i class="far fa-thumbs-up"></i>
                                <span>Me gusta</span>
                            </button>
                            <!-- <div class="post-action comment-action" data-id="<?= $publicacion['id_publicacion'] ?>">
                                <i class="far fa-comment-alt"></i>
                                <span>Comentar</span>
                            </div> -->
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
                        <h4 class="event-title"><?= $evento['titulo'] ?></h4>
                        <p class="event-description"><?= $evento['descripcion_evento'] ?></p>
                        <p class="event-date"><i class="far fa-calendar-alt"></i> <?= $evento['fecha_publicacion'] ?></p>
                        <a href="/eventos/?id=<?= $evento['id_evento'] ?>" style="text-decoration: underline; color: blue; font-size: 14px;">Mas Info</a>
                    </article>
                <?php endforeach; ?>

            </section>
        </aside>
    </div>


    <script>
        const likeButtons = document.querySelectorAll('.like-action');
        const posts = [];

        <?php foreach ($PublicacionesUsuario as $publicacion) { ?>
            posts.push(<?php echo json_encode($publicacion); ?>);
        <?php } ?>


        //inicializar publicaciones ya con el like puesto
        posts.forEach(post => {
            console.log(post)
            likeButtons.forEach(button => {
                if (post.id_publicacion == button.dataset.id) {
                    button.classList.add('liked');
                    button.style.background = 'green';
                    button.style.color = 'white'
                }
            })
        })

        function handleLike(postId) {
            let isLiked = false;
            likeButtons.forEach(button => {
                if (button.dataset.id == postId) {
                    isLiked = button.classList.contains('liked');
                    return;
                }
            })

            const accion = isLiked ? 'QuitarLike' : 'Like';

            console.log(postId)
            fetch("<?php echo  APP_URL; ?>api/publications/reaction-post.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'Application/json'
                    },
                    body: JSON.stringify({
                        postId: postId,
                        accion: accion
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'ok') {
                        likeButtons.forEach(button => {
                            if (button.dataset.id == postId) {
                                if (accion === 'Like') {
                                    button.classList.add('liked');
                                    button.style.background = 'green';
                                    button.style.color = 'white';
                                } else {
                                    button.classList.remove('liked');
                                    button.style.background = '';
                                    button.style.color = '';
                                }
                            }
                        })
                    } else {
                        alert('Ha ocurrido un error')
                    }
                })

        }
    </script>
</body>

</html>