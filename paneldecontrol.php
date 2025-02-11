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
    <title>Panel de control</title>
</head>
</body>
<!-- contenedor de la pagina comienza con la sentencia <div id="wrapper">-->
<div id="wrapper">
    <?php include 'layout/header.php'; ?>

    <main class="main">
        <?php include 'layout/sidebar.php'; ?>
        <div class="main-content">
            <div class="row">
                <div class="card col-30" style="border-left: solid 5px #16AF89;">
                    <div class="card-body">
                        <p><strong>producto más vendido</strong></p>
                        <div style="display: flex; justify-content:flex-start; align-items: center;"> <img src="imagenes/productomasvendido.svg" alt="" srcset="" width="30px" class="icon-card">
                            <span style="color:#16AF89" id="prdvendido"> </span>
                        </div>
                    </div>
                </div>
                <div class="card col-30" style="border-left: solid 5px #B68117;">
                    <div class="card-body">
                        <p><strong>Ganancias</strong></p>
                        <div style="display: flex; justify-content:flex-start; align-items: center;"> <img src="imagenes/ganancias.svg" alt="" srcset="" width="30px" class="icon-card">
                            <span style="color:#B68117" id="totalGan"></span>
                        </div>
                    </div>
                </div>
                <div class="card col-30" style="border-left: solid 5px #EC6273;">
                    <div class="card-body">
                        <p><strong>producto abastecido</strong></p>
                        <div style="display: flex; justify-content:flex-start; align-items: center;"> <img src="imagenes/solicitudespendientes.svg" alt="" srcset="" width="30px" class="icon-card">
                            <span style="color:#EC6273" id="ultimoprod"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card col-60" style="border-left: solid 5px #A955CF;">
                    <div class="card-body">
                        <p><strong>Resumen de ganancias</strong></p>
                        <div style="width: 100%; height: 90%;"><canvas id="acquisitions" style="width: 100%; height: 100%;"></canvas></div>
                    </div>
                </div>
                <div class="card col-30" style="border-left: solid 5px #4A93E9;">
                    <div class="card-body">
                        <p><strong>Reabastecimiento</strong></p>

                        <div id="productos">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="js/Chart.js"></script>
<script>
    window.productoMasVendido = () => {
        // 
        fetch('api.php/factura_productos/producto')
            .then(response => {
                
                
                if (!response.ok) {
                    
                    console.log(response.status);
                    
                    if(response.status=='401'){
                        window.location.href = 'index.html';
                    }
                }
                return response.json();
            })
            .then(data => {
                if (data.length >= 0) {

                    document.getElementById('prdvendido').innerText = data[0].nombre_producto;
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });


    }



    window.ganancias = () => {
        // 
        fetch('api.php/factura/total')
            .then(response => {
                if (!response.ok) {
                    if(response.status=='401'){
                        window.location.href = 'index.html';
                    }
                }
                return response.json();
            })
            .then(data => {
                console.log(data);

                if (data.length >= 0) {

                    document.getElementById('totalGan').innerText = data[0].ganancia;
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });


    }

    window.producto = () => {
        // 
        fetch('api.php/orden/ultimo')
            .then(response => {
                if (!response.ok) {
                    if(response.status=='401'){
                        window.location.href = 'index.html';
                    }
                }
                return response.json();
            })
            .then(data => {
                console.log(data);

                if (data.length >= 0) {

                    document.getElementById('ultimoprod').innerText = data[0].nombre_producto;
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });


    }


    window.abastecer = () => {
        // 
        fetch('api.php/producto/abastecer')
            .then(response => {
                if (!response.ok) {
                    if(response.status=='401'){
                        window.location.href = 'index.html';
                    }
                }
                return response.json();
            })
            .then(data => {
                console.log(data);

                if (data.length >= 0) {
                    let prod = document.getElementById("productos");
                    data.forEach(Element => {

                        // <div style="display: flex; justify-content:flex-start; align-items: center;">
                        //  <img src="imagenes/puntodeproducto.svg" alt="" srcset="" width="30px" class="icon-card">
                        //                      <span style="color:#4A93E9" ></span>
                        //                </div>

                        let div = document.createElement('div');
                        div.style.display = "flex";
                        div.style.justifyContent = "flex-start";
                        div.style.alignItems = "center";
                        div.innerHTML = `<img src="imagenes/puntodeproducto.svg" alt="" srcset="" width="30px" class="icon-card">  <span style="color:#4A93E9" > ${Element.nombre_producto}</span>`
                        prod.append(div);
                    })
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });


    }


    window.facturames = () => {

        fetch('api.php/factura/mes')
            .then(response => {
                if (!response.ok) {
                    if(response.status=='401'){
                        window.location.href = 'index.html';
                    }
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                data.forEach(Element => {
                    switch (Element.month) {
                        case '01':
                            Element.month = "enero";
                            break;
                        case '02':
                            Element.month = "febrero";
                            break;
                        case '03':
                            Element.month = "marzo";
                            break;
                        case '04':
                            Element.month = "abril";
                            break;
                        case '05':
                            Element.month = "mayo";
                            break;
                        case '06':
                            Element.month = "junio";
                            break;
                        case '07':
                            Element.month = "julio";
                            break;
                        case '08':
                            Element.month = "agosto";
                            break;
                        case '09':
                            Element.month = "septiembre";
                            break;
                        case '10':
                            Element.month = "octubre";
                            break;
                        case '11':
                            Element.month = "noviembre";
                            break;
                        case '12':
                            Element.month = "diciembre";
                            break;
                        default:
                            console.log(`Mes no reconocido: ${Element.month}`);
                    }
                });


                if (data.length >= 0) {


                    new Chart(
                        document.getElementById('acquisitions'), {
                            type: 'line',
                            data: {
                                labels: data.map(row => row.month),
                                datasets: [{
                                    label: 'Resumen de ganancias',
                                    data: data.map(row => row.count),
                                    fill: false,
                                    borderColor: 'rgb(75, 192, 192)',
                                    tension: .5
                                }]
                            }
                        }
                    );
                }
            });
    }

    producto();
    facturames();
    abastecer();
    ganancias();
    productoMasVendido();
</script>
</body>

</html>