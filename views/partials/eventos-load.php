<?php

use Core\Functions;
use model\MainModel;


$eventosModel = new MainModel();
$resultado = $eventosModel -> seleccionDatos('Eventos', 'Evento', 'id_usuario', $_SESSION['id_usuario']);

$eventos = $resultado->fetchAll();
