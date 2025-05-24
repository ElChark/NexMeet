export function addMarkerToMap(event, map) {
    console.log("Datos recibidos en addMarkerToMap:", event);

    // Verificar si las coordenadas existen y son numéricas
    const longitud = parseFloat(event.longitud);
    const latitud = parseFloat(event.latitud);


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