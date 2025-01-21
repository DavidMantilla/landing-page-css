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
    <title>Inventario - Home</title>
</head>    
</body>
    <!-- contenedor de la pagina comienza con la sentencia <div id="wrapper">-->
       <div id="wrapper">
       <?php include 'layout/header.php'; ?>

            <main class="main">
                <?php include 'layout/sidebar.php'; ?>
                <div class="main-content">
                 <a class="nav-link" href="./paneldecontrol.php">
                    <div class="box" id="panel">   <img class="icon icon-gestiondeproductos" src="./imagenes/Paneldecontrol.svg" alt="">
                        <p>Panel de control</p></div>
                 </a>
                 <a class="nav-link" href="./gestiondeproducto.php">
                    <div class="box" id="Gestion"><img class="icon icon-gestiondeproductos" src="./imagenes/Gestiondeproductos.svg" alt="">
                        <P>Gestion de productos</P></div>
                 </a>
                 <a class="nav-link" href="./pedidos.php">
                    <div class="box" id="pedidos"><img class="icon icon-pedidos" src="./imagenes/Pedidos.svg" alt="">
                        <P>Pedidos</P></div> 
                 </a>
                 <a class="nav-link" href="./suministros.php">
                    <div class="box" id="suministros"><img class="icon icon-suministros" src="./imagenes/Suministros.svg" alt="">
                        <P>Suministros</P></div>
                 </a>        
                   <a class="nav-link" href="./soporteyayuda.php">
                      <div class="box" id="soporte">    <img class="icon icon-soporteyayuda" src="./imagenes/Soporteyayuda.svg" alt="">
                        <P>Soporte y ayuda</P></div>
                   </a>
             </div>
            </main>
        </div>
</body>
</html>