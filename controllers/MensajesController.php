<?php

namespace controllers;

use model\MainModel;
use PDO;

class MensajesController extends MainModel
{
    public function getMensajes($convoId)
    {
        $mensajes = $this->seleccionDatos('Mensajes', 'Mensajes', 'conversacion', $convoId);
        $resultados = [];

        while ($fila = $mensajes->fetch()) {
            $resultados[] = [
                "id" => $fila['id_usuario'],
                "nombre" => $fila['nombre'],
                "contenido" => $fila['contenido'],
                "fecha" => $fila['fecha'],
                "fotoPerfil"=>$fila['foto_perfil']
            ];
        }

        return json_encode($resultados);
    }

    public function setMensaje($contenido, $emisor, $convoId)
    {
        $mensajesDatos = [
            [
                'nombre' => 'id_emisor',
                'nombre_marcador' => ':id_emisor',
                'valor' => $emisor
            ],
            [
                'nombre' => 'conversacion',
                'nombre_marcador' => ':conversacion',
                'valor' => $convoId
            ],
            [
                'nombre' => 'contenido',
                'nombre_marcador' => ':contenido',
                'valor' => $contenido
            ]
        ];

        $newMensaje = $this ->insertarMensaje('Mensajes', $mensajesDatos);

        if ($newMensaje->rowCount() != 1) {
            $alerta = [
                "tipo" => "error",
                "titulo" => "Error",
                "texto" => "Ha ocurrido un error inesperado",
                "icono" => "error"
            ];
            return json_encode($alerta);
            exit();
        }
    }
}
