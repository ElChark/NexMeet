<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo APP_URL; ?>views/CSS/sweetalert2.min.css">
    
    <?php
    // Detectar la página actual para cargar su CSS específico
    $currentPage = isset($url[0]) ? $url[0] : 'login';
    
    // Cargar el CSS específico de la página
    switch ($currentPage) {
        case 'login':
            echo '<link rel="stylesheet" href="' . APP_URL . 'views/CSS/login.css">';
            break;
        case 'register':
            echo '<link rel="stylesheet" href="' . APP_URL . 'views/CSS/register.css">';
            break;
        case 'home':
            echo '<link rel="stylesheet" href="' . APP_URL . 'views/CSS/home.css">';
            break;
    }
    ?>
    
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>