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
                <div class="card col-30" style= "border-left: solid 5px #16AF89;">
                    <div class="card-body">
                        <p><strong>producto más vendido</strong></p>
                        <div style="display: flex; justify-content:flex-start; align-items: center;"> <img src="imagenes/productomasvendido.svg" alt="" srcset="" width="30px" class="icon-card">
                            <span style="color:#16AF89"><?php echo ('nombredelproducto') ?></span>
                        </div>
                    </div>
                </div>
                <div class="card col-30" style= "border-left: solid 5px #B68117;">
                    <div class="card-body">
                        <p><strong>Ganancias</strong></p>
                        <div style="display: flex; justify-content:flex-start; align-items: center;"> <img src="imagenes/ganancias.svg" alt="" srcset="" width="30px" class="icon-card">
                            <span style="color:#B68117"><?php echo ('precio') ?></span>
                        </div>
                    </div>
                </div>
                <div class="card col-30" style= "border-left: solid 5px #EC6273;">
                    <div class="card-body">
                        <p><strong>Solicitudes pendientes</strong></p>
                        <div style="display: flex; justify-content:flex-start; align-items: center;"> <img src="imagenes/solicitudespendientes.svg" alt="" srcset="" width="30px" class="icon-card">
                            <span style="color:#EC6273"><?php echo ('cantidades') ?></span>
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
                    <?php for ($i=0; $i<=10;$i++) { ?>
                        <div style="display: flex; justify-content:flex-start; align-items: center;">
                            <img src="imagenes/puntodeproducto.svg" alt="" srcset="" width="30px" class="icon-card">
                            <span style="color:#4A93E9"><?php echo ('producto'); ?></span>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="js/Chart.js"></script>
<script>
    const data = [{
            year: 2010,
            count: 10
        },
        {
            year: 2011,
            count: 20
        },
        {
            year: 2012,
            count: 15
        },
        {
            year: 2013,
            count: 25
        },
        {
            year: 2014,
            count: 22
        },
        {
            year: 2015,
            count: 30
        },
        {
            year: 2016,
            count: 28
        },
    ];

    new Chart(
        document.getElementById('acquisitions'), {
            type: 'line',
            data: {
                labels: data.map(row => row.year),
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
</script>
</body>

</html>