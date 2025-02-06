<?php
include 'modelo/model.php';

class controllerClientes
{
    private $model;
    private $conexion;
    private $table;
    private $id;

    public function __construct()
    {
        $this->model = new model();
        $this->conexion = $this->model->conexion;
        $this->table="tipo_pago";
        $this->id="id_tipo";
    }

    public function obtener_tipo_pago()
    {

        

        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $tipo_pago = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tipo_pago[] = $row;
            }
        }
        echo json_encode($tipo_pago);
    }


    public function buscar_tipo_pago($id)
    {
      
    

        $sql = "SELECT * FROM $this->table where $this->id=".$id;
        $result = $this->conexion->query($sql);
      
        $tipo_pago = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
                $tipo_pago = $row;
            
        }
        echo json_encode($tipo_pago);
    }


    public function insertar()
    {   
        $nombre=$_REQUEST["nombre"];


        $sql = "INSERT INTO $this->table (nombre) values( '$nombre')";
        print_r($sql);
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un menhsaje post";
    }

    public function actualizar($id)
    {   
        $nombre=$_REQUEST["nombre"];

        $sql = "update $this->table set  nombre='$nombre' where $this->id= $id ";
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un mensaje post";
    }
};




?>