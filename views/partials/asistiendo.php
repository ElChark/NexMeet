<?php

use model\MainModel;


$asistiendoModel = new MainModel();
$currentName = $_SESSION['nombre'];

$resultado = $asistiendoModel -> ejecutarConsulta("SELECT * FROM Vista_Mis_Eventos WHERE nombre_usuario='$currentName'");

$asistiendos = $resultado->fetchAll();

////////////////////

$eventosGustadoModel = new MainModel();

$currentName = $_SESSION['id_usuario'];
$resultado = $eventosGustadoModel -> ejecutarConsulta("SELECT * FROM Vista_Mis_Eventos_Gustados WHERE id_usuario = $currentName");

$eventosGustados = $resultado->fetchAll();
