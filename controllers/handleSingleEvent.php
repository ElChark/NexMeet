<?php
$id = $_GET['id'];
$query = new controllers\EventController();

$evento = $query->getEvento($id);
$commentarios = $query->getCommentsOfEvent($id);

\Core\Functions::view('pages\\event.php', [
    "evento" => $evento,
    "comentarios" => $commentarios
]);