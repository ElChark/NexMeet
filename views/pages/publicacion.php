<?php require_once './views/partials/head.php' ?>
<body>
    <?php require_once './views/partials/nav-bar.php'; ?>

    <div class="publicacion-container">
        <div class="page-header">
            <h1><i class="fas fa-edit"></i> Crear Publicación</h1>
            <p>Comparte actualizaciones, historias o anuncios con la comunidad</p>
        </div>

        <div class="publicacion-form-container">
            <form id="publicacion-form" enctype="multipart/form-data" method="post">
                <!-- Contenido principal de la publicación -->
                <div class="form-section">
                    <h2 class="section-title">Información principal</h2>

                    <div class="form-group">
                        <label for="publicacion-titulo">Título <span class="required">*</span></label>
                        <input type="text" id="publicacion-titulo" class="form-control" name="titulo" required placeholder="Añade un título atractivo">
                    </div>

                    <div class="form-group">
                        <label for="publicacion-contenido">Contenido <span class="required">*</span></label>
                        <textarea id="publicacion-contenido" class="form-control" rows="6" required placeholder="¿Qué quieres compartir con la comunidad?" name="contenido"></textarea>
                    </div>
                </div>

                <!-- Multimedia -->
                <div class="form-section">
                    <h2 class="section-title">Multimedia</h2>
                    <div class="form-group">
                        <label for="publicacion-image">Imágenes (opcional)</label>
                        <div class="file-upload-container">
                            <div class="file-upload-preview" id="image-preview">
                                <div class="upload-placeholder">
                                    <i class="fas fa-images"></i>
                                    <span>Arrastra o haz clic para subir imágenes</span>
                                </div>
                            </div>
                            <input type="file" id="publicacion-image" class="form-control-file" accept="image/*" name="foto">
                        </div>
                        <div class="gallery-preview" id="gallery-preview"></div>
                    </div>

                    <div class="form-group">
                        <label for="publicacion-video">Video (opcional)</label>
                        <div class="file-upload-container">
                            <div class="file-upload-btn">
                                <i class="fas fa-video"></i> Subir video
                            </div>
                            <input type="file" id="publicacion-video" class="form-control-file" accept="video/*">
                        </div>
                        <div id="video-preview" class="video-preview"></div>
                        <small class="form-text">Formato MP4, MOV - Máximo 50MB, duración máxima 2 minutos</small>
                    </div>
                </div>

                <!-- Configuración de visibilidad -->
                <div class="form-section">
                    <!-- Botones de acción -->
                    <div class="form-actions">
                        <button type="button" class="btn-secondary" id="save-draft">Guardar borrador</button>
                        <button type="submit" class="btn-primary"><i class="fas fa-paper-plane"></i> Publicar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Previsualización de imágenes
            const imageInput = document.getElementById('publicacion-image');
            const galleryPreview = document.getElementById('gallery-preview');
            const imagePreview = document.getElementById('image-preview');

            imageInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    document.querySelector('.upload-placeholder').style.display = 'none';
                    galleryPreview.innerHTML = '';

                    // Limitar a 10 imágenes
                    const filesToShow = Array.from(this.files).slice(0, 10);

                    filesToShow.forEach(file => {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const imgContainer = document.createElement('div');
                            imgContainer.className = 'gallery-item';

                            const img = document.createElement('img');
                            img.src = e.target.result;

                            const removeBtn = document.createElement('button');
                            removeBtn.className = 'remove-gallery-item';
                            removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                            removeBtn.addEventListener('click', function(e) {
                                e.preventDefault();
                                imgContainer.remove();

                                // Mostrar placeholder si se eliminan todas las imágenes
                                if (galleryPreview.children.length === 0) {
                                    document.querySelector('.upload-placeholder').style.display = 'flex';
                                }
                            });

                            imgContainer.appendChild(img);
                            imgContainer.appendChild(removeBtn);
                            galleryPreview.appendChild(imgContainer);
                        }

                        reader.readAsDataURL(file);
                    });
                }
            });

            // Previsualización de video
            const videoInput = document.getElementById('publicacion-video');
            const videoPreview = document.getElementById('video-preview');

            videoInput.addEventListener('change', function() {
                videoPreview.innerHTML = '';

                if (this.files && this.files[0]) {
                    const videoFile = this.files[0];
                    const videoElement = document.createElement('video');
                    videoElement.controls = true;
                    videoElement.className = 'video-preview-element';

                    const source = document.createElement('source');
                    source.src = URL.createObjectURL(videoFile);
                    source.type = videoFile.type;

                    videoElement.appendChild(source);

                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'remove-video-btn';
                    removeBtn.innerHTML = '<i class="fas fa-times"></i>';

                    removeBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        videoPreview.innerHTML = '';
                        videoInput.value = '';
                    });

                    videoPreview.appendChild(videoElement);
                    videoPreview.appendChild(removeBtn);
                }
            });

            // Hacer clic en el área de previsualización para subir imágenes
            imagePreview.addEventListener('click', function() {
                imageInput.click();
            });

            document.querySelector('.file-upload-btn').addEventListener('click', function() {
                videoInput.click();
            });

            // Guardar borrador
            document.getElementById('save-draft').addEventListener('click', function() {
                // Aquí iría la lógica para guardar el borrador
                Swal.fire({
                    icon: 'success',
                    title: 'Borrador guardado',
                    text: 'Tu publicación se ha guardado como borrador',
                    confirmButtonColor: '#ff5a5f'
                });
            });

            // Crear publicacion reiiiii
            document.getElementById('publicacion-form').addEventListener('submit', async (e) => {
                e.preventDefault();

                const formData = new FormData(document.getElementById('publicacion-form'));

                console.log('Enviando formulario...');

                const response = await fetch("<?php echo  APP_URL; ?>ajax/publicaciones-ajax.php", {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.tipo == "error") {


                    document.getElementById('publicacion-titulo').value = '';
                    document.getElementById('publicacion-contenido').value = '';
                    document.getElementById('publicacion-image').value = '';

                    


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
        });
    </script>
</body>

</html>