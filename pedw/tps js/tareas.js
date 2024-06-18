function agregarTarea() {
    var tareaInput = document.getElementById('nuevaTarea');
    var tareaTexto = tareaInput.value.trim();

    if (tareaTexto === "") {
        alert("La tarea no puede estar vacía");
        return false;
    }

    var listaTareas = document.getElementById('listaTareas');

    var nuevaTarea = document.createElement('li');

    var checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.onclick = function() {
        if (checkbox.checked) {
            tareaTextoElem.style.textDecoration = 'line-through';
            tareaTextoElem.style.color = 'gray';
        } else {
            tareaTextoElem.style.textDecoration = 'none';
            tareaTextoElem.style.color = 'black';
        }
    };

    var tareaTextoElem = document.createElement('span');
    tareaTextoElem.textContent = tareaTexto;

    var botonEliminar = document.createElement('button');
    botonEliminar.textContent = 'Eliminar';
    botonEliminar.onclick = function() {
        listaTareas.removeChild(nuevaTarea);
    };

    nuevaTarea.appendChild(checkbox);
    nuevaTarea.appendChild(tareaTextoElem);
    nuevaTarea.appendChild(botonEliminar);

    listaTareas.appendChild(nuevaTarea);

    tareaInput.value = '';
    return false; // Prevenir el envío del formulario
}
