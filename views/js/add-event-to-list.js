export function addEventToList(event) {
    const longitud = parseFloat(event.longitud);
    const latitud = parseFloat(event.latitud);


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