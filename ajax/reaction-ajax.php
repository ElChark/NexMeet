<?php
require_once '../model/MainModel.php';


use model\MainModel;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reaction = new MainModel();

    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if ($data['tipo'] == 'insertar') {
        $reactionDone = $reaction->addReaction($data['idEvento'], $data['idUsuario']);

        if ($reactionDone) {
            echo json_encode([
                "status" => "okGustado",
                "info" => "Me gustó"
            ]);
            exit();
        } else {
            echo json_encode([
                "status" => "error"
            ]);
            exit();
        }
    } else{
        $reactionDone = $reaction->removeReaction($data['idEvento'], $data['idUsuario']);
        if ($reactionDone) {
            echo json_encode([
                "status" => "okNoGustado",
                "info" => "Me Gusta"
            ]);
            exit();
        } else {
            echo json_encode([
                "status" => "error"
            ]);
            exit();
        }
    }
}
