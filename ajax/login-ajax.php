<?php
    require_once '../config/app.php';
    require_once '../autoload.php';
    require_once '../views/partials/session-start.php';

    use controllers\LoginController;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = new LoginController();

        echo $usuario->login(
            $_POST['nombre'],
            $_POST['contra']
        );
    }
