<?php
 use model\MainModel;


 $publicacionesModel = new MainModel();
 $user = $_SESSION['id_usuario'];
 $resultado = $publicacionesModel -> ejecutarConsulta("SELECT * FROM Vista_Usuarios_Publicaciones WHERE id_usuario != $user");

 $publicaciones = $resultado->fetchAll();

 /////////////

 $publicacionesModel = new MainModel();

 $resultado = $publicacionesModel -> seleccionDatos('Unico', 'Publicaciones', 'id_usuario', $user);

 $publicacionesPerfil = $resultado->fetchAll();