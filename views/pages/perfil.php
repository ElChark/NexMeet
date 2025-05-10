<?php require_once './views/partials/head.php' ?>
<?php require_once './views/partials/load.php' ?>

<body>
    <?php require_once './views/partials/nav-bar.php'; ?>

    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-avatar-container">
                <img src="../ajax/<?php echo $_SESSION['fotoPerfil'] ?? 'images/perfilPrueba.jpg'; ?>" alt="Foto de perfil" class="profile-avatar" id="profile-pic">
                <form method="POST" id="profile-pic-container" enctype="multipart/form-data">
                    <label class="change-photo-btn" for="photoInput">
                        <i class="fas fa-camera"></i>
                    </label>
                    <input type="file" id="photoInput" name="photo"></input>
                </form>

            </div>

            <div class="profile-info">
                <div class="profile-username-container">
                    <h1 class="profile-username"><?php echo $_SESSION['nombre'] ?? 'Usuario'; ?></h1>
                    <button class="edit-profile-button">Editar perfil</button>
                </div>

                <div class="profile-stats">
                    <div class="stat-item">
                        <span class="stat-number">24</span>
                        <span class="stat-label">Eventos creados</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">142</span>
                        <span class="stat-label">Seguidores</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">98</span>
                        <span class="stat-label">Siguiendo</span>
                    </div>
                </div>

                <div class="profile-bio">
                    <p class="bio-name"><?php echo $_SESSION['nombre'] ?? 'Usuario'; ?></p>
                    <p class="bio-text"><?php echo $_SESSION['descripcion'] ?? 'Agrega una descripción ... '; ?></p>
                    <p class="bio-email"><?php echo $_SESSION['correo'] ?? 'email@ejemplo.com'; ?></p>
                </div>
            </div>
        </div>

        <!-- Menú de navegación del perfil -->
        <div class="profile-nav">
            <div class="profile-nav-item active" data-tab="photos">
                <i class="fas fa-image"></i>
                <span>PUBLICACIONES</span>
            </div>
            <div class="profile-nav-item" data-tab="events">
                <i class="fas fa-calendar-alt"></i>
                <span>EVENTOS</span>
            </div>
            <div class="profile-nav-item" data-tab="saved">
                <i class="fas fa-bookmark"></i>
                <span>GUSTADOS</span>
            </div>
            <div class="profile-nav-item" data-tab="attending">
                <i class="fas fa-star"></i>
                <span>ASISTIENDO</span>
            </div>

        </div>

        <!-- Contenido del perfil -->
        <div class="profile-content">
            <!-- Pestaña de publicaciones -->
            <div class="profile-tab active" id="photos-tab">
                <div class="photos-grid">

                    <?php if(count($publicacionesPerfil)>0) {?>

                        <?php foreach ($publicacionesPerfil as $publicacion): ?>
                            <article class="profile-card" >
                                <div class="card-image">
                                    <img src="<?= $publicacion['foto_portada'] ?>" alt="<?= $publicacion['titulo'] ?>">
                                    <div class="card-overlay">
                                    </div>
                                </div>
                                <div class="card-info">
                                    <div style="display: flex; justify-content: space-between; align-items: center">
                                        <h3 class="card-title"><?= $publicacion['titulo'] ?></h3>
                                        <button style="height: 20px" class="delete-button-post" data-id="<?php echo $publicacion['id_publicacion'] ?>">x</button>
                                    </div>
                                    <p class="card-title"><?= $publicacion['contenido'] ?></p>
                                </div>
                            </article>
                        <?php endforeach; ?>

                    <?php } else { ?>
                        <div class="empty-message" style="margin-left: 270px; width: 300px">
                            <div class="empty-icon">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h3>No tienes publicaciones</h3>
                            <p>Tus publicaciones apareceran aqui</p>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Pestaña de eventos -->
            <div class="profile-tab" id="events-tab">
                <div class="profile-grid">

                    <?php if(count($eventosPropios)>0) {?>
                        <?php foreach ($eventosPropios as $evento) { ?>
                            <article class="profile-card" >
                                <div class="card-image">
                                    <img src="<?= $evento['foto_portada'] ?>" alt="Evento">
                                    <div class="card-overlay">
                                    </div>
                                </div>
                                <div class="card-info">
                                    <div style="display: flex; justify-content: space-between; align-items: center">
                                        <h3 class="card-title"><?= $evento['titulo'] ?></h3>
                                        <button style="height: 20px" class="delete-button-evento" data-id="<?php echo $evento['id_evento'] ?>">x</button>
                                    </div>
                                    <p class="card-date"><i class="far fa-calendar-alt"></i><?= $evento['fecha_publicacion'] ?></p>
                                    <p class="card-location"><i class="fas fa-map-marker-alt"></i><?= $evento['nombreLugar'] ?></p>
                                </div>
                            </article>
                        <?php } ?>
                    <?php } else {?>
                        <div class="empty-message" style="margin-left: 270px; width: 300px">
                            <div class="empty-icon">
                                <i class="fas fa-bookmark"></i>
                            </div>
                            <h3>No has creado ningún evento</h3>
                            <p>Aquí se mostraran tus eventos</p>
                        </div>
                    <?php } ?>


                </div>
            </div>

            <!-- Pestaña de gustados -->
            <div class="profile-tab" id="saved-tab">
                <div class="profile-grid">

                    <?php if(count($eventosGustadosPerfil)>0) { ?>
                        <?php foreach ($eventosGustadosPerfil as $eventoGustado) { ?>
                            <article class="profile-card">
                                <div class="card-image">
                                    <img src="<?= $eventoGustado['foto_portada'] ?>" alt="Evento">
                                    <div class="card-overlay">
                                    </div>
                                </div>
                                <div class="card-info">
                                    <h3 class="card-title"><?= $eventoGustado['titulo'] ?></h3>
                                    <p class="card-date"><i class="far fa-calendar-alt"></i><?= $eventoGustado['fecha_evento'] ?></p>
                                    <p class="card-location"><i class="fas fa-map-marker-alt"></i><?= $eventoGustado['nombreLugar'] ?></p>
                                </div>
                            </article>
                        <?php } ?>
                    <?php } else {?>
                        <div class="empty-message" style="margin-left: 270px; width: 300px">
                            <div class="empty-icon">
                                <i class="fas fa-bookmark"></i>
                            </div>
                            <h3>No te ha gustado ningún evento</h3>
                            <p>Los eventos que te gusten aparecerían aquí</p>
                        </div>
                    <?php } ?>

                </div>

            </div>

            <!-- Pestaña de asistiendo -->
            <div class="profile-tab" id="attending-tab">
                <div class="profile-grid">

                    <?php if(count($asistiendo) > 0) { ?>

                        <?php foreach ($asistiendo as $evento) { ?>
                            <article class="profile-card">
                                <div class="card-image">
                                    <img src="https://via.placeholder.com/300x200/484848/ffffff?text=Concierto" alt="Evento asistiendo">
                                    <div class="card-overlay">
                                    </div>
                                </div>
                                <div class="card-info">
                                    <h3 class="card-title"><?= $evento['nombre_evento'] ?></h3>
                                    <p class="card-date"><i class="far fa-calendar-alt"></i><?= isset($evento['nombre_evento']) ? $evento['nombre_evento'] : 'Today' ?></p>
                                    <p class="card-location"><i class="fas fa-map-marker-alt"></i> Auditorio Central</p>
                                </div>
                            </article>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="empty-message" style="margin-left: 270px; width: 300px">
                            <div class="empty-icon">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h3>No tienes asistencias confirmadas</h3>
                            <p>Tus próximos eventos aparecerían aquí</p>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario modal para editar perfil -->
    <div class="modal-backdrop" id="edit-profile-modal" style="display: none;">
        <div class="modal">
            <div class="modal-header">
                <div class="modal-title">Editar perfil</div>
                <button class="modal-close" id="edit-profile-close">&times;</button>
            </div>

            <div class="modal-body">
                <form id="edit-profile-form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-label" for="edit-username">Nombre de usuario</label>
                        <input type="text" class="form-control" id="edit-username" name="username" value="<?php echo $_SESSION['nombre'] ?? 'Usuario'; ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="edit-email">Correo electrónico</label>
                        <input type="email" class="form-control" id="edit-email" name="correo" value="<?php echo $_SESSION['correo'] ?? 'email@ejemplo.com'; ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="edit-bio">Biografía</label>
                        <textarea class="form-control" id="edit-bio" name="descripción"><?php echo $_SESSION['descripción'] ?? ''; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="edit-phone">Teléfono</label>
                        <input type="text" class="form-control" id="edit-phone" name="numero" value="<?php echo $_SESSION['numero'] ?? ''; ?>">
                    </div>

                    <div class="form-buttons">
                        <button type="button" class="btn btn-secondary" id="cancel-edit">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.profile-nav-item');
            const tabContents = document.querySelectorAll('.profile-tab');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Quitar clase activa de todos los botones
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active');
                    });

                    // Añadir clase activa al botón actual
                    this.classList.add('active');

                    // Mostrar la pestaña correspondiente
                    const tabName = this.getAttribute('data-tab');

                    tabContents.forEach(tab => {
                        tab.classList.remove('active');
                    });

                    document.getElementById(`${tabName}-tab`).classList.add('active');
                });
            });

            const editProfileButton = document.querySelector('.edit-profile-button');
            const editProfileModal = document.getElementById('edit-profile-modal');
            const editProfileClose = document.getElementById('edit-profile-close');
            const cancelEditButton = document.getElementById('cancel-edit');

            editProfileButton.addEventListener('click', function() {
                editProfileModal.style.display = 'flex';
            });

            editProfileClose.addEventListener('click', function() {
                editProfileModal.style.display = 'none';
            });

            cancelEditButton.addEventListener('click', function() {
                editProfileModal.style.display = 'none';
            });

            // Cerrar modal al hacer clic fuera
            editProfileModal.addEventListener('click', function(e) {
                if (e.target === editProfileModal) {
                    editProfileModal.style.display = 'none';
                }
            });


            //Actualizar foto de perfil
            const changePhotoBtn = document.getElementById('photoInput');
            changePhotoBtn.addEventListener('change', async () => {

                const photoForm = document.getElementById('profile-pic-container');
                const formData = new FormData(photoForm);

                console.log(formData);

                try {
                    const response = await fetch('../../ajax/update-ajax.php', {
                        method: 'POST',
                        body: formData
                    });

                    const data = await response.json();

                    if (data.tipo === "success") {
                        console.log("Ruta recibida:", data.ruta);
                        document.getElementById('profile-pic').src = "../ajax/" + data.ruta;

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

                } catch (error) {
                    Swal.fire({
                        title: "Error de conexión",
                        text: error.message,
                        icon: "error"
                    });
                }
            });

            //Actualizar información del usuario
            document.getElementById('edit-profile-form').addEventListener('submit', async (e) => {
                e.preventDefault();

                const formData = new FormData(document.getElementById('edit-profile-form'));
                formData.append('tipo', 'ActualizarInfo')

                const response = await fetch("<?php echo  APP_URL; ?>ajax/update-ajax.php", {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.tipo === "success") {
                    document.querySelector('.bio-name').textContent = data.nombre;
                    document.querySelector('.bio-text').textContent = data.descripción;
                    document.querySelector('.bio-email').textContent = data.correo;
                    document.querySelector('.profile-username').textContent = data.nombre;

                    Swal.fire({
                        icon: data.icono,
                        title: data.titulo,
                        text: data.texto,
                        timer: 1000,
                        confirmButtonText: 'Aceptar',
                        showConfirmButton: false
                    });
                } else if(data.tipo === "error") {
                    Swal.fire({
                        icon: data.icono,
                        title: data.titulo,
                        text: data.texto,
                        timer: 1000,
                        confirmButtonText: 'Aceptar',
                        showConfirmButton: false
                    });
                }

            });

            let currentPostId=null;
            //Eliminar publicaciones
            const deleteButtons = document.querySelectorAll('.delete-button-post');
            deleteButtons.forEach(deleteBtn => {
                deleteBtn.addEventListener('click', () => {
                    currentPostId = deleteBtn.dataset.id

                    Swal.fire({
                        title: "Estas seguro?",
                        text: "Esta acción no se puede revertir",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const fetchOpt = {
                                method: 'POST',
                                headers: {
                                    'Content-type': 'Application/json'
                                },
                                body: JSON.stringify({id: currentPostId, tipo: 'Publicación'})
                            }

                            fetch('../../ajax/delete-ajax.php', fetchOpt).then(res => res.json())
                                .then(data => {

                                    if(data.tipo === "success") {
                                        Swal.fire({
                                            title: data.title,
                                            text: `La publicación ha sido eliminada`,
                                            icon: data.icon
                                        });
                                        window.location.reload();
                                    } else {
                                        Swal.fire({
                                            title: "Error",
                                            text: `Ha ocurrido un error a la hora de eliminar la publicación`,
                                            icon: "error"
                                        });
                                    }
                                })

                        }
                    });

                })
            })

            //Eliminar eventos
            const deleteEventsButtons = document.querySelectorAll('.delete-button-evento');
            deleteEventsButtons.forEach(deleteEventBtn => {
                deleteEventBtn.addEventListener('click', () => {
                    currentPostId = deleteEventBtn.dataset.id

                    Swal.fire({
                        title: "Estas seguro?",
                        text: "Esta acción no se puede revertir",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, borrar!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const fetchOpt = {
                                method: 'POST',
                                headers: {
                                    'Content-type': 'Application/json'
                                },
                                body: JSON.stringify({id: currentPostId, tipo: 'Evento'})
                            }

                            fetch('../../ajax/delete-ajax.php', fetchOpt).then(res => res.json())
                                .then(data => {

                                    if(data.tipo === "success") {
                                        Swal.fire({
                                            title: data.title,
                                            text: `El evento ha sido eliminado`,
                                            icon: data.icon
                                        });
                                        window.location.reload();
                                    } else {
                                        Swal.fire({
                                            title: "Error",
                                            text: `Ha ocurrido un error a la hora de eliminar el evento`,
                                            icon: "error"
                                        });
                                    }
                                })

                        }
                    });
                })
            })

        });
    </script>
</body>
