<?php

$router->get('login', 'views\\pages\\login.php');
$router->get('register', 'views\\pages\\register.php')->only('guests');


$router->get('403', 'views\\pages\\403.php');


$router->get('home', 'views\\pages\\home.php')->only('auth');
$router->get('perfil', 'views\\pages\\perfil.php')->only('auth');
$router->get('explorar', 'views\\pages\\explorar.php')->only('auth');
$router->get('crear', 'views\\pages\\crear.php')->only('auth');
$router->get('publicacion', 'views\\pages\\publicacion.php')->only('auth');
$router->get('mensajes', 'views\\pages\\mensajes.php')->only('auth');
$router->get('admin', 'views\\pages\\administrador.php')->only('admin');
$router->get('eventos', 'controllers\\handleSingleEvent.php')->only('auth');
$router->get('reporteUsers', 'views\\reports\\users-pdf.php')->only('admin');
$router->get('reporteEvents', 'views\\reports\\events-pdf.php')->only('admin');
$router->get('reportePosts', 'views\\reports\\posts-pdf.php')->only('admin');
$router->get('mensajes', 'views\\pages\\mensajes.php')->only('auth');
$router->get('singleUser', 'views\\reports\\handleSingleUser.php');
$router->get('landing', 'views\\pages\\landing_page.php');
$router->get('notAuthorized','views\\pages\\not-user-friendly.php');


$router->post('user', 'api\\user\\create_user.php');
$router->post('post', 'api\\publications\\create_post.php')->only('userFriendly')->only('active'); 
$router->post('comment', 'api\\comments\\set_comment.php')->only('active');








