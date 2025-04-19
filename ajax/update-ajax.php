<?php
    require_once '../config/app.php';
    require_once '../autoload.php';
    require_once '../views/partials/session-start.php';

use controllers\UpdateController;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $usuario = new UpdateController();

        echo $usuario->updatePhoto($_FILES);
    }elseif($_POST['username'] && $_POST['correo'] && $_POST['descripcion'] && $_POST['numero']) {
        $usuario = new UpdateController();

        echo $usuario->updateInfo($_POST['username'], $_POST['correo'], $_POST['numero'], $_POST['descripcion']);
    }
}
