<?php

class controllerCategoria
{
    private $model;
    private $conexion;
    private $table;
    private $id;

    public function __construct()
    {
        $this->model = new model();
        $this->conexion = $this->model->conexion;
        $this->table="categoria";
        $this->id="id_categoria";
    }

    public function obtener_categoria()
    {

        

        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $categoria = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categoria[] = $row;
            }
        }
        echo json_encode($categoria);
    }


    public function buscar_categoria($id)
    {
      


        $sql = "SELECT * FROM $this->table where $this->id=".$id;
        $result = $this->conexion->query($sql);
      
        $categoria = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
                $categoria = $row;
            
        }
        echo json_encode($categoria);
    }

    public function categoria_agrupados()
    {

        

        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $categoria = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categoria[] = $row;
            }
        }
        echo json_encode($categoria);
    }

    public function insertar()
    {   
        $categoria_nombre=$_REQUEST["categoria_nombre"];


        $sql = "INSERT INTO $this->table (nombre_categoria) values ( '$categoria_nombre')";
        print_r($sql);
        $result = $this->conexion->query($sql);  
        header('location: /landing%20page%20css/gestiondeproducto.php');

        
    }

    public function actualizar($id)
    {   
        
        $categoria_nombre=$_REQUEST["categoria_nombre"];

        $sql = "update $this->table set  categoria_nombre='$categoria_nombre' where $this->id= $id ";
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un mensaje post";
    }
};




?>