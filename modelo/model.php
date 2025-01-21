// hacer la conexion al la base de de datos

<?php

class model
{
    private $conexion;

    public function __construct()
    {
        $db = include '/config.php';
        $this->conexion = new mysqli($db['host'], $db['user'], $db['password'], $db['dbname']);
        if ($this->conexion->connect_error) {
            die('Error en la conexion' . $this->conexion->connect_error);
        }
    }
}

?>