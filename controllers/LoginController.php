<?php

namespace controllers;

use model\MainModel;

class LoginController extends MainModel
{
    public function login($nombre, $contra)
    {
        $checkUsuario = $this->ejecutarConsulta("SELECT * FROM Usuario WHERE nombre = '$nombre'");

        if ($checkUsuario->rowCount() >0) {
            $checkUsuario = $checkUsuario->fetch();

            if ($checkUsuario['nombre'] == $nombre && password_verify($contra, $checkUsuario['contra'])) 
            {

                $_SESSION['id_usuario'] = $checkUsuario['id_usuario'];
                $_SESSION['nombre'] = $checkUsuario['nombre'];
                $_SESSION['correo'] = $checkUsuario['email'];
                $_SESSION['fechaNac'] = $checkUsuario['fecha_nacimiento'];
                $_SESSION['tipo'] = $checkUsuario['tipo'];
                $_SESSION['fotoPerfil'] = $checkUsuario['foto_perfil'];
                $_SESSION['estado'] = $checkUsuario['estado'];


                $alerta = [
                    "estado" => "ok",
                    "redirect" => APP_URL.'home'
                ];
                return json_encode($alerta);
                exit();

            }else{
                $alerta = [
                    "tipo" => "error",
                    "titulo" => "Ha ocurrido algo inesperado",
                    "texto" => "Usuario o Contraseña incorrecta",
                    "icono" => "error"
                ];
                return json_encode($alerta);
                exit();
            }
        } else {
            $alerta = [
                "tipo" => "error",
                "titulo" => "Ha ocurrido algo inesperado",
                "texto" => "Ha ocurrido un error, lamento que tengas que ver esto",
                "icono" => "error"
            ];
            return json_encode($alerta);
            exit();
        }
    }
}
