<?php

use Core\Functions;
use model\MainModel;
$user = $_SESSION['id_usuario'];

 $eventosModel = new MainModel();
 $resultado = $eventosModel -> seleccionDatos('Unico', 'Evento', 'id_usuario', $user);

 $eventosPropios = $resultado->fetchAll();

 /////////

 
 $eventosModel = new MainModel();
 $resultado = $eventosModel -> ejecutarConsulta("SELECT * FROM Vista_Eventos_Explorar WHERE id_usuario != $user");

 $eventos = $resultado->fetchAll();
