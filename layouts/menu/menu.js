
document.addEventListener('DOMContentLoaded', () => {

    //BOTÓN MENÚ HAMBURGUESA

        const menuToggle = document.getElementById('menu-toggle');
        const menuNav = document.getElementById('menuNav');


    //MENÚ NAVEGACIÓN

        menuToggle.addEventListener('click', () => {
            menuNav.classList.toggle('active'); // Alterna la clase 'active' para mostrar u ocultar el menú
        });
});
