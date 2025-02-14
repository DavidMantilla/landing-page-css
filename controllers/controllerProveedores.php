<?php


class controllerproveedores
{
    private $model;
    private $conexion;
    private $table;
    private $id;

    public function __construct()
    {
        $this->model = new model();
        $this->conexion = $this->model->conexion;
        $this->table="proveedores";
        $this->id="id_proveedores";
        
    }

    public function obtener_proveedores()
    {


        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $proveedores = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $proveedores[] = $row;
            }
        }
        echo json_encode($proveedores);
    }

    public function provedores_agrupados()
    {

        

        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $proveedores = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $proveedores[] = $row;
            }
        }
        echo json_encode($proveedores);
    }


    public function buscar_proveedores($id)
    {
      

        $sql = "SELECT * FROM $this->table  where $this->id=".$id;
    
        $result = $this->conexion->query($sql);
      
        $proveedores = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
                $proveedores = $row;
            
        }
        echo json_encode($proveedores);
    }


    public function insertar()
    {   
        $nombre_completo=$_REQUEST["nombre_completo"];
        $telefono=$_REQUEST["telefono"];
        $direccion= $_REQUEST["direccion"];
        $ciudad=$_REQUEST["ciudad"];
        $correo=$_REQUEST["correo"];

        $sql = "INSERT INTO $this->table (nombre_completo,telefono,direccion,ciudad,correo) values( '$nombre_completo','$telefono','$direccion','$ciudad','$correo')";
        print_r($sql);
        $result = $this->conexion->query($sql);  
         print($result);
         header('location: /landing%20page%20css/suministros.php');
    }

    public function actualizar($id)
    {   
        $nombre_completo=$_REQUEST["nombre_completo"];
        $telefono=$_REQUEST["telefono"];
        $direccion= $_REQUEST["direccion"];
        $ciudad=$_REQUEST["ciudad"];
        $correo=$_REQUEST["correo"];

        $sql = "update $this->table set nombre_completo= '$nombre_completo', telefono='$telefono',direccion='$direccion',ciudad='$ciudad',correo='$correo' where $this->id= $id ";
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un mensaje post";
    }
};


?>