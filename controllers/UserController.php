<?php
namespace controllers;
use model\MainModel;


class UserController extends MainModel
{
    public function registrarUsuario($nombre, $email, $contra, $contra2, $fecha_nacimiento)
    {
        
        if ($contra != $contra2) {
            $alerta = [
                "tipo" => "error",
                "titulo" => "Ocurrió un error inesperado",
                "texto" => "Las contraseñas deben coincidir",
                "icono" => "error"
            ];
            return json_encode($alerta);
            exit();
        }

        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $contra)) {
            $alerta = [
                "tipo" => "error",
                "titulo" => "Contraseña insegura",
                "texto" => "La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.",
                "icono" => "error"
            ];
            return json_encode($alerta);
            exit();
        }

        $checkCorreo = $this -> ejecutarConsulta("SELECT * FROM usuario WHERE email = '$email'");
        if($checkCorreo->rowCount() > 0)
        {
            $alerta = [
                "tipo" => "error",
                "titulo" => "Ocurrió un error inesperado",
                "texto" => "El correo ya se encuentra en uso",
                "icono" => "error"
            ];
            return json_encode($alerta);
            exit();
        }



        $hashContra = password_hash($contra, PASSWORD_BCRYPT, ["cost"=>10]);

        
        $usuariosDatos=[
            [
                'nombre' => 'nombre',
                'nombre_marcador'=>':nombre',
                'valor'=>$nombre
            ],
            [
                'nombre' => 'email',
                'nombre_marcador'=>':email',
                'valor'=>$email
            ],
            [
                'nombre' => 'contra',
                'nombre_marcador'=>':contra',
                'valor'=>$hashContra 
            ],
            [
                'nombre' => 'fechaNac',
                'nombre_marcador'=>':fechaNac',
                'valor'=>$fecha_nacimiento
            ]
        ];


        $registrarUsuarios = $this ->insertar('usuario', $usuariosDatos);

        if($registrarUsuarios->rowCount()==1)
        {
            
            $alerta = [
                "tipo" => "error",
                "titulo" => "Success",
                "texto" => "El usuario ha sido registrado con exito",
                "icono" => "success"
            ];
            return json_encode($alerta);
            exit();
        }
    }
}