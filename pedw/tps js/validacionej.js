// validaciones.js
function validarFormulario() {
    var nombre = document.getElementById('nombre');
    var email = document.getElementById('email');
    var edad = document.getElementById('edad');
    var mensaje = document.getElementById('mensaje');

    var nombreValido = validarCampoObligatorio(nombre);
    var emailValido = validarEmail(email);
    var edadValida = validarEdad(edad);

    if (nombreValido && emailValido && edadValida) {
        mensaje.innerHTML = "Formulario enviado correctamente";
        mensaje.style.color = "green";
    } else {
        mensaje.innerHTML = "Por favor, corrige los errores en el formulario";
        mensaje.style.color = "red";
    }
}

function validarCampoObligatorio(campo) {
    if (campo.value.trim() === "") {
        campo.style.border = '2px solid red';
        return false;
    } else {
        campo.style.border = '';
        return true;
    }
}

function validarEmail(email) {
    var patronEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!patronEmail.test(email.value)) {
        email.style.border = '2px solid red';
        return false;
    } else {
        email.style.border = '';
        return true;
    }
}

function validarEdad(edad) {
    var edadNum = parseInt(edad.value, 10);
    if (isNaN(edadNum) || edadNum < 18 || edadNum > 99) {
        edad.style.border = '2px solid red';
        return false;
    } else {
        edad.style.border = '';
        return true;
    }
}
