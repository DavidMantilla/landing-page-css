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
    <title>Gestion de producto</title>
</head>
</body>
<!-- contenedor de la pagina comienza con la sentencia <div id="wrapper">-->
<div id="wrapper">
    <?php include 'layout/header.php'; ?>

    <main class="main">
        <?php include 'layout/sidebar.php'; ?>
        <div class="main-content " style="z-index: auto;">
            <div class="busqueda">
                <input type="text" name="buscador" id="buscador" placeholder="buscar articulos...">
             
                <select class="categoria-btn" id="categoria-btn">
                    Categoria
                    <option selected value="">Categorias</option>
                    <option value="">cate1</option>
                    <option value="">cate2</option>
                    <option value="">cate3</option>
                </select>

                <button class="categoria-btn" id="crearcategoria">
                    nueva categoria
                </button> 
                <button class="categoria-btn" id="crearProducto">
                    Crear
                </button>


            </div>
            <div class="" id="producto-container" style="width: 100%; z-index: 0;">
                <div class="row" id="producto-list">
                </div>
            </div>

            <div class="addProduct" style=" " id="addProduct" >
                <div class="row" style=" margin-top: 10px;">
                    <div class="card col-60" style="border-color: #16AF89; height: 90vh; margin: auto; overflow-y: scroll;">
                          <div class="card-title"> <h2>nuevo producto </h2>  <button class="close" onclick="cerrar()">X</button></div>
                           <div class="card-body" style="padding: 20px;">
                            <h2 class="title-2" style="border-color: #16AF89; text-align: center;">Producto</h2> </a>

                            <div class="ctn-form">
                                <form action="">


                                    <p><strong><label for="">imagen de producto</label></strong></p>
                                    <input type="file" class="input" />

                                    <p><strong><label for="">Nombre</label></strong></p>
                                    <input type="text" style="border-color:#B68117;" name="text" class="input"></input>
                                    <p><strong><label for="">Categoria</label></strong></p>
                                    <input type="text" style="border-color: #EC6273;" name="text" class="input"></input>
                                    <p><strong><label for="">Cantidad</label></strong></p>
                                    <input type="number" style="border-color:#A955CF;" name="number" class="input"></input>
                                    <p><strong><label for="">Estado</label></strong></p>
                                    <input type="text" style="border-color: #4A93E9;" name="text" class="input"></input>
                                    <p><strong><label for="">Descripcion</label></strong></p>
                                    <input type="text" style="border-color:#B68117;" name="text" class="input"></input>
                                    <p><strong><label for="">Precio</label></strong></p>
                                    <input type="number" style="border-color: #EC6273;" name="number" class="input"></input>

                                    <button class="input" style="border: none; background-color: #EC6273">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>


let cerrar = () => {

    let add = document.getElementById('addProduct');
    add.style.display = 'none';
}
    document.getElementById('crearProducto').addEventListener('click', () => {

        let add = document.getElementById('addProduct');
        add.style.display = 'block';

    });

    let colores = ['#16AF89', '#B68117', '#EC6273'];
    let colorA = 0;

    let productoLista = document.getElementById('producto-list');

    for (let i = 0; i < 10; i++) {

        let div = document.createElement('div');
        div.classList.add('card');
        div.classList.add('col-30');
        div.style.borderTop = '5px solid ' + colores[colorA];
        div.style.borderBottom = '5px solid ' + colores[colorA];
        div.innerHTML = ` <div class="card-body">
                            <div class="card-imagen"><img src="" alt="" width="100%" src=""></div>

                            <div style="display:flex; justify-content:space-between"> <h2><strong>Nombre</strong></h2>
                            <a href=""> <img src=${"imagenes/editar.svg"} alt="" srcset="" width="30px" class="icon-card"></a>
                            </div>
                            <div>
                                <p><strong>Categoria</strong> ${'categoria'}</p> 
                                <p><strong>Cantidad</strong> ${'cantidad'}</p>
                            </div>
                            <h2><strong>Descripcion</strong></h2>
                            <div class="card-descripcion"> ${'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae modi maxime perferendis iusto voluptate corrupti eveniet dignissimos tempora, laboriosam eius ex sapiente odit natus enim repellat quaerat, alias in assumenda?'}</div>
                            <div style="width: 60%;margin-left: auto;">

                                <img src="imagenes/ganancias.svg" alt="" srcset="" width="30px" class="icon-card-2">
                                <h2><strong> ${'10000'}</strong></h2>
                            </div>
                  
                        </div>`;

        productoLista.appendChild(div);

        if (colorA >= 2) {
            colorA = 0;
        } else {
            colorA++;
        }
    }
</script>
</body>

</html>