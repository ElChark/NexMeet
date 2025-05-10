<?php

$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];

use controllers\PublicacionesController;

$post = new PublicacionesController();


$newPost = $post->createPublication($titulo, $contenido, $_FILES);

if ($newPost) {
    header('Location: /publicacion');
} else {
    echo '<script>alert("Error al crear el usuario");</script>';
}