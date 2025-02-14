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
                    Crear proveedores
                </button>

                <button class="categoria-btn" id="nuevopedido">
                    Nuevo pedido
                </button>
            </div>
            <div class="row" id="facturas">

                <div class="card" style="border-color: #16AF89;">
                    <div class="card-body">
                        <div style="display: flex; align-items: center; justify-content: center;">
                            <h2 class="title-2" style="border-color: #EC6273; text-align: center margin-right: 20px;">Historial de Pedidos</h2> </a>
                            <button class="categoria-btn" style="border: none; background-color: none; width: 95px margin-left:10px;">
                                <img src="imagenes/imprimir.svg" alt="Añadir" srcset="" width="20px" class="icon-card">
                            </button>

                        </div>
                        <div class="ctn-form">
                            <form action="" method="post">
                                <p><strong><label for="">Numero de orden</label></strong></p>
                                <div class="input-with-icons">
                                    <input type="text" style="border-color:#A955CF;" name="number" class="input"></input>
                                    <img src="imagenes/check.svg" alt="Editar" srcset="" width="30px" class="icon-card">
                                    <p><strong>completado</strong></p>
                                </div>
                                <p><strong><label for="">Datos del cliente</label></strong></p>
                                <input type="text" style="border-color: #EC6273;" name="text" class="input"></input>
                                <p><strong><label for="">fecha</label></strong></p>
                                <div class="input-with-icons">
                                    <input type="text" style="border-color:#A955CF;" name="text" class="input"></input>
                                    <img src="imagenes/ganancias.svg" alt="Editar" srcset="" width="30px" class="icon-card">
                                    <p><strong>Precio</strong></p>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>


            </div>

            <div class="addcliente" style=" " id="addcliente">
                <div class="row" style=" margin-top: 10px;">
                    <div class="card col-60" style="border-color: #16AF89; height: 90vh; margin: auto; overflow-y: scroll;">
                        <div class="card-title">
                            <h2>Nuevo proveedor </h2> <button class="close" onclick="cerrar('addcliente')">X</button>
                        </div>
                        <div class="card-body" style="padding: 20px;">
                            <h2 class="title-2" style="border-color: #EC6273; text-align: center;">Informacion basica</h2> </a>

                            <div class="ctn-form">

                                <form action="api.php/proveedores" method="post">

                                    <p><strong><label for="">Nombre completo</label></strong></p>
                                    <input type="text" style="border-color:#16AF89;" name="nombre_completo" class="input"></input>
                                    <p><strong><label for="">Celular</label></strong></p>
                                    <input type="tel" style="border-color: #B68117;" name="telefono" class="input"></input>
                                    <p><strong><label for="">Ubicacion</label></strong></p>
                                    <div class="input-with-image">
                                        <input type="text" style="border-color:#A955CF;" name="ciudad" class="input">
                                    </div>
                                    <p><strong><label for="">Direccion</label></strong></p>
                                    <input type="text" style="border-color: #4A93E9;" name="direccion" class="input"></input>
                                    <p><strong><label for="">correo</label></strong></p>
                                    <input type="email" style="border-color: #16AF89;" name="correo" class="input"></input>
                                    &nbsp;
                                    <button type="submit" class="input" style="border: none; background-color: #EC6273" >Guardar</button>
                                </form>
                            </div>
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
                        <h2 class="title-2" style="border-color: #EC6273; text-align: center;">Crear pedido</h2> </a>

                        <div class="ctn-form">
                            <form action="api.php/orden" method="post">
                                <input type="hidden" id="productos" name="productos">
                                <p><strong><label for="">Proveedor</label></strong></p>
                                <select class="input" id="proveedor" name="proveedor" style="border-left: 5px solid  #4A93E9; min-width: 200px;">
                                    <option value=""> seleccione cliente </option>
                                </select>
                                <p><strong><label for="">Fecha de entrega</label></strong></p>
                                <input type="date" style="border-color: #A955CF;" name="fecha" class="input">
                                <select class="input" id="tipo_pago" name="tipo_pago" style="border-left: 5px solid  #4A93E9;">
                                    pago
                                    <option selected value="">tipo de pago</option>
                                    <option value="1">Efectivo</option>
                                    <option value="2">Tarjeta</option>
                                </select>
                                &nbsp;
                                <div class="input-group">
                                    <div>
                                        <p><strong><label for="">Articulo</label></strong></p>
                                        <select name="producto" id="producto" class="input" style="min-width: 200px;">
                                            <option value="">seleccione producto</option>
                                        </select>
                                    </div>
                                    <div>
                                        <p><strong><label for="">Cantidad</label></strong></p>
                                        <input type="number" style="border-color:#B68117;" name="cantidad" id="cantidad" min="1" value="1" class="input">
                                    </div>
                                    <div>
                                        <p><strong><label for="">Precio</label></strong></p>
                                        <input type="text" style="border-color: #A955CF;" name="precio" id="precio" class="input">
                                    </div>
                                    <div class="input-with-icons">
                                        <button type="button" class="link-btn" id="agregar"> <img src="imagenes/añadir.svg" alt="Añadir" srcset="" width="30px" class="icon-card"></button>

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
                                        <tbody id="tablaprods">


                                        </tbody>


                                    </table>
                                    &nbsp;
                                </div>
                                <p><strong><label for="">Subtotal</label></strong></p>
                                <input type="number" style="border-color:#16AF89;" id="subtotal" name="subtotal" class="input"></input>
                                <p><strong><label for="">Iva</label></strong></p>
                                <input type="number" style="border-color: #B68117;" id="iva" name="iva" class="input"></input>
                                <p><strong><label for="">Total</label></strong></p>
                                <input type="number" style="border-color:#A955CF;" id="total" name="total" class="input"></input>
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
    let productosArray = [];

    const btnpedido = document.getElementById('nuevopedido');
    const addcliente = document.getElementById('addcliente');
 
    const newpedido = document.getElementById('newpedido');
    // Función para abrir el formulario de cliente

    btnpedido.addEventListener('click', () => {
        addcliente.style.display = 'none';
      
        newpedido.style.display = 'block'; // Muestra el formulario de cliente
    });
    categoriaBtnCliente.addEventListener('click', () => {
        newpedido.style.display = 'none';
       
        addcliente.style.display = 'block'; // Muestra el formulario de cliente
    });

    // Función para agregar productos

    document.getElementById('agregar').addEventListener('click', () => {

        let select = document.getElementById('producto');
        let prod = select.value;
        let nombreprod = select.options[select.selectedIndex].innerText;
        let cant = document.getElementById('cantidad').value;
        let precio = document.getElementById('precio').value;

        productosArray.push({
            "nombre_producto": nombreprod,
            "id_producto": prod,
            "cantidad": cant,
            "precio": precio
        });

        cargartabla();
    })


    function eliminar(id) {
        console.log(id);


        productosArray = productosArray.filter(prod => prod.id_producto != id);
        cargartabla();

    }



    function cargartabla() {

        document.getElementById('productos').value = JSON.stringify(productosArray);
        let tablaprods = document.getElementById('tablaprods');
        tablaprods.innerHTML = "";
        let subtotal = 0;
        let total = 0;
        let iva = 0;
        productosArray.forEach(Element => {
            let tr = document.createElement('tr');

            tr.innerHTML = `<td> ${Element.nombre_producto}</td>
                                            <td>${Element.cantidad}</td>
                                            <td>${Element.precio}</td>
                                            <td><button  onclick='eliminar(${Element.id_producto} )' class="link-btn" type="button">X</button></td>`;

            tablaprods.append(tr);

            subtotal += parseFloat(Element.precio);



        })

        iva = parseFloat((subtotal * 19) / 100);
        total = parseFloat(subtotal + iva);

        document.getElementById('subtotal').value = subtotal;
        document.getElementById('iva').value = iva;
        document.getElementById('total').value = total;
    }

    let precio = 0;
    let existencia = 0;
    let prod = document.getElementById("producto").addEventListener('change', (event) => {

        let select = event.target;
        let selectedOption = select.options[select.selectedIndex];

        let idproducto = selectedOption.value;
        let nombreproducto = selectedOption.innerText;
        precio = selectedOption.dataset.precio;
        existencia = selectedOption.dataset.cantidad;
        let cantidad = document.getElementById('cantidad');
        let campoprecio = document.getElementById('precio');
        cantidad.max = existencia;
        campoprecio.value = precio * parseInt(cantidad.value);




    })

    cantidad = document.getElementById('cantidad').addEventListener('change', (event) => {

        let cantidad = document.getElementById('cantidad').value;
        let campoprecio = document.getElementById('precio');


        if (precio != 0) {

            campoprecio.value = precio * parseInt(cantidad);
        }

    })


    window.productos = () => {
        // 
        fetch('api.php/producto')
            .then(response => {
                if (!response.ok) {
                    if (response.status == '401') {
                        window.location.href = 'index.html';
                    }
                }
                return response.json();
            })
            .then(data => {
             console.log(data);
             

                if (data.length >= 0) {

                    let prod = document.getElementById("producto");
                    data.forEach(Element => {

                        // <div style="display: flex; justify-content:flex-start; align-items: center;">
                        //  <img src="imagenes/puntodeproducto.svg" alt="" srcset="" width="30px" class="icon-card">
                        //                      <span style="color:#4A93E9" ></span>
                        //                </div>
                        //<option value="">prueba</option>
                        if (Element.existencia > 0) {
                            let div = document.createElement('option');
                            div.value = Element.id_producto;
                            div.innerHTML = Element.nombre_producto;
                            div.dataset.precio = Element.precio;
                            div.dataset.cantidad = Element.existencia;
                            prod.append(div);
                        }
                    })
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });


    }

    window.clientes = () => {
        // 
        fetch('api.php/proveedores')
            .then(response => {
                if (!response.ok) {
                    if (response.status == '401') {
                        window.location.href = 'index.html';
                    }
                }
                return response.json();
            })
            .then(data => {


                if (data.length >= 0) {

                    let cliente = document.getElementById("proveedor");
                    data.forEach(Element => {

                        // <div style="display: flex; justify-content:flex-start; align-items: center;">
                        //  <img src="imagenes/puntodeproducto.svg" alt="" srcset="" width="30px" class="icon-card">
                        //                      <span style="color:#4A93E9" ></span>
                        //                </div>
                        //<option value="">prueba</option>
                        let div = document.createElement('option');
                        div.value = Element.id_proveedores;
                        div.innerHTML = Element.nombre_completo;
                        cliente.append(div);
                    })
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });


    }

    // Función para cerrar el formulario de cliente
    function cerrar(id) {
        document.getElementById(id).style.display = 'none'; // Oculta el formulario de cliente

    }

    let facturas = [];

    document.getElementById('buscador').addEventListener('keyup', (event) => {



        if (event.target.value != "") {

            let facturafil = facturas.filter(prod => prod.id_factura == event.target.value);
            mostrarfactura(facturafil);
        } else {
            mostrarfactura(facturas);
        }



    });

    window.mostrarfactura = (facturas) => {



        let factura = document.getElementById("facturas");
        factura.innerHTML = "";
        facturas.forEach(Element => {


            let div = document.createElement('div')
            div.style.borderColor = "#16AF89;";
            div.className = "card";
            div.innerHTML = `<div class="card-body">
                        <div style="display: flex; align-items: center; justify-content: center;">
                            <h2 class="title-2" style="border-color: #EC6273; text-align: center margin-right: 20px;">Historial de Pedidos</h2> </a>
                            <a  href="api.php/orden/${Element.id_orden}" class="categoria-btn" style="border: none; background-color: none; width: 95px margin-left:10px;">
                                <img src="imagenes/imprimir.svg" alt="Añadir" srcset="" width="20px" class="icon-card">
                            </a>
                            
                        </div>
                        <div class="ctn-form">
                            <form action="" method="post">
                                <p><strong><label for="">Numero de ordenes</label></strong></p>
                                <div class="input-with-icons">
                                    <input type="text" style="border-color:#A955CF;" name="number" class="input" value=${Element.id_orden}></input>
                                    <img src="imagenes/check.svg" alt="Editar" srcset="" width="30px" class="icon-card">
                                    <p><strong>completado</strong></p>
                                </div>
                                <p><strong><label for="">Datos del proveedor</label></strong></p>
                                <input type="text" style="border-color: #EC6273;" name="text" class="input" value="${Element.nombre_completo}"></input>
                                <p><strong><label for="">fecha</label></strong></p>
                                <div class="input-with-icons">
                                    <input type="text" style="border-color:#A955CF;" name="text" class="input" value="${Element.fecha}"></input>
                                    <img src="imagenes/ganancias.svg" alt="Editar" srcset="" width="30px" class="icon-card">
                                    <p><strong>${Element.total}</strong></p>
                                </div>
                        </div>
                    </div>`


            factura.append(div);

        })
    }


    window.listarfacturas = () => {

        fetch('api.php/orden')
            .then(response => {
                if (!response.ok) {
                    if (response.status == '401') {
                        window.location.href = 'index.html';
                    }
                }
                return response.json();
            })
            .then(data => {


                if (data.length >= 0) {
                    facturas = data;
                    mostrarfactura(data)
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });


    }

    // Función para cerrar el formulario de proveedor

    listarfacturas();
    clientes();
    productos();
</script>
</body>

</html>