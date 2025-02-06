
<?php
include("./contollers/controllerCliente.php");
$clientes = new controllerClientes();


$routes = [];

// clientes}

$routes['GET']['/clientes'] = [$clientes, 'obtener_clientes'];
$routes['GET']['/clientes/:id'] = [$clientes, 'buscar_cliente'];
$routes['POST']['/clientes'] = [$clientes, 'insertar'];
$routes['POST']['/clientes/:id'] = [$clientes, 'actualizar'];
$routes['GET']['/factura'] = [$factura, 'obtener_factura'];
$routes['GET']['/factura/:id'] = [$factura, 'buscar_factura'];
$routes['POST']['/factura'] = [$factura, 'insertar'];
$routes['POST']['/factura/:id'] = [$factura, 'actualizar'];
$routes['GET']['/tipo_pago'] = [$factura, 'obtener_tipo_pago'];
$routes['GET']['/tipo_pago/:id'] = [$factura, 'buscar_tipo_pago'];
$routes['POST']['/tipo_pago'] = [$factura, 'insertar'];
$routes['POST']['/tipo_pago/:id'] = [$factura, 'actualizar'];






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


