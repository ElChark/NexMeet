<?php require_once './views/partials/head.php' ?>

<body>
    <?php require_once './views/partials/nav-bar.php'; ?>

    <div class="create-event-container">
        <div class="page-header">
            <h1><i class="fas fa-plus-circle"></i> Crear nuevo evento</h1>
            <p>Comparte tus eventos con la comunidad</p>
        </div>
        
        <div class="create-event-form">
            <form id="event-form">
                <!-- Sección de información básica -->
                <div class="form-section">
                    <h2 class="section-title">Información básica</h2>
                    
                    <div class="form-group">
                        <label for="event-title">Título del evento <span class="required">*</span></label>
                        <input type="text" id="event-title" class="form-control" name="titulo" required placeholder="Agrega un título claro y atractivo">
                    </div>
                    
                    <div class="form-group">
                        <label for="event-category">Categoría <span class="required">*</span></label>
                        <select id="event-category" class="form-control" required>
                            <option value="">Selecciona una categoría</option>
                            <option value="musica">Música</option>
                            <option value="arte">Arte</option>
                            <option value="deportes">Deportes</option>
                            <option value="tecnologia">Tecnología</option>
                            <option value="gastronomia">Gastronomía</option>
                            <option value="educacion">Educación</option>
                            <option value="networking">Networking</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="event-description">Descripción <span class="required">*</span></label>
                        <textarea id="event-description" class="form-control" rows="5" required placeholder="Describe los detalles de tu evento..."></textarea>
                        <small class="form-text">Sé específico para que la gente sepa qué esperar.</small>
                    </div>
                </div>
                
                <!-- Sección de ubicación -->
                <div class="form-section">
                    <h2 class="section-title">Ubicación</h2>
                    
                    <div class="form-group">
                        <label for="event-location-type">Tipo de evento <span class="required">*</span></label>
                        <div class="location-type-toggle">
                            <button type="button" class="location-btn active" data-type="presencial">
                                <i class="fas fa-map-marker-alt"></i> Presencial
                            </button>
                            <button type="button" class="location-btn" data-type="online">
                                <i class="fas fa-laptop"></i> Online
                            </button>
                            <button type="button" class="location-btn" data-type="hibrido">
                                <i class="fas fa-globe"></i> Híbrido
                            </button>
                        </div>
                        <input type="hidden" id="event-location-type" value="presencial">
                    </div>
                    
                    <div id="presencial-fields">
                        <div class="form-group">
                            <label for="event-venue">Lugar o recinto <span class="required">*</span></label>
                            <input type="text" id="event-venue" class="form-control" placeholder="Nombre del lugar">
                        </div>
                        
                        <div class="form-group">
                            <label for="event-address">Dirección <span class="required">*</span></label>
                            <input type="text" id="event-address" class="form-control" placeholder="Dirección completa">
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group half">
                                <label for="event-city">Ciudad <span class="required">*</span></label>
                                <input type="text" id="event-city" class="form-control">
                            </div>
                            
                            <div class="form-group half">
                                <label for="event-postal-code">Código postal</label>
                                <input type="text" id="event-postal-code" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div id="online-fields" style="display: none;">
                        <div class="form-group">
                            <label for="event-online-url">URL de acceso <span class="required">*</span></label>
                            <input type="url" id="event-online-url" class="form-control" placeholder="https://...">
                            <small class="form-text">La URL se compartirá con los asistentes confirmados.</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="event-platform">Plataforma</label>
                            <select id="event-platform" class="form-control">
                                <option value="">Selecciona una plataforma</option>
                                <option value="zoom">Zoom</option>
                                <option value="meet">Google Meet</option>
                                <option value="teams">Microsoft Teams</option>
                                <option value="otra">Otra</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Sección de imagen y multimedia -->
                <div class="form-section">
                    <h2 class="section-title">Imagen y multimedia</h2>
                    
                    <div class="form-group">
                        <label for="event-image">Imagen principal <span class="required">*</span></label>
                        <div class="file-upload-container">
                            <div class="file-upload-preview" id="image-preview">
                                <div class="upload-placeholder">
                                    <i class="fas fa-image"></i>
                                    <span>Subir imagen</span>
                                </div>
                                <img src="" alt="" style="display: none;">
                            </div>
                            <input type="file" id="event-image" class="form-control-file" accept="image/*">
                        </div>
                        <small class="form-text">Formatos: JPG, PNG. Tamaño máximo: 5MB. Resolución recomendada: 1200x600px.</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="event-gallery">Galería (opcional)</label>
                        <div class="file-upload-container">
                            <div class="file-upload-btn">
                                <i class="fas fa-plus"></i> Añadir más imágenes
                            </div>
                            <input type="file" id="event-gallery" class="form-control-file" accept="image/*" multiple>
                        </div>
                        <div class="gallery-preview" id="gallery-preview"></div>
                    </div>
                </div>
                
                <!-- Sección de entradas y precios -->
                <div class="form-section">
                    <h2 class="section-title">Entradas y precios</h2>
                    
                    <div class="form-group">
                        <label>Tipo de evento <span class="required">*</span></label>
                        <div class="ticket-type-toggle">
                            <button type="button" class="ticket-btn active" data-type="free">
                                <i class="fas fa-ticket-alt"></i> Gratuito
                            </button>
                            <button type="button" class="ticket-btn" data-type="paid">
                                <i class="fas fa-dollar-sign"></i> De pago
                            </button>
                        </div>
                        <input type="hidden" id="event-ticket-type" value="free">
                    </div>
                    
                    <div id="paid-fields" style="display: none;">
                        <div class="form-group">
                            <label for="event-price">Precio de entrada <span class="required">*</span></label>
                            <div class="price-input">
                                <span class="currency-symbol">$</span>
                                <input type="number" id="event-price" class="form-control" min="0" step="0.01">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="event-payment-link">Enlace de pago (opcional)</label>
                            <input type="url" id="event-payment-link" class="form-control" placeholder="https://...">
                            <small class="form-text">Puedes indicar una URL externa donde se procesen los pagos.</small>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="event-capacity">Capacidad máxima (opcional)</label>
                        <input type="number" id="event-capacity" class="form-control" min="1">
                        <small class="form-text">Deja en blanco para capacidad ilimitada.</small>
                    </div>
                </div>
                
                <!-- Sección de configuración adicional -->
                <div class="form-section">
                    <h2 class="section-title">Configuración adicional</h2>
                    
                    <div class="form-group checkbox-group">
                        <label class="checkbox-container">
                            <input type="checkbox" id="event-private">
                            <span class="checkmark"></span>
                            Evento privado (solo por invitación)
                        </label>
                    </div>
                    
                    <div class="form-group checkbox-group">
                        <label class="checkbox-container">
                            <input type="checkbox" id="event-featured">
                            <span class="checkmark"></span>
                            Destacar en la página principal
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label for="event-tags">Etiquetas (opcional)</label>
                        <input type="text" id="event-tags" class="form-control" placeholder="Añade etiquetas separadas por comas">
                        <small class="form-text">Ejemplo: música, concierto, rock, directo</small>
                    </div>
                </div>
                
                <!-- Botones de acción -->
                <div class="form-actions">
                    <button type="button" class="btn-secondary" id="save-draft">Guardar borrador</button>
                    <button type="submit" class="btn-primary">Publicar evento</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const locationButtons = document.querySelectorAll('.location-btn');
            const presencialFields = document.getElementById('presencial-fields');
            const onlineFields = document.getElementById('online-fields');
            const locationTypeInput = document.getElementById('event-location-type');
            
            locationButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    locationButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    const locationType = this.getAttribute('data-type');
                    locationTypeInput.value = locationType;
                    
                    if (locationType === 'presencial') {
                        presencialFields.style.display = 'block';
                        onlineFields.style.display = 'none';
                    } else if (locationType === 'online') {
                        presencialFields.style.display = 'none';
                        onlineFields.style.display = 'block';
                    } else { 
                        presencialFields.style.display = 'block';
                        onlineFields.style.display = 'block';
                    }
                });
            });

            
            // Manejadores para tipo de entrada
            const ticketButtons = document.querySelectorAll('.ticket-btn');
            const paidFields = document.getElementById('paid-fields');
            const ticketTypeInput = document.getElementById('event-ticket-type');
            
            ticketButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    ticketButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    const ticketType = this.getAttribute('data-type');
                    ticketTypeInput.value = ticketType;
                    
                    if (ticketType === 'paid') {
                        paidFields.style.display = 'block';
                    } else {
                        paidFields.style.display = 'none';
                    }
                });
            });
            
            // Previsualización de imagen principal
            const eventImage = document.getElementById('event-image');
            const imagePreview = document.getElementById('image-preview');
            const previewImage = imagePreview.querySelector('img');
            const placeholderDiv = imagePreview.querySelector('.upload-placeholder');
            
            eventImage.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                        placeholderDiv.style.display = 'none';
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                }
            });
            
            // Preview de la galería
            const galleryInput = document.getElementById('event-gallery');
            const galleryPreview = document.getElementById('gallery-preview');
            
            galleryInput.addEventListener('change', function() {
                galleryPreview.innerHTML = '';
                
                if (this.files) {
                    Array.from(this.files).forEach(file => {
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            const imgContainer = document.createElement('div');
                            imgContainer.className = 'gallery-item';
                            
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            
                            const removeBtn = document.createElement('button');
                            removeBtn.className = 'remove-gallery-item';
                            removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                            removeBtn.addEventListener('click', function() {
                                imgContainer.remove();
                            });
                            
                            imgContainer.appendChild(img);
                            imgContainer.appendChild(removeBtn);
                            galleryPreview.appendChild(imgContainer);
                        }
                        
                        reader.readAsDataURL(file);
                    });
                }
            });
            
            // Clic en el área de previsualización para abrir el selector de archivos
            imagePreview.addEventListener('click', function() {
                eventImage.click();
            });
            
            document.querySelector('.file-upload-btn').addEventListener('click', function() {
                galleryInput.click();
            });
            
            // Guardar borrador
            document.getElementById('save-draft').addEventListener('click', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Borrador guardado',
                    text: 'Tu evento se ha guardado como borrador',
                    confirmButtonColor: '#ff5a5f'
                });
            });
            
            document.getElementById('event-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Tu evento se publicará y estará visible para todos los usuarios',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#ff5a5f',
                    cancelButtonColor: '#6e7881',
                    confirmButtonText: 'Sí, publicar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Evento publicado!',
                            text: 'Tu evento ha sido publicado correctamente',
                            confirmButtonColor: '#ff5a5f'
                        }).then(() => {
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>