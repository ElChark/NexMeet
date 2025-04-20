<?php

namespace Core;

class Functions
{
    static function base_path($path): string
    {
        return BASE_PATH . $path;
    }

    static function dd($var)
    {
        header("HTTP/1.0 500");
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        die();
    }

    static function getPhoto($file): string
    {
        $foto = $file['foto'];

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

        $directory = '../ajax/images/';
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        // Ahora mueve el archivo
        $ruta = $directory . 'publicacion__' . $_SESSION['id_usuario'] . '_' . time() . '.' . $extension;

        if(move_uploaded_file($tmpImagen, $ruta))
        {
            return $ruta;
        }
        return '';
    }
}
