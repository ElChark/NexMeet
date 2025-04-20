<?php

use Core\Functions;
use model\MainModel;


 $usuariosModel = new MainModel();
 $resultado = $usuariosModel -> seleccionDatos('Normal', 'Usuario', '', '');

 $usuarios = $resultado->fetchAll();
