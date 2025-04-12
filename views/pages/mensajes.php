<?php require_once './views/partials/head.php' ?>
<?php require_once './views/partials/session-start.php' ?>

<body>
    <?php require_once './views/partials/nav-bar.php'; ?>

    <div class="messages-container">
        <!-- Contenedor principal de mensajes -->
        <div class="chat-container">
            <!-- Sidebar de conversaciones -->
            <div class="conversations-sidebar">
                <div class="conversations-header">
                    <h2>Mensajes</h2>
                    <button class="new-message-btn"><i class="fas fa-edit"></i></button>
                </div>
                
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Buscar mensajes">
                </div>
                
                <!-- Lista de conversaciones -->
                <div class="conversations-list">
                    <div class="conversation-item active" data-conversation="1">
                        <div class="conversation-avatar">
                            <img src="https://via.placeholder.com/40/ff5a5f/ffffff?text=AL" alt="Avatar">
                            <span class="status-indicator online"></span>
                        </div>
                        <div class="conversation-info">
                            <div class="conversation-header">
                                <h3 class="conversation-name">Ana López</h3>
                                <span class="conversation-time">12:45</span>
                            </div>
                            <div class="conversation-preview">
                                <p>¿A qué hora comienza el evento mañana?</p>
                                <span class="unread-count">2</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="conversation-item" data-conversation="2">
                        <div class="conversation-avatar">
                            <img src="https://via.placeholder.com/40/00a699/ffffff?text=CM" alt="Avatar">
                            <span class="status-indicator offline"></span>
                        </div>
                        <div class="conversation-info">
                            <div class="conversation-header">
                                <h3 class="conversation-name">Carlos Méndez</h3>
                                <span class="conversation-time">Ayer</span>
                            </div>
                            <div class="conversation-preview">
                                <p>Me encantó la exposición de arte. Gracias por...</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="conversation-item" data-conversation="3">
                        <div class="conversation-avatar">
                            <img src="https://via.placeholder.com/40/484848/ffffff?text=MR" alt="Avatar">
                            <span class="status-indicator online"></span>
                        </div>
                        <div class="conversation-info">
                            <div class="conversation-header">
                                <h3 class="conversation-name">María Rodríguez</h3>
                                <span class="conversation-time">Mar 20</span>
                            </div>
                            <div class="conversation-preview">
                                <p>Tú: Sí, te confirmaré el lugar más tarde</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="conversation-item" data-conversation="4">
                        <div class="conversation-avatar">
                            <img src="https://via.placeholder.com/40/ff5a5f/ffffff?text=JS" alt="Avatar">
                        </div>
                        <div class="conversation-info">
                            <div class="conversation-header">
                                <h3 class="conversation-name">Juan Sánchez</h3>
                                <span class="conversation-time">Mar 15</span>
                            </div>
                            <div class="conversation-preview">
                                <p>¿Podemos reunirnos para discutir el programa del...</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="conversation-item" data-conversation="5">
                        <div class="conversation-avatar">
                            <img src="https://via.placeholder.com/40/00a699/ffffff?text=LM" alt="Avatar">
                            <span class="status-indicator online"></span>
                        </div>
                        <div class="conversation-info">
                            <div class="conversation-header">
                                <h3 class="conversation-name">Laura Martínez</h3>
                                <span class="conversation-time">Mar 10</span>
                            </div>
                            <div class="conversation-preview">
                                <p>Tú: Perfecto, nos vemos en el evento entonces</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Área de chat activa -->
            <div class="chat-area">
                <!-- Cabecera del chat -->
                <div class="chat-header">
                    <div class="chat-user-info">
                        <div class="chat-avatar">
                            <img src="https://via.placeholder.com/40/ff5a5f/ffffff?text=AL" alt="Avatar">
                            <span class="status-indicator online"></span>
                        </div>
                        <div class="chat-user-details">
                            <h3 class="chat-username">Ana López</h3>
                            <p class="chat-status">En línea</p>
                        </div>
                    </div>
                    <div class="chat-actions">
                        <button class="chat-action-btn"><i class="fas fa-phone"></i></button>
                        <button class="chat-action-btn"><i class="fas fa-video"></i></button>
                        <button class="chat-action-btn"><i class="fas fa-info-circle"></i></button>
                    </div>
                </div>
                
                <!-- Mensajes -->
                <div class="chat-messages" id="chat-messages">
                    <div class="message-date-divider">
                        <span>HOY</span>
                    </div>
                    
                    <div class="message received">
                        <div class="message-avatar">
                            <img src="https://via.placeholder.com/30/ff5a5f/ffffff?text=AL" alt="Avatar">
                        </div>
                        <div class="message-content">
                            <div class="message-bubble">
                                <p>Hola! ¿Cómo estás? Estoy interesada en el evento de música que organizas.</p>
                            </div>
                            <span class="message-time">11:30</span>
                        </div>
                    </div>
                    
                    <div class="message sent">
                        <div class="message-content">
                            <div class="message-bubble">
                                <p>¡Hola Ana! Todo bien, gracias por preguntar. Claro, ¿qué te gustaría saber del evento?</p>
                            </div>
                            <span class="message-time">11:35</span>
                        </div>
                    </div>
                    
                    <div class="message received">
                        <div class="message-avatar">
                            <img src="https://via.placeholder.com/30/ff5a5f/ffffff?text=AL" alt="Avatar">
                        </div>
                        <div class="message-content">
                            <div class="message-bubble">
                                <p>Me gustaría saber dónde se realizará exactamente y si habrá algún artista invitado especial.</p>
                            </div>
                            <span class="message-time">11:42</span>
                        </div>
                    </div>
                    
                    <div class="message sent">
                        <div class="message-content">
                            <div class="message-bubble">
                                <p>El evento será en el Auditorio Central, en la Avenida Principal #123. Y sí, tendremos a la banda "The Locals" como invitados especiales.</p>
                            </div>
                            <span class="message-time">11:45</span>
                        </div>
                    </div>
                    
                    <div class="message received">
                        <div class="message-avatar">
                            <img src="https://via.placeholder.com/30/ff5a5f/ffffff?text=AL" alt="Avatar">
                        </div>
                        <div class="message-content">
                            <div class="message-bubble">
                                <p>¡Genial! Me encanta esa banda. ¿A qué hora comienza el evento mañana?</p>
                            </div>
                            <span class="message-time">12:45</span>
                        </div>
                    </div>
                </div>
                
                <!-- Área de entrada de mensaje -->
                <div class="chat-input-area">
                    <button class="input-action-btn"><i class="fas fa-paperclip"></i></button>
                    <div class="chat-input-container">
                        <input type="text" class="chat-input" placeholder="Escribe un mensaje..." id="chat-input">
                        <div class="input-actions">
                            <button class="input-action-btn"><i class="far fa-smile"></i></button>
                            <button class="input-action-btn"><i class="fas fa-camera"></i></button>
                        </div>
                    </div>
                    <button class="send-message-btn" id="send-message-btn"><i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
            
            <div class="event-info-panel">
                <div class="panel-header">
                    <h3>Detalles del evento</h3>
                    <button class="close-panel-btn"><i class="fas fa-times"></i></button>
                </div>
                
                <div class="event-details">
                    <div class="event-image">
                        <img src="https://via.placeholder.com/300x150/ff5a5f/ffffff?text=Evento+de+Música" alt="Imagen del evento">
                    </div>
                    
                    <h2 class="event-title">Festival de Música Independiente</h2>
                    <p class="event-date"><i class="far fa-calendar-alt"></i> 15 Mayo, 2025</p>
                    <p class="event-time"><i class="far fa-clock"></i> 19:00 - 23:00</p>
                    <p class="event-location"><i class="fas fa-map-marker-alt"></i> Auditorio Central, Avenida Principal #123</p>
                    
                    <p class="event-description">
                        Un festival dedicado a músicos independientes locales. Disfruta de diferentes géneros musicales en un ambiente único y familiar. Habrá comida y bebidas disponibles.
                    </p>
                    
                    <div class="event-stats">
                        <div class="event-stat">
                            <i class="fas fa-user-friends"></i>
                            <span>56 asistentes</span>
                        </div>
                        <div class="event-stat">
                            <i class="fas fa-heart"></i>
                            <span>45 me gusta</span>
                        </div>
                    </div>
                    
                    <button class="attend-event-btn">
                        <i class="fas fa-calendar-check"></i>
                        Asistiré
                    </button>
                </div>
                
                <div class="shared-media">
                    <h4>Archivos y enlaces compartidos</h4>
                    <div class="media-grid">
                        <div class="media-item">
                            <div class="media-icon"><i class="fas fa-file-pdf"></i></div>
                            <span class="media-name">programa_evento.pdf</span>
                        </div>
                        <div class="media-item">
                            <div class="media-icon"><i class="fas fa-image"></i></div>
                            <span class="media-name">poster_festival.jpg</span>
                        </div>
                        <div class="media-item">
                            <div class="media-icon"><i class="fas fa-link"></i></div>
                            <span class="media-name">thelocals.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal para nuevo mensaje -->
    <div class="modal-backdrop" id="new-message-modal" style="display: none;">
        <div class="modal">
            <div class="modal-header">
                <div class="modal-title">Nuevo mensaje</div>
                <button class="modal-close" id="new-message-close">&times;</button>
            </div>
            
            <div class="modal-body">
                <div class="search-container mb-15">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Buscar personas">
                </div>
                
                <h4 class="section-title">Sugerencias</h4>
                
                <div class="user-suggestions">
                    <div class="user-item">
                        <div class="user-avatar">
                            <img src="https://via.placeholder.com/40/ff5a5f/ffffff?text=DG" alt="Avatar">
                        </div>
                        <div class="user-info">
                            <h3 class="user-name">Daniel García</h3>
                            <p class="user-details">5 eventos en común</p>
                        </div>
                        <button class="select-user-btn">Seleccionar</button>
                    </div>
                    
                    <div class="user-item">
                        <div class="user-avatar">
                            <img src="https://via.placeholder.com/40/00a699/ffffff?text=PT" alt="Avatar">
                        </div>
                        <div class="user-info">
                            <h3 class="user-name">Paula Torres</h3>
                            <p class="user-details">8 eventos en común</p>
                        </div>
                        <button class="select-user-btn">Seleccionar</button>
                    </div>
                    
                    <div class="user-item">
                        <div class="user-avatar">
                            <img src="https://via.placeholder.com/40/484848/ffffff?text=RV" alt="Avatar">
                        </div>
                        <div class="user-info">
                            <h3 class="user-name">Rodrigo Vega</h3>
                            <p class="user-details">2 eventos en común</p>
                        </div>
                        <button class="select-user-btn">Seleccionar</button>
                    </div>
                </div>
                
                <div class="selected-users" id="selected-users" style="display: none;">
                    <h4 class="section-title">Seleccionados</h4>
                    
                    <div class="user-chips" id="user-chips">
                    </div>
                </div>
                
                <div class="message-draft" id="message-draft" style="display: none;">
                    <textarea class="message-draft-input" placeholder="Escribe tu mensaje..."></textarea>
                </div>
                
                <div class="form-buttons">
                    <button class="btn btn-secondary" id="cancel-message">Cancelar</button>
                    <button class="btn btn-primary" id="send-new-message">Enviar mensaje</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Variables globales
            const chatMessages = document.getElementById('chat-messages');
            const chatInput = document.getElementById('chat-input');
            const sendMessageBtn = document.getElementById('send-message-btn');
            const conversationItems = document.querySelectorAll('.conversation-item');
            const newMessageBtn = document.querySelector('.new-message-btn');
            const newMessageModal = document.getElementById('new-message-modal');
            const newMessageClose = document.getElementById('new-message-close');
            const cancelMessage = document.getElementById('cancel-message');
            const selectUserBtns = document.querySelectorAll('.select-user-btn');
            const selectedUsers = document.getElementById('selected-users');
            const userChips = document.getElementById('user-chips');
            const messageDraft = document.getElementById('message-draft');
            const closePanel = document.querySelector('.close-panel-btn');
            const infoButton = document.querySelector('.chat-actions .chat-action-btn:nth-child(3)');
            const eventInfoPanel = document.querySelector('.event-info-panel');
            
            // Función para añadir un mensaje
            function addMessage(message, isSent) {
                const messageDiv = document.createElement('div');
                messageDiv.className = isSent ? 'message sent' : 'message received';
                
                const currentTime = new Date();
                const hours = currentTime.getHours().toString().padStart(2, '0');
                const minutes = currentTime.getMinutes().toString().padStart(2, '0');
                const timeString = `${hours}:${minutes}`;
                
                if (isSent) {
                    messageDiv.innerHTML = `
                        <div class="message-content">
                            <div class="message-bubble">
                                <p>${message}</p>
                            </div>
                            <span class="message-time">${timeString}</span>
                        </div>
                    `;
                } else {
                    messageDiv.innerHTML = `
                        <div class="message-avatar">
                            <img src="https://via.placeholder.com/30/ff5a5f/ffffff?text=AL" alt="Avatar">
                        </div>
                        <div class="message-content">
                            <div class="message-bubble">
                                <p>${message}</p>
                            </div>
                            <span class="message-time">${timeString}</span>
                        </div>
                    `;
                }
                
                chatMessages.appendChild(messageDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
            
            // Enviar mensaje al hacer clic en el botón de enviar
            sendMessageBtn.addEventListener('click', function() {
                const message = chatInput.value.trim();
                if (message) {
                    addMessage(message, true);
                    chatInput.value = '';
                    
                    // Simular respuesta después de un tiempo (solo para demostración)
                    setTimeout(() => {
                        const responses = [
                            "Perfecto, gracias por la información!",
                            "Entiendo, lo tendré en cuenta.",
                            "¡Suena genial! Estoy emocionada por el evento.",
                            "¿Podría invitar a unos amigos?",
                            "¿Habrá estacionamiento disponible?"
                        ];
                        const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                        addMessage(randomResponse, false);
                    }, 2000);
                }
            });
            
            // Enviar mensaje al presionar Enter
            chatInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessageBtn.click();
                    e.preventDefault();
                }
            });
            
            // Cambiar de conversación
            conversationItems.forEach(item => {
                item.addEventListener('click', function() {
                    conversationItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Actualizar la información del chat (en un sistema real, cargarías los mensajes)
                    const conversationName = this.querySelector('.conversation-name').textContent;
                    document.querySelector('.chat-username').textContent = conversationName;
                    
                    // Quitar indicador de no leído
                    const unreadCount = this.querySelector('.unread-count');
                    if (unreadCount) {
                        unreadCount.remove();
                    }
                });
            });
            
            // Abrir modal de nuevo mensaje
            newMessageBtn.addEventListener('click', function() {
                newMessageModal.style.display = 'flex';
            });
            
            // Cerrar modal de nuevo mensaje
            newMessageClose.addEventListener('click', function() {
                newMessageModal.style.display = 'none';
                resetNewMessageModal();
            });
            
            cancelMessage.addEventListener('click', function() {
                newMessageModal.style.display = 'none';
                resetNewMessageModal();
            });
            
            // Cerrar modal al hacer clic fuera
            newMessageModal.addEventListener('click', function(e) {
                if (e.target === newMessageModal) {
                    newMessageModal.style.display = 'none';
                    resetNewMessageModal();
                }
            });
            
            // Seleccionar usuario para mensaje
            selectUserBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const userItem = this.closest('.user-item');
                    const userName = userItem.querySelector('.user-name').textContent;
                    const userAvatar = userItem.querySelector('.user-avatar img').getAttribute('src');
                    
                    // Mostrar sección de usuarios seleccionados
                    selectedUsers.style.display = 'block';
                    
                    // Añadir chip de usuario
                    const userChip = document.createElement('div');
                    userChip.className = 'user-chip';
                    userChip.innerHTML = `
                        <img src="${userAvatar}" alt="${userName}">
                        <span>${userName}</span>
                        <button class="remove-user-btn" data-name="${userName}">&times;</button>
                    `;
                    userChips.appendChild(userChip);
                    
                    // Mostrar área de redacción de mensaje
                    messageDraft.style.display = 'block';
                    
                    // Deshabilitar el botón de selección
                    this.disabled = true;
                    this.textContent = 'Seleccionado';
                    this.classList.add('selected');
                    
                    // Configurar botones de eliminar usuario
                    setupRemoveUserButtons();
                });
            });
            
            // Función para configurar botones de eliminar usuario
            function setupRemoveUserButtons() {
                const removeButtons = document.querySelectorAll('.remove-user-btn');
                removeButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const userName = this.getAttribute('data-name');
                        const userChip = this.parentElement;
                        
                        // Eliminar chip
                        userChip.remove();
                        
                        // Rehabilitar botón de selección
                        selectUserBtns.forEach(selectBtn => {
                            const userItem = selectBtn.closest('.user-item');
                            const itemUserName = userItem.querySelector('.user-name').textContent;
                            
                            if (itemUserName === userName) {
                                selectBtn.disabled = false;
                                selectBtn.textContent = 'Seleccionar';
                                selectBtn.classList.remove('selected');
                            }
                        });
                        
                        // Ocultar secciones si no hay usuarios seleccionados
                        if (userChips.children.length === 0) {
                            selectedUsers.style.display = 'none';
                            messageDraft.style.display = 'none';
                        }
                    });
                });
            }
            
            // Resetear modal de nuevo mensaje
            function resetNewMessageModal() {
                userChips.innerHTML = '';
                selectedUsers.style.display = 'none';
                messageDraft.style.display = 'none';
                
                selectUserBtns.forEach(btn => {
                    btn.disabled = false;
                    btn.textContent = 'Seleccionar';
                    btn.classList.remove('selected');
                });
                
                document.querySelector('.message-draft-input').value = '';
            }
            
            // Enviar nuevo mensaje
            document.getElementById('send-new-message').addEventListener('click', function() {
                const selectedNames = Array.from(userChips.querySelectorAll('.user-chip span')).map(span => span.textContent);
                const messageText = document.querySelector('.message-draft-input').value.trim();
                
                if (selectedNames.length > 0 && messageText) {
                    newMessageModal.style.display = 'none';
                    
                    // Mostrar confirmación
                    Swal.fire({
                        icon: 'success',
                        title: 'Mensaje enviado',
                        text: `Tu mensaje ha sido enviado a ${selectedNames.join(', ')}`,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#ff5a5f'
                    });
                    
                    resetNewMessageModal();
                } else if (selectedNames.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Selecciona destinatarios',
                        text: 'Debes seleccionar al menos un destinatario',
                        confirmButtonText: 'Entendido',
                        confirmButtonColor: '#ff5a5f'
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Mensaje vacío',
                        text: 'Escribe un mensaje antes de enviar',
                        confirmButtonText: 'Entendido',
                        confirmButtonColor: '#ff5a5f'
                    });
                }
            });
            
            // Toggle panel de información del evento
            infoButton.addEventListener('click', function() {
                if (eventInfoPanel.classList.contains('active')) {
                    eventInfoPanel.classList.remove('active');
                } else {
                    eventInfoPanel.classList.add('active');
                }
            });
            
            // Cerrar panel de información
            closePanel.addEventListener('click', function() {
                eventInfoPanel.classList.remove('active');
            });
        });
    </script>
</body>
</html>