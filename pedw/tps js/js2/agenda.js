var a = [
    ["Juan Pérez", "Av. Argentina 3000", "Neuquén Capital", "154888888"],
    ["Tito Sánchez", "Av. Del Trabajador 300", "Neuquén Capital", "154555555"],
    ["Cecilia Carrizo", "Sierra Grande 900", "Neuquén Capital", "4485895"],
    ["Pedro González", "Amaranto Usares 1254", "Neuquén Capital", "4420444"],
    ["Verónica Lozano", "Saturnino Torres 100", "Neuquén Capital", "5425842"]
];

window.onload = function() {
    llenarTabla();
};

function llenarTabla() {
    var tbody = document.getElementById('agenda').getElementsByTagName('tbody')[0];
    tbody.innerHTML = ''; // Limpiar tabla
    for (var i = 0; i < a.length; i++) {
        var fila = tbody.insertRow();
        for (var j = 0; j < a[i].length; j++) {
            var celda = fila.insertCell();
            celda.textContent = a[i][j];
        }
        var celdaAccion = fila.insertCell();
        var linkBorrar = document.createElement('a');
        linkBorrar.href = "#";
        linkBorrar.textContent = "Borrar";
        linkBorrar.onclick = (function(index) {
            return function() {
                borrarFila(index);
            };
        })(i);
        celdaAccion.appendChild(linkBorrar);
    }
}

function borrarFila(index) {
    a.splice(index, 1);
    llenarTabla();
}

function agregarRegistro() {
    var nombre = document.getElementById('nombre').value;
    var direccion = document.getElementById('direccion').value;
    var ciudad = document.getElementById('ciudad').value;
    var telefono = document.getElementById('telefono').value;
    a.push([nombre, direccion, ciudad, telefono]);
    llenarTabla();
    document.getElementById('nuevoRegistroForm').reset();
}
