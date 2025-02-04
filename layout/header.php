<header class="header">
    <div class="welcome-text">Bienvenidos</div>
    <div class="cuenta">
        <img class="account" src="./imagenes/perfil.png">
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