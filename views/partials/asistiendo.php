<?php

use model\MainModel;


$asistiendoModel = new MainModel();
$currentName = $_SESSION['nombre'];

$resultado = $asistiendoModel -> ejecutarConsulta("SELECT * FROM Vista_Mis_Eventos WHERE nombre_usuario='$currentName'");

$asistiendos = $resultado->fetchAll();
