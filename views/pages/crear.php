<?php require_once './views/partials/head.php' ?>
<?php require_once './views/partials/session-start.php' ?>

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
                        <input type="text" id="event-title" class="form-control" required placeholder="Agrega un título claro y atractivo">
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
            // Manejadores para tipo de ubicación
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
                    } else { // híbrido
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
            
            // Envío del formulario
            document.getElementById('event-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Aquí iría la validación completa del formulario
                
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
                        // Aquí iría el código para enviar el formulario
                        Swal.fire({
                            icon: 'success',
                            title: '¡Evento publicado!',
                            text: 'Tu evento ha sido publicado correctamente',
                            confirmButtonColor: '#ff5a5f'
                        }).then(() => {
                            // Redireccionar a la página de evento creado
                            // window.location.href = 'mi-evento';
                        });
                    }
                });
            });
        });
    </script>

    <style>
        /* Estilos específicos para la página de crear evento */
        :root {
            --primary-color: #ff5a5f;
            --secondary-color: #00a699;
            --text-color: #484848;
            --light-gray: #f7f7f7;
            --medium-gray: #e4e4e4;
            --dark-gray: #767676;
            --white: #ffffff;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .create-event-container {
            max-width: 800px;
            margin: 90px auto 40px;
            padding: 0 20px;
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .page-header h1 {
            font-size: 2.2rem;
            color: var(--text-color);
            margin-bottom: 10px;
        }
        
        .page-header i {
            color: var(--primary-color);
        }
        
        .page-header p {
            font-size: 1.1rem;
            color: var(--dark-gray);
        }
        
        .create-event-form {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 30px;
        }
        
        .form-section {
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid var(--medium-gray);
        }
        
        .form-section:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .section-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-gray);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
        }
        
        .form-group.half {
            flex: 1;
        }
        
        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-color);
        }
        
        .required {
            color: var(--primary-color);
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--medium-gray);
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(255, 90, 95, 0.2);
            outline: none;
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }
        
        select.form-control {
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23484848" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px"><path d="M7 10l5 5 5-5z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 30px;
        }
        
        .form-text {
            display: block;
            margin-top: 5px;
            font-size: 12px;
            color: var(--dark-gray);
        }
        
        .location-type-toggle, .ticket-type-toggle {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .location-btn, .ticket-btn {
            flex: 1;
            padding: 12px;
            background-color: var(--light-gray);
            border: 1px solid var(--medium-gray);
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .location-btn:hover, .ticket-btn:hover {
            background-color: var(--medium-gray);
        }
        
        .location-btn.active, .ticket-btn.active {
            background-color: rgba(255, 90, 95, 0.1);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        .location-btn i, .ticket-btn i {
            font-size: 16px;
        }
        
        .file-upload-container {
            position: relative;
            margin-bottom: 10px;
        }
        
        .file-upload-preview {
            width: 100%;
            height: 200px;
            border: 2px dashed var(--medium-gray);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s;
        }
        
        .file-upload-preview:hover {
            border-color: var(--primary-color);
            background-color: rgba(255, 90, 95, 0.05);
        }
        
        .upload-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            color: var(--dark-gray);
        }
        
        .upload-placeholder i {
            font-size: 40px;
        }
        
        .file-upload-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        input[type="file"] {
            position: absolute;
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            z-index: -1;
        }
        
        .file-upload-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: var(--light-gray);
            border: 1px solid var(--medium-gray);
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .file-upload-btn:hover {
            background-color: var(--medium-gray);
        }
        
        .gallery-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        
        .gallery-item {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .remove-gallery-item {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
            transition: background-color 0.2s;
        }
        
        .remove-gallery-item:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
        
        .price-input {
            position: relative;
        }
        
        .currency-symbol {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--dark-gray);
        }
        
        .price-input .form-control {
            padding-left: 30px;
        }
        
        .checkbox-group {
            margin-bottom: 15px;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            font-size: 15px;
            font-weight: normal;
            user-select: none;
        }
        
        .checkbox-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }
        
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: var(--light-gray);
            border: 1px solid var(--medium-gray);
            border-radius: 4px;
        }
        
        .checkbox-container:hover input ~ .checkmark {
            background-color: var(--medium-gray);
        }
        
        .checkbox-container input:checked ~ .checkmark {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        
        .checkbox-container input:checked ~ .checkmark:after {
            display: block;
        }
        
        .checkbox-container .checkmark:after {
            left: 7px;
            top: 3px;
            width: 6px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn-primary, .btn-secondary {
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }
        
        .btn-primary:hover {
            background-color: #e63946;
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background-color: var(--light-gray);
            color: var(--text-color);
            border: 1px solid var(--medium-gray);
        }
        
        .btn-secondary:hover {
            background-color: var(--medium-gray);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 15px;
            }
            
            .location-type-toggle, .ticket-type-toggle {
                flex-direction: column;
            }
            
            .create-event-form {
                padding: 20px;
            }
        }
        
        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 1.8rem;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .gallery-item {
                width: 80px;
                height: 80px;
            }
            
            .section-title {
                font-size: 1.2rem;
            }
        }
    </style>
</body>
</html>
                <!-- Sección de fecha y hora -->
                <div class="form-section">
                    <h2 class="section-title">Fecha y hora</h2>
                    
                    <div class="form-row">
                        <div class="form-group half">
                            <label for="event-start-date">Fecha de inicio <span class="required">*</span></label>
                            <input type="date" id="event-start-date" class="form-control" required>
                        </div>
                        
                        <div class="form-group half">
                            <label for="event-start-time">Hora de inicio <span class="required">*</span></label>
                            <input type="time" id="event-start-time" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group half">
                            <label for="event-end-date">Fecha de finalización</label>
                            <input type="date" id="event-end-date" class="form-control">
                        </div>
                        
                        <div class="form-group half">
                            <label for="event-end-time">Hora de finalización</label>
                            <input type="time" id="event-end-time" class="form-control">
                        </div>
                    </div>