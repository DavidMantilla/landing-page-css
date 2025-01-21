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
    <title>Gestion de productos</title>
</head>    
</body>
    <!-- contenedor de la pagina comienza con la sentencia <div id="wrapper">-->
       <div id="wrapper">
       <?php include 'layout/header.php'; ?>
      
            <main class="main">
                <?php include 'layout/sidebar.php'; ?>
                <div class="main-content">
                    <div class="card-5">
                        <div class="card-body-5">
                            <p> <strong>HOLA ¿EN QUE PODEMOS AYUDARTE HOY?</strong></p>
                            <span class="color:#16AF89"><?php echo ('nombredelproducto') ?></span>
                            <form action="#" method="get">
                                <input type="text" class="search-input" placeholder="Escribe tu búsqueda..." />
                                <button type="submit" class="search-button">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
</body>
</html>