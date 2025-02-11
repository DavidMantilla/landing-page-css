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


        $sql = "SELECT * FROM $this->table where correo= '$nombre'";

    
        $stmt = $this->conexion->prepare("SELECT * FROM $this->table WHERE correo = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $usuario = $row;

            if (password_verify($pass, $usuario['contrasena'])) {

                $auth = new authController();
                $auth->sesion_create($usuario);
                echo json_encode($usuario);
                header('location: /landing%20page%20css/paneldecontrol.php');
            } else {
                header('location: /landing%20page%20css?error=clave');
            }
        }else{
            header('location: /landing%20page%20css?error=usuario');
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
