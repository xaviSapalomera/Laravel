"use strict";
document.addEventListener('DOMContentLoaded', function () {
    // Mostrar el pop-up inmediatamente
    document.body.classList.add('show-alert');
    // Cerrar el pop-up después de 5 segundos (5000 milisegundos)
    setTimeout(function () {
        document.body.classList.remove('show-alert');
    }, 500); // 5000 milisegundos = 5 segundos
});
let botoArticle = document.getElementById('BotoArticle');
botoArticle.addEventListener('click', function () {
    // Obtenemos el valor del campo en el momento del clic
    let titol = document.getElementById('titol').value;
    // Validamos el campo
    let esValid = campsComplets(titol);
    if (!esValid) {
        errorCamps();
    }
    else {
        // Aquí puedes manejar el caso en el que el formulario esté completo
        console.log("Formulario completado correctamente.");
    }
});
function campsComplets(titol) {
    // Devuelve true si el campo no está vacío
    return titol.trim() !== "";
}
function errorCamps() {
    // Muestra el mensaje de error
    let titolDiv = document.getElementById('titolDIV');
    if (titolDiv) {
        titolDiv.innerHTML = 'FALTA EL CAMP TITOL';
    }
}
//# sourceMappingURL=articles_control.js.map