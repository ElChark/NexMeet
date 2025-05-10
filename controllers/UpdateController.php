<?php

namespace controllers;

use Core\Functions;
use model\MainModel;

class UpdateController extends MainModel
{
    public function updatePhoto($arg)
    {
        $ruta = Functions::getPhoto($arg);

        if ($_SESSION['fotoPerfil'] === $ruta) {
            return json_encode([
                "tipo" => "error",
                "titulo" => "Repetición",
                "texto" => "Ya tienes esa foto de perfil crack",
                "icono" => "error"
            ]);
        }


        $usuariosDatos = [
            [
                'nombre' => 'foto_perfil',
                'nombre_marcador' => ':foto_perfil',
                'valor' => $ruta
            ]
        ];

        $actualizarFoto = $this->actualizar('Usuario', $usuariosDatos, $_SESSION['id_usuario']);

        if ($actualizarFoto->rowCount() == 1) {
            $_SESSION['fotoPerfil'] = $ruta;

            return json_encode([
                "tipo" => "success",
                "titulo" => "Foto actualizada",
                "texto" => "Tu foto de perfil ha sido actualizada exitosamente.",
                "icono" => "success",
                "ruta" => $ruta
            ]);
        } else {
            return json_encode([
                "tipo" => "error",
                "titulo" => "Error al actualizar",
                "texto" => "No se pudo actualizar la base de datos. Filas afectadas: " .
                    ($actualizarFoto->rowCount() > 0 ? $actualizarFoto->rowCount() : 'ninguna'),
                "icono" => "error",
                "debug" => [
                    "id_usuario" => $_SESSION['id_usuario'],
                    "ruta" => $ruta
                ]
            ]);
        }

    }

    public function updateInfo($nombre, $email, $num, $desc)
    {
        $usuariosDatos = [
            [
                'nombre' => 'nombre',
                'nombre_marcador' => ':nombre',
                'valor' => $nombre
            ],
            [
                'nombre' => 'email',
                'nombre_marcador' => ':email',
                'valor' => $email
            ],
            [
                'nombre' => 'num_telefono',
                'nombre_marcador' => ':num_telefono',
                'valor' => $num
            ],
            [
                'nombre' => 'descripcion',
                'nombre_marcador' => ':descripcion',
                'valor' => $desc
            ]
        ];

        $actualizarUsuario = $this->actualizar('Usuario', $usuariosDatos, $_SESSION['id_usuario']);

        if ($actualizarUsuario->rowCount() === 1) {
            $_SESSION['numero'] = $num;
            $_SESSION['descripcion'] = $desc;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['correo'] = $email;


            return json_encode([
                "tipo" => "success",
                "titulo" => "Informacion Guardada",
                "texto" => "Se ha actualizado la informacion",
                "icono" => "success",
                "nombre" => $nombre,
                "correo" => $email,
                "descripción" => $desc
            ]);
        } else {
            return json_encode([
                "tipo" => "error",
                "titulo" => "Error",
                "texto" => "Estas guardando la misma información",
                "icono" => "error"
            ]);
        }
    }


}
