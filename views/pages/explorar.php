<?php require_once './views/partials/head.php' ?>
<?php require_once './views/partials/session-start.php' ?>

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
                    <button class="category-btn active"><i class="fas fa-star"></i> Todo</button>
                    <button class="category-btn"><i class="fas fa-music"></i> Música</button>
                    <button class="category-btn"><i class="fas fa-palette"></i> Arte</button>
                    <button class="category-btn"><i class="fas fa-futbol"></i> Deportes</button>
                    <button class="category-btn"><i class="fas fa-laptop-code"></i> Tecnología</button>
                    <button class="category-btn"><i class="fas fa-utensils"></i> Gastronomía</button>
                    <button class="category-btn"><i class="fas fa-book"></i> Educación</button>
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
                    <input type="text" placeholder="Buscar por ubicación" class="location-input">
                    <button class="location-btn"><i class="fas fa-map-marker-alt"></i></button>
                </div>
            </div>
        </div>
        
        <!-- Grid de eventos encontrados -->
        <div class="events-grid">
            <!-- Esta sección se llenaría dinámicamente, pero por ahora incluiremos ejemplos estáticos -->
            <div class="event-card">
                <div class="event-image">
                    <img src="https://via.placeholder.com/300x200/ff5a5f/ffffff?text=Festival+de+Cine" alt="Evento">
                    <div class="event-date">
                        <span class="event-day">15</span>
                        <span class="event-month">MAY</span>
                    </div>
                </div>
                <div class="event-info">
                    <span class="event-category">Arte</span>
                    <h3 class="event-title">Festival Internacional de Cine</h3>
                    <p class="event-location"><i class="fas fa-map-marker-alt"></i> Teatro Municipal</p>
                    <div class="event-footer">
                        <span class="event-price">$150</span>
                        <button class="attend-btn">Asistir</button>
                    </div>
                </div>
            </div>
            
            <div class="event-card">
                <div class="event-image">
                    <img src="https://via.placeholder.com/300x200/00a699/ffffff?text=Concierto" alt="Evento">
                    <div class="event-date">
                        <span class="event-day">22</span>
                        <span class="event-month">JUN</span>
                    </div>
                </div>
                <div class="event-info">
                    <span class="event-category">Música</span>
                    <h3 class="event-title">Concierto de Jazz en vivo</h3>
                    <p class="event-location"><i class="fas fa-map-marker-alt"></i> Auditorio Central</p>
                    <div class="event-footer">
                        <span class="event-price">$80</span>
                        <button class="attend-btn">Asistir</button>
                    </div>
                </div>
            </div>
            
            <div class="event-card">
                <div class="event-image">
                    <img src="https://via.placeholder.com/300x200/484848/ffffff?text=Maratón" alt="Evento">
                    <div class="event-date">
                        <span class="event-day">5</span>
                        <span class="event-month">JUL</span>
                    </div>
                </div>
                <div class="event-info">
                    <span class="event-category">Deportes</span>
                    <h3 class="event-title">Maratón Urbana 10K</h3>
                    <p class="event-location"><i class="fas fa-map-marker-alt"></i> Parque Central</p>
                    <div class="event-footer">
                        <span class="event-price">$25</span>
                        <button class="attend-btn">Asistir</button>
                    </div>
                </div>
            </div>
            
            <div class="event-card">
                <div class="event-image">
                    <img src="https://via.placeholder.com/300x200/ff5a5f/ffffff?text=Workshop" alt="Evento">
                    <div class="event-date">
                        <span class="event-day">12</span>
                        <span class="event-month">AGO</span>
                    </div>
                </div>
                <div class="event-info">
                    <span class="event-category">Tecnología</span>
                    <h3 class="event-title">Workshop de Programación Web</h3>
                    <p class="event-location"><i class="fas fa-map-marker-alt"></i> Centro Tecnológico</p>
                    <div class="event-footer">
                        <span class="event-price">$50</span>
                        <button class="attend-btn">Asistir</button>
                    </div>
                </div>
            </div>
            
            <div class="event-card">
                <div class="event-image">
                    <img src="https://via.placeholder.com/300x200/00a699/ffffff?text=Festival+Gastronómico" alt="Evento">
                    <div class="event-date">
                        <span class="event-day">18</span>
                        <span class="event-month">SEP</span>
                    </div>
                </div>
                <div class="event-info">
                    <span class="event-category">Gastronomía</span>
                    <h3 class="event-title">Festival Gastronómico Internacional</h3>
                    <p class="event-location"><i class="fas fa-map-marker-alt"></i> Plaza de Comidas</p>
                    <div class="event-footer">
                        <span class="event-price">$30</span>
                        <button class="attend-btn">Asistir</button>
                    </div>
                </div>
            </div>
            
            <div class="event-card">
                <div class="event-image">
                    <img src="https://via.placeholder.com/300x200/484848/ffffff?text=Conferencia" alt="Evento">
                    <div class="event-date">
                        <span class="event-day">25</span>
                        <span class="event-month">OCT</span>
                    </div>
                </div>
                <div class="event-info">
                    <span class="event-category">Educación</span>
                    <h3 class="event-title">Conferencia de Desarrollo Personal</h3>
                    <p class="event-location"><i class="fas fa-map-marker-alt"></i> Centro de Convenciones</p>
                    <div class="event-footer">
                        <span class="event-price">$45</span>
                        <button class="attend-btn">Asistir</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Paginación -->
        <div class="pagination">
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <button class="pagination-btn">4</button>
            <button class="pagination-btn">5</button>
            <button class="pagination-btn next"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Manejadores para botones de categoría
            const categoryButtons = document.querySelectorAll('.category-btn');
            categoryButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    categoryButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Aquí iría la lógica para filtrar eventos por categoría
                    // Por ahora solo mostraremos un mensaje de éxito
                    Swal.fire({
                        icon: 'success',
                        title: 'Categoría seleccionada',
                        text: `Has seleccionado la categoría: ${this.textContent.trim()}`,
                        confirmButtonColor: '#ff5a5f',
                        timer: 1500,
                        showConfirmButton: false
                    });
                });
            });
            
            // Manejadores para botones de fecha
            const dateButtons = document.querySelectorAll('.date-btn');
            dateButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    dateButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    if (this.textContent === 'Elegir fecha') {
                        // Mostrar selector de fecha
                        Swal.fire({
                            title: 'Selecciona una fecha',
                            html: '<input type="date" id="date-picker" class="swal2-input">',
                            confirmButtonText: 'Filtrar',
                            confirmButtonColor: '#ff5a5f',
                            showCancelButton: true,
                            cancelButtonText: 'Cancelar',
                            preConfirm: () => {
                                const date = document.getElementById('date-picker').value;
                                if (!date) {
                                    Swal.showValidationMessage('Por favor selecciona una fecha');
                                }
                                return { date };
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Aquí iría la lógica para filtrar por la fecha seleccionada
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Fecha filtrada',
                                    text: `Mostrando eventos para: ${result.value.date}`,
                                    confirmButtonColor: '#ff5a5f',
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                            }
                        });
                    } else {
                        // Aquí iría la lógica para filtrar eventos por fecha
                        Swal.fire({
                            icon: 'success',
                            title: 'Fecha seleccionada',
                            text: `Mostrando eventos para: ${this.textContent.trim()}`,
                            confirmButtonColor: '#ff5a5f',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }
                });
            });
            
            // Manejador para botón de ubicación
            document.querySelector('.location-btn').addEventListener('click', function() {
                const location = document.querySelector('.location-input').value.trim();
                if (location) {
                    // Aquí iría la lógica para filtrar eventos por ubicación
                    Swal.fire({
                        icon: 'success',
                        title: 'Ubicación seleccionada',
                        text: `Mostrando eventos cerca de: ${location}`,
                        confirmButtonColor: '#ff5a5f',
                        timer: 1500,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        icon: 'info',
                        title: 'Ubicación vacía',
                        text: 'Por favor ingresa una ubicación para buscar',
                        confirmButtonColor: '#ff5a5f'
                    });
                }
            });
            
            // Manejador para botones de asistencia
            const attendButtons = document.querySelectorAll('.attend-btn');
            attendButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const eventCard = this.closest('.event-card');
                    const eventTitle = eventCard.querySelector('.event-title').textContent;
                    
                    Swal.fire({
                        title: '¿Confirmar asistencia?',
                        text: `¿Deseas confirmar tu asistencia a "${eventTitle}"?`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#ff5a5f',
                        cancelButtonColor: '#6e7881',
                        confirmButtonText: 'Sí, asistiré',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Cambiar estilo del botón
                            this.textContent = 'Asistiré';
                            this.classList.add('attending');
                            
                            Swal.fire({
                                icon: 'success',
                                title: '¡Asistencia confirmada!',
                                text: `Has confirmado tu asistencia a "${eventTitle}"`,
                                confirmButtonColor: '#ff5a5f',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    });
                });
            });
            
            // Manejador para los botones de paginación
            const paginationButtons = document.querySelectorAll('.pagination-btn');
            paginationButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    if (!this.classList.contains('next')) {
                        paginationButtons.forEach(b => b.classList.remove('active'));
                        this.classList.add('active');
                        
                        // Aquí iría la lógica para cargar la página correspondiente
                        // Por ahora solo mostraremos un mensaje
                        Swal.fire({
                            icon: 'info',
                            title: 'Cambio de página',
                            text: `Has navegado a la página ${this.textContent}`,
                            confirmButtonColor: '#ff5a5f',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    } else {
                        // Lógica para el botón "Siguiente"
                        let activeButton;
                        paginationButtons.forEach((b, index) => {
                            if (b.classList.contains('active') && index < paginationButtons.length - 2) {
                                activeButton = index;
                            }
                        });
                        
                        if (activeButton !== undefined) {
                            paginationButtons[activeButton].classList.remove('active');
                            paginationButtons[activeButton + 1].classList.add('active');
                            
                            // Aquí iría la lógica para cargar la página siguiente
                            Swal.fire({
                                icon: 'info',
                                title: 'Página siguiente',
                                text: `Has navegado a la página ${paginationButtons[activeButton + 1].textContent}`,
                                confirmButtonColor: '#ff5a5f',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    }
                });
            });
        });
    </script>

    <style>
        /* Estilos específicos para la página de exploración */
        .explorer-container {
            max-width: 1200px;
            margin: 90px auto 30px;
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
        
        .page-header p {
            font-size: 1.1rem;
            color: var(--dark-gray);
        }
        
        .filters-container {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .filter-group {
            margin-bottom: 20px;
        }
        
        .filter-group:last-child {
            margin-bottom: 0;
        }
        
        .filter-group h3 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 12px;
            color: var(--text-color);
        }
        
        .category-buttons, .date-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .category-btn, .date-btn {
            background-color: var(--light-gray);
            border: none;
            border-radius: 20px;
            padding: 8px 15px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .category-btn i {
            margin-right: 5px;
        }
        
        .category-btn:hover, .date-btn:hover {
            background-color: var(--medium-gray);
        }
        
        .category-btn.active, .date-btn.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        .location-search {
            display: flex;
            gap: 10px;
        }
        
        .location-input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid var(--medium-gray);
            border-radius: 8px;
            font-size: 14px;
        }
        
        .location-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .location-btn:hover {
            background-color: #e63946;
        }
        
        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .event-card {
            background-color: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .event-image {
            position: relative;
            height: 160px;
        }
        
        .event-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .event-date {
            position: absolute;
            top: 12px;
            left: 12px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            padding: 5px 10px;
            text-align: center;
            line-height: 1.2;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .event-day {
            display: block;
            font-size: 18px;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .event-month {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-color);
        }
        
        .event-info {
            padding: 15px;
        }
        
        .event-category {
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 6px;
        }
        
        .event-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 8px;
            line-height: 1.3;
        }
        
        .event-location {
            font-size: 14px;
            color: var(--dark-gray);
            margin-bottom: 15px;
        }
        
        .event-location i {
            color: var(--primary-color);
            margin-right: 5px;
        }
        
        .event-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }
        
        .event-price {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-color);
        }
        
        .attend-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .attend-btn:hover {
            background-color: #e63946;
        }
        
        .attend-btn.attending {
            background-color: var(--secondary-color);
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 30px;
        }
        
        .pagination-btn {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--white);
            border: 1px solid var(--medium-gray);
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .pagination-btn:hover {
            background-color: var(--light-gray);
        }
        
        .pagination-btn.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .category-buttons, .date-buttons {
                overflow-x: auto;
                padding-bottom: 10px;
                flex-wrap: nowrap;
            }
            
            .category-btn, .date-btn {
                white-space: nowrap;
            }
            
            .events-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                gap: 15px;
            }
        }
        
        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 1.8rem;
            }
            
            .events-grid {
                grid-template-columns: 1fr;
            }
            
            .pagination-btn {
                width: 32px;
                height: 32px;
            }
        }
    </style>
</body>
</html>