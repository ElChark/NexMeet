<?php

use Core\Functions;

$id = $_GET['id'];
$query = new controllers\EventController();

$evento = $query->getEvento($id);
if(empty($evento)) exit();

$commentarios = $query->getCommentsOfEvent($id);
$info = $query->getCreatorOfEvent($id);
$user = $info['nombre'];

\Core\Functions::view('pages\\event.php', [
    "evento" => $evento,
    "comentarios" => $commentarios,
    "info" => $info
]);
