<?php


class Controllerfactura
{
    private $model;
    private $conexion;
    private $table;
    private $id;

    public function __construct()
    {
        $this->model = new model();
        $this->conexion = $this->model->conexion;
        $this->table = "factura";
        $this->id = "id_factura";
    }

    public function obtener_factura()
    {


        $sql = "SELECT * FROM $this->table join clientes on clientes.id_cliente= factura.cliente";
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

        $sql = "SELECT clientes.nombre_completo,clientes.ciudad,clientes.direccion, clientes.telefono, factura.fecha,usuario.nombre, producto.nombre_producto,producto.precio as precioUnitario, factura_productos.cantidad,factura_productos.precio as preciototal,tipo_pago.tipo_pago,subtotal,iva,total FROM factura 
join usuario on usuario.id_usuario= factura.empleado
join clientes on clientes.id_cliente= factura.cliente
join tipo_pago on tipo_pago.id = factura.tipo_pago
join factura_productos on factura_productos.id_factura= factura.id_factura
join producto on producto.id_producto= factura_productos.id_producto
 where  factura.id_factura=$id";

        $result = $this->conexion->query($sql);

        $factura = [];
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $factura[] = $row;
            }
           
          
           
        }
        
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>factura</title>
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
                <h1 style="text-align: center;">Factura</h1>
            </div>
            <table style="width: 100%; border:solid 1px #444" cellspacing=0>
                <tr>
                    <th colspan="4" style="background-color: #555;color:white;text-align: center;padding: 10px;">Datos del cliente</th>
                </tr>
                <tr>
                    <td style="text-align: center;"><b>fecha:</b> <?php echo $factura[0]['fecha']; ?></td>
                    <td colspan="2" ><b>Nombre:</b> <?php echo $factura[0]['nombre_completo']; ?></td>
                    <td><b>ciudad:</b> <?php echo $factura[0]['ciudad']; ?></td>
                </tr>
                <tr>
                    <td><b>dirección:</b> <?php echo $factura[0]['direccion']; ?></td>
                    <td><b>Teléfono:</b> <?php echo $factura[0]['telefono']; ?></td>
                </tr>
                <tr style="border: solid #444  2px; background-color: #666; color:aliceblue">

                    <th>articulo</th>
                    <th>cantidad</th>
                    <th>precio unitario</th>
                    <th> monto</th>

                </tr>
                <?php
                foreach ($factura as $fact) {
                ?>
                    <tr>

                        <td style="text-align: center;"><b></b> <?php echo $fact['nombre_producto']; ?></td>
                        <td style="text-align: center;"><b></b> <?php echo $fact['cantidad']; ?></td>
                        <td style="text-align: center;"><b></b> <?php echo $fact['precioUnitario']; ?></td>
                        <td style="text-align: center;"><b></b> <?php echo $fact['preciototal']; ?></td>

                    </tr>

                <?php
                }
                ?>
                <tr>
                    <th>forma de pago</th>
                    <td style=><b></b><?php echo $factura[0]['tipo_pago']; ?></td></td>
                    <th style=" background-color: #aaa; ">subtotal</th>
                    <td style=" background-color: #aaa; "><t><?php echo $factura[0]['subtotal']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <th  style=" background-color: #aaa; ">iva</th>
                    <td style="background-color: #aaa;"><b></b><?php echo $factura[0]['iva']; ?></td>
                </tr>
                <tr >
                    <td></td>
                    <td></td>
                    <th style=" background-color: #aaa; ">Total factura</th>
                    <td style=" background-color: #aaa;"><?php echo $factura[0]['total']; ?></td>

                </tr>



                <tr>
                    <th colspan="4" style="background-color: #555;color:white;text-align: center;padding: 6px;">Datos del empleado</th>
                </tr>
                <tr >
                    <th>nombre</th>
                     <td><?php echo $factura[0]['nombre']; ?></td>

                </tr>



            </table>

        </body>

        </html>
<?php

    }


    public function factura_mes()
    {

        $sql = "SELECT DATE_FORMAT(fecha, '%m') as month ,sum(total) as count FROM inventariodb.factura group by DATE_FORMAT(fecha, '%m');";
        $result = $this->conexion->query($sql);
        $factura = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $factura[] = $row;
            }
        }
        echo json_encode($factura);
    }


    public function factura_total()
    {



        $sql = "SELECT sum(total) as ganancia FROM $this->table";
        $result = $this->conexion->query($sql);
        $factura = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $factura[] = $row;
            }
        }
        echo json_encode($factura);
    }


    public function restarproducto($id_producto, $cantidad)
    {
        $resultexitencia = $this->conexion->query('SELECT existencia FROM producto where id_producto=' . $id_producto);
     
        $existencia = $resultexitencia->fetch_assoc()['existencia'];

        if ($existencia > $cantidad) {

            $existencia -= $cantidad;

            $sql = "UPDATE producto set  existencia='$existencia' where id_producto= $id_producto ";
            
            $result = $this->conexion->query($sql);
            return true;
        } else {
            return false;
        }
    }
    public function insertar()
    {
        $cliente = $_REQUEST["cliente"];
        $fecha = $_REQUEST["fecha"];
        $empleado = $_SESSION["user"]['id_usuario'];
        $subtotal = $_REQUEST["subtotal"];
        $iva = $_REQUEST["iva"];
        $total = $_REQUEST["total"];
        $tipo_pago = $_REQUEST["tipo_pago"];
        $productos = $_REQUEST["productos"];
       
        $sql = "INSERT INTO $this->table (cliente,fecha,empleado,subtotal,iva,total, tipo_pago) values( '$cliente','$fecha','$empleado','$subtotal','$iva','$total', '$tipo_pago')";
        $result = $this->conexion->query($sql);
        

        $productos = json_decode($productos);
        $id_factura = $this->conexion->insert_id;
     

        foreach ($productos as $prod) {
            

            if ($this->restarproducto($prod->id_producto, $prod->cantidad)) {
               
                $sql = "INSERT INTO factura_productos (id_factura,id_producto,cantidad,precio) values( '$id_factura',$prod->id_producto,'$prod->cantidad','$prod->precio')";
                $result = $this->conexion->query($sql);
                
            }
        }

        header('location: /landing%20page%20css/pedidos.php');
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

        $sql = "update $this->table set cliente= '$cliente', fecha='$fecha', empleado='$empleado',subtotal='$subtotal',iva='$iva', total='$total', tipo_pago='$tipo_pago' where $this->id= $id ";
        $result = $this->conexion->query($sql);
        print($result);
        echo "soy un mensaje post";
    }
};
