<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= htmlspecialchars($evento['titulo']); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Variables y reset */
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #6c757d;
            --text-color: #333;
            --white: #fff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --radius: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos base */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--light-gray);
            padding-bottom: 40px;
        }

        /* Contenedor principal */
        .event-container {
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        /* Cabecera del evento */
        .event-header {
            position: relative;
        }

        .event-image-container {
            width: 100%;
            height: 400px;
            overflow: hidden;
            position: relative;
        }

        .event-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .event-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            padding: 20px;
            color: var(--white);
        }

        .event-category {
            display: inline-block;
            background-color: var(--accent-color);
            color: var(--white);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .event-title {
            font-size: 2.2em;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        /* Contenido del evento */
        .event-content {
            padding: 30px;
        }

        .event-meta {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--medium-gray);
        }

        .event-meta-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
            margin-bottom: 10px;
        }

        .event-meta-item i {
            color: var(--primary-color);
            margin-right: 8px;
        }

        .event-description {
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .event-location-map {
            height: 400px;
            background-color: var(--medium-gray);
            margin-bottom: 30px;
            border-radius: var(--radius);
            overflow: hidden;
        }

        /* Sección de comentarios */
        .comments-section {
            margin-top: 40px;
            background-color: var(--light-gray);
            border-radius: var(--radius);
            padding: 25px;
        }

        .comments-title {
            font-size: 1.5em;
            color: var(--secondary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
        }

        .comment-form {
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: var(--secondary-color);
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--medium-gray);
            border-radius: var(--radius);
            font-family: inherit;
            font-size: 1em;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.25);
        }

        .btn {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 12px 20px;
            font-size: 1em;
            font-weight: bold;
            border-radius: var(--radius);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .comment-list {
            margin-top: 30px;
        }

        .comment {
            background-color: var(--white);
            border-radius: var(--radius);
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .comment-author {
            font-weight: bold;
            color: var(--secondary-color);
        }

        .comment-date {
            color: var(--dark-gray);
            font-size: 0.9em;
        }

        .comment-body {
            line-height: 1.6;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .event-container {
                width: 95%;
            }

            .event-image-container {
                height: 250px;
            }

            .event-title {
                font-size: 1.8em;
            }

            .event-content {
                padding: 20px;
            }

            .event-meta {
                flex-direction: column;
            }

            .event-meta-item {
                margin-right: 0;
            }
        }
    </style>
</head>

<body>
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
                        <span>Organizador: Usuario HardCodeado</span>
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