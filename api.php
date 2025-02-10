
<?php

include 'modelo/model.php';

include("./controllers/controllerCliente.php");
$cliente = new controllerCliente();
include("./controllers/controllerFactura.php");
$factura = new ControllerFactura();
include("./controllers/controllerTipo_pago.php");
$tipo_pago = new controllerTipo_pago();
include("./controllers/controllerOrden.php");
$orden = new controllerOrden();
include("./controllers/controllerCategoria.php");
$categoria = new controllerCategoria();
include("./controllers/controllerproducto.php");
$producto = new controllerproducto();
include("./controllers/controllerFactura_productos.php");
$factura_productos = new controllerFactura_productos();
include("./controllers/controllerOrden_productos.php");
$orden_productos = new controllerOrden_productos();
include("./controllers/controllerProveedores.php");
$proveedores = new controllerProveedores();
include("./controllers/controllerUsuario.php");
$usuario = new controllerUsuario();



$routes = [];

// clientes

$routes['GET']['/cliente'] = [$cliente, 'obtener_clientes'];
$routes['GET']['/cliente/:id'] = [$cliente, 'buscar_cliente'];
//$routes['GET']['/cliente/:id'] = [$cliente, ' cliente_agrupados'];
$routes['POST']['/cliente'] = [$cliente, 'insertar'];
$routes['POST']['/cliente/:id'] = [$cliente, 'actualizar'];

//factura
$routes['GET']['/factura'] = [$factura, 'obtener_factura'];
$routes['GET']['/factura/mes'] = [$factura, 'factura_mes'];
$routes['GET']['/factura/total'] = [$factura, 'factura_total'];
$routes['GET']['/factura/:id'] = [$factura, 'buscar_factura'];
$routes['POST']['/factura'] = [$factura, 'insertar'];
$routes['POST']['/factura/:id'] = [$factura, 'actualizar'];

//tipo_pago
$routes['GET']['/tipo_pago'] = [$tipo_pago, 'obtener_tipo_pago'];
$routes['GET']['/tipo_pago/:id'] = [$tipo_pago, 'buscar_tipo_pago'];
//$routes['GET']['/tipo_pago/:id'] = [$tipo_pago, ' tipo_pago_agrupados'];
$routes['POST']['/tipo_pago'] = [$tipo_pago, 'insertar'];
$routes['POST']['/tipo_pago/:id'] = [$tipo_pago, 'actualizar'];

//orden
$routes['GET']['/orden'] = [$orden, 'obtener_orden'];
$routes['GET']['/orden/ultimo'] = [$orden, 'obtener_ultimo_producto'];
$routes['GET']['/orden/:id'] = [$orden, 'buscar_orden'];
$routes['POST']['/orden'] = [$orden, 'insertar'];
$routes['POST']['/orden/:id'] = [$orden, 'actualizar'];

//categoria
$routes['GET']['/categoria'] = [$categoria, 'obtener_categoria'];
$routes['GET']['/categoria/:id'] = [$categoria, 'buscar_categoria'];
//$routes['GET']['/categoria/:id'] = [$categoria, ' categoria_agrupados'];
$routes['POST']['/categoria'] = [$categoria, 'insertar'];
$routes['POST']['/categoria/:id'] = [$categoria, 'actualizar'];

//producto
$routes['GET']['/producto'] = [$producto, 'obtener_producto'];
$routes['GET']['/producto/abastecer'] = [$producto, 'producto_abastecer'];
$routes['GET']['/producto/:id'] = [$producto, 'buscar_producto'];
$routes['POST']['/producto'] = [$producto, 'insertar'];
$routes['POST']['/producto/:id'] = [$producto, 'actualizar'];

//factura_productos
$routes['GET']['/factura_productos'] = [$factura_productos, 'obtener_factura_productos'];
$routes['GET']['/factura_productos/producto'] = [$factura_productos, 'producto_mas_vendido'];
$routes['GET']['/factura_productos/:id'] = [$factura_productos, 'buscar_factura_productos'];
//$routes['GET']['/factura_productos/:id'] = [$factura_productos , ' factura_productos_agrupados'];
$routes['POST']['/factura_productos'] = [$factura_productos, 'insertar'];
$routes['POST']['/factura_productos/:id'] = [$factura_productos, 'actualizar'];


//orden_productos
$routes['GET']['/orden_productos'] = [$orden_productos, 'obtener_orden_productos'];
$routes['GET']['/orden_productos/:id'] = [$orden_productos, 'buscar_orden_productos'];
//$routes['GET']['/orden_productos/:id'] = [$orden_productos, ' orden_productos_agrupados'];
$routes['POST']['/orden_productos'] = [$orden_productos, 'insertar'];
$routes['POST']['/orden_productos/:id'] = [$orden_productos, 'actualizar'];

//proveedores
$routes['GET']['/proveedores'] = [$proveedores, 'obtener_proveedores'];
$routes['GET']['/proveedores/:id'] = [$proveedores, 'buscar_proveedores'];
//$routes['GET']['/proveedores/:id'] = [$proveedores, ' proveedores_agrupados'];
$routes['POST']['/proveedores'] = [$proveedores, 'insertar'];
$routes['POST']['/proveedores/:id'] = [$proveedores, 'actualizar'];

//usuario
$routes['GET']['/usuario'] = [$usuario, 'obtener_usuario'];
$routes['GET']['/usuario/:id'] = [$usuario, 'buscar_usuario'];
//$routes['GET']['/usuario/:id'] = [$usuario, ' usuario_agrupados'];
$routes['POST']['/usuario'] = [$usuario, 'insertar'];
$routes['POST']['/usuario/:id'] = [$usuario, 'actualizar'];




//$result = $routes['GET']['/clientes'][0]->obtener_clientes();

function dispatch($routes)
{
    $error = false;

    $method = $_SERVER["REQUEST_METHOD"];
    if (isset($_SERVER['PATH_INFO'])) {
        $path = $_SERVER['PATH_INFO'];
        foreach ($routes[$method] as $route => $v) {

            if (strpos($route, ':') !== false) {

                $alpha = '([a-zA-Z 0-9 - :]*)';
                $letra = '[a-zA-Z]+';

                $route = preg_replace('#:' . $letra . '+#', $alpha, $route);
            }


            if (preg_match('#^' . $route . '$#', $path, $matches)) {
                $valores = array_slice($matches, 1);

                $v[0]->{$v[1]}(...$valores);
                $error = false;
                break;
            } else {
                $error = true;
            }
        }
        if ($error) {
            print_r("error 404");
        }
    }else{
        print_r("error 404");
    }
}

dispatch($routes);
















// function get($param){}



// if($_SERVER['REQUEST_METHOD']== "GET"){
//  get($_SERVER['PATH_INFO']);
// }else{
//     $controller->post($_SERVER['PATH_INFO']);
// }
// print_r($_SERVER['PATH_INFO']);

?>


