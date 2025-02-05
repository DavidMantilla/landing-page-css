
<?php
include("./contollers/controller.php");
$controller= new controller();

if($_SERVER['REQUEST_METHOD']== "GET"){
 $controller->get($_SERVER['PATH_INFO']);
}else{
    $controller->post($_SERVER['PATH_INFO']);
}
print_r($_SERVER['PATH_INFO']);

?>