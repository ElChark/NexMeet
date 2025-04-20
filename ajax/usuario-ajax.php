    <?php
    require_once '../config/app.php';
    require_once '../autoload.php';
    require_once '../views/partials/session-start.php';

    use controllers\UserController;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = new UserController();

        echo $usuario->registrarUsuario(
            $_POST['nombre'],
            $_POST['email'],
            $_POST['contra'],
            $_POST['contra2'],
            $_POST['fecha_nacimiento']
        );
    }
