<?php
require_once '../config/app.php';
require_once '../autoload.php';
require_once '../views/partials/session-start.php';

use controllers\PublicacionesController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = new PublicacionesController();


    echo $usuario->createPublication($_POST['titulo'], $_POST['contenido'], $_FILES);
}
