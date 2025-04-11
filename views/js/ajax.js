const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');

////////////login

document.getElementById('button').addEventListener('click', async (e) => {

});



///////////////register

document.getElementById('register-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    try {

        const response = await fetch('../../ajax/usuario-ajax.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data) {
            console.log('Aqui entra');

            Swal.fire({
                icon: data.icono,
                title: data.titulo,
                text: data.texto,
                confirmButtonText: 'Aceptar'
            });

        }

    } catch (error) {
        console.error('Error:', error);
        document.getElementById('error-message').style.display = 'block';
        document.getElementById('error-message').textContent = 'Error de conexión con el servidor';
    }
});
