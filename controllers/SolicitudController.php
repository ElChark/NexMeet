<?php
require_once '../views/partials/session-start.php';
require_once '../model/MainModel.php';

use model\MainModel;

$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);


if ($data['estado'] == 'Enviar') {
    $otherUser = $data['otherUser'];
    $currentUser = $_SESSION['id_usuario'];


    $solicitud  = new MainModel();

    $newSolicitud = $solicitud->ejecutarConsulta("INSERT INTO Seguidores (id_usuario, id_seguido, estado) VALUES ($currentUser, $otherUser, 'En Proceso')");

    if ($newSolicitud->rowCount() == 1) {
        echo json_encode([
            "tipo" => "success",
            "titulo" => "Solicitud Enviada",
            "texto" => "Estas a un paso de tener un amigo mas",
            "icono" => "success",
        ]);
        exit();
    } else {
        echo json_encode([
            "tipo" => "error",
            "titulo" => "Error",
            "texto" => "Lamento que tengas ver esto",
            "icono" => "error"
        ]);
        exit();
    }
} elseif ($data['estado'] == 'Aceptada') {
    $notiId = $data['notiId'];
    $estado = $data['estado'];
    $solicitud  = new MainModel();

    $newSolicitud = $solicitud->ejecutarConsulta("UPDATE seguidores SET estado = '$estado' WHERE id_seguidor=$notiId");

    if ($newSolicitud->rowCount() == 1) {
        echo json_encode([
            "tipo" => "success"
        ]);
        exit();
    } else {
        echo json_encode([
            "tipo" => "error"
        ]);
        exit();
    }
} else {
    $notiId = $data['notiId'];
    $estado = $data['estado'];
    $solicitud  = new MainModel();

    $newSolicitud = $solicitud->ejecutarConsulta("UPDATE seguidores SET estado= '$estado' WHERE id_seguidor=$notiId");

    if ($newSolicitud->rowCount() == 1) {
        echo json_encode([
            "tipo" => "success"
        ]);
        exit();
    } else {
        echo json_encode([
            "tipo" => "error"
        ]);
        exit();
    }
}
