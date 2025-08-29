<?php
require_once '../../config/app.php';
require_once '../../autoload.php';
require_once '../../views/partials/session-start.php';

use controllers\EventController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = new EventController();
    echo $usuario->addEvento($_POST['titulo'], $_POST['descripcion'], $_FILES, $_POST['coordenadas'], $_POST['nombreLugar'], $_POST['selectedCategory'], $_POST['date']);
}
