<?php


class controllerorden
{
    private $model;
    private $conexion;
    private $table;
    private $id;

    public function __construct()
    {
        $this->model = new model();
        $this->conexion = $this->model->conexion;
        $this->table="orden";
        $this->id="id_orden";
        // $auth = new authController();
        // $auth->session_validate_api();
    }

    public function obtener_orden()
    {


        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $orden = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orden[] = $row;
            }
        }
        echo json_encode($orden);
    }


    public function obtener_ultimo_producto()
    {


        $sql = "select  fecha,producto.nombre_producto from $this->table  
        join orden_productos on orden.id_orden= orden_productos.id_orden
        join producto on producto.id_producto= orden_productos.id_producto
        order by fecha desc limit 1;";
        $result = $this->conexion->query($sql);
        $prodfecha = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $prodfecha[] = $row;
            }
        }
        echo json_encode($prodfecha);
    }

    public function buscar_orden($id)
    {

        $sql = "SELECT * FROM $this->table where $this->id=".$id;
        $result = $this->conexion->query($sql);
      
        $orden = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
                $orden = $row;
            
        }
        echo json_encode($orden);
    }

    public function orden_agrupados()
    {

        

        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $orden = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orden[] = $row;
            }
        }
        echo json_encode($orden);
    }

    public function insertar()
    {   
        $proveedor=$_REQUEST["proveedor"];
        $fecha=$_REQUEST["fecha"];
        $empleado= $_REQUEST["empleado"];
        $subtotal=$_REQUEST["subtotal"];
        $iva=$_REQUEST["iva"];
        $total=$_REQUEST["total"];
        $tipo_pago=$_REQUEST["tipo_pago"];

        $sql = "INSERT INTO $this->table (proveedor,fecha,empleado,subtotal,iva,total,tipo_pago) values( '$proveedor','$fecha','$empleado','$subtotal','$iva','$total','$tipo_pago')";
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

        $sql = "update $this->table set cliente= '$cliente', fecha='$fecha', empleado='$empleado', subtotal='$subtotal',iva='$iva', total='$total',tipo_pago='$tipo_pago' where $this->id= $id ";
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un mensaje post";
    }
};



?>