<?php 
require_once '../config/app.php';
require_once '../autoload.php';
require_once '../views/partials/session-start.php';

use controllers\MensajesController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensajes = new MensajesController();

    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    
    if($data['tipo'] == 'Obtener')
    {
        echo $mensajes->getMensajes($data['convoId']);
        exit();
    }elseif($data['tipo']=='Insertar')
    {
        echo $mensajes->setMensaje($data['contenido'], $data['idEmisor'], $data['convoId']);
        exit();
    }
}
