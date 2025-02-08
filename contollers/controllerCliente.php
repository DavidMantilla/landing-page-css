
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
        $this->table="clientes";
        $this->id="id_cliente";
    }

    public function obtener_clientes()
    {


        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $cliente = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cliente[] = $row;
            }
        }
        echo json_encode($cliente);
    }

    public function cliente_agrupados()
    {

        

        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $cliente = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cliente[] = $row;
            }
        }
        echo json_encode($cliente);
    }


    public function buscar_cliente($id)
    {
      

        $sql = "SELECT * FROM $this->table where $this->id=".$id;
        $result = $this->conexion->query($sql);
      
        $cliente = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
                $cliente = $row;
            
        }
        echo json_encode($cliente);
    }


    public function insertar()
    {   
        $nombre_completo=$_REQUEST["nombre_completo"];
        $telefono=$_REQUEST["telefono"];
        $direccion= $_REQUEST["direccion"];
        $ciudad=$_REQUEST["ciudad"];
        $correo=$_REQUEST["correo"];

        $sql = "INSERT INTO $this->table (nombre_completo,telefono,direccion,ciudad,correo) values( '$nombre_completo','$telefono','$direccion','$ciudad','$correo')";
        print_r($sql);
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un menhsaje post";
    }

    public function actualizar($id)
    {   
        $nombre_completo=$_REQUEST["nombre_completo"];
        $telefono=$_REQUEST["telefono"];
        $direccion= $_REQUEST["direccion"];
        $ciudad=$_REQUEST["ciudad"];
        $correo=$_REQUEST["correo"];

        $sql = "update $this->table set nombre_completo= '$nombre_completo', telefono='$telefono',direccion='$direccion',ciudad='$ciudad',correo='$correo' where $this->id= $id ";
        $result = $this->conexion->query($sql);  
         print($result);
         echo "soy un mensaje post";
    }
};




?>