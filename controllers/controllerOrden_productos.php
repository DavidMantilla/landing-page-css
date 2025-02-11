<?php


class controllerorden_productos
{
    private $model;
    private $conexion;
    private $table;
    private $id;

    public function __construct()
    {
        $this->model = new model();
        $this->conexion = $this->model->conexion;
        $this->table="orden_productos";
        $this->id="id_orden_prod";
        
    }

    public function obtener_orden_productos()
    {


        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $orden_productos = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orden_productos[] = $row;
            }
        }
        echo json_encode($orden_productos);
    }

    public function orden_productos_agrupados()
    {

        

        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $orden_productos = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orden_productos[] = $row;
            }
        }
        echo json_encode($orden_productos);
    }


    public function buscar_orden_productos($id)
    {
      

        $sql = "SELECT * FROM $this->table where $this->id=".$id;
        $result = $this->conexion->query($sql);
      
        $orden_productos = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
                $orden_productos = $row;
            
        }
        echo json_encode($orden_productos);
    }


    public function insertar()
    {   
        $id_orden=$_REQUEST["id_orden"];
        $id_producto=$_REQUEST["id_producto"];
        $cantidad= $_REQUEST["cantidad"];

        $sql = "INSERT INTO $this->table (id_orden,id_producto,cantidad) values( '$id_orden','$id_producto','$cantidad')";
        print_r($sql);
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un menhsaje post";
    }

    public function actualizar($id)
    {   
        $id_orden=$_REQUEST["id_orden"];
        $id_producto=$_REQUEST["id_producto"];
        $cantidad= $_REQUEST["cantidad"];

        $sql = "update $this->table set id_orden= '$id_orden', id_producto='$id_producto', cantidad='$cantidad' where $this->id= $id ";
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un mensaje post";
    }
};




?>