<?php require_once './views/partials/head.php' ?>
<?php require_once './views/partials/session-start.php' ?>
<?php require_once './views/partials/load.php' ?>


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

                <form class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Buscar mensajes" id="buscar-input">
                </form>

                <!-- Lista de conversaciones -->
                <div class="conversations-list">

                    <?php foreach ($seguidores as $usuario) {
                        // Si el usuario actual fue el emisor, mostramos al receptor
                        $idAmigo = $usuario['id_emisor'] == $_SESSION['id_usuario'] ? $usuario['id_receptor'] : $usuario['id_emisor'];
                        $nombreAmigo = $usuario['id_emisor'] == $_SESSION['id_usuario'] ? $usuario['nombre_receptor'] : $usuario['nombre_emisor'];
                        $fotoAmigo = $usuario['id_emisor'] == $_SESSION['id_usuario'] ? $usuario['foto_receptor'] : $usuario['foto_emisor'];
                    ?>
                        <div class="conversation-item" data-conversation="1" data-id="<?php echo $idAmigo ?>" onclick="changeNamePhoto.call(this)">
                            <div class="conversation-avatar">
                                <img class="conversatio-photo" src="../ajax/<?php echo isset($fotoAmigo) ? $fotoAmigo : 'images/perfilPrueba.jpg' ?>" alt="Avatar">
                                <span class="status-indicator online"></span>
                            </div>
                            <div class="conversation-info">
                                <div class="conversation-header">
                                    <h3 class="conversation-name"><?php echo $nombreAmigo ?></h3>
                                    <span class="conversation-time">...</span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Área de chat activa -->
            <div class="chat-area">
                <!-- Cabecera del chat -->
                <div class="chat-header">
                    <div class="chat-user-info">
                        <div class="chat-avatar">
                            <img id="foto-perfil-chat" src="https://via.placeholder.com/40/ff5a5f/ffffff?text=AL" alt="Avatar">
                            <span class="status-indicator online"></span>
                        </div>
                        <div class="chat-user-details">
                            <h3 class="chat-username" id="name-chat">Selecciona a un contacto para empezar a charlar</h3>
                            <!-- <p class="chat-status">En línea</p> -->
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
                    <!-- <div class="message-date-divider">
                        <span>HOY</span>
                    </div> -->
                </div>

                <!-- Área de entrada de mensaje -->
                <form class="chat-input-area" id="mensaje-form">
                    <button class="input-action-btn" type="button"><i class="fas fa-paperclip"></i></button>
                    <div class="chat-input-container">
                        <input type="text" class="chat-input" placeholder="Escribe un mensaje..." id="chat-input">
                        <div class="input-actions">
                            <button class="input-action-btn"><i class="far fa-smile"></i></button>
                            <button class="input-action-btn"><i class="fas fa-camera"></i></button>
                        </div>
                    </div>
                    <button class="send-message-btn" id="send-message-btn" type="submit"><i class="fas fa-paper-plane"></i></button>
                </form>
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

    <script>
        const emisor = <?php echo $_SESSION['id_usuario'] ?>;
        const conversationItems = document.querySelectorAll('.conversation-item');
        let conversationsCache = {};
        let currentConvoId = null;
        let convoId = null;


        // Cambiar de conversación
        conversationItems.forEach((item) => {
            item.addEventListener('click', async function() {

                conversationItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');

                const receptor = this.dataset.id;
                const usersIds = [emisor, receptor].sort();
                convoId = usersIds[0] + '_convo_' + usersIds[1];

                if (currentConvoId === convoId) return;

                currentConvoId = convoId;
                console.log('Cargando conversación:', convoId);
                console.log(conversationsCache[convoId]);


                if (conversationsCache[convoId]) {
                    displayMessages(conversationsCache[convoId]);
                } else {
                    let objetoTmp = {
                        convoId: convoId,
                        limit: 10,
                        offset: 0,
                        tipo: 'Obtener'
                    };

                    try {
                        const response = await fetch("<?php echo  APP_URL; ?>ajax/messages-ajax.php", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(objetoTmp)
                        });

                        const data = await response.json();
                        console.log('Recibiendo Data...' + data)

                        conversationsCache[convoId] = data;
                        displayMessages(data);
                    } catch (error) {
                        console.error('Error cargando mensajes:', error);
                    }
                }

                const unreadCount = this.querySelector('.unread-count');
                if (unreadCount) {
                    unreadCount.remove();
                }
            });
        });

        function displayMessages(msgs) {
            const chatContainer = document.getElementById('chat-messages');
            chatContainer.innerHTML = ``;

            if (msgs.length === 0) {

                chatContainer.innerHTML = `
                                <span class="media-name">Se el primero en iniciar un conve</span>
                                        `;
                return;
            }

            msgs.forEach(msg => {
                const message = document.createElement('div');


                message.classList.add((msg.id == emisor) ? 'message-received' : 'message-sent');
                message.innerHTML = `
                        <div class="message-avatar">
                            <p>${msg.nombre}</p>
                        </div>
                        <div class="message-content">
                            <div class="message-bubble">
                                <p>${msg.contenido}.</p>
                            </div>
                            <span class="message-time">${msg.fecha}</span>
                        </div>`;
                chatContainer.appendChild(message);
                chatContainer.scrollTop = chatContainer.scrollHeight;
            });
        }

        function displayMessage(msg) {
            const chatContainer = document.getElementById('chat-messages');
            const message = document.createElement('div');

            message.innerHTML = `
                <div class="message-avatar">
                    <p>${msg.nombre}</p>
                </div>
                <div class="message-content">
                    <div class="message-bubble">
                        <p>${msg.contenido}</p>
                    </div>
                    <span class="message-time">${msg.fecha ?? 'Ahora'}</span>
                </div>`;

            chatContainer.appendChild(message);
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }



        const enviarMensaje = document.getElementById('mensaje-form');
        enviarMensaje.addEventListener('submit', async (e) => {
            e.preventDefault();

            const contenido = document.getElementById('chat-input');
            if (!contenido) return;


            const objetoTmp = {
                contenido: contenido.value,
                convoId: convoId,
                idEmisor: emisor,
                tipo: 'Insertar'
            }

            try {
                console.log('Enviando Formulario')
                contenido.value = '';
                const response = await fetch("<?php echo  APP_URL; ?>ajax/messages-ajax.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(objetoTmp)
                });

                const data = await response.json();
                console.log('El mensaje se ha focking insertado' + data);

                if (data.tipo == 'error') {
                    Swal.fire({
                        icon: data.icono,
                        title: data.titulo,
                        text: data.texto,
                        confirmButtonText: 'Aceptar'
                    });
                }


                const mensajeTmp = {
                    contenido: contenido,
                    convoId: convoId,
                    nombre: emisor,
                    fecha: new Date().toLocaleTimeString()
                }


                displayMessage(mensajeTmp); // en un futuro lo ideal es que inserte la data traida de la db, la que viene con el nombre y la fecha
            } catch (error) {
                console.error('Error cargando mensajes:', error);
            }

        });




        ///////////////////////////
        const infoButton = document.querySelector('.chat-actions .chat-action-btn:nth-child(3)');
        const closePanel = document.querySelector('.close-panel-btn');
        //////infoooo
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



        /////////////
        function changeNamePhoto() {
            document.querySelector('#name-chat').textContent = this.querySelector('.conversation-name').textContent;
            document.querySelector('#foto-perfil-chat').src = this.querySelector('.conversatio-photo').src;
        }
    </script>
</body>

</html>