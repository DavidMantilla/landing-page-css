<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <!-- NOMBRE DE LA PESTAÑA-->
    <title>Pedidos</title>
</head>
</body>
<!-- contenedor de la pagina comienza con la sentencia <div id="wrapper">-->
<div id="wrapper">
    <?php include 'layout/header.php'; ?>

    <main class="main">
    <?php include 'layout/sidebar.php'; ?>
    <div class="main-content">
        <div class="busqueda">
            <input type="text" name="buscador" id="buscador"placeholder="buscar articulos...">
            <!--<ul id="listaArticulos">
                <li class="articulo">hola</li>
                <li class="articulo"></li>
                <li class="articulo"></li>
                <li class="articulo"></li>
                <li class="articulo"></li>
                <li class="articulo"></li>
                <li class="articulo"></li>
                <li class="articulo"></li>
                <li class="articulo"></li>
                <li class="articulo"></li>
                <li class="articulo"></li>
                <li class="articulo"></li>
            </ul> -->
            <button class="categoria-btn" id="categoria-btn">
                Actualizar 
            </button>
            <button class="categoria-btn" id="categoria-btn">
                Crear
            </button>
        </div>
        <div class="row">
          
            <div class="card col-60" style="border-color: #EC6273;margin: auto;">
                <div class="card-body">
                    <h2 class="title-2" style="border-color: #EC6273; text-align: center;">Crear orden</h2> </a>

                    <div class="ctn-form">
                        <form action="">
                        <div class="input-group">
            <div>
                <p><strong><label for="">Categoría</label></strong></p>
                <input type="text" style="border-color: #EC6273;" name="text" class="input"> 
            </div>
            <div>
                <p><strong><label for="">Cantidad</label></strong></p>
                <input type="number" style="border-color:#A955CF;" name="number" class="input"> 
            </div>
        </div>
                            <p><strong><label for="">Id de venta</label></strong></p>
                            <input type="number" style="border-color:#B68117;" name="numero" class="input"></input>
                            <p><strong><label for="">Id de factura</label></strong></p>
                            <input type="number" style="border-color:#4A93E9;" name="number" class="input"></input>  
                            <p><strong><label for="">Id de pedido</label></strong></p>
                            <input type="number" style="border-color: #A955CF;" name="number" class="input"></input> 
                            <p><strong><label for="">Tipo de pago</label></strong></p>
                            <input type="text" style="border-color:#16AF89;" name="text" class="input"></input> 
                            <p><strong><label for="">Articulo</label></strong></p>
                                <div class="input-with-icons">
                                    <input type="text" style="border-color: #B68117;" name="text" class="input-1"></input> 
                                    <img src="imagenes/añadir.svg" alt="Añadir" srcset="" width="30px" class="icon-card-3">
                                    <img src="imagenes/editar.svg" alt="Editar" srcset="" width="30px" class="icon-card-3">
                                </div>
                                    <!-- Grupo de Precio y Fecha de entrega en la misma línea -->
        <div class="input-group-2">
            <div>
                <p><strong><label for="">Precio</label></strong></p>
                <input type="number" style="border-color: #EC6273;" name="number" class="input"> 
            </div>
            <div>
                <p><strong><label for="">Fecha de entrega</label></strong></p>
                <input type="date" style="border-color: #A955CF;" name="date" class="input"> 
            </div>
        </div>
                            <h2 class="title-2" style="border-color: #EC6273; text-align: center;">Informacion basica</h2> </a>

                            <p><strong><label for="">Nombre completo</label></strong></p>
                            <input type="text" style="border-color:#16AF89;" name="text" class="input"></input> 
                            <p><strong><label for="">Celular</label></strong></p>
                            <input type="tel" style="border-color: #B68117;" name="telefono" class="input"></input> 
                            <p><strong><label for="">Ubicacion</label></strong></p>
                                <div class="input-with-image">
                                    <input type="text" style="border-color:#A955CF;" name="text" class="input"> 
                                </div>
                            <p><strong><label for="">Direccion</label></strong></p>
                            <input type="text" style="border-color: #4A93E9;" name="text" class="input"></input> 
                            <button class="input" style="border: none; background-color: #EC6273">Guardar</button> 
                        </form>          
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</body>
</html>