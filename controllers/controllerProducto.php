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
        
    }

    public function obtener_producto()
    {


        $sql = "SELECT id_producto, imagen_producto,existencia,nombre_producto,precio,descripcion,nombre_categoria as categoria,id_categoria  FROM $this->table join categoria on categoria.id_categoria = producto.categoria";
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
        $imagen_producto=$_FILES["imagen_producto"];
        $uploadFileDir = './archivos/';
        $dest_path = $uploadFileDir .date('YmdHis').$imagen_producto['name'];
        if( isset($imagen_producto)){
             $tipos=["image/png","image/jpg","image/svg","image/tiff","image/webp"];
            if(in_array($imagen_producto['type'],$tipos)){
                if(!move_uploaded_file($imagen_producto['tmp_name'], $dest_path))
                {
                    $message = 'hubo un error al subir el archivo';
                    header('location: /landing%20page%20css/gestiondeproducto.php?error='.$message);
                    exit();
                }
            }
        }
        $existencia=$_REQUEST["existencia"];
        $descripcion= $_REQUEST["descripcion"];
        $nombre_producto=$_REQUEST["nombre_producto"];
        $precio=$_REQUEST["precio"];
        $categoria=$_REQUEST["categoria"];

        $sql = "INSERT INTO $this->table (imagen_producto,existencia,descripcion,nombre_producto,precio,categoria) values( '$dest_path','$existencia','$descripcion','$nombre_producto','$precio','$categoria')";
        print_r($sql);
        $result = $this->conexion->query($sql);  
        header('location: /landing%20page%20css/gestiondeproducto.php');
        
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