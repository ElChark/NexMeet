<?php
require_once '../../model/MainModel.php';
use model\MainModel;

$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

$query = new MainModel();

$evento = $data['eventId'];

$resultado = $query->ejecutarConsulta("SELECT * FROM Vista_Comentarios WHERE id_evento = $evento");
$comments = $resultado->fetchAll();

echo json_encode($comments);
exit();