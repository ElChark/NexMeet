<?php require_once './views/partials/head.php' ?>
<?php require_once './views/partials/session-start.php' ?>

<body>
    <?php require_once './views/partials/nav-bar.php'; ?>

    <div class="profile-container">
        <!-- Cabecera del perfil -->
        <div class="profile-header">
            <div class="profile-avatar-container">
                <img src="https://via.placeholder.com/150" alt="Foto de perfil" class="profile-avatar">
                <div class="change-photo-btn">
                    <i class="fas fa-camera"></i>
                </div>
            </div>
            
            <div class="profile-info">
                <div class="profile-username-container">
                    <h1 class="profile-username"><?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Usuario'; ?></h1>
                    <button class="edit-profile-button">Editar perfil</button>
                    <button class="settings-button"><i class="fas fa-cog"></i></button>
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
                    <p class="bio-name"><?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Usuario'; ?></p>
                    <p class="bio-text">Organizador de eventos | Amante de la música y la cultura</p>
                    <p class="bio-email"><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'email@ejemplo.com'; ?></p>
                </div>
            </div>
        </div>
        
        <!-- Menú de navegación del perfil en el nuevo orden -->
        <div class="profile-nav">
            <div class="profile-nav-item" data-tab="photos">
                <i class="fas fa-image"></i>
                <span>FOTOS</span>
            </div>
            <div class="profile-nav-item" data-tab="events">
                <i class="fas fa-calendar-alt"></i>
                <span>EVENTOS</span>
            </div>
            <div class="profile-nav-item" data-tab="saved">
                <i class="fas fa-bookmark"></i>
                <span>GUARDADOS</span>
            </div>
            <div class="profile-nav-item" data-tab="attending">
                <i class="fas fa-star"></i>
                <span>ASISTIENDO</span>
            </div>
        </div>
        
        <!-- Contenido del perfil -->
        <div class="profile-content">
            <!-- Pestaña de fotos (primera por defecto) -->
            <div class="profile-tab" id="photos-tab">
                <div class="photos-grid">
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/300/ff5a5f/ffffff?text=Foto+1" alt="Foto">
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/300/00a699/ffffff?text=Foto+2" alt="Foto">
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/300/484848/ffffff?text=Foto+3" alt="Foto">
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/300/ff5a5f/ffffff?text=Foto+4" alt="Foto">
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/300/00a699/ffffff?text=Foto+5" alt="Foto">
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/300/484848/ffffff?text=Foto+6" alt="Foto">
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/300/ff5a5f/ffffff?text=Foto+7" alt="Foto">
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/300/00a699/ffffff?text=Foto+8" alt="Foto">
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/300/484848/ffffff?text=Foto+9" alt="Foto">
                    </div>
                </div>
                
                <div class="empty-message" style="display: none;">
                    <div class="empty-icon">
                        <i class="fas fa-camera"></i>
                    </div>
                    <h3>No tienes fotos compartidas</h3>
                    <p>Las fotos que compartas en eventos aparecerán aquí</p>
                    <button class="upload-photo-button">Subir una foto</button>
                </div>
            </div>
            
            <!-- Pestaña de eventos -->
            <div class="profile-tab" id="events-tab">
                <div class="profile-grid">
                    <div class="profile-card">
                        <div class="card-image">
                            <img src="https://via.placeholder.com/300x200/ff5a5f/ffffff?text=Festival+de+Música" alt="Evento">
                            <div class="card-overlay">
                                <div class="card-stats">
                                    <div class="card-stat">
                                        <i class="fas fa-heart"></i>
                                        <span>42</span>
                                    </div>
                                    <div class="card-stat">
                                        <i class="fas fa-comment"></i>
                                        <span>18</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-info">
                            <h3 class="card-title">Festival de Música Independiente</h3>
                            <p class="card-date"><i class="far fa-calendar-alt"></i> 15 Mayo, 2025</p>
                            <p class="card-location"><i class="fas fa-map-marker-alt"></i> Parque Central</p>
                        </div>
                    </div>
                    
                    <div class="profile-card">
                        <div class="card-image">
                            <img src="https://via.placeholder.com/300x200/00a699/ffffff?text=Exposición+de+Arte" alt="Evento">
                            <div class="card-overlay">
                                <div class="card-stats">
                                    <div class="card-stat">
                                        <i class="fas fa-heart"></i>
                                        <span>35</span>
                                    </div>
                                    <div class="card-stat">
                                        <i class="fas fa-comment"></i>
                                        <span>8</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-info">
                            <h3 class="card-title">Exposición de Arte Moderno</h3>
                            <p class="card-date"><i class="far fa-calendar-alt"></i> 22 Junio, 2025</p>
                            <p class="card-location"><i class="fas fa-map-marker-alt"></i> Galería Urbana</p>
                        </div>
                    </div>
                    
                    <div class="profile-card">
                        <div class="card-image">
                            <img src="https://via.placeholder.com/300x200/484848/ffffff?text=Taller+de+Cocina" alt="Evento">
                            <div class="card-overlay">
                                <div class="card-stats">
                                    <div class="card-stat">
                                        <i class="fas fa-heart"></i>
                                        <span>28</span>
                                    </div>
                                    <div class="card-stat">
                                        <i class="fas fa-comment"></i>
                                        <span>15</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-info">
                            <h3 class="card-title">Taller de Cocina Gourmet</h3>
                            <p class="card-date"><i class="far fa-calendar-alt"></i> 3 Julio, 2025</p>
                            <p class="card-location"><i class="fas fa-map-marker-alt"></i> Centro Gastronómico</p>
                        </div>
                    </div>
                    
                    <div class="profile-card">
                        <div class="card-image">
                            <img src="https://via.placeholder.com/300x200/ff5a5f/ffffff?text=Conferencia+Tech" alt="Evento">
                            <div class="card-overlay">
                                <div class="card-stats">
                                    <div class="card-stat">
                                        <i class="fas fa-heart"></i>
                                        <span>56</span>
                                    </div>
                                    <div class="card-stat">
                                        <i class="fas fa-comment"></i>
                                        <span>22</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-info">
                            <h3 class="card-title">Conferencia de Tecnología Emergente</h3>
                            <p class="card-date"><i class="far fa-calendar-alt"></i> 18 Agosto, 2025</p>
                            <p class="card-location"><i class="fas fa-map-marker-alt"></i> Centro de Convenciones</p>
                        </div>
                    </div>
                    
                    <div class="profile-card new-event-card">
                        <div class="new-event-content">
                            <i class="fas fa-plus-circle"></i>
                            <span>Crear nuevo evento</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pestaña de guardados -->
            <div class="profile-tab" id="saved-tab">
                <div class="profile-grid">
                    <div class="profile-card">
                        <div class="card-image">
                            <img src="https://via.placeholder.com/300x200/00a699/ffffff?text=Festival+Cine" alt="Evento guardado">
                            <div class="card-overlay">
                                <div class="card-stats">
                                    <div class="card-stat">
                                        <i class="fas fa-heart"></i>
                                        <span>78</span>
                                    </div>
                                    <div class="card-stat">
                                        <i class="fas fa-comment"></i>
                                        <span>32</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-info">
                            <h3 class="card-title">Festival Internacional de Cine</h3>
                            <p class="card-date"><i class="far fa-calendar-alt"></i> 10 Junio, 2025</p>
                            <p class="card-location"><i class="fas fa-map-marker-alt"></i> Teatro Municipal</p>
                        </div>
                    </div>
                    
                    <div class="profile-card">
                        <div class="card-image">
                            <img src="https://via.placeholder.com/300x200/ff5a5f/ffffff?text=Maratón" alt="Evento guardado">
                            <div class="card-overlay">
                                <div class="card-stats">
                                    <div class="card-stat">
                                        <i class="fas fa-heart"></i>
                                        <span>125</span>
                                    </div>
                                    <div class="card-stat">
                                        <i class="fas fa-comment"></i>
                                        <span>45</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-info">
                            <h3 class="card-title">Maratón Urbana 2025</h3>
                            <p class="card-date"><i class="far fa-calendar-alt"></i> 22 Agosto, 2025</p>
                            <p class="card-location"><i class="fas fa-map-marker-alt"></i> Plaza Principal</p>
                        </div>
                    </div>
                </div>
                
                <div class="empty-message" style="display: none;">
                    <div class="empty-icon">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <h3>No tienes eventos guardados</h3>
                    <p>Guarda eventos para verlos más tarde en esta sección</p>
                    <button class="explore-button">Explorar eventos</button>
                </div>
            </div>
            
            <!-- Pestaña de asistiendo -->
            <div class="profile-tab" id="attending-tab">
                <div class="profile-grid">
                    <div class="profile-card">
                        <div class="card-image">
                            <img src="https://via.placeholder.com/300x200/484848/ffffff?text=Concierto" alt="Evento asistiendo">
                            <div class="card-overlay">
                                <div class="card-stats">
                                    <div class="card-stat">
                                        <i class="fas fa-heart"></i>
                                        <span>89</span>
                                    </div>
                                    <div class="card-stat">
                                        <i class="fas fa-comment"></i>
                                        <span>36</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-info">
                            <h3 class="card-title">Concierto en vivo: Bandas Locales</h3>
                            <p class="card-date"><i class="far fa-calendar-alt"></i> 5 Mayo, 2025</p>
                            <p class="card-location"><i class="fas fa-map-marker-alt"></i> Auditorio Central</p>
                        </div>
                    </div>
                    
                    <div class="profile-card">
                        <div class="card-image">
                            <img src="https://via.placeholder.com/300x200/00a699/ffffff?text=Workshop" alt="Evento asistiendo">
                            <div class="card-overlay">
                                <div class="card-stats">
                                    <div class="card-stat">
                                        <i class="fas fa-heart"></i>
                                        <span>45</span>
                                    </div>
                                    <div class="card-stat">
                                        <i class="fas fa-comment"></i>
                                        <span>18</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-info">
                            <h3 class="card-title">Workshop de Fotografía Digital</h3>
                            <p class="card-date"><i class="far fa-calendar-alt"></i> 12 Mayo, 2025</p>
                            <p class="card-location"><i class="fas fa-map-marker-alt"></i> Estudio Creativo</p>
                        </div>
                    </div>
                    
                    <div class="profile-card">
                        <div class="card-image">
                            <img src="https://via.placeholder.com/300x200/ff5a5f/ffffff?text=Feria+del+Libro" alt="Evento asistiendo">
                            <div class="card-overlay">
                                <div class="card-stats">
                                    <div class="card-stat">
                                        <i class="fas fa-heart"></i>
                                        <span>67</span>
                                    </div>
                                    <div class="card-stat">
                                        <i class="fas fa-comment"></i>
                                        <span>24</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-info">
                            <h3 class="card-title">Feria Internacional del Libro</h3>
                            <p class="card-date"><i class="far fa-calendar-alt"></i> 15 Julio, 2025</p>
                            <p class="card-location"><i class="fas fa-map-marker-alt"></i> Parque Central</p>
                        </div>
                    </div>
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
            <form id="edit-profile-form">
                <!-- Previsualización de foto (opcional) -->
                <div class="photo-preview">
                    <img src="https://via.placeholder.com/150" alt="Foto de perfil" id="preview-profile-photo">
                </div>
                
                <div class="form-group">
                    <label class="form-label required" for="edit-username">Nombre de usuario</label>
                    <input type="text" class="form-control" id="edit-username" name="username" value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Usuario'; ?>" placeholder="Tu nombre completo">
                </div>
                
                <div class="form-group">
                    <label class="form-label required" for="edit-email">Correo electrónico</label>
                    <input type="email" class="form-control" id="edit-email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'email@ejemplo.com'; ?>" placeholder="tu@email.com">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="edit-bio">Biografía</label>
                    <textarea class="form-control" id="edit-bio" name="bio" placeholder="Cuéntanos sobre ti">Organizador de eventos | Amante de la música y la cultura</textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="edit-website">Sitio web</label>
                    <input type="text" class="form-control" id="edit-website" name="website" value="" placeholder="https://tusitio.com">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="edit-phone">Teléfono</label>
                    <input type="text" class="form-control" id="edit-phone" name="phone" value="" placeholder="+123 456 7890">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Foto de perfil</label>
                    <div class="file-upload-container">
                        <button type="button" class="file-upload-btn">
                            <i class="fas fa-camera"></i> Cambiar foto de perfil
                        </button>
                        <input type="file" id="profile-photo-upload" name="photo" accept="image/*">
                    </div>
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
            // Establecer la pestaña de fotos como activa al cargar la página
            setActiveTab('photos');
            
            // Manejadores para las pestañas del perfil
            const tabButtons = document.querySelectorAll('.profile-nav-item');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabName = this.getAttribute('data-tab');
                    setActiveTab(tabName);
                });
            });
            
            // Función para establecer la pestaña activa
            function setActiveTab(tabName) {
                // Remover clase activa de todas las pestañas
                const allButtons = document.querySelectorAll('.profile-nav-item');
                const allTabs = document.querySelectorAll('.profile-tab');
                
                allButtons.forEach(btn => btn.classList.remove('active'));
                allTabs.forEach(tab => tab.classList.remove('active'));
                
                // Añadir clase activa a la pestaña seleccionada
                const selectedButton = document.querySelector(`.profile-nav-item[data-tab="${tabName}"]`);
                const selectedTab = document.getElementById(`${tabName}-tab`);
                
                if (selectedButton && selectedTab) {
                    selectedButton.classList.add('active');
                    selectedTab.classList.add('active');
                }
            }
            
            // Manejadores para el modal de editar perfil
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
            
            // Manejar envío del formulario de edición
            const editProfileForm = document.getElementById('edit-profile-form');
            
            editProfileForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // En producción, aquí enviarías los datos al servidor
                Swal.fire({
                    icon: 'success',
                    title: 'Perfil actualizado',
                    text: 'Tus cambios han sido guardados correctamente',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#ff5a5f'
                }).then(() => {
                    editProfileModal.style.display = 'none';
                    
                    // Actualizar elementos visibles en la interfaz
                    const username = document.getElementById('edit-username').value;
                    const bio = document.getElementById('edit-bio').value;
                    
                    document.querySelector('.profile-username').textContent = username;
                    document.querySelector('.bio-name').textContent = username;
                    document.querySelector('.bio-text').textContent = bio;
                });
            });
            
            // Funcionalidad para subir imagen de perfil
            const changePhotoBtn = document.querySelector('.change-photo-btn');
            const profilePhotoUpload = document.getElementById('profile-photo-upload');
            
            changePhotoBtn.addEventListener('click', function() {
                // Abrir selector de archivos al hacer clic en el botón de la foto
                profilePhotoUpload.click();
            });
            
            // Vista previa de nueva foto (simulada)
            profilePhotoUpload.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Foto actualizada',
                        text: 'Tu foto de perfil ha sido actualizada',
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#ff5a5f'
                    });
                }
            });
            
            // Crear evento al hacer clic en la tarjeta de nuevo evento
            const newEventCard = document.querySelector('.new-event-card');
            
            newEventCard.addEventListener('click', function() {
                // Redireccionar a la página de creación de eventos
                window.location.href = '<?php echo APP_URL; ?>crearevento';
            });
        });
    </script>

    <style>
        /* Asegúrate de incluir los estilos base */
        html, body {
            font-family: 'Circular', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: var(--light-gray);
            color: var(--text-color);
            line-height: 1.5;
            height: 100%;
            scroll-behavior: smooth;
        }
        
        /* Estilos personalizados para las pestañas */
        .profile-nav-item.active {
            color: var(--primary-color);
            border-top-color: var(--primary-color);
        }
    </style>
</body>
</html>