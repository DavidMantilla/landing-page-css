<?php
include 'modelo/model.php';

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
        $this->table="usuario";
        $this->id="id_usuario";
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



    public function buscar_usuario($id)
    {
      

        $sql = "SELECT * FROM $this->table where $this->id=".$id;
        $result = $this->conexion->query($sql);
      
        $usuario = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
                $usuario = $row;
            
        }
        echo json_encode($usuario);
    }


    public function insertar()
    {   
        $nombre=$_REQUEST["nombre"];
        $correo=$_REQUEST["correo"];
        $fecha_nacimiento= $_REQUEST["fecha_nacimiento"];
        $contraseña=$_REQUEST["contraseña"];
        $acepta=$_REQUEST["acepta"];

        $sql = "INSERT INTO $this->table (nombre,correo,fecha_nacimiento,contraseña,acepta) values( '$nombre','$correo','$fecha_nacimiento','$contraseña','$acepta')";
        print_r($sql);
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un menhsaje post";
    }

    public function actualizar($id)
    {   
        $nombre=$_REQUEST["nombre"];
        $correo=$_REQUEST["correo"];
        $fecha_nacimiento= $_REQUEST["fecha_nacimiento"];
        $contraseña=$_REQUEST["contraseña"];
        $acepta=$_REQUEST["acepta"];

        $sql = "update $this->table set nombre= '$nombre', correo='$correo',fecha_nacimiento='$fecha_nacimiento',contraseña='$contraseña',acepta='$acepta' where $this->id= $id ";
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un mensaje post";
    }
};




?>