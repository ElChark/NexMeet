export async function addEventToList(event, map, eventosGustados, eventosAsistiendo, currentUser, currentEmail) {

    // Verificar si las coordenadas existen y son numéricas
    const longitud = parseFloat(event.longitud);
    const latitud = parseFloat(event.latitud);

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
        if (eventosAsistiendo[i].id_evento === event.id_evento) {
            yaAsistira = true;
            break;
        }
    }

    let yaDioMeGusta = false;
    for (let i = 0; i < eventosGustados.length; i++) {
        if (eventosGustados[i].id_evento === event.id_evento &&
            eventosGustados[i].id_usuario === currentUser) {
            yaDioMeGusta = true;
            break;
        }
    }


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
                            <a class="attend-btn" id="comment-btn" href="/eventos/?id=${event.id_evento}">Info</a>
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

        const response = await fetch("../../controllers/CorreoController.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(objetoTmp)
        });

        const data = await response.json();

        if (data.tipo === 'success') {
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
            const response = await fetch("../../api/event/reaction-ajax.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(objetoTmp)
            });

            const data = await response.json();

            if (data.status === 'error') {
                console.log('Ha ocurrido un error');
            } else if (data.status === 'okGustado') {
                reactionBtn.textContent = data.info;
                reactionBtn.style.background = 'green';
                reactionBtn.style.color = 'white';
                
                
                eventosGustados.push({
                    id_usuario: currentUser,
                    id_evento: event.id_evento
                });
                yaDioMeGusta = true;

            } else if (data.status === 'okNoGustado') {
                reactionBtn.textContent = data.info;
                reactionBtn.style.background = '#ff5a5f';
                reactionBtn.style.color = 'white';



                for (let i = 0; i < eventosGustados.length; i++) {
                    if (eventosGustados[i].id_evento === event.id_evento &&
                        eventosGustados[i].id_usuario === currentUser) {
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

    eventsList.appendChild(li);
}