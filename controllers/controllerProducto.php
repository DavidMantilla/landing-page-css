<?php


class controllerProducto
{
    private $model;
    private $conexion;
    private $table;
    private $id;

    public function __construct()
    {
        $this->model = new model();
        $this->conexion = $this->model->conexion;
        $this->table="producto";
        $this->id="id_producto";
        // $auth = new authController();
        // $auth->session_validate_api();
    }

    public function obtener_producto()
    {


        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $producto = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $producto[] = $row;
            }
        }
        echo json_encode($producto);
    }


    public function buscar_producto($id)
    {

        $sql = "SELECT * FROM $this->table where $this->id=".$id;
        $result = $this->conexion->query($sql);
      
        $producto = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
                $producto = $row;
            
        }
        echo json_encode($producto);
    }

    public function producto_abastecer()
    {

        $sql = "SELECT * FROM $this->table where existencia <= 0";
        $result = $this->conexion->query($sql);
        $producto = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $producto[] = $row;
            }
        }
        echo json_encode($producto);
    }

    public function insertar()
    {   
        $imagen_producto=$_REQUEST["imagen_producto"];
        $existencia=$_REQUEST["existencia"];
        $descripcion= $_REQUEST["descripcion"];
        $nombre_producto=$_REQUEST["nombre_producto"];
        $precio=$_REQUEST["precio"];
        $categoria=$_REQUEST["categoria"];

        $sql = "INSERT INTO $this->table (imagen_producto,existencia,descripcion,nombre_producto,precio,categoria) values( '$imagen_producto','$existencia','$descripcion','$nombre_producto','$precio','$categoria')";
        print_r($sql);
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un menhsaje post";
    }

    public function actualizar($id)
    {   
        $imagen_producto=$_REQUEST["imagen_producto"];
        $existencia=$_REQUEST["existencia"];
        $descripcion= $_REQUEST["descripcion"];
        $nombre_producto=$_REQUEST["nombre_producto"];
        $precio=$_REQUEST["precio"];
        $categoria=$_REQUEST["categoria"];

        $sql = "update $this->table set imagen_producto= '$imagen_producto', existencia='$existencia', descripcion='$descripcion', nombre_producto='$nombre_producto', precio='$precio', categoria='$categoria' where $this->id= $id ";
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un mensaje post";
    }
};



?>