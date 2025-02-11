<style>
    .menu {
    list-style-type: none;
}

.menu > li {
    position: relative;
    display: inline-block;
}

.submenu {
    display: none;
    position: absolute;
    left: -100px;
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.menu > li:hover .submenu,.menu > li:active .submenu {
    display: block;
}

.submenu li {
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    padding: 8px;
    width: 200px;
}
</style>

<header class="header">
    <div class="welcome-text">Bienvenidos</div>
    <div class="cuenta">
    <ul class="menu">
      <li >    <img class="account" src="./imagenes/perfil.png">
      <ul class="submenu">
                <li><form action="./api.php/logout" method="post"> <button style="background: none; border: none;">Logout</button></form></li>
                
            </ul>
        </li>
    </ul>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Obtén el elemento donde cambiará el texto
    const welcomeText = document.querySelector('.welcome-text');
    
    // Obtén el nombre de la página o la URL
    const page = window.location.pathname;

    // Cambiar el texto de 'welcome-text' dependiendo de la página
    if (page.includes('paneldecontrol')) {
        welcomeText.textContent = 'Panel de Control';
    } else if (page.includes('gestiondeproducto')) {
        welcomeText.textContent = 'Gestión de Producto';
    } else if (page.includes('pedidos')) {
        welcomeText.textContent = 'Ventas';
    } else if (page.includes('suministros')) {
        welcomeText.textContent = 'Suministros';
    } else if (page.includes('soporteyayuda')) {
        welcomeText.textContent = 'Soporte y Ayuda';
    } else {
        welcomeText.textContent = 'Bienvenidos';
    }
});
</script>