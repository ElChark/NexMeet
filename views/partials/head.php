<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo APP_URL; ?>views/CSS/sweetalert2.min.css">
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

    <?php
    $requestUri = $_SERVER['REQUEST_URI'];
    $baseUrl = dirname($_SERVER['SCRIPT_NAME']);

    $viewPath = str_replace($baseUrl, '', $requestUri);

    if (strpos($viewPath, '/') === 0) {
        $viewPath = substr($viewPath, 1);
    }
    
    $viewPath = explode('?', $viewPath)[0]; 
    $url = explode('/', $viewPath);

    if (empty($url[0])) {
        $url = ['login'];
    }


    // Cargar el CSS específico de la página
    switch ($url[0]) {
        case 'login':
            echo '<link rel="stylesheet" href="' . APP_URL . 'views/CSS/login.css">';
            break;
        case 'register':
            echo '<link rel="stylesheet" href="' . APP_URL . 'views/CSS/register.css">';
            break;
        case 'home':
            echo '<link rel="stylesheet" href="' . APP_URL . 'views/CSS/home.css">';
            break;
        case 'perfil':
            echo '<link rel="stylesheet" href="' . APP_URL . 'views/CSS/perfil.css">';
            break;
        case 'mensajes':
            echo '<link rel="stylesheet" href="' . APP_URL . 'views/CSS/mensajes.css">';
            break;
        case 'explorar':
            echo '<link rel="stylesheet" href="' . APP_URL . 'views/CSS/explorar.css">';
            break;
        case 'crear':
            echo '<link rel="stylesheet" href="' . APP_URL . 'views/CSS/crear.css">';
            break;
        case 'publicacion':
            echo '<link rel="stylesheet" href="' . APP_URL . 'views/CSS/publicacion.css">';
            break;
    }
    ?>

    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>