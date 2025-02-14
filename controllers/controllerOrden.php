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
        $this->table = "orden";
        $this->id = "id_orden";
    }

    public function obtener_orden()
    {


        $sql = "SELECT * FROM $this->table join proveedores on proveedores.`id_proveedores`= proveedores";
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

        $sql = " SELECT proveedores.nombre_completo,proveedores.ciudad,proveedores.direccion, proveedores.telefono, orden.fecha,usuario.nombre, producto.nombre_producto,producto.precio as precioUnitario, orden_productos.cantidad,orden_productos.precio as preciototal,tipo_pago.tipo_pago,subtotal,iva,total FROM orden 
 join usuario on usuario.id_usuario= orden.empleado 
join proveedores on proveedores.id_proveedores= orden.proveedores
join tipo_pago on tipo_pago.id = orden.tipo_pago 
join orden_productos on orden_productos.id_orden= orden.id_orden
join producto on producto.id_producto= orden_productos.id_producto where $this->table.$this->id=" . $id;
       
        $result = $this->conexion->query($sql);

        $orden = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orden[] = $row;
            }
        }
     //echo json_encode($orden);

        ?>

<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>orden</title>
            <style>
               table{
                background: #eee;
               }
                td,th{
                    padding: 10px;
                    
                    text-align: center;
                    border: none;
                }
            </style>
        </head>

        <body>
            <!-- formato de factura_mes -->
            <div>
                <img src="/landing%20page%20css/imagenes/logo2.png" alt="logo" style="width: 100px;">
                <h1 style="text-align: center;">Orden</h1>
            </div>
            <table style="width: 100%; border:solid 1px #444" cellspacing=0>
                <tr>
                    <th colspan="4" style="background-color: #555;color:white;text-align: center;padding: 10px;">Datos del cliente</th>
                </tr>
                <tr>
                    <td style="text-align: center;"><b>fecha:</b> <?php echo $orden[0]['fecha']; ?></td>
                    <td colspan="2" ><b>Nombre:</b> <?php echo $orden[0]['nombre_completo']; ?></td>
                    <td><b>ciudad:</b> <?php echo $orden[0]['ciudad']; ?></td>
                </tr>
                <tr>
                    <td><b>dirección:</b> <?php echo $orden[0]['direccion']; ?></td>
                    <td><b>Teléfono:</b> <?php echo $orden[0]['telefono']; ?></td>
                </tr>
                <tr style="border: solid #444  2px; background-color: #666; color:aliceblue">

                    <th>articulo</th>
                    <th>cantidad</th>
                    <th>precio unitario</th>
                    <th> monto</th>

                </tr>
                <?php
                foreach ($orden as $ord) {
                ?>
                    <tr>

                        <td style="text-align: center;"><b></b> <?php echo $ord['nombre_producto']; ?></td>
                        <td style="text-align: center;"><b></b> <?php echo $ord['cantidad']; ?></td>
                        <td style="text-align: center;"><b></b> <?php echo $ord['precioUnitario']; ?></td>
                        <td style="text-align: center;"><b></b> <?php echo $ord['preciototal']; ?></td>

                    </tr>

                <?php
                }
                ?>
                <tr>
                    <th>forma de pago</th>
                    <td style=><b></b><?php echo $orden[0]['tipo_pago']; ?></td></td>
                    <th style=" background-color: #aaa; ">subtotal</th>
                    <td style=" background-color: #aaa; "><t><?php echo $orden[0]['subtotal']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <th  style=" background-color: #aaa; ">iva</th>
                    <td style="background-color: #aaa;"><b></b><?php echo $orden[0]['iva']; ?></td>
                </tr>
                <tr >
                    <td></td>
                    <td></td>
                    <th style=" background-color: #aaa; ">Total factura</th>
                    <td style=" background-color: #aaa;"><?php echo $orden[0]['total']; ?></td>

                </tr>



                <tr>
                    <th colspan="4" style="background-color: #555;color:white;text-align: center;padding: 6px;">Datos del empleado</th>
                </tr>
                <tr >
                    <th>nombre</th>
                     <td><?php echo $orden[0]['nombre']; ?></td>

                </tr>



            </table>

        </body>

        </html>
        <?php
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

    public function sumarproducto($id_producto, $cantidad)
    {
        $resultexitencia = $this->conexion->query('SELECT existencia FROM producto where id_producto=' . $id_producto);
        $existencia = $resultexitencia->fetch_assoc()['existencia'];
        $existencia += $cantidad;
        $sql = "UPDATE producto set  existencia='$existencia' where id_producto= $id_producto ";

        $result = $this->conexion->query($sql);
        return true;
    }

    public function insertar()
    {
        $proveedor = $_REQUEST["proveedor"];
        $fecha = $_REQUEST["fecha"];
        $empleado = $_SESSION["user"]['id_usuario'];
        $subtotal = $_REQUEST["subtotal"];
        $iva = $_REQUEST["iva"];
        $total = $_REQUEST["total"];
        $tipo_pago = $_REQUEST["tipo_pago"];
        $productos = $_REQUEST["productos"];

        $sql = "INSERT INTO $this->table (proveedores,fecha,empleado,subtotal,iva,total,tipo_pago) values( '$proveedor','$fecha','$empleado','$subtotal','$iva','$total','$tipo_pago')";

        $result = $this->conexion->query($sql);


        $productos = json_decode($productos);
        $id_orden = $this->conexion->insert_id;
       
        foreach ($productos as $prod) {


            $this->sumarproducto($prod->id_producto, $prod->cantidad);
            $sql = "INSERT INTO orden_productos (id_orden,id_producto,cantidad,precio) values( '$id_orden',$prod->id_producto,'$prod->cantidad','$prod->precio')";
            print_r($sql);
            $result = $this->conexion->query($sql);
        }
        header('location: /landing%20page%20css/suministros.php');
    }

    public function actualizar($id)
    {
        $cliente = $_REQUEST["cliente"];
        $fecha = $_REQUEST["fecha"];
        $empleado = $_REQUEST["empleado"];
        $subtotal = $_REQUEST["subtotal"];
        $iva = $_REQUEST["iva"];
        $total = $_REQUEST["total"];
        $tipo_pago = $_REQUEST["tipo_pago"];

        $sql = "update $this->table set cliente= '$cliente', fecha='$fecha', empleado='$empleado', subtotal='$subtotal',iva='$iva', total='$total',tipo_pago='$tipo_pago' where $this->id= $id ";
        $result = $this->conexion->query($sql);
        print($result);
        echo "soy un mensaje post";
    }
};
