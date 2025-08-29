<?php
require_once './views/partials/load.php';

$id = $_GET['id'];
use model\MainModel;

$query = new MainModel();

$infoPersonal = $query->ejecutarConsulta("SELECT * FROM usuario WHERE id_usuario = $id");
$userInfo = $infoPersonal->fetch();

$infoPublicaciones = $query->ejecutarConsulta("SELECT * FROM publicaciones WHERE id_usuario = $id");
$publicacionesInfo = $infoPublicaciones->fetchAll();

$infoEventos= $query->ejecutarConsulta("SELECT * FROM evento WHERE id_usuario = $id");
$eventosInfo = $infoEventos->fetchAll();


\Core\Functions::view('reports\\user-pdf.php', [
    "userInfo" => $userInfo,
    "posts" => $publicacionesInfo,
    "events" => $eventosInfo
]);