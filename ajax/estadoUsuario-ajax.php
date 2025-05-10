<?php
require_once '../model/MainModel.php';

use model\MainModel;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $estado = new MainModel();

    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if($data['accion'] === 'Deshabilitar') {
        $name = $data['name'];

        $updateEstado = $estado->actualizarEstado('Usuario', 0, $name);
        //if($updateEstado->rowCount()>0) {
            echo json_encode([
                "tipo"=>"success",
                "title"=>"Deshabilitado",
                "icon"=>"success"
            ]);
        //}
        exit();
    } else if($data['accion'] === 'Habilitar') {
        $name = $data['name'];

        $updateEstado = $estado->actualizarEstado('Usuario', 1, $name);


        echo json_encode([
            "tipo"=>"success",
            "title"=>"Habilitado",
            "icon"=>"success"
        ]);
        exit();
    }
}