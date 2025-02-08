<?php
include 'modelo/model.php';

class controllerfactura
{
    private $model;
    private $conexion;
    private $table;
    private $id;

    public function __construct()
    {
        $this->model = new model();
        $this->conexion = $this->model->conexion;
        $this->table="factura";
        $this->id="id_factura";
    }

    public function obtener_factura()
    {


        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $factura = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $factura[] = $row;
            }
        }
        echo json_encode($factura);
    }


    public function buscar_factura($id)
    {

        $sql = "SELECT * FROM $this->table where $this->id=".$id;
        $result = $this->conexion->query($sql);
      
        $factura = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
                $factura = $row;
            
        }
        echo json_encode($factura);
    }

    public function factura_agrupados()
    {

        

        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $factura = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $factura[] = $row;
            }
        }
        echo json_encode($factura);
    }

    public function insertar()
    {   
        $cliente=$_REQUEST["cliente"];
        $fecha=$_REQUEST["fecha"];
        $empleado= $_REQUEST["empleado"];
        $subtotal=$_REQUEST["subtotal"];
        $iva=$_REQUEST["iva"];
        $total=$_REQUEST["total"];
        $tipo_pago=$_REQUEST["tipo_pago"];

        $sql = "INSERT INTO $this->table (cliente,fecha,empleado,subtotal,iva,total, tipo_pago) values( '$cliente','$fecha','$empleado','$subtotal','$iva','$total', '$tipo_pago')";
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
        $subtotal=$_REQUEST["subtotal"];
        $iva=$_REQUEST["iva"];
        $total=$_REQUEST["total"];
        $tipo_pago=$_REQUEST["tipo_pago"];

        $sql = "update $this->table set cliente= '$cliente', fecha='$fecha', empleado='$empleado',subtotal='$subtotal',iva='$iva', total='$total', tipo_pago='$tipo_pago' where $this->id= $id ";
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un mensaje post";
    }
};



?>