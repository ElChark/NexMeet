<?php

namespace model;

use Core\Functions;
use PDO;

require_once __DIR__ . '../../config/database.php';

class MainModel
{
    private $server =  DB_SERVER;
    private $name =  DB_NAME;
    private $user =  DB_USER;
    private $password =  DB_PASSWORD;

    public $connection;
    public $statement;

    protected function connect()
    {
        $this->connection = new PDO('mysql:host=' . $this->server . ';dbname=' . $this->name, $this->user, $this->password);
        $this->connection->exec('SET CHARACTER SET utf8');

        return $this->connection;
    }

    public function ejecutarConsulta($query)
    {
        $sql = $this->connect()->prepare($query);
        $sql->execute();
        return $sql;
    }


    protected function insertar($tabla, $params)
    {
        $query = "INSERT INTO $tabla (nombre, email, contra, fecha_nacimiento) VALUES (";

        $i = 0;
        foreach ($params as $clave) {
            if ($i >= 1)
                $query .= ',';

            $query .= $clave['nombre_marcador'];
            $i++;
        }

        $query .= ')';

        $sql = $this->connect()->prepare($query);

        foreach ($params as $clave) {
            $sql->bindParam($clave['nombre_marcador'], $clave['valor']);
        }

        $sql->execute();

        return $sql;
    }

    protected function publicar($tabla, $params)
    {
        $query = "INSERT INTO $tabla (titulo, id_usuario, contenido, foto_portada) VALUES (";

        $i = 0;
        foreach ($params as $clave) {
            if ($i >= 1)
                $query .= ',';

            $query .= $clave['nombre_marcador'];
            $i++;
        }

        $query .= ')';

        $sql = $this->connect()->prepare($query);

        foreach ($params as $clave) {
            $sql->bindParam($clave['nombre_marcador'], $clave['valor']);
        }

        $sql->execute();

        return $sql;
    }

    protected function subirEvento($tabla, $params)
    {
        $query = "INSERT INTO $tabla (titulo, id_usuario, descripcion, foto_portada, nombreLugar, longitud, latitud, fecha_evento, categoria) VALUES (";

        $i = 0;
        foreach ($params as $clave) {
            if ($i >= 1)
                $query .= ',';

            $query .= $clave['nombre_marcador'];
            $i++;
        }

        $query .= ')';

        $sql = $this->connect()->prepare($query);

        foreach ($params as $clave) {
            $sql->bindParam($clave['nombre_marcador'], $clave['valor']);
        }

        $sql->execute();

        return $sql;
    }

    protected function insertarMensaje($tabla, $params)
    {
        $query = "INSERT INTO $tabla (id_emisor, conversacion, contenido) VALUES (";

        $i = 0;
        foreach ($params as $clave) {
            if ($i >= 1)
                $query .= ',';

            $query .= $clave['nombre_marcador'];
            $i++;
        }

        $query .= ')';

        $sql = $this->connect()->prepare($query);

        foreach ($params as $clave) {
            $sql->bindParam($clave['nombre_marcador'], $clave['valor']);
        }

        $sql->execute();

        return $sql;
    }




    public function seleccionDatos($tipo, $tabla, $campo, $id)
    {
        if ($tipo == 'Unico') {
            $sql = $this->connect()->prepare("SELECT * FROM $tabla WHERE $campo = :id ORDER BY fecha_publicacion DESC");
            $sql->bindParam(':id', $id);
        } elseif ($tipo == 'Normal') {
            $sql = $this->connect()->prepare("SELECT * FROM $tabla");
        } elseif ($tipo == 'Mensajes') {
            $sql = $this->connect()->prepare("SELECT * FROM Vista_Mensajes_Usuario WHERE $campo = :id ORDER BY fecha ASC");
            $sql->bindParam(':id', $id);
        } elseif ($tipo == 'Eventos') {
            $sql = $this->connect()->prepare("SELECT * FROM $tabla ORDER BY fecha_publicacion DESC");
            //$sql->bindParam(':id', $id);
        } elseif ($tipo == 'crearEvento') {
            $sql = $this->connect()->prepare("SELECT * FROM Evento WHERE id_usuario = :id ORDER BY id_evento DESC LIMIT 1");
            $sql->bindParam(':id', $id);
        } elseif ($tipo == 'seguidores') {

            $sql = $this->connect()->prepare("SELECT * FROM Vista_Solicitudes WHERE (id_emisor = :idUsuario OR id_receptor = :idUsuario) AND estado = 'Aceptada'");
            $sql->bindParam(':idUsuario', $id);
        } elseif ($tipo == 'Buscar') {
            $idBusqueda = "%$id%";

            $sql = $this->connect()->prepare("SELECT *
                    FROM Usuario 
                    WHERE $campo LIKE :id AND estado = 1 
                    LIMIT 10");

            $sql->bindParam(':id', $idBusqueda);
        } elseif ($tipo == 'Notifiaciones') {
            $sql = $this->connect()->prepare("SELECT * FROM $tabla WHERE $campo = :id AND estado='En Proceso'");
            $sql->bindParam(':id', $id);
        }

        $sql->execute();

        return $sql;
    }

    protected function actualizar($tabla, $params, $condicion)
    {
        $query = "UPDATE $tabla SET ";

        $i = 0;
        foreach ($params as $clave) {
            if ($i >= 1)
                $query .= ',';

            $query .= $clave['nombre'] . '=' . $clave['nombre_marcador'];
            $i++;
        }

        $query .= " WHERE id_usuario = :id_usuario";

        $sql = $this->connect()->prepare($query);

        foreach ($params as $clave) {
            $sql->bindParam($clave['nombre_marcador'], $clave['valor']);
        }

        $sql->bindParam(':id_usuario', $condicion);

        $sql->execute();
        return $sql;
    }


    protected function validarDatos($filtro, $cadena)
    {
        if (preg_match("/^" . $filtro . "$/", $cadena)) {
            return false;
        } else {
            return true;
        }
    }

    public function addReaction($id_evento, $id_usuario)
    {
        $sql = $this->connect()->prepare("CALL Aumentar_Reaccion(:id_evento, :id_usuario)");
        $sql->bindParam(':id_evento', $id_evento);
        $sql->bindParam(':id_usuario', $id_usuario);
        $sql->execute();

        return $sql;
    }

    public function removeReaction($id_evento, $id_usuario)
    {
        $sql = $this->connect()->prepare("CALL Disminuir_Reaccion(:id_evento, :id_usuario)");
        $sql->bindParam(':id_evento', $id_evento);
        $sql->bindParam(':id_usuario', $id_usuario);
        $sql->execute();

        return $sql;
    }
}
