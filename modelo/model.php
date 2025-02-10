<?php


class model {
    public $conexion; // Asegúrate de que esta propiedad esté definida
    private $servername = "localhost";
    private $username = "root";
    private $password = "9321"; // Asegúrate de que la contraseña sea correcta
    private $dbname = "inventariodb";

    public function __construct() {
        // Crear conexión
        $this->conexion = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Verificar conexión
        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);
        }
    }

    // Agrega métodos adicionales para interactuar con la base de datos
}

?>