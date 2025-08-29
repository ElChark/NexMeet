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

    static function view($path, $attributes = [])
    {
        extract($attributes);
        require self::base_path('\\views\\') . $path;
    }

    static function getPhoto($file): string
    {
        if (!isset($file['foto']) || empty($file['foto']) || $file['foto']['error'] !== UPLOAD_ERR_OK) {
            return '';
        }

        $foto = $file['foto'];
        $nombreImagen = $foto['name'];
        $tmpImagen = $foto['tmp_name'];
        $extension = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));

        $extensionesPermitidas = ['jpg', 'jpeg', 'png'];
        if (!in_array($extension, $extensionesPermitidas)) {
            return '';
        }

        if (!getimagesize($tmpImagen)) {
            return '';
        }

        $projectRoot = $_SERVER['DOCUMENT_ROOT'] . '/';

        // Directorio de imágenes en la raíz del proyecto
        $directory = $projectRoot . 'images/';
        $directory = str_replace('\\', '/', $directory);

        if (!is_dir($directory)) {
            if (!mkdir($directory, 0755, true)) {
                return '';
            }
        }

        $userId = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 'default';
        $timestamp = time();
        $randomString = bin2hex(random_bytes(8)); // 16 caracteres aleatorios
        $nombreUnico = 'imagen' . $userId . '' . $timestamp . '' . $randomString . '.' . $extension;

        $ruta = $directory . $nombreUnico;

        if (move_uploaded_file($tmpImagen, $ruta)) {
            return 'images/' . $nombreUnico;
        }

        return '';
    }

    static function getVideo($file): string
    {
        if (!isset($file['video']) || empty($file['video']) || $file['video']['error'] !== UPLOAD_ERR_OK) {
            return '';
        }

        $video = $file['video'];
        $nombreArchivo = $video['name'];
        $tmpArchivo = $video['tmp_name'];
        $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

        $extensionesPermitidas = ['mp4', 'mov', 'avi', 'wmv']; // Agrega las extensiones de video que necesites
        if (!in_array($extension, $extensionesPermitidas)) {
            return '';
        }

        $projectRoot = $_SERVER['DOCUMENT_ROOT'] . '/';
        $directory = $projectRoot . 'images/'; // Mantenemos la misma carpeta 'images'
        $directory = str_replace('\\', '/', $directory);

        if (!is_dir($directory)) {
            if (!mkdir($directory, 0755, true)) {
                return '';
            }
        }

        $userId = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 'default';
        $timestamp = time();
        $randomString = bin2hex(random_bytes(8)); // 16 caracteres aleatorios
        $nombreUnico = 'video' . $userId . '_' . $timestamp . '_' . $randomString . '.' . $extension; // Prefijo 'video'

        $ruta = $directory . $nombreUnico;

        if (move_uploaded_file($tmpArchivo, $ruta)) {
            return 'images/' . $nombreUnico;
        }

        return '';
    }
}
