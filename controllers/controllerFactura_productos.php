<?php


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
    //     $auth = new authController();
    //     $auth->session_validate_api();
     }

    public function obtener_factura_productos()
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

    public function factura_productos_agrupados()
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


    public function buscar_factura_productos($id)
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

//nombre del producto mas vendido y sea solamente uno 
    public function producto_mas_vendido()
    {
        $sql = "SELECT p.nombre_producto FROM $this->table fp INNER JOIN producto p ON fp.id_producto=p.id_producto GROUP BY p.nombre_producto ORDER BY SUM(fp.cantidad) DESC LIMIT 1";
        $result = $this->conexion->query($sql);
        $factura_productos = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $factura_productos[] = $row;
            }
        }
        echo json_encode($factura_productos);
    }
    

}
?>