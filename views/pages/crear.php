<?php require_once './views/partials/session-start.php' ?>
<?php require_once './views/partials/eventos-load.php' ?>
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
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --success: #10b981;
            --sidebar-bg: #1f2937;
            --input-bg: #374151;
            --input-border: #4b5563;
            --text-light: #f9fafb;
            --text-muted: #9ca3af;
            --card-hover: #4b5563;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            font-family: 'Inter', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            height: 100%;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }

        .flex {
            display: flex;
        }

        /* Layout */
        .app-container {
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 25%;
            background-color: var(--sidebar-bg);
            height: 100vh;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        /* Logo container */
        .logo-container {
            display: flex;
            justify-content: center;
            padding: 2rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo-container img {
            height: 3.5rem;
        }

        /* Heading */
        .heading {
            color: white;
            font-weight: 700;
            text-align: center;
            font-size: 1.875rem;
            margin-top: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        /* Form */
        .form-container {
            padding: 0 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            width: 100%;
            margin-top: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-light);
        }

        .input-field {
            width: 100%;
            padding: 0.625rem;
            border-radius: 0.375rem;
            border: 1px solid var(--input-border);
            background-color: var(--input-bg);
            color: white;
            font-family: inherit;
        }

        .input-field::placeholder {
            color: var(--text-muted);
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .btn {
            font-weight: 600;
            padding: 0.625rem 1.25rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-success {
            background-color: var(--success);
            color: white;
        }

        /* Map */
        .map {
            height: 100vh;
            width: 75%;
        }

        /* Popup styles */
        .mapboxgl-popup {
            max-width: 300px;
        }

        .popup-content {
            padding: 1rem;
        }

        .popup-title {
            font-weight: 700;
            font-size: 1.125rem;
            margin-bottom: 0.5rem;
        }

        .popup-description {
            font-size: 0.875rem;
            color: #4b5563;
            margin-bottom: 0.5rem;
        }

        /* Custom geocoder styles */
        .mapboxgl-ctrl-geocoder {
            width: 100% !important;
            max-width: 100% !important;
            font-family: inherit;
        }

        /* Event list */
        .events-container {
            margin-top: 1rem;
            padding: 0 1rem;
            flex-grow: 1;
            overflow-y: auto;
        }

        .events-title {
            color: white;
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .event-list {
            list-style-type: none;
        }

        .event-item {
            background-color: var(--input-bg);
            border-radius: 0.375rem;
            padding: 0.75rem;
            margin-bottom: 0.5rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .event-item:hover {
            background-color: var(--card-hover);
        }

        .event-name {
            font-weight: 600;
            color: white;
            font-size: 0.875rem;
        }

        .event-address {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-top: 0.25rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* File upload */
        .file-upload-container {
            margin-top: 0.5rem;
        }

        .gallery-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        /* Marker style */
        .marker {
            background-color: var(--primary);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid white;
        }
    </style>
</head>

<body>
    <?php require_once './views/partials/nav-bar.php'; ?>

    <div class="app-container">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <!-- HEADING -->
            <h3 class="heading">Agregar Evento</h3>

            <div class="form-container">
                <form id="eventForm" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="eventName" class="form-label">Nombre del Evento</label>
                        <input type="text" id="eventName" class="input-field" placeholder="Evento en Monterrey" name="titulo" required>
                    </div>

                    <div class="form-group">
                        <label for="eventDescription" class="form-label">Descripción del Evento</label>
                        <textarea id="eventDescription" class="input-field" placeholder="Habrá refrigerios muy buenos" rows="3" name="descripcion" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="event-gallery" class="form-label">Galería (opcional)</label>
                        <div class="file-upload-container">
                            <input type="file" id="event-gallery" class="input-field" accept="image/*" name="foto">
                        </div>
                        <div class="gallery-preview" id="gallery-preview"></div>
                    </div>

                    <div class="form-group">
                        <label for="event-category" class="form-label">Categoría</label>
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
                        <label for="eventDate" class="form-label">Fecha del evento</label>
                        <input type="date" id="eventDate" class="input-field" name="date" required></input>
                    </div>


                    <div class="form-group">
                        <label for="geocoder" class="form-label">Dirección del Evento</label>
                        <div id="geocoder"></div>
                    </div>

                    <div class="button-container">
                        <button type="button" id="manualModeBtn" class="btn btn-success">Seleccionar en mapa</button>
                        <button type="submit" id="addEventBtn" class="btn btn-primary">Agregar Evento</button>
                    </div>
                </form>
            </div>

            <div class="events-container">
                <h4 class="events-title">Tus Eventos</h4>
                <ul id="eventsList" class="event-list">
                    <!-- Event items will be added here dynamically -->
                </ul>
            </div>
        </div>

        <!-- MAP -->
        <div id="map" class="map"></div>
    </div>

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
            style: 'mapbox://styles/mapbox/outdoors-v11',
            center: [-100.3161, 25.6866], // Monterrey, México
            zoom: 12.15
        });

        // Initialize geocoder
        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            placeholder: 'Ingrese la dirección',
            marker: false
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
        geocoder.on('result', function(e) {
            selectedLocation = e.result;
            console.log("Ubicación seleccionada: " + selectedLocation.place_name);
        });



        document.getElementById('manualModeBtn').addEventListener('click', function() {
            map.getCanvas().style.cursor = 'crosshair';

            if (draggableMarker) {
                draggableMarker.remove();
            }

            // Set up click event on map
            map.once('click', (e) => {
                map.getCanvas().style.cursor = '';

                // Create draggable marker
                draggableMarker = new mapboxgl.Marker({
                        draggable: true,
                        color: '#10b981'
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
                        console.log("Ubicación seleccionada manualmente: " + selectedLocation.place_name);

                    } else {
                        selectedLocation = {
                            geometry: {
                                coordinates: [lngLat.lng, lngLat.lat]
                            },
                            place_name: `Ubicación personalizada (${lngLat.lng.toFixed(6)}, ${lngLat.lat.toFixed(6)})`
                        };
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
                });
        }

        //////////////crear evento
        document.getElementById('eventForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const name = document.getElementById('eventName').value;
            const description = document.getElementById('eventDescription').value;

            if (!selectedLocation) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Pon la ubicacion rei',
                    confirmButtonText: 'Aceptar'
                });
                return;
            }

            const formData = new FormData(document.getElementById('eventForm'));

            console.log(selectedLocation.geometry.coordinates);


            formData.append('coordenadas', JSON.stringify(selectedLocation.geometry.coordinates));
            formData.append('nombreLugar', selectedLocation.place_name);

            console.log('Enviando formulario...');



            try {
                const response = await fetch("<?php echo  APP_URL; ?>ajax/evento-ajax.php", {
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
                        confirmButtonText: 'Aceptar'
                    });
                }

                document.getElementById('eventName').value = '';
                document.getElementById('eventDescription').value = '';
                document.getElementById('eventDate').value = '';
                document.getElementById('event-category').value = '';
                document.getElementById('event-gallery').value = '';

                geocoder.clear();
                
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'errorsazo',
                    text: 'tas bien wey',
                    confirmButtonText: 'Aceptar'
                });
                selectedLocation = null;
            }



        });


        // Add a marker to the map
        function addMarkerToMap(event) {

            console.log("Datos recibidos en addMarkerToList:", event);

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
                            <img src=${event.foto_portada} style="width: 150px; height: 150px;" />
                            <p class="popup-description">${event.descripcion}</p>
                            <p class="popup-description">${event.nombreLugar}</p>
                        </div>
                        `);

            // Add marker to map
            new mapboxgl.Marker(el)
                .setLngLat(coordenadas)
                .setPopup(popup)
                .addTo(map);
        }

        // Add an event to the list
        function addEventToList(event) {
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

            const eventsList = document.getElementById('eventsList');
            const li = document.createElement('li');
            li.className = 'event-item';
            li.dataset.id = event.id;
            li.innerHTML = `
                                <div class="event-name">${event.titulo}</div>
                                <div class="event-address">${event.nombreLugar}</div>
                            `;

            // Add click event to fly to this event
            li.addEventListener('click', () => {
                map.flyTo({
                    center: coordenadas,
                    zoom: 17,
                    essential: true
                });
            });

            eventsList.appendChild(li);
        }

        // cargar eventos
        function loadEvents() {
            <?php foreach ($eventos as $evento) { ?>
                events.push(<?php echo json_encode($evento); ?>);
                console.log('Aqui entra?')
            <?php } ?>

            // Verificar que los datos están completos antes de procesar
            if (events) {
                events.forEach(event => {
                    console.log("Cargando evento:", event);
                    addMarkerToMap(event);
                    addEventToList(event);
                })

            }

        }

        // Set up event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Load events when map is ready
            map.on('load', loadEvents);

            // Form submission via Enter key
            document.getElementById('eventDescription').addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                   console.log(selectedCategory);
                }
            });
        });
    </script>
</body>

</html>