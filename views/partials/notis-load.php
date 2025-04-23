<?php

use model\MainModel;
$user = $_SESSION['id_usuario'];

 $notisModel = new MainModel();
 $resultado = $notisModel -> seleccionDatos('Notifiaciones', 'Vista_Solicitudes', 'id_receptor', $user);

 $notifiaciones = $resultado->fetchAll();