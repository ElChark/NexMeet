<?php
 use model\MainModel;


 $publicacionesModel = new MainModel();
 $resultado = $publicacionesModel -> seleccionDatos('Unico', 'Publicaciones', 'id_usuario', $_SESSION['id_usuario']);

 $publicaciones = $resultado->fetchAll();