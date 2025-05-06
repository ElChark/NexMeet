<?php require_once './views/partials/head.php' ?>
<?php require_once './views/partials/session-start.php' ?>

<?php require_once './views/partials/load.php' ?>

<body>
    <?php require_once './views/partials/nav-bar.php'; ?>

    <div class="explorer-container">
        <div class="page-header">
            <h1><i class="fas fa-compass"></i> Explorar Eventos</h1>
            <p>Descubre eventos interesantes cerca de ti</p>
        </div>

        <!-- Filtros y categorías -->
        <div class="filters-container">
            <div class="filter-group">
                <h3>Categorías</h3>
                <div class="category-buttons">
                    <button class="category-btn active" data-category="todo"><i class="fas fa-star"></i>Todo</button>
                    <button class="category-btn" data-category="musica"><i class="fas fa-music"></i>Musica</button>
                    <button class="category-btn" data-category="arte"><i class="fas fa-palette"></i>Arte</button>
                    <button class="category-btn" data-category="deportes"><i class="fas fa-futbol"></i>Deportes</button>
                    <button class="category-btn" data-category="tecnologia"><i class="fas fa-laptop-code"></i>Tecnología</button>
                    <button class="category-btn" data-category="gastronomia"><i class="fas fa-utensils"></i>Gastronomía</button>
                    <button class="category-btn" data-category="educacion"><i class="fas fa-book"></i>Educación</button>
                </div>
            </div>

            <div class="filter-group">
                <h3>Fecha</h3>
                <div class="date-buttons">
                    <button class="date-btn active">Todos</button>
                    <button class="date-btn">Hoy</button>
                    <button class="date-btn">Esta semana</button>
                    <button class="date-btn">Este mes</button>
                    <button class="date-btn">Elegir fecha</button>
                </div>
            </div>

            <div class="filter-group">
                <h3>Ubicación</h3>
                <div class="location-search">
                    <input type="text" placeholder="Buscar por ubicación" class="location-input" />
                    <button class="location-btn"><i class="fas fa-map-marker-alt"></i></button>
                </div>
            </div>
        </div>

        <!-- Grid de eventos encontrados -->

        <div style="display: flex; gap: 50px; width: 80vw; padding-right: 100px">
            <div class="events-grid" id="events-grid">

            </div>
            <div id="map" class="map"></div>
        </div>



    </div>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>

    <script>
        const eventosGustados = <?php echo json_encode($eventosGustados); ?>;
        const eventosAsistiendo = <?php echo json_encode($asistiendo); ?>;



        mapboxgl.accessToken = 'pk.eyJ1Ijoic2FudGluby0yMSIsImEiOiJjbTlrOThieXUwanE2Mmtwbm14NG91Z2Y1In0.4ZaOrPV87tCrT0HIQBj_fg';

        let events = [];
        let selectedEvent = null;
        const currentUser = <?php echo $_SESSION['id_usuario'] ?>;
        const currentEmail = "<?php echo $_SESSION['correo'] ?>";

        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-100.3161, 25.6866], // Monterrey, México
            zoom: 12.15
        });

        async function addEventToList(event) {
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

            const eventsList = document.getElementById('events-grid');
            const li = document.createElement('article');
            li.classList.add('event-card');
            li.dataset.id = event.categoria;

            let fecha = new Date(event.fecha_evento);
            let opciones = {
                timeZone: 'UTC',
                day: 'numeric',
                month: 'short'
            };
            let fechaLocal = fecha.toLocaleDateString('es-ES', opciones);
            let [dia, mes] = fechaLocal.split(' ');

            let location = event.nombreLugar;
            let newLocation = location.slice(0, 50);


            let yaAsistira = false;
            for (let i = 0; i < eventosAsistiendo.length; i++) {
                if (eventosAsistiendo[i].id_evento == event.id_evento) {
                    yaAsistira = true;
                    break;
                }
            }

            let yaDioMeGusta = false;
            for (let i = 0; i < eventosGustados.length; i++) {
                if (eventosGustados[i].id_evento == event.id_evento &&
                    eventosGustados[i].id_usuario == currentUser) {
                    yaDioMeGusta = true;
                    break;
                }
            }
            // Definir estilos y textos según el estado
            const estiloAsistirBtn = yaAsistira ? 'background-color: #28a745; color: white;' : '';
            const textoAsistirBtn = yaAsistira ? 'Asistiré' : 'Asistir';

            const estiloMeGustaBtn = yaDioMeGusta ? 'background-color: green; color: white;' : '';
            const textoMeGustaBtn = yaDioMeGusta ? 'Me gustó' : 'Me gusta';

            li.innerHTML = `
                    <div class="event-image">
                        <img src="${event.foto_portada}" alt="Evento">
                        <div class="event-date">
                            <span class="event-day">${dia}</span>
                            <span class="event-month">${mes}</span>
                        </div>
                    </div>
                    <div class="event-info">
                        <span class="event-category">${event.categoria}</span>
                        <h3 class="event-title">${event.titulo}</h3>
                        <p class="event-location"><i class="fas fa-map-marker-alt"></i>${newLocation}</p>
                        <div class="event-footer">
                            <button class="attend-btn" id="attend-btn" style="${estiloAsistirBtn}">${textoAsistirBtn}</button>
                            <button class="attend-btn" id="reaction-btn" style="${estiloMeGustaBtn}">${textoMeGustaBtn}</button>
                            <button class="attend-btn" id="comment-btn">...</button>
                        </div>
                    </div>
                `;

            // Add click event to fly to this event
            li.addEventListener('click', () => {
                map.flyTo({
                    center: coordenadas,
                    zoom: 17,
                    essential: true
                });
            });


            const attendBtn = li.querySelector('#attend-btn');
            attendBtn.addEventListener('click', async (e) => {
                e.stopPropagation();

                console.log('Botón Asistir clickeado para el evento:', event.id_evento);


                const objetoTmp = {
                    user: currentUser,
                    evento: event.id_evento,
                    correo: currentEmail
                };

                console.log('Peticion enviada')
                const response = await fetch("<?php echo APP_URL ?>controllers/CorreoController.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(objetoTmp)
                });

                const data = await response.json();

                if (data.tipo == 'success') {
                    Swal.fire({
                        icon: data.icono,
                        title: data.titulo,
                        text: data.texto
                    })
                } else {
                    Swal.fire({
                        icon: data.icono,
                        title: data.titulo,
                        text: data.texto
                    })
                }

            });

            const reactionBtn = li.querySelector('#reaction-btn');
            reactionBtn.addEventListener('click', async (e) => {
                e.stopPropagation();

                console.log(event.titulo + 'me gusta');

                const statusBtn = yaDioMeGusta ? 'eliminar' : 'insertar';

                console.log(statusBtn);
                const objetoTmp = {
                    idEvento: event.id_evento,
                    idUsuario: currentUser,
                    tipo: statusBtn
                }

                try {
                    const response = await fetch("<?php echo APP_URL ?>ajax/reaction-ajax.php", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(objetoTmp)
                    });

                    const data = await response.json();
                    console.log('La reaccion ha sido producido, el json ha sido regresado');

                    if (data.status == 'error') {
                        console.log('Ha ocurrido un error');
                    } else if (data.status == 'okGustado') {
                        reactionBtn.textContent = data.info;
                        reactionBtn.style.background = 'green';
                        reactionBtn.style.color = 'white';

                        eventosGustados.push({
                            id_usuario: currentUser,
                            id_evento: event.id_evento
                        });
                        yaDioMeGusta = true;

                    } else if (data.status == 'okNoGustado') {
                        reactionBtn.textContent = data.info;
                        reactionBtn.style.background = '#ff5a5f';
                        reactionBtn.style.color = 'white';


                        for (let i = 0; i < eventosGustados.length; i++) {
                            if (eventosGustados[i].id_evento == event.id_evento &&
                                eventosGustados[i].id_usuario == currentUser) {
                                eventosGustados.splice(i, 1);
                                break;
                            }
                        }
                        yaDioMeGusta = false;
                    }
                } catch (error) {
                    console.error('Error al procesar la reacción:', error);
                }
            });

            const commentBtn = li.querySelector('#comment-btn');
            commentBtn.addEventListener('click', async (e) => {
                e.stopPropagation();

                const existing = document.querySelector('.comment-modal-backdrop');
                if (existing) existing.remove();

                const backdrop = document.createElement('div');
                backdrop.classList.add('comment-modal-backdrop');


                const commentModule = document.createElement('section');
                commentModule.classList.add('comment-modal');
                commentModule.innerHTML = `
                                <div class="modal-section">
                                    <h4 class="modal-section-title">Comentarios</h4>
                                    <div id="comentarios" class="modal-comments">
                                        <div class="comment">
                                            <span class="comment-author">Juan Pérez:</span>
                                            <span>¡Este evento está increíble!</span>
                                        </div>
                                        <div class="comment">
                                            <span class="comment-author">Ana López:</span>
                                            <span>Me parece una gran oportunidad para conocer gente nueva.</span>
                                        </div>
                                    </div>
                                    <div class="modal-comment-form">
                                        <input type="text" id="nuevoComentario" class="modal-comment-input" placeholder="Escribe un comentario...">
                                        <button id="enviarComentario" class="modal-comment-btn">Comentar</button>
                                    </div>
                                </div>
                            `;

                backdrop.appendChild(commentModule);
                document.body.appendChild(backdrop);

                backdrop.addEventListener('click', (e) => {
                    if (e.target === backdrop) {
                        backdrop.remove();
                    }
                });
            });

            eventsList.appendChild(li);
        }

        function addMarkerToMap(event) {
            console.log("Datos recibidos en addMarkerToList:", event);

            // Verificar si las coordenadas existen y son numéricas
            const longitud = parseFloat(event.longitud);
            const latitud = parseFloat(event.latitud);

            console.log("Coordenadas procesadas:", longitud, latitud);

            if (isNaN(longitud) || isNaN(latitud)) {
                console.error("Coordenadas inválidas:", event.longitud, event.latitud);
                return;
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

        // Cargar eventos
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


        map.on('load', loadEvents);


        /////////////////////////////

        document.addEventListener('DOMContentLoaded', function() {
            ////// filtros por categorias
            const categoryButtons = document.querySelectorAll('.category-btn');

            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {

                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const filterCategory = this.dataset.category;
                    const eventCards = document.querySelectorAll('.event-card');

                    eventCards.forEach(card => {
                        const cardCategory = card.dataset.id;

                        if (filterCategory === 'todo' || cardCategory === filterCategory) {
                            card.classList.remove('notShow');
                        } else {
                            card.classList.add('notShow');
                        }
                    });
                });
            })

            // filtros por fecha
            const dateButtons = document.querySelectorAll('.date-btn');
            dateButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    dateButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    if (this.textContent === 'Elegir fecha') {}
                });
            });




            // Manejador para paginación mejorada
            // const paginationItems = document.querySelectorAll('.pagination-number');
            // const paginationPrev = document.querySelector('.pagination-arrow.prev');
            // const paginationNext = document.querySelector('.pagination-arrow.next');
            // const pageIndicator = document.querySelector('.page-indicator');

            // function updatePage(pageNumber) {
            //     // Actualizar clases activas
            //     paginationItems.forEach(item => {
            //         item.classList.remove('active');
            //     });

            //     // Encontrar y activar el nuevo número de página
            //     const newActivePage = document.querySelector(`.pagination-number[data-page="${pageNumber}"]`);
            //     if (newActivePage) {
            //         newActivePage.classList.add('active');
            //     }

            //     // Actualizar indicador de página
            //     pageIndicator.textContent = `Página ${pageNumber} de 5`;

            //     // Deshabilitar/habilitar botones de navegación
            //     if (pageNumber === 1) {
            //         paginationPrev.classList.add('disabled');
            //     } else {
            //         paginationPrev.classList.remove('disabled');
            //     }

            //     if (pageNumber === 5) {
            //         paginationNext.classList.add('disabled');
            //     } else {
            //         paginationNext.classList.remove('disabled');
            //     }

            //     // Desplazarse hacia arriba suavemente
            //     window.scrollTo({
            //         top: document.querySelector('.filters-container').offsetTop - 80,
            //         behavior: 'smooth'
            //     });
            // }

            // // Inicializar estado de paginación
            // updatePage(1);

            // // Añadir eventos a los números de página
            // paginationItems.forEach(item => {
            //     item.addEventListener('click', function(e) {
            //         e.preventDefault();
            //         const pageNumber = parseInt(this.getAttribute('data-page'));
            //         updatePage(pageNumber);
            //     });
            // });

            // // Añadir eventos a los botones de navegación
            // paginationPrev.addEventListener('click', function(e) {
            //     e.preventDefault();
            //     const activePage = document.querySelector('.pagination-number.active');
            //     const currentPage = parseInt(activePage.getAttribute('data-page'));

            //     if (currentPage > 1) {
            //         updatePage(currentPage - 1);
            //     }
            // });

            // paginationNext.addEventListener('click', function(e) {
            //     e.preventDefault();
            //     const activePage = document.querySelector('.pagination-number.active');
            //     const currentPage = parseInt(activePage.getAttribute('data-page'));

            //     if (currentPage < 5) {
            //         updatePage(currentPage + 1);
            //     }
            // });
        });
    </script>
</body>

</html>