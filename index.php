<?php

use Core\Functions;

    require_once './config/app.php';
    require_once './autoload.php';
    require_once './views/partials/session-start.php';
    const BASE_PATH = __DIR__;
    require_once './Core/Functions.php';
    
    use Core\Router;



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


$router = new Router();
$routes = require Functions::base_path('/routes.php');

$uri = $url[0];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];;

//Functions::dd($uri);
$router->route($uri, $method);

?>
