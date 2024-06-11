function validar() {
    // Obtener elementos del formulario
    var nombre = document.getElementById('nombre');
    var apellido = document.getElementById('apellido');
    var email = document.getElementById('email');
    var obrasSociales = document.getElementById('obras_sociales');
    var dia = document.getElementById('dia');
    var mes = document.getElementById('mes');
    var anio = document.getElementById('anio');

    limpiarNotificaciones([nombre, apellido, email, obrasSociales, dia, mes, anio]);

    var esValido = true;

    // Validar campos obligatorios
    if (!nombre.value) {
        notificarError(nombre, "Este campo es obligatorio");
        esValido = false;
    }
    if (!apellido.value) {
        notificarError(apellido, "Este campo es obligatorio");
        esValido = false;
    }
    if (!email.value) {
        notificarError(email, "Este campo es obligatorio");
        esValido = false;
    }
    if (!obrasSociales.value) {
        notificarError(obrasSociales, "Este campo es obligatorio");
        esValido = false;
    }
    if (!dia.value || !esEnteroPositivo(dia.value)) {
        notificarError(dia, "Debe ser un número entero positivo");
        esValido = false;
    }
    if (!mes.value || !esEnteroPositivo(mes.value)) {
        notificarError(mes, "Debe ser un número entero positivo");
        esValido = false;
    }
    if (!anio.value || !esEnteroPositivo(anio.value)) {
        notificarError(anio, "Debe ser un número entero positivo");
        esValido = false;
    }

    // Validar formato de email
    if (email.value && !validarEmail(email.value)) {
        notificarError(email, "Formato de email inválido");
        esValido = false;
    }

    // Validar fecha
    if (dia.value && mes.value && anio.value && !validarFecha(dia.value, mes.value, anio.value)) {
        notificarError(dia, "Fecha inválida");
        notificarError(mes, "Fecha inválida");
        notificarError(anio, "Fecha inválida");
        esValido = false;
    }

    // Si todas las validaciones pasan
    if (esValido) {
        alert("Todos los datos son correctos");
    }

    // Prevenir envío del formulario para demostración de validación
    return false;
}

function limpiarNotificaciones(elementos) {
    elementos.forEach(elemento => {
        elemento.style.border = '';
        elemento.style.backgroundColor = '';
        var errorSpan = elemento.nextElementSibling;
        if (errorSpan && errorSpan.classList.contains('error')) {
            errorSpan.remove();
        }
    });
}

function notificarError(elemento, mensaje) {
    elemento.style.border = '2px solid red';
    elemento.style.backgroundColor = '#fdd';
    var errorSpan = document.createElement('span');
    errorSpan.classList.add('error');
    errorSpan.style.color = 'red';
    errorSpan.style.fontSize = '12px';
    errorSpan.innerText = mensaje;
    if (!elemento.nextElementSibling || !elemento.nextElementSibling.classList.contains('error')) {
        elemento.parentNode.insertBefore(errorSpan, elemento.nextSibling);
    }
}

function esEnteroPositivo(valor) {
    var num = Number(valor);
    return Number.isInteger(num) && num > 0;
}

function validarEmail(email) {
    var patronEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return patronEmail.test(email);
}

function validarFecha(dia, mes, anio) {
    var diaNum = parseInt(dia, 10);
    var mesNum = parseInt(mes, 10);
    var anioNum = parseInt(anio, 10);

    if (mesNum < 1 || mesNum > 12) {
        return false;
    }

    var diasPorMes = [31, (esAnioBisiesto(anioNum) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if (diaNum < 1 || diaNum > diasPorMes[mesNum - 1]) {
        return false;
    }

    return true;
}

function esAnioBisiesto(anio) {
    return (anio % 4 === 0 && anio % 100 !== 0) || (anio % 400 === 0);
}
