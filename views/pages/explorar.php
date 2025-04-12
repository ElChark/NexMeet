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
        
        <!-- Paginación  -->
        <div class="pagination-container">
            <div class="pagination">
                <a href="#" class="pagination-arrow prev" aria-label="Página anterior">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="pagination-number active" data-page="1">1</a>
                <a href="#" class="pagination-number" data-page="2">2</a>
                <a href="#" class="pagination-number" data-page="3">3</a>
                <a href="#" class="pagination-number" data-page="4">4</a>
                <a href="#" class="pagination-number" data-page="5">5</a>
                <a href="#" class="pagination-arrow next" aria-label="Página siguiente">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
            <div class="page-indicator">Página 1 de 5</div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryButtons = document.querySelectorAll('.category-btn');
            categoryButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    categoryButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Manejadores para botones de fecha
            const dateButtons = document.querySelectorAll('.date-btn');
            dateButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    dateButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    if (this.textContent === 'Elegir fecha') {
                    }
                });
            });
            
            // Manejador para botón de ubicación
            document.querySelector('.location-btn').addEventListener('click', function() {
                const location = document.querySelector('.location-input').value.trim();
            });
            
            // Manejador para botones de asistencia
            const attendButtons = document.querySelectorAll('.attend-btn');
            attendButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const eventCard = this.closest('.event-card');
                    const eventTitle = eventCard.querySelector('.event-title').textContent;
                    
                    // Cambiar estilo del botón sin alerta
                    this.textContent = 'Asistiré';
                    this.classList.add('attending');
                    
                    showNotification('¡Asistencia confirmada!', `Has confirmado tu asistencia a "${eventTitle}"`, 'success');
                });
            });
            
            // Manejador para paginación mejorada
            const paginationItems = document.querySelectorAll('.pagination-number');
            const paginationPrev = document.querySelector('.pagination-arrow.prev');
            const paginationNext = document.querySelector('.pagination-arrow.next');
            const pageIndicator = document.querySelector('.page-indicator');
            
            function updatePage(pageNumber) {
                // Actualizar clases activas
                paginationItems.forEach(item => {
                    item.classList.remove('active');
                });
                
                // Encontrar y activar el nuevo número de página
                const newActivePage = document.querySelector(`.pagination-number[data-page="${pageNumber}"]`);
                if (newActivePage) {
                    newActivePage.classList.add('active');
                }
                
                // Actualizar indicador de página
                pageIndicator.textContent = `Página ${pageNumber} de 5`;
                
                // Deshabilitar/habilitar botones de navegación
                if (pageNumber === 1) {
                    paginationPrev.classList.add('disabled');
                } else {
                    paginationPrev.classList.remove('disabled');
                }
                
                if (pageNumber === 5) { 
                    paginationNext.classList.add('disabled');
                } else {
                    paginationNext.classList.remove('disabled');
                }
                
                // Desplazarse hacia arriba suavemente
                window.scrollTo({
                    top: document.querySelector('.filters-container').offsetTop - 80,
                    behavior: 'smooth'
                });
            }
            
            // Inicializar estado de paginación
            updatePage(1);
            
            // Añadir eventos a los números de página
            paginationItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pageNumber = parseInt(this.getAttribute('data-page'));
                    updatePage(pageNumber);
                });
            });
            
            // Añadir eventos a los botones de navegación
            paginationPrev.addEventListener('click', function(e) {
                e.preventDefault();
                const activePage = document.querySelector('.pagination-number.active');
                const currentPage = parseInt(activePage.getAttribute('data-page'));
                
                if (currentPage > 1) {
                    updatePage(currentPage - 1);
                }
            });
            
            paginationNext.addEventListener('click', function(e) {
                e.preventDefault();
                const activePage = document.querySelector('.pagination-number.active');
                const currentPage = parseInt(activePage.getAttribute('data-page'));
                
                if (currentPage < 5) { 
                    updatePage(currentPage + 1);
                }
            });
            
            // Función para mostrar notificaciones en lugar de alertas
            function showNotification(title, message, type = 'info') {
                const notification = document.createElement('div');
                notification.className = `notification ${type}`;
                
                notification.innerHTML = `
                    <div class="notification-content">
                        <div class="notification-icon">
                            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'warning' ? 'exclamation-triangle' : 'info-circle'}"></i>
                        </div>
                        <div class="notification-text">
                            <h4>${title}</h4>
                            <p>${message}</p>
                        </div>
                        <button class="notification-close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                
                document.body.appendChild(notification);
                
                // Mostrar con animación
                setTimeout(() => {
                    notification.classList.add('show');
                }, 10);
                
                // Cerrar al hacer clic
                notification.querySelector('.notification-close').addEventListener('click', function() {
                    notification.classList.remove('show');
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                });
                
                // Auto cerrar después de 3 segundos
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        notification.classList.remove('show');
                        setTimeout(() => {
                            notification.remove();
                        }, 300);
                    }
                }, 3000);
            }
        });
    </script>
</body>
</html>