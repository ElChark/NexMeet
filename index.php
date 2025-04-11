<?php
    require_once './config/app.php';
    require_once './autoload.php';
    require_once './views/partials/session-start.php';

    $requestUri = $_SERVER['REQUEST_URI'];
    $baseUrl = dirname($_SERVER['SCRIPT_NAME']);

    $viewPath = str_replace($baseUrl, '', $requestUri);

    if (strpos($viewPath, '/') === 0) {
        $viewPath = substr($viewPath, 1);
    }

    $url = explode('/', $viewPath);

    if (empty($url[0])) {
        $url = ['login'];
    }

?>

<?php require_once './views/partials/head.php' ?>
<body>
    <?php

    use controllers\ViewsController;

    $viewsControllers = new ViewsController();
    $vista = $viewsControllers->obtenerVistasControllers($url[0]);

    if ($vista == 'login' || $vista == '404' || $vista == 'register') 
    {
        require_once './views/pages/' . $vista . '.php';
    } else {
        require_once './views/partials/nav-bar.php';
        require_once $vista;
    }

    require_once './views/partials/script.php'
    ?>
</body>
</html>