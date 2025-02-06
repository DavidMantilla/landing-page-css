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
    <title>Ventas</title>
</head>
</body>
<!-- contenedor de la pagina comienza con la sentencia <div id="wrapper">-->
<div id="wrapper">
    <?php include 'layout/header.php'; ?>

    <main class="main">
        <?php include 'layout/sidebar.php'; ?>
        <div class="main-content">
            <div class="busqueda">
                <input type="text" name="buscador" id="buscador" placeholder="buscar articulos...">
                &nbsp;
                <button class="categoria-btn" id="categoria-btn">
                    Crear cliente
                </button>
               
                <button class="categoria-btn" id="nuevopedido">
                    Nueva  venta
                </button>
            </div>
            <div class="row">

                <div class="card" style="border-color: #16AF89;">
                    <div class="card-body">
                        <div style="display: flex; align-items: center; justify-content: center;">
                            <h2 class="title-2" style="border-color: #EC6273; text-align: center margin-right: 20px;">Historial de Pedidos</h2> </a>
                            <button class="categoria-btn" style="border: none; background-color: none; width: 95px margin-left:10px;">
                                <img src="imagenes/imprimir.svg" alt="Añadir" srcset="" width="20px" class="icon-card">
                            </button>
                            <button class="categoria-btn" style="border: none; background-color: none; width: 95px;">
                                <img src="imagenes/descargas.svg" alt="Añadir" srcset="" width="20px" class="icon-card">
                            </button>
                            <button class="categoria-btn" style="border: none; background-color: none; width: 95px">
                                <a href="./pedidos.php"><img src="imagenes/vision.svg" alt="Añadir" srcset="" width="20px" class="icon-card"></a>
                            </button>
                        </div>
                        <div class="ctn-form">
                            <form action="">
                                <p><strong><label for="">Numero de orden</label></strong></p>
                                <div class="input-with-icons">
                                    <input type="text" style="border-color:#A955CF;" name="number" class="input"></input>
                                    <img src="imagenes/check.svg" alt="Editar" srcset="" width="30px" class="icon-card">
                                    <p><strong>completado</strong></p>
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

            <div class="addcliente" style=" " id="addcliente">
                <div class="row" style=" margin-top: 10px;">
                    <div class="card col-60" style="border-color: #16AF89; height: 90vh; margin: auto; overflow-y: scroll;">
                        <div class="card-title">
                            <h2>Nuevo cliente </h2> <button class="close" onclick="cerrar('addcliente')">X</button>
                        </div>
                        <div class="card-body" style="padding: 20px;">
                            <h2 class="title-2" style="border-color: #EC6273; text-align: center;">Informacion basica</h2> </a>

                            <div class="ctn-form">
                                <form action="">
                                    &nbsp;
                                    <p><strong><label for="">Nombre completo</label></strong></p>
                                    <input type="text" style="border-color: #16AF89;" name="text" class="input"></input>
                                    &nbsp;
                                    <p><strong><label for="">Celular</label></strong></p>
                                    <input type="tel" style="border-color: #B68117;" name="telefono" class="input"></input>
                                    &nbsp;
                                    <p><strong><label for="">Ubicacion</label></strong></p>
                                    <div class="input-with-image">
                                        <input type="text" style="border-color:#A955CF;" name="text" class="input">
                                    </div>
                                    &nbsp;
                                    <p><strong><label for="">Direccion</label></strong></p>
                                    <input type="text" style="border-color: #4A93E9;" name="text" class="input"></input>
                                    &nbsp;
                                    <p><strong><label for="">correo</label></strong></p>
                                    <input type="email" style="border-color: #16AF89;" name="email" class="input"></input>
                                    &nbsp;
                                    <button class="input" style="border: none; background-color: #EC6273">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="addproveedor" style=" " id="addproveedor">
            <div class="row" style=" margin-top: 10px;">
                <div class="card col-60" style="border-color: #16AF89; height: 90vh; margin: auto; overflow-y: scroll;">
                    <div class="card-title">
                        <h2>Nuevo proveedor </h2> <button class="close" onclick="cerrar('addproveedor')">X</button>
                    </div>
                    <div class="card-body" style="padding: 20px;">
                        <h2 class="title-2" style="border-color: #EC6273; text-align: center;">Informacion basica</h2> </a>

                        <div class="ctn-form">
                            <form action="">

                                &nbsp;
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
                                <p><strong><label for="">correo</label></strong></p>
                                <input type="email" style="border-color: #16AF89;" name="email" class="input"></input>
                                &nbsp;
                                <button class="input" style="border: none; background-color: #EC6273">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="addproveedor" style=" " id="newpedido">
            <div class="row" style=" margin-top: 10px;">
                <div class="card col-60" style="border-color: #EC6273;margin: auto;">
                <div class="card-title">
                        <h2>Nueva venta </h2> <button class="close" onclick="cerrar('newpedido')">X</button>
                    </div>
                    <div class="card-body">
                        <h2 class="title-2" style="border-color: #EC6273; text-align: center;">Crear factura</h2> </a>

                        <div class="ctn-form">
                            <form action="">
                                <p><strong><label for="">cliente</label></strong></p>
                                <input type="text" style="border-color:#B68117;" name="numero" class="input"></input>
                                <p><strong><label for="">Fecha de entrega</label></strong></p>
                                <input type="date" style="border-color: #A955CF;" name="date" class="input">
                                <select class="categoria-btn" id="categoria-btn" style="border-left: 5px solid  #4A93E9;">
                                    pago  
                                    <option selected value="">tipo de pago</option>
                                    <option value="">efectivo</option>
                                    <option value="">tarjeta</option>
                                    </select>
                                &nbsp;
                                <div class="input-group">
                                    <div>
                                        <p><strong><label for="">Articulo</label></strong></p>
                                        <input type="text" style="border-color: #16AF89;" name="text" class="input"></input>
                                    </div>
                                    <div>
                                        <p><strong><label for="">Cantidad</label></strong></p>
                                        <input type="number" style="border-color:#B68117;" name="number" class="input">
                                    </div>
                                    <div>
                                        <p><strong><label for="">Precio</label></strong></p>
                                        <input type="text" style="border-color: #A955CF;" name="number" class="input">
                                    </div>
                                    <div class="input-with-icons">
                                       <button  type="button" class="link-btn"> <img src="imagenes/añadir.svg" alt="Añadir" srcset="" width="30px" class="icon-card"></button>
                                       
                                    </div>
                                </div>
                                <div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>articulo</th>
                                                <th>cantidad</th>
                                                <th>precio</th>
                                                 <th>acciones</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>vacio</td>
                                            <td>vacio</td>
                                            <td>vacio</td>
                                            <td><button class="link-btn" type="button">X</button></td>
                                        </tr>
                                        <tr>
                                            <td>vacio</td>
                                            <td>vacio</td>
                                            <td>vacio</td>
                                            <td><button class="link-btn" type="button">X</button></td>
                                        </tr>
                                        <tr>
                                            <td>vacio</td>
                                            <td>vacio</td>
                                            <td>vacio</td>
                                            <td><button class="link-btn" type="button">X</button></td>
                                        </tr>
                                    </table>
                                    &nbsp;
                                </div>
                                <p><strong><label for="">Subtotal</label></strong></p>
                                <input type="number" style="border-color:#16AF89;" name="number" class="input"></input>
                                <p><strong><label for="">Iva</label></strong></p>
                                <input type="number" style="border-color: #B68117;" name="number" class="input"></input>
                                <p><strong><label for="">Total</label></strong></p>
                                <input type="text" style="border-color:#A955CF;" name="text" class="input"></input>
                                <button class="input" style="border: none; background-color: #EC6273">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>
</main>
</div>
<script>
    // Obtener los botones y los formularios
    const categoriaBtnCliente = document.getElementById('categoria-btn');
   
    const btnpedido = document.getElementById('nuevopedido');
    const addcliente = document.getElementById('addcliente');
    const addproveedor = document.getElementById('addproveedor');
    const newpedido=document.getElementById('newpedido');
    // Función para abrir el formulario de cliente

    btnpedido.addEventListener('click', () => {
        addcliente.style.display = 'none';
        addproveedor.style.display = 'none'; // Oculta el formulario de proveedor (si estaba visible)
        newpedido.style.display = 'block'; // Muestra el formulario de cliente
    });
    categoriaBtnCliente.addEventListener('click', () => {
        newpedido.style.display = 'none'; 
        addproveedor.style.display = 'none'; // Oculta el formulario de proveedor (si estaba visible)
        addcliente.style.display = 'block'; // Muestra el formulario de cliente
    });

    // Función para abrir el formulario de proveedor
  

    // Función para cerrar el formulario de cliente
    function cerrar(id) {
        document.getElementById(id).style.display = 'none'; // Oculta el formulario de cliente
    }

    // Función para cerrar el formulario de proveedor
   
</script>
</body>

</html>