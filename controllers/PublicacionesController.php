<?php

namespace controllers;
use Core\Functions;
use model\MainModel;

class PublicacionesController extends MainModel //////////////Arreglar subir sin foto
{
    public function createPublication($titulo, $contenido, $file)
    {
        $ruta = Functions::getPhoto($file);

        if ($ruta) {
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
        } else {
            return json_encode([
                "tipo" => "error",
                "titulo" => "Error de subida",
                "texto" => "No se pudo mover la imagen al servidor.",
                "icono" => "error"
            ]);
        }



        $registrarPublicacion = $this->publicar('Publicaciones', $publicacionDatos);

        if ($registrarPublicacion->rowCount() == 1) {

            $alerta = [
                "tipo" => "error",
                "titulo" => "Success",
                "texto" => "La publicación se ha guardado con éxito",
                "icono" => "success"
            ];
            return json_encode($alerta);
        } else {
            return json_encode([
                "tipo" => "error",
                "titulo" => "Error",
                "texto" => "No se pudo guardar la publicación en la base de datos.",
                "icono" => "error"
            ]);
        }
    }
}
