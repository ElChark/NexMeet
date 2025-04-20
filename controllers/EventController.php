<?php

namespace controllers;

use Core\Functions;
use model\MainModel;

use PDO;

class EventController extends MainModel
{
    function addEvento($titulo, $descripcion, $file, $coordenadas, $nombreLugar, $categoria, $fechaEvento)
    {
        $coor = json_decode($coordenadas, true);
        $longitud = $coor[0];
        $latitud = $coor[1];

        $ruta = Functions::getPhoto($file);

        if ($ruta) {
            $eventoDatos = [
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
                    'nombre' => 'descripcion',
                    'nombre_marcador' => ':descripcion',
                    'valor' => $descripcion
                ],
                [
                    'nombre' => 'foto_portada',
                    'nombre_marcador' => ':foto_portada',
                    'valor' => $ruta
                ],
                [
                    'nombre' => 'nombreLugar',
                    'nombre_marcador' => ':nombreLugar',
                    'valor' => $nombreLugar
                ],
                [
                    'nombre' => 'longitud',
                    'nombre_marcador' => ':longitud',
                    'valor' => $longitud
                ],
                [
                    'nombre' => 'latitud',
                    'nombre_marcador' => ':latitud',
                    'valor' => $latitud
                ],
                [
                    'nombre' => 'fechaEvento',
                    'nombre_marcador' => ':fechaEvento',
                    'valor' => $fechaEvento
                ],
                [
                    'nombre' => 'categoria',
                    'nombre_marcador' => ':categoria',
                    'valor' => $categoria
                ]
            ];


            $subirEvento = $this->subirEvento('Evento', $eventoDatos);

            if ($subirEvento->rowCount() == 1) {
                $consultaEvento = $this->seleccionDatos('crearEvento', 'Evento', 'id_usuario', $_SESSION['id_usuario']);
                $eventoSubido = $consultaEvento->fetch();

                $alerta = [
                    "tipo" => "error", 
                    "tituloTipo" => "Success",
                    "texto" => "El evento se ha guardado con éxito",
                    "icono" => "success",
                    "longitud" => floatval($eventoSubido['longitud']),
                    "latitud" => floatval($eventoSubido['latitud']),
                    "nombreLugar" => $eventoSubido['nombreLugar'],
                    "titulo" => $eventoSubido['titulo'],
                    "descripcion" => $eventoSubido['descripcion'],
                    "ruta" => $eventoSubido['foto_portada']
                ];
                return json_encode($alerta);
                exit();
            } else {
                return json_encode([
                    "tipo" => "error",
                    "titulo" => "Error",
                    "texto" => "Lamento que tengas que ver esto",
                    "icono" => "error"
                ]);
            }
        } else {
            return json_encode([
                "tipo" => "error",
                "titulo" => "Error de subida",
                "texto" => "No se pudo mover la imagen al servidor.",
                "icono" => "error"
            ]);
        }
    }
}
