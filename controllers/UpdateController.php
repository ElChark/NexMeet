<?php

namespace controllers;

use model\MainModel;

class UpdateController extends MainModel
{
    public function updatePhoto($arg)
    {
        $foto = $arg['photo'];
    
        $nombreImagen = $foto['name'];
        $tmpImagen = $foto['tmp_name'];
        $extension = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
    
    
        $extensionesPermitidas = ['jpg', 'jpeg', 'png'];
        if (!in_array($extension, $extensionesPermitidas)) {
            return json_encode([
                "tipo" => "error",
                "titulo" => "Formato inválido",
                "texto" => "Solo se permiten imágenes JPG, JPEG o PNG",
                "icono" => "error"
            ]);
        }
    
        $directory = 'images/';
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true); 
        }
        
        // Ahora mueve el archivo
        
        $ruta = $directory . 'perfil__' . $_SESSION['id_usuario'] . $nombreImagen .'.jpg';
        if($_SESSION['fotoPerfil']===$ruta)
        {
            return json_encode([
                "tipo" => "error",
                "titulo" => "Repeticion",
                "texto" => "Ya teienes esa foto de perfil crack",
                "icono" => "error"
            ]);
        }
    
        if (move_uploaded_file($tmpImagen, $ruta)) {
            $usuariosDatos = [
                [
                    'nombre' => 'foto_perfil',
                    'nombre_marcador' => ':foto_perfil',
                    'valor' => $ruta
                ]
            ];
    
            $actualizarFoto = $this->actualizar('Usuario', $usuariosDatos, $_SESSION['id_usuario']);
    
            if ($actualizarFoto->rowCount()==1) {
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
                              ($actualizarFoto ? $actualizarFoto->rowCount() : 'ninguna'),
                    "icono" => "error",
                    "debug" => [
                        "id_usuario" => $_SESSION['id_usuario'],
                        "ruta" => $ruta
                    ]
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

    public function updateInfo($nombre, $email, $num, $desc)
    {
        $usuariosDatos = [
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

        $actualizarUsuario = $this ->actualizar('Usuario', $usuariosDatos, $_SESSION['id_usuario']);

        if($actualizarUsuario->rowCount()===1)
        {
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
                "desc" => $desc
            ]);
        } else {
            return json_encode([
                "tipo" => "error",
                "titulo" => "Really Nigga?",
                "texto" => "Porq guardarias lo mismo?",
                "icono" => "error"
            ]);
        }
    }
    
    
}
