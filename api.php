
<?php


 
include 'modelo/model.php';
include("./controllers/authController.php");
$auth = new authController();
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

$routes['GET']['/cliente'] = [$cliente, 'obtener_clientes','auth'];
$routes['GET']['/cliente/:id'] = [$cliente, 'buscar_cliente','auth'];
//$routes['GET']['/cliente/:id'] = [$cliente, ' cliente_agrupados','auth'];
$routes['POST']['/cliente'] = [$cliente, 'insertar','auth'];
$routes['POST']['/cliente/:id'] = [$cliente, 'actualizar','auth'];

//factura
$routes['GET']['/factura'] = [$factura, 'obtener_factura','auth'];
$routes['GET']['/factura/mes'] = [$factura, 'factura_mes','auth'];
$routes['GET']['/factura/total'] = [$factura, 'factura_total','auth'];
$routes['GET']['/factura/:id'] = [$factura, 'buscar_factura','auth'];
$routes['POST']['/factura'] = [$factura, 'insertar','auth'];
$routes['POST']['/factura/:id'] = [$factura, 'actualizar','auth'];

//tipo_pago
$routes['GET']['/tipo_pago'] = [$tipo_pago, 'obtener_tipo_pago','auth'];
$routes['GET']['/tipo_pago/:id'] = [$tipo_pago, 'buscar_tipo_pago','auth'];
//$routes['GET']['/tipo_pago/:id'] = [$tipo_pago, ' tipo_pago_agrupados','auth'];
$routes['POST']['/tipo_pago'] = [$tipo_pago, 'insertar','auth'];
$routes['POST']['/tipo_pago/:id'] = [$tipo_pago, 'actualizar','auth'];

//orden
$routes['GET']['/orden'] = [$orden, 'obtener_orden','auth'];
$routes['GET']['/orden/ultimo'] = [$orden, 'obtener_ultimo_producto','auth'];
$routes['GET']['/orden/:id'] = [$orden, 'buscar_orden','auth'];
$routes['POST']['/orden'] = [$orden, 'insertar','auth'];
$routes['POST']['/orden/:id'] = [$orden, 'actualizar','auth'];

//categoria
$routes['GET']['/categoria'] = [$categoria, 'obtener_categoria','auth'];
$routes['GET']['/categoria/:id'] = [$categoria, 'buscar_categoria','auth'];
//$routes['GET']['/categoria/:id'] = [$categoria, ' categoria_agrupados','auth'];
$routes['POST']['/categoria'] = [$categoria, 'insertar','auth'];
$routes['POST']['/categoria/:id'] = [$categoria, 'actualizar','auth'];

//producto
$routes['GET']['/producto'] = [$producto, 'obtener_producto','auth'];
$routes['GET']['/producto/abastecer'] = [$producto, 'producto_abastecer','auth'];
$routes['GET']['/producto/:id'] = [$producto, 'buscar_producto','auth'];
$routes['POST']['/producto'] = [$producto, 'insertar','auth'];
$routes['POST']['/producto/:id'] = [$producto, 'actualizar','auth'];

//factura_productos
$routes['GET']['/factura_productos'] = [$factura_productos, 'obtener_factura_productos','auth'];
$routes['GET']['/factura_productos/producto'] = [$factura_productos, 'producto_mas_vendido','auth'];
$routes['GET']['/factura_productos/:id'] = [$factura_productos, 'buscar_factura_productos','auth'];
//$routes['GET']['/factura_productos/:id'] = [$factura_productos , ' factura_productos_agrupados','auth'];
$routes['POST']['/factura_productos'] = [$factura_productos, 'insertar','auth'];
$routes['POST']['/factura_productos/:id'] = [$factura_productos, 'actualizar','auth'];


//orden_productos
$routes['GET']['/orden_productos'] = [$orden_productos, 'obtener_orden_productos','auth'];
$routes['GET']['/orden_productos/:id'] = [$orden_productos, 'buscar_orden_productos','auth'];
//$routes['GET']['/orden_productos/:id'] = [$orden_productos, ' orden_productos_agrupados','auth'];
$routes['POST']['/orden_productos'] = [$orden_productos, 'insertar','auth'];
$routes['POST']['/orden_productos/:id'] = [$orden_productos, 'actualizar','auth'];

//proveedores
$routes['GET']['/proveedores'] = [$proveedores, 'obtener_proveedores','auth'];
$routes['GET']['/proveedores/:id'] = [$proveedores, 'buscar_proveedores','auth'];
//$routes['GET']['/proveedores/:id'] = [$proveedores, ' proveedores_agrupados','auth'];
$routes['POST']['/proveedores'] = [$proveedores, 'insertar','auth'];
$routes['POST']['/proveedores/:id'] = [$proveedores, 'actualizar','auth'];

//usuario

$routes['POST']['/usuario/login'] = [$usuario, 'login'];
//$routes['GET']['/usuario/:id'] = [$usuario, ' usuario_agrupados'];
$routes['POST']['/usuario'] = [$usuario, 'insertar'];
$routes['POST']['/usuario/:id'] = [$usuario, 'actualizar'];



$routes['POST']['/logout'] = [$auth, 'logout'];
//$result = $routes['GET']['/clientes'][0]->obtener_clientes();

function dispatch($routes, $auth)
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
                if(isset($v[2])){
                   $auth->session_validate_api();
                }
                $v[0]->{$v[1]}(...$valores);
                $error = false;
                break;
            } else {
                $error = true;
            }
        }
        if ($error) {
            echo (json_encode(["error"=>"404 Not Found"]));
            header('HTTP/1.1 404 Not Found');
        }
    }else{
        header('HTTP/1.1 404 Not Found');
        echo (json_encode(["error"=>"404 Not Found"]));
    }
}

dispatch($routes, $auth);
















// function get($param){}



// if($_SERVER['REQUEST_METHOD']== "GET"){
//  get($_SERVER['PATH_INFO']);
// }else{
//     $controller->post($_SERVER['PATH_INFO']);
// }
// print_r($_SERVER['PATH_INFO']);

?>


