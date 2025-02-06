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
        $this->table="ordenes";
        $this->id="id_ordenes";
    }

    public function obtener_ordenes()
    {


        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $ordenes = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ordenes[] = $row;
            }
        }
        echo json_encode($ordenes);
    }


    public function buscar_ordenes($id)
    {

        $sql = "SELECT * FROM $this->table where $this->id=".$id;
        $result = $this->conexion->query($sql);
      
        $ordenes = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
                $ordenes = $row;
            
        }
        echo json_encode($ordenes);
    }


    public function insertar()
    {   
        $proveedor=$_REQUEST["proveedor"];
        $fecha=$_REQUEST["fecha"];
        $empleado= $_REQUEST["empleado"];
        $tipo_pago=$_REQUEST["tipo_pago"];
        $subtotal=$_REQUEST["subtotal"];
        $iva=$_REQUEST["iva"];
        $total=$_REQUEST["total"];

        $sql = "INSERT INTO $this->table (proveedor,fecha,empleado,tipo_pago,subtotal,iva,total) values( '$proveedor','$fecha','$empleado','$tipo_pago','$subtotal','$iva','$total')";
        print_r($sql);
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un menhsaje post";
    }

    public function actualizar($id)
    {   
        $cliente=$_REQUEST["cliente"];
        $fecha=$_REQUEST["fecha"];
        $empleado= $_REQUEST["empleado"];
        $tipo_pago=$_REQUEST["tipo_pago"];
        $subtotal=$_REQUEST["subtotal"];
        $iva=$_REQUEST["iva"];
        $total=$_REQUEST["total"];

        $sql = "update $this->table set cliente= '$cliente', fecha='$fecha', empleado='$empleado',tipo_pago='$tipo_pago', subtotal='$subtotal',iva='$iva', total='$total' where $this->id= $id ";
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un mensaje post";
    }
};



?>