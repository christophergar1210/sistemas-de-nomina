
document.getElementById('nomina-link').addEventListener('click', function(event) {
    event.preventDefault(); // Previene el comportamiento predeterminado del enlace
    toggleOptions('nomina-options');
});

document.getElementById('empleados-link').addEventListener('click', function(event) {
    event.preventDefault(); // Previene el comportamiento predeterminado del enlace
    toggleOptions('empleados-options');
});

function toggleOptions(optionsId) {
    var options = document.getElementById(optionsId);
    if (options.style.display === 'none') {
        options.style.display = 'block';
    } else {
        options.style.display = 'none';
    }
}
 {
        // Obtener el elemento del mensaje
        var mensaje = document.getElementById('mensaje');

        // Mostrar el mensaje
        mensaje.style.display = 'block';

        // Ocultar el mensaje después de 5 segundos
        setTimeout(function() {
            mensaje.style.display = 'none';
        }, 5000); // 5000 milisegundos = 5 segundos
    }

    // Llamar a la función para mostrar el mensaje cuando la página se carga completamente
    window.addEventListener('load', mostrarMensaje);

