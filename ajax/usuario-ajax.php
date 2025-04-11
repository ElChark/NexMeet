    <?php
        require_once '../config/app.php';
        require_once '../autoload.php';
        require_once '../views/partials/session-start.php';

    use controllers\UserController;

    
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['contra'] === $_POST['contra2']) {
            $usuario = new UserController();
            echo $usuario->registrarUsuario(
                $_POST['nombre'],
                $_POST['email'],
                $_POST['contra'],
                $_POST['contra2'],
                $_POST['fecha_nacimiento']
            );
        } else {
            return json_encode([
                "tipo" => "simple",
                "titulo" => "Contraseñas no coinciden",
                "texto" => "Verifica que ambas contraseñas sean iguales",
                "icono" => "error"
            ]);
        }
    }