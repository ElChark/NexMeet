<?php

$router->get('login', 'views\\pages\\login.php');
$router->get('register', 'views\\pages\\register.php')->only('guests');



$router->get('home', 'views\\pages\\home.php')->only('auth');
$router->get('perfil', 'views\\pages\\perfil.php')->only('auth');
$router->get('explorar', 'views\\pages\\explorar.php')->only('auth');
$router->get('crear', 'views\\pages\\crear.php')->only('auth');
$router->get('publicacion', 'views\\pages\\publicacion.php')->only('auth');
$router->get('mensajes', 'views\\pages\\mensajes.php');
$router->get('admin', 'views\\pages\\administrador.php');
$router->get('eventos', 'controllers\\handleSingleEvent.php');
$router->get('landing', 'views\\pages\\landing_page.php');


$router->post('user', 'api\\user\\create_user.php');
$router->post('post', 'api\\publications\\create_post.php'); // Aquí iria el middleware para evitar que usuarios deshabilitados publiquen cosas
$router->post('comment', 'api\\comments\\set_comment.php');








