<?php

use Core\Functions;
use model\MainModel;


 $usuariosModel = new MainModel();
 $resultado = $usuariosModel -> seleccionDatos('seguidores', 'Usuario', 'id_emisor', $_SESSION['id_usuario']);

 $usuarios = $resultado->fetchAll();
