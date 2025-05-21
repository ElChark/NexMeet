<?php

namespace controllers;

require __DIR__ . '/../model/MainModel.php';
require_once __DIR__.'/../views/partials/session-start.php';


use Core\Functions;
use model\MainModel;

class PublicacionesController extends MainModel
{
    public function createPublication($titulo, $contenido, $ruta)
    {

        //Functions::dd($ruta);


        $publicacionDatos = [
            [
                'nombre' => 'titulo',
                'nombre_marcador' => ':titulo',
                'valor' => $titulo
            ],
            [
                'nombre' => 'id_usuario',
                'nombre_marcador' => ':id_usuario',
                'valor' => $_SESSION['id_usuario']
            ],
            [
                'nombre' => 'contenido',
                'nombre_marcador' => ':contenido',
                'valor' => $contenido
            ],
            [
                'nombre' => 'foto_portada',
                'nombre_marcador' => ':foto_portada',
                'valor' => $ruta
            ]
        ];

        $registrarPublicacion = $this->publicar('Publicaciones', $publicacionDatos);

        if ($registrarPublicacion->rowCount() == 1) 
            return true;
         else 
            return false;
    }

    public function handleReaction($postId, $accion)
    {
        $newReaction = $this->handlePostReaction($postId, $_SESSION['id_usuario'], $accion);

        if ($newReaction) {
            return true;
        }

        return false;
    }
}
