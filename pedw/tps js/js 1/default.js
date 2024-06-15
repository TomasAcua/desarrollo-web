// default.js
function oponentes(P) {
    var paises1 = ["Argentina", "Bolivia", "Brasil", "Venezuela"];
    var paises2 = ["Colombia", "Costa Rica", "Paraguay", "Ecuador"];
    
    var index = paises1.indexOf(P);
    if (index !== -1) {
        return paises2[index];
    } else {
        return null; // En caso de que el país no se encuentre en la lista
    }
}

function buscarOponentes() {
    var select = document.getElementById('pais');
    var paisSeleccionado = select.value;
    var oponente = oponentes(paisSeleccionado);
    
    var mensajeDiv = document.getElementById('mensaje');
    if (oponente) {
        mensajeDiv.innerHTML = "El oponente a " + paisSeleccionado + " en la segunda fecha de la Copa América es: " + oponente;
        mensajeDiv.style.backgroundColor = "red";
    } else {
        mensajeDiv.innerHTML = "País no encontrado.";
        mensajeDiv.style.backgroundColor = "red";
    }
}
