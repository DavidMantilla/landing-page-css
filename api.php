
<?php
include("./contollers/controllerCliente.php");
$clientes = new controllerCliente();
include("./controllers/controllerFactura.php");
$factura = new ControllerFactura();
include("./contollers/controllerTipo_pago.php");
$tipo_pago = new controllerTipo_pago();
include("./contollers/controllerOrden.php");
$orden = new controllerOrden();
include("./contollers/controllerCategoria.php");
$categoria = new controllerCategoria();
include("./contollers/controllerproducto.php");
$producto = new controllerproducto();
include("./contollers/controllerFactura_producto.php");
$factura_producto = new controllerFactura_productos();
include("./contollers/controllerOrden_producto.php");
$orden_productos = new controllerOrden_productos();
include("./contollers/controllerProveedores.php");
$proveedores = new controllerProveedores();
include("./contollers/controllerUsuario.php");
$usuario = new controllerUsuario();



$routes = [];

// clientes}

$routes['GET']['/clientes'] = [$clientes, 'obtener_clientes'];
$routes['GET']['/clientes/:id'] = [$clientes, 'buscar_cliente'];
$routes['GET']['/clientes/:id'] = [$clientes, ' cliente_agrupados'];
$routes['POST']['/clientes'] = [$clientes, 'insertar'];
$routes['POST']['/clientes/:id'] = [$clientes, 'actualizar'];
$routes['GET']['/factura'] = [$factura, 'obtener_factura'];
$routes['GET']['/factura/:id'] = [$factura, 'buscar_factura'];
$routes['GET']['/factura/:id'] = [$factura, ' factura_agrupados'];
$routes['POST']['/factura'] = [$factura, 'insertar'];
$routes['POST']['/factura/:id'] = [$factura, 'actualizar'];
$routes['GET']['/tipo_pago'] = [$tipo_pago, 'obtener_tipo_pago'];
$routes['GET']['/tipo_pago/:id'] = [$tipo_pago, 'buscar_tipo_pago'];
$routes['GET']['/tipo_pago/:id'] = [$tipo_pago, ' tipo_pago_agrupados'];
$routes['POST']['/tipo_pago'] = [$tipo_pago, 'insertar'];
$routes['POST']['/tipo_pago/:id'] = [$tipo_pago, 'actualizar'];
$routes['GET']['/orden'] = [$orden, 'obtener_orden'];
$routes['GET']['/orden/:id'] = [$orden, 'buscar_orden'];
$routes['GET']['/orden/:id'] = [$orden, ' orden_agrupados'];
$routes['POST']['/orden'] = [$orden, 'insertar'];
$routes['POST']['/orden/:id'] = [$orden, 'actualizar'];
$routes['GET']['/categoria'] = [$categoria, 'obtener_categoria'];
$routes['GET']['/categoria/:id'] = [$categoria, 'buscar_categoria'];
$routes['GET']['/categoria/:id'] = [$categoria, ' categoria_agrupados'];
$routes['POST']['/categoria'] = [$categoria, 'insertar'];
$routes['POST']['/categoria/:id'] = [$categoria, 'actualizar'];
$routes['GET']['/producto'] = [$producto, 'obtener_producto'];
$routes['GET']['/producto/:id'] = [$producto, 'buscar_producto'];
$routes['GET']['/producto/:id'] = [$producto, ' producto_agrupados'];
$routes['POST']['/producto'] = [$producto, 'insertar'];
$routes['POST']['/producto/:id'] = [$producto, 'actualizar'];
$routes['GET']['/factura_producto'] = [$factura_producto, 'obtener_factura_producto'];
$routes['GET']['/factura_producto/:id'] = [$factura_producto, 'buscar_factura_producto'];
$routes['GET']['/factura_producto/:id'] = [$factura_producto , ' factura_producto_agrupados'];
$routes['POST']['/factura_producto'] = [$factura_producto, 'insertar'];
$routes['POST']['/factura_producto/:id'] = [$factura_producto, 'actualizar'];
$routes['GET']['/orden_productos'] = [$orden_productos, 'obtener_orden_productos'];
$routes['GET']['/orden_productos/:id'] = [$orden_productos, 'buscar_orden_productos'];
$routes['GET']['/orden_productos/:id'] = [$orden_productos, ' orden_productos_agrupados'];
$routes['POST']['/orden_productos'] = [$orden_productos, 'insertar'];
$routes['POST']['/orden_productos/:id'] = [$orden_productos, 'actualizar'];
$routes['GET']['/proveedores'] = [$proveedores, 'obtener_orden_productos'];
$routes['GET']['/proveedores/:id'] = [$proveedores, 'buscar_orden_productos'];
$routes['GET']['/proveedores/:id'] = [$proveedores, ' orden_productos_agrupados'];
$routes['POST']['/proveedores'] = [$proveedores, 'insertar'];
$routes['POST']['/proveedores/:id'] = [$proveedores, 'actualizar'];
$routes['GET']['/usuario'] = [$usuario, 'obtener_usuario'];
$routes['GET']['/usuario/:id'] = [$usuario, 'buscar_usuario'];
$routes['GET']['/usuario/:id'] = [$usuario, ' usuario_agrupados'];
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


