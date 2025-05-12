<?php
require_once '../model/MainModel.php';

use Core\Functions;
use model\MainModel;

$conexion = new MainModel();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    $busqueda = isset($data['input']) ? $data['input'] : '';
} 

if (isset($data['input'])) {
    $busqueda = $data['input'];

    $usuarios = $conexion->seleccionDatos('Buscar', 'Usuario', 'nombre', $busqueda);

    $result = $usuarios->fetchAll();
    $usuarios = [];

    foreach ($result as $usuario) {
        $usuarios[] = [
            'id_usuario' => $usuario['id_usuario'],
            'nombre' => htmlspecialchars($usuario['nombre']),
            'foto_perfil' => $usuario['foto_perfil'] 
        ];
    }

    echo json_encode($usuarios);
} else {
    echo json_encode([]);
}
