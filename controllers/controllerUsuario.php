<?php


class controllerusuario
{
    private $model;
    private $conexion;
    private $table;
    private $id;

    public function __construct()
    {
        $this->model = new model();
        $this->conexion = $this->model->conexion;
        $this->table = "usuario";
        $this->id = "id_usuario";
    }

    public function obtener_usuario()
    {



        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $usuario = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuario[] = $row;
            }
        }
        echo json_encode($usuario);
    }

    public function usuario_agrupados()
    {



        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $usuario = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuario[] = $row;
            }
        }
        echo json_encode($usuario);
    }



    public function login()
    {
        $nombre = $_REQUEST["email"];
        $pass = $_REQUEST["password"];

        // Uso de consultas preparadas para evitar inyecciones SQL
        $stmt = $this->conexion->prepare("SELECT * FROM $this->table WHERE correo = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $result = $stmt->get_result();

        $usuario = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // Usar fetch_assoc para obtener un array asociativo
            $usuario = $row;

            if (password_verify($pass, $row['password'])) { // Verificar la contraseña con el hash almacenado

                $auth = new authController();
                $auth->sesion_create($usuario);
                echo json_encode($usuario);
            } else {
                echo json_encode(["error" => "Contraseña incorrecta"]);
            }
        } else {
            echo json_encode(["error" => "Usuario no encontrado"]);
        }
    }



    public function insertar()
    {
        $nombre = $_REQUEST["nombre"];
        $correo = $_REQUEST["correo"];
        $fecha_nacimiento = $_REQUEST["fecha_nacimiento"];
        $contraseña = $_REQUEST["contraseña"];
        $acepta = $_REQUEST["acepta"];

        $sql = "INSERT INTO $this->table (nombre,correo,fecha_nacimiento,contraseña,acepta) values( '$nombre','$correo','$fecha_nacimiento','$contraseña','$acepta')";
        print_r($sql);
        $result = $this->conexion->query($sql);
        print($result);
        echo "soy un menhsaje post";
    }

    public function actualizar($id)
    {
        $nombre = $_REQUEST["nombre"];
        $correo = $_REQUEST["correo"];
        $fecha_nacimiento = $_REQUEST["fecha_nacimiento"];
        $contraseña = $_REQUEST["contraseña"];
        $acepta = $_REQUEST["acepta"];

        $sql = "update $this->table set nombre= '$nombre', correo='$correo',fecha_nacimiento='$fecha_nacimiento',contraseña='$contraseña',acepta='$acepta' where $this->id= $id ";
        $result = $this->conexion->query($sql);
        print($result);
        echo "soy un mensaje post";
    }
};
