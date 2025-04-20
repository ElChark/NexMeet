<?php

use model\MainModel;


$eventosGustadoModel = new MainModel();

$resultado = $eventosGustadoModel -> ejecutarConsulta("SELECT * FROM Usuarios_evento_reaccion");

$eventosGustados = $resultado->fetchAll();

//////////////////////////////////////

$asistiendoModel = new MainModel();

$resultado = $asistiendoModel -> ejecutarConsulta("SELECT * FROM Usuarios_eventos");

$asistiendos = $resultado->fetchAll();
