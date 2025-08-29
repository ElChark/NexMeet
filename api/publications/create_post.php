<?php

$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];

use controllers\PublicacionesController;
use Core\Functions;

$post = new PublicacionesController();
////Poner aqui la ruta de una vez, y solo hacer un if para cada coso y asi no cambiar el create publication. Todo iria en un mismo campo en la db
//Functions::dd($_FILES);

$ruta = 'images/notFound.jpg';

// Verifica si se subió una foto
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $ruta = Functions::getPhoto($_FILES);
}
// Verifica si se subió un video
elseif (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
    $ruta = Functions::getVideo($_FILES);
}

$newPost = $post->createPublication($titulo, $contenido, $ruta);

if ($newPost) {
    header('Location: /publicacion');
} else {
    echo '<script>alert("Error al crear la publicación");</script>';
}