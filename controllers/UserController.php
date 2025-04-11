<?php
namespace controllers;
use model\MainModel;


class UserController extends MainModel
{
    public function registrarUsuario($nombre, $email, $contra, $contra2, $fecha_nacimiento)
    {
        echo($nombre.'  '. $email.' '. $contra.' '. $fecha_nacimiento.' '. $contra2.'Usercontroller');
    
        if (empty($nombre) || empty($email) || empty($contra) || empty($fecha_nacimiento)) {
            return json_encode([
                "tipo" => "simple",
                "titulo" => "Faltan campos",
                "texto" => "Todos los campos son obligatorios",
                "icono" => "error"
            ]);
        }
    }
}