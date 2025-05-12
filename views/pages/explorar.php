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

    <script type="module">
        import { addEventToList } from '/views/js/add-event-to-grid.js';
        import { addMarkerToMap } from "/views/js/add-marker-to-map.js";


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



        map.on('load', function loadEvents() {
            <?php foreach ($eventos as $evento) { ?>
            events.push(<?php echo json_encode($evento); ?>);
            <?php } ?>

            // Verificar que los datos están completos antes de procesar
            if (events) {
                events.forEach(event => {
                    addMarkerToMap(event, map);
                    addEventToList(event, map, eventosGustados, eventosAsistiendo, currentUser, currentEmail);
                })

            }
        });


        document.addEventListener('DOMContentLoaded', function() {
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

        });
    </script>
</body>

</html>