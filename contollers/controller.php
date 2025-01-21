//validar get -post -request
//validar krutas y parametros


<?php
include '../modelo/model.php';

 class controller{
     private $model;
     private $conexion;
     public function __construct() {
            $this->model = new model();
        }   
    
    public function get($param){
        $conexion=$this->model->conexion;
        if($param == 'pedidos'){
            $sql = "SELECT * FROM pedidos";
            $result = $conexion->query($sql);
            $pedidos = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $pedidos[] = $row;
                }
            }
            echo json_encode($pedidos);
        }
    }

    public function post($param){
        if($param == 'pedidos'){
            $this->crearPedido();
        }
    }


 }
?>