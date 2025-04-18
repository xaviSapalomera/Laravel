"use strict";

document.addEventListener('DOMContentLoaded', function () {
    "use strict";

    // La función que se llama al hacer clic en el botón
    function myFunction() {
        const dropdown = document.getElementById("myDropdown");
        if (dropdown) {
            dropdown.classList.toggle("show");
            console.log('Dropdown toggled');
        }
    }

    // Cerrar el menú desplegable si el usuario hace clic fuera de él
    window.onclick = function (event) {
        const target = event.target;
        const dropdown = document.getElementById("myDropdown");
        const dropdownButton = document.querySelector(".dropbtn");

        if (dropdown && dropdownButton && !dropdown.contains(target) && !dropdownButton.contains(target)) {
            dropdown.classList.remove("show");
            console.log('Dropdown closed');
        }
    };

    // Asignar la función al botón de dropdown
    const dropdownButton = document.querySelector('.dropbtn');
    if (dropdownButton) {
        dropdownButton.addEventListener('click', myFunction);
    }
});

