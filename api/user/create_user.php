<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$contra_1 = $_POST['contra'];
$contra_2 = $_POST['contra2'];
$fechaNacimiento = $_POST['fecha_nacimiento'];




use controllers\UserController;
$usuario = new UserController();


$usuarioCreado = $usuario->registrarUsuario($nombre, $email, $contra_1, $contra_2, $fechaNacimiento);

if($usuarioCreado) {
    header('location: /login');
    exit();
} else {
    echo '<script>alert("Error al crear el usuario");</script>';
}


