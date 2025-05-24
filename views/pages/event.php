<?php require_once './views/partials/head.php' ?>

<body>
    <?php require_once './views/partials/nav-bar.php'; ?>
    <div class="event-container" >
        <!-- Cabecera del evento con imagen -->
        <div class="event-header">
            <div class="event-image-container">

                <img src="../../<?= ($evento['foto_portada']); ?>" alt="Portada del evento" class="event-image">

                <div class="event-overlay">
                    <span class="event-category"><?= htmlspecialchars($evento['categoria']); ?></span>
                    <h1 class="event-title"><?= htmlspecialchars($evento['titulo']); ?></h1>
                </div>
            </div>
        </div>


        <aside>
            <!-- Contenido principal del evento -->
            <div class="event-content">
                <div class="event-meta">
                    <div class="event-meta-item">
                        <i class="far fa-calendar-alt"></i>
                        <span>Publicado: <?= date("d-m-Y", strtotime($evento['fecha_publicacion'])); ?></span>
                    </div>

                    <?php if (isset($evento['fecha_evento'])) : ?>
                        <div class="event-meta-item">
                            <i class="fas fa-calendar-day"></i>
                            <span>Fecha del evento: <?= date("d-m-Y", strtotime($evento['fecha_evento'])); ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="event-meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?= htmlspecialchars($evento['nombreLugar']); ?></span>
                    </div>

                    <div class="event-meta-item">
                        <i class="fas fa-user"></i>
                        <?= $info['nombre'] ?></span>
                    </div>

                </div>

                <!-- Descripción del evento -->
                <div class="event-description">
                    <h2>Acerca de este evento</h2>
                    <p><?= nl2br(htmlspecialchars($evento['descripcion'])); ?></p>
                </div>

                <!-- Mapa de ubicación -->
                <div class="event-location-map">
                    <iframe
                        width="100%"
                        height="100%"
                        frameborder="0"
                        scrolling="no"
                        marginheight="0"
                        marginwidth="0"
                        src="https://maps.google.com/maps?q=<?= $evento['latitud']; ?>,<?= $evento['longitud']; ?>&z=15&output=embed">
                    </iframe>
                </div>
        </aside>

        <!-- Sección de comentarios -->
        <div class="comments-section">
            <h3 class="comments-title">Comentarios</h3>
            <div class="comment-form">
                <form action="/comment" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="event_id" value="<?= $evento['id_evento']; ?>">
                    <input type="hidden" name="tipo" value="Evento">

                    <div class="form-group">
                        <label for="comment_text" class="form-label">Tu comentario</label>
                        <textarea id="comment_text" name="comment_text" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn">Publicar comentario</button>
                </form>
            </div>

            <!-- Lista de comentarios existentes -->
            <div class="comment-list">
                <?php if (count($comentarios) > 0): ?>
                    <?php foreach ($comentarios as $comentario): ?>
                        <div class="comment">
                            <div class="comment-header">
                                <span class="comment-author"><?= htmlspecialchars($comentario['nombre_usuario']); ?></span>
                                <span class="comment-date"><?= date("d-m-Y H:i", strtotime($comentario['fecha_creacion'])); ?></span>
                            </div>
                            <div class="comment-body">
                                <p><?= nl2br(htmlspecialchars($comentario['comentario'])); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="comment">
                        <p>No hay comentarios todavía. ¡Sé el primero en comentar!</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
    </div>
</body>

</html>