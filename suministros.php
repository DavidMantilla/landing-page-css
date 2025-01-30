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
            <input type="text" name="buscador-1" id="buscador"placeholder="buscar articulos...">
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
            <button class="categoria-btn" style="border: none; background-color: none; width: 95px;">
            <img src="imagenes/imprimir.svg" alt="Añadir" srcset="" width="30px" class="icon-card">
            </button>
            <button class="categoria-btn" style="border: none; background-color: none; width: 95px;">
            <img src="imagenes/descargas.svg" alt="Añadir" srcset="" width="30px" class="icon-card">
            </button>
            <button class="categoria-btn" style="border: none; background-color: none; width: 95px;">
            <img src="imagenes/vision.svg" alt="Añadir" srcset="" width="30px" class="icon-card">
            </button>
        </div>
        <div class="row">
            <div class="card" style="border-color: #16AF89;">
                <div class="card-body">
                    <h2 class="title-2" style="border-color: #EC6273; text-align: center;">Historial de Pedidos</h2> </a>
                    <div class="ctn-form">
                        <form action="">
                            <p><strong><label for="">Numero de orden</label></strong></p>
                                <div class="input-with-icons">
                                    <input type="number" style="border-color:#A955CF;" name="number" class="input"></input> 
                                    <img src="imagenes/check.svg" alt="Editar" srcset="" width="30px" class="icon-card">
                                    <p><strong>Cancelado</strong></p>
                                </div>
                            <p><strong><label for="">Datos del cliente</label></strong></p>
                            <input type="text" style="border-color: #EC6273;" name="text" class="input"></input> 
                            <p><strong><label for="">Datos del producto</label></strong></p>
                                <div class="input-with-icons">
                                    <input type="text" style="border-color:#A955CF;" name="text" class="input"></input> 
                                    <img src="imagenes/ganancias.svg" alt="Editar" srcset="" width="30px" class="icon-card">
                                    <p><strong>Precio</strong></p>
                                </div>
                    </div>
                </div>
            </div>
        </div>

            <button class="categoria-btn" style="border: none; background-color: none; width: 95px;">
                <img src="imagenes/imprimir.svg" alt="Añadir" srcset="" width="30px" class="icon-card">
            </button>
            <button class="categoria-btn" style="border: none; background-color: none; width: 95px;">
                <img src="imagenes/descargas.svg" alt="Añadir" srcset="" width="30px" class="icon-card">
            </button>
            <button class="categoria-btn" style="border: none; background-color: none; width: 95px;">
            <img src="imagenes/vision.svg" alt="Añadir" srcset="" width="30px" class="icon-card">
            </button>

        <div class="row">
            <div class="card" style="border-color: #16AF89;">
                <div class="card-body">
                    <h2 class="title-2" style="border-color: #EC6273; text-align: center;">Historial de Pedidos</h2> </a>
                    <div class="ctn-form">
                        <form action="">
                            <p><strong><label for="">Numero de orden</label></strong></p>
                                <div class="input-with-icons">
                                    <input type="number" style="border-color:#A955CF;" name="number" class="input"></input> 
                                    <img src="imagenes/cancelado.svg" alt="Editar" srcset="" width="30px" class="icon-card">
                                    <p><strong>Cancelado</strong></p>
                                </div>
                            <p><strong><label for="">Datos del cliente</label></strong></p>
                            <input type="text" style="border-color: #EC6273;" name="text" class="input"></input> 
                            <p><strong><label for="">Datos del producto</label></strong></p>
                                <div class="input-with-icons">
                                    <input type="text" style="border-color:#A955CF;" name="text" class="input"></input> 
                                    <img src="imagenes/ganancias.svg" alt="Editar" srcset="" width="30px" class="icon-card">
                                    <p><strong>Precio</strong></p>
                                </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</body>
</html>