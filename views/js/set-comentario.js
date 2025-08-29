function handleSetComentario(eventId) {
    const comentario = document.getElementById('nuevoComentario');

    console.log('Enviando formulario')
    fetch("<?php echo APP_URL ?>ajax/comments/set_comment.php",{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({id: eventId, comentario: comentario.value, tipo: 'Evento'})
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const nuevoComentarioDiv = document.createElement('div');
                nuevoComentarioDiv.classList.add('comment');
                nuevoComentarioDiv.innerHTML = `
                    <span class="comment-author">Tú:</span>
                    <span>${comentario}</span>
                `;

                const commentContainer = document.getElementById('comentarios');
                commentContainer.appendChild(nuevoComentarioDiv);

                // Limpiar input
                comentario.value = '';
            } else {
                alert('Error al enviar el comentario');
            }
        })
}

export { handleSetComentario };