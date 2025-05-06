<?php

use model\MainModel;
$user = $_SESSION['id_usuario'];
$currentName = $_SESSION['nombre'];



$newModel = new MainModel();
$resultadoUsuariosModel = $newModel -> seleccionDatos('Administrador', 'Usuario', 'tipo', 'Usuario');

$resultadoEventosGustadosModel = $newModel -> ejecutarConsulta("SELECT * FROM Usuarios_evento_reaccion");

$resultadoAsistiendoModel =  $newModel -> ejecutarConsulta("SELECT * FROM Usuarios_eventos");

$resultadoEventosPropiosModel = $newModel -> seleccionDatos('Unico', 'Evento', 'id_usuario', $user);

$resultadoEventos =$newModel -> ejecutarConsulta("SELECT * FROM Vista_Eventos_Explorar WHERE id_usuario != $user");

$resultadoEventosGustadosPerfilModel = $newModel -> ejecutarConsulta("SELECT * FROM Vista_Mis_Eventos_Gustados WHERE id_usuario = $user");

$resultadoNotificiacionesModel = $newModel -> seleccionDatos('Notifiaciones', 'Vista_Solicitudes', 'id_receptor', $user);

$resultadoPublicacionesModel = $newModel -> ejecutarConsulta("SELECT * FROM Vista_Usuarios_Publicaciones WHERE id_usuario != $user");

$resultadoPublicacionesPerfilModel = $newModel ->seleccionDatos('Unico', 'Publicaciones', 'id_usuario', $user);

$resultadoSeguidoresModel = $newModel -> seleccionDatos('Seguidores', 'Usuario', 'id_emisor', $user);


$usuarios = $resultadoUsuariosModel->fetchAll();
$eventosGustados = $resultadoEventosGustadosModel->fetchAll();
$asistiendo = $resultadoAsistiendoModel->fetchAll();
$eventosPropios = $resultadoEventosPropiosModel->fetchAll();
$eventos = $resultadoEventos->fetchAll();
$eventosGustadosPerfil = $resultadoEventosGustadosPerfilModel->fetchAll();
$notificaciones = $resultadoNotificiacionesModel->fetchAll();
$publicaciones = $resultadoPublicacionesModel->fetchAll();
$publicacionesPerfil = $resultadoPublicacionesPerfilModel->fetchAll();
$seguidores = $resultadoSeguidoresModel->fetchAll();




