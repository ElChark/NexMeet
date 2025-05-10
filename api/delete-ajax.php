<?php
require_once '../model/MainModel.php';

use model\MainModel;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $delete = new MainModel();

    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if($data['tipo'] === 'Publicación') {
        $id=$data['id'];
        $deletedPost = $delete->ejecutarConsulta("DELETE FROM Publicaciones WHERE id_publicacion = $id");

        echo json_encode([
            "tipo"=>"success",
            "title"=>"Eliminado",
            "icon"=>"success"
        ]);
        exit();
    } else if($data['tipo'] === 'Evento') {
        $id=$data['id'];

        $deletedEvent = $delete->ejecutarConsulta("CALL Eliminar_evento($id)");


        echo json_encode([
            "tipo"=>"success",
            "title"=>"Eliminado",
            "icon"=>"success"
        ]);
        exit();
    }
}