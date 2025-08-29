<?php

namespace controllers;

use model\MainModel;

class CommentController extends MainModel
{
    public function insertarComentario($id, $texto, $tipo) {
        $query = new MainModel();

        if($tipo == 'Evento') {
            $comentarioDatos = [
                [
                    'nombre' => 'id_usuario',
                    'nombre_marcador'=>':id_usuario',
                    'valor'=>$_SESSION['id_usuario']

                ],
                [
                    'nombre' => 'id_evento',
                    'nombre_marcador'=>':id_evento',
                    'valor'=>$id
                ],
                [
                    'nombre' => 'id_publicacion',
                    'nombre_marcador'=>':id_publicacion',
                    'valor'=>null
                ],
                [
                    'nombre' => 'comentario',
                    'nombre_marcador'=>':comentario',
                    'valor'=>$texto
                ]
            ];

            $newComentario = $query->setComment('comentarios', $comentarioDatos);
            if($newComentario) {
                return '/eventos/?id='.$id;
            } else {
                return null;
            }

        }
        return false;
    }
}