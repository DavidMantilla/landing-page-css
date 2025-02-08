<?php
include 'modelo/model.php';

class controllerfactura_productos
{
    private $model;
    private $conexion;
    private $table;
    private $id;

    public function __construct()
    {
        $this->model = new model();
        $this->conexion = $this->model->conexion;
        $this->table="factura_productos";
        $this->id="id_fact_prod";
    }

    public function obtener_factura_producto()
    {


        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $factura_productos = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $factura_productos[] = $row;
            }
        }
        echo json_encode($factura_productos);
    }

    public function factura_producto_agrupados()
    {

        

        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $factura_productos = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $factura_productos[] = $row;
            }
        }
        echo json_encode($factura_productos);
    }


    public function buscar_factura_producto($id)
    {
      

        $sql = "SELECT * FROM $this->table where $this->id=".$id;
        $result = $this->conexion->query($sql);
      
        $factura_productos = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
                $factura_productos = $row;
            
        }
        echo json_encode($factura_productos);
    }


    public function insertar()
    {   
        $id_factura=$_REQUEST["id_factura"];
        $id_producto=$_REQUEST["id_producto"];
        $cantidad= $_REQUEST["cantidad"];

        $sql = "INSERT INTO $this->table (id_factura,id_producto,cantidad) values( '$id_factura','$id_producto','$cantidad')";
        print_r($sql);
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un menhsaje post";
    }

    public function actualizar($id)
    {   
        $id_factura=$_REQUEST["id_factura"];
        $id_producto=$_REQUEST["id_producto"];
        $cantidad= $_REQUEST["cantidad"];

        $sql = "update $this->table set id_factura= '$id_factura', id_producto='$id_producto', cantidad='$cantidad' where $this->id= $id ";
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un mensaje post";
    }
};




?>