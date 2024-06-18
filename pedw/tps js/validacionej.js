// validaciones.js

// Función principal para validar el formulario
function validarFormulario() {
    // Obtener los elementos del formulario
    var nombre = document.getElementById('nombre');
    var email = document.getElementById('email');
    var edad = document.getElementById('edad');
    var mensaje = document.getElementById('mensaje');

    // Validar cada campo utilizando funciones específicas
    var nombreValido = validarCampoObligatorio(nombre);
    var emailValido = validarEmail(email);
    var edadValida = validarEdad(edad);

    // Verificar si todas las validaciones pasaron
    if (nombreValido && emailValido && edadValida) {
        // Si todo es válido, mostrar mensaje de éxito
        mensaje.innerHTML = "Formulario enviado correctamente";
        mensaje.style.color = "green";
    } else {
        // Si hay algún error, mostrar mensaje de error
        mensaje.innerHTML = "Por favor, corrige los errores en el formulario";
        mensaje.style.color = "red";
    }
}

// Función para validar que un campo obligatorio no esté vacío
function validarCampoObligatorio(campo) {
    // Verificar si el campo está vacío
    if (campo.value.trim() === "") {
        // Si está vacío, cambiar el borde a rojo
        campo.style.border = '2px solid red';
        return false; // Devolver false indicando que la validación falló
    } else {
        // Si no está vacío, restablecer el borde
        campo.style.border = '';
        return true; // Devolver true indicando que la validación pasó
    }
}

// Función para validar el formato de un email
function validarEmail(email) {
    // Expresión regular para el formato de email
    var patronEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    // Verificar si el email coincide con el patrón
    if (!patronEmail.test(email.value)) {
        // Si no coincide, cambiar el borde a rojo
        email.style.border = '2px solid red';
        return false; // Devolver false indicando que la validación falló
    } else {
        // Si coincide, restablecer el borde
        email.style.border = '';
        return true; // Devolver true indicando que la validación pasó
    }
}

// Función para validar que la edad sea un número entero positivo dentro del rango permitido
function validarEdad(edad) {
    // Convertir la edad a número entero
    var edadNum = parseInt(edad.value, 10);
    // Verificar si es un número, mayor o igual a 18 y menor o igual a 99
    if (isNaN(edadNum) || edadNum < 18 || edadNum > 99) {
        // Si no cumple los criterios, cambiar el borde a rojo
        edad.style.border = '2px solid red';
        return false; // Devolver false indicando que la validación falló
    } else {
        // Si cumple los criterios, restablecer el borde
        edad.style.border = '';
        return true; // Devolver true indicando que la validación pasó
    }
}
