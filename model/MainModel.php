<?php
namespace model;

use PDO;

require_once __DIR__.'../../config/database.php';

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
        $this -> connection = new PDO('mysql:host='.$this->server.';dbname='.$this->name, $this->user, $this->password);
        $this -> connection -> exec('SET CHARACTER SET utf8');

        return $this -> connection;
    }

    protected function insertar($tabla, $params)
    {
        $query = "INSERT INTO $tabla (nombre, email, contra, fecha_nacimiento, tipo, estado) VALUES (";

        $i=0;
        foreach($params as $clave)
        {
            if($i>=1)
                $query.=',';

            $query.=$clave['nombre_marcador'];
            $i++;
        }

        $query .=')';

        $sql = $this -> connect() -> prepare($query);

        foreach($params as $clave)
        {
            $sql -> bindParam($clave['nombre_marcador'], $clave['valor']);
        }

        $sql -> execute();

        return $sql;
    }

    protected function seleccionDatos($tipo, $tabla, $campo, $id)
    {
        if($tipo=='Unico')
        {
            $sql = $this -> connect() -> prepare("SELECT * FROM $tabla WHERE $campo = :id");
            $sql->bindParam(':id', $id); 
        } elseif($tipo == 'Normal')
        {
            $sql = $this -> connect() -> prepare("SELECT $campo FROM $tabla");
        }
        
        $sql->execute();
        
        return $sql;
    }

    protected function actualizar($tabla, $params, $condicion)
    {
        $query = "UPDATE $tabla SET ";

        $i=0;
        foreach($params as $clave)
        {
            if($i>=1)
                $query.=',';

            $query.=$clave['nombre'].'='.$clave['nombre_marcador'];
            $i++;
        }

        $query.=" WHERE ".$condicion['nombre'].'='.$condicion['nombre_marcador'];



        $sql = $this -> connect() ->prepare($query);
        
        foreach($params as $clave)
        {
            $sql -> bindParam($clave['nombre_marcador'], $clave['valor']);
        }

        $sql ->bindParam($condicion['nombre_marcador'], $condicion['nombre']);

        $sql -> execute();
        return $sql;
    }



    protected function validarDatos($filtro, $cadena)
    {
        if(preg_match("/^".$filtro."$/", $cadena)){return false;}
        else{return true;}
    }

}