<?php require_once './views/partials/session-start.php' ?>
<?php require_once './views/partials/load.php' ?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Evento</title>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo APP_URL; ?>views/CSS/sweetalert2.min.css">
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?php echo APP_URL; ?>views/CSS/crear.css">
</head>

<body>
    <?php require_once './views/partials/nav-bar.php'; ?>

    <div class="app-container">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <!-- HEADING -->
            <h3 class="heading"><i class="fas fa-calendar-plus"></i> Crear Evento</h3>

            <div class="form-container">
                <form id="eventForm" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="eventName" class="form-label">Nombre del Evento <span class="required">*</span></label>
                        <input type="text" id="eventName" class="input-field" placeholder="Nombre de tu evento" name="titulo" required>
                    </div>

                    <div class="form-group">
                        <label for="eventDescription" class="form-label">Descripción del Evento <span class="required">*</span></label>
                        <textarea id="eventDescription" class="input-field" placeholder="Describe los detalles de tu evento..." rows="3" name="descripcion" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="event-gallery" class="form-label">Imagen del Evento <span class="required">*</span></label>
                        <div class="file-upload-container">
                            <input type="file" id="event-gallery" class="input-field" accept="image/*" name="foto" required>
                        </div>
                        <div class="gallery-preview" id="gallery-preview"></div>
                    </div>

                    <div class="form-group">
                        <label for="event-category" class="form-label">Categoría <span class="required">*</span></label>
                        <select id="event-category" class="form-control" name="selectedCategory" required>
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
                        <label for="eventDate" class="form-label">Fecha del evento <span class="required">*</span></label>
                        <input type="date" id="eventDate" class="input-field" name="date" required>
                    </div>

                    <div class="form-group">
                        <label for="geocoder" class="form-label">Ubicación del Evento <span class="required">*</span></label>
                        <div id="geocoder"></div>
                    </div>

                    <div class="button-container">
                        <button type="button" id="manualModeBtn" class="btn btn-success"><i class="fas fa-map-marker-alt"></i> Seleccionar en mapa</button>
                        <button type="submit" id="addEventBtn" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Crear Evento</button>
                    </div>
                </form>
            </div>

            <div class="events-container">
                <h4 class="events-title"><i class="fas fa-calendar-alt"></i> Tus Eventos</h4>
                <ul id="eventsList" class="event-list">
                    <!-- Event items will be added here dynamically -->
                    <?php if (empty($eventos)): ?>
                    <div class="no-events">
                        <i class="fas fa-calendar-times"></i>
                        <p>No has creado eventos todavía</p>
                    </div>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- MAP -->
        <div id="map" class="map"></div>
    </div>

    <!-- Status indicator -->
    <div class="status-indicator" id="status-indicator"></div>

    <!-- Scripts -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>

    <script>
        const mapboxToken = 'pk.eyJ1Ijoic2FudGluby0yMSIsImEiOiJjbTlrOThieXUwanE2Mmtwbm14NG91Z2Y1In0.4ZaOrPV87tCrT0HIQBj_fg';

        let events = [];
        let selectedLocation = null;
        let draggableMarker = null;

        mapboxgl.accessToken = mapboxToken;
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11', // Using streets style for more color
            center: [-100.3161, 25.6866], // Monterrey, México
            zoom: 12.15
        });

        // Initialize geocoder
        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            placeholder: 'Ingresa la dirección del evento',
            marker: false
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
        geocoder.on('result', function(e) {
            selectedLocation = e.result;
            showStatusIndicator('Ubicación seleccionada: ' + selectedLocation.place_name);
            console.log("Ubicación seleccionada: " + selectedLocation.place_name);
            
            // If there's a marker, remove it
            if (draggableMarker) {
                draggableMarker.remove();
            }
            
            // Add a new marker at the selected location
            draggableMarker = new mapboxgl.Marker({
                draggable: true,
                color: '#ff5a5f'
            })
            .setLngLat(selectedLocation.geometry.coordinates)
            .addTo(map);
            
            // Update location when marker is dragged
            draggableMarker.on('dragend', () => {
                updateLocationFromMarker(draggableMarker);
            });
        });

        document.getElementById('manualModeBtn').addEventListener('click', function() {
            map.getCanvas().style.cursor = 'crosshair';
            showStatusIndicator('Haz clic en el mapa para seleccionar la ubicación');

            if (draggableMarker) {
                draggableMarker.remove();
            }

            // Set up click event on map
            map.once('click', (e) => {
                map.getCanvas().style.cursor = '';

                // Create draggable marker
                draggableMarker = new mapboxgl.Marker({
                        draggable: true,
                        color: '#ff5a5f'
                    })
                    .setLngLat([e.lngLat.lng, e.lngLat.lat])
                    .addTo(map);

                // Update location from marker position
                updateLocationFromMarker(draggableMarker);
                draggableMarker.on('dragend', () => {
                    updateLocationFromMarker(draggableMarker);
                });
            });
        });

        function updateLocationFromMarker(marker) {
            const lngLat = marker.getLngLat();

            fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${lngLat.lng},${lngLat.lat}.json?access_token=${mapboxgl.accessToken}`)
                .then(response => response.json())
                .then(data => {
                    if (data.features && data.features.length > 0) {
                        selectedLocation = {
                            geometry: {
                                coordinates: [lngLat.lng, lngLat.lat]
                            },
                            place_name: data.features[0].place_name
                        };
                        showStatusIndicator('Ubicación seleccionada: ' + selectedLocation.place_name);
                        console.log("Ubicación seleccionada manualmente: " + selectedLocation.place_name);
                    } else {
                        selectedLocation = {
                            geometry: {
                                coordinates: [lngLat.lng, lngLat.lat]
                            },
                            place_name: `Ubicación personalizada (${lngLat.lng.toFixed(6)}, ${lngLat.lat.toFixed(6)})`
                        };
                        showStatusIndicator('Ubicación personalizada seleccionada');
                        console.log("Ubicación seleccionada manualmente sin dirección conocida");
                    }
                })
                .catch(error => {
                    console.error('Error al obtener la dirección:', error);
                    selectedLocation = {
                        geometry: {
                            coordinates: [lngLat.lng, lngLat.lat]
                        },
                        place_name: `Ubicación personalizada (${lngLat.lng.toFixed(6)}, ${lngLat.lat.toFixed(6)})`
                    };
                    showStatusIndicator('Ubicación personalizada seleccionada');
                });
        }

        // Show status indicator with message
        function showStatusIndicator(message) {
            const indicator = document.getElementById('status-indicator');
            indicator.textContent = message;
            indicator.classList.add('active');
            
            // Hide after 3 seconds
            setTimeout(() => {
                indicator.classList.remove('active');
            }, 3000);
        }

        //////////////crear evento
        document.getElementById('eventForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const name = document.getElementById('eventName').value;
            const description = document.getElementById('eventDescription').value;

            if (!selectedLocation) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ubicación requerida',
                    text: 'Por favor, selecciona la ubicación del evento',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#ff5a5f'
                });
                return;
            }

            const formData = new FormData(document.getElementById('eventForm'));
            formData.append('coordenadas', JSON.stringify(selectedLocation.geometry.coordinates));
            formData.append('nombreLugar', selectedLocation.place_name);

            showStatusIndicator('Guardando evento...');
            console.log('Enviando formulario...');

            try {
                const response = await fetch("<?php echo APP_URL; ?>ajax/evento-ajax.php", {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();
                console.log('Respuesta recibida');

                if (data.tipo == "error") {
                    selectedLocation = null;
                    addMarkerToMap(data);
                    addEventToList(data);

                    Swal.fire({
                        icon: data.icono,
                        title: data.tituloTipo,
                        text: data.texto,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#ff5a5f'
                    });

                    // Reset form after successful submission
                    document.getElementById('eventName').value = '';
                    document.getElementById('eventDescription').value = '';
                    document.getElementById('eventDate').value = '';
                    document.getElementById('event-category').value = '';
                    document.getElementById('event-gallery').value = '';
                    document.getElementById('gallery-preview').innerHTML = '';
                    geocoder.clear();
                    
                    if (draggableMarker) {
                        draggableMarker.remove();
                        draggableMarker = null;
                    }
                    
                    showStatusIndicator('¡Evento creado con éxito!');
                    
                    // Scroll to events section
                    document.querySelector('.events-container').scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al crear el evento. Por favor, intenta de nuevo.',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#ff5a5f'
                });
                selectedLocation = null;
            }
        });

        // Add a marker to the map
        function addMarkerToMap(event) {
            console.log("Datos recibidos en addMarkerToMap:", event);

            // Verificar si las coordenadas existen y son numéricas
            const longitud = parseFloat(event.longitud);
            const latitud = parseFloat(event.latitud);

            console.log("Coordenadas procesadas:", longitud, latitud);

            if (isNaN(longitud) || isNaN(latitud)) {
                console.error("Coordenadas inválidas:", event.longitud, event.latitud);
                return; // No crear el marcador si las coordenadas no son válidas
            }

            const coordenadas = [longitud, latitud];

            const el = document.createElement('div');
            el.className = 'marker';

            // Create popup
            const popup = new mapboxgl.Popup({
                    offset: 25
                })
                .setHTML(`
                    <div class="popup-content">
                        <h3 class="popup-title">${event.titulo}</h3>
                        <img src="${event.ruta}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 10px;" />
                        <p class="popup-description">${event.descripcion}</p>
                        <p class="popup-description"><i class="fas fa-map-marker-alt" style="color: #ff5a5f;"></i> ${event.nombreLugar}</p>
                    </div>
                `);

            // Add marker to map
            new mapboxgl.Marker(el)
                .setLngLat(coordenadas)
                .setPopup(popup)
                .addTo(map);
                
            // Fly to the new marker
            map.flyTo({
                center: coordenadas,
                zoom: 15,
                essential: true
            });
        }

        // Add an event to the list
        function addEventToList(event) {
            console.log("Datos recibidos en addEventToList:", event);

            // Verificar si las coordenadas existen y son numéricas
            const longitud = parseFloat(event.longitud);
            const latitud = parseFloat(event.latitud);

            console.log("Coordenadas procesadas:", longitud, latitud);

            if (isNaN(longitud) || isNaN(latitud)) {
                console.error("Coordenadas inválidas:", event.longitud, event.latitud);
                return; // No crear el marcador si las coordenadas no son válidas
            }

            const coordenadas = [longitud, latitud];
            
            // Remove "no events" message if it exists
            const noEvents = document.querySelector('.no-events');
            if (noEvents) {
                noEvents.remove();
            }

            const eventsList = document.getElementById('eventsList');
            const li = document.createElement('li');
            li.className = 'event-item';
            li.dataset.id = event.id;
            li.innerHTML = `
                <div class="event-name">${event.titulo}</div>
                <div class="event-address"><i class="fas fa-map-marker-alt"></i>${event.nombreLugar}</div>
            `;

            // Add click event to fly to this event
            li.addEventListener('click', () => {
                map.flyTo({
                    center: coordenadas,
                    zoom: 17,
                    essential: true
                });
                
                // Add bounce effect to show which event was clicked
                li.style.animation = 'none';
                setTimeout(() => {
                    li.style.animation = 'bounce 0.5s';
                }, 10);
            });

            eventsList.insertBefore(li, eventsList.firstChild);
            
            // Add a quick animation to highlight the new event
            li.style.animation = 'bounce 0.5s';
        }
        
        // Bounce animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes bounce {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-10px); }
            }
        `;
        document.head.appendChild(style);

        // cargar eventos
        function loadEvents() {
            <?php foreach ($eventosPropios as $evento) { ?>
                events.push(<?php echo json_encode($evento); ?>);
            <?php } ?>

            // Verificar que los datos están completos antes de procesar
            if (events && events.length > 0) {
                events.forEach(event => {
                    console.log("Cargando evento:", event);
                    addMarkerToMap(event);
                    addEventToList(event);
                });
                
                // Adjust map bounds to show all markers
                if (events.length > 1) {
                    const bounds = new mapboxgl.LngLatBounds();
                    events.forEach(event => {
                        if (!isNaN(event.longitud) && !isNaN(event.latitud)) {
                            bounds.extend([parseFloat(event.longitud), parseFloat(event.latitud)]);
                        }
                    });
                    map.fitBounds(bounds, { padding: 50 });
                }
            }
        }

        // Set up event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Load events when map is ready
            map.on('load', loadEvents);

            // Preview uploaded image
            const galleryInput = document.getElementById('event-gallery');
            const galleryPreview = document.getElementById('gallery-preview');
            
            galleryInput.addEventListener('change', function() {
                galleryPreview.innerHTML = '';
                
                if (this.files && this.files[0]) {
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
                            galleryInput.value = '';
                        });
                        
                        imgContainer.appendChild(img);
                        imgContainer.appendChild(removeBtn);
                        galleryPreview.appendChild(imgContainer);
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                }
            });
            
            // Add map controls
            map.addControl(new mapboxgl.NavigationControl(), 'top-right');
            map.addControl(new mapboxgl.FullscreenControl(), 'top-right');
            
            // Add event to save marker location when the map is clicked
            map.on('click', function(e) {
                if (map.getCanvas().style.cursor === 'crosshair') {
                    map.getCanvas().style.cursor = '';
                }
            });
        });
    </script>
</body>

</html>