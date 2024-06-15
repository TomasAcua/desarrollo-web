function listar() {
    var arbol = document.getElementById('arbol');
    recorrerArbol(arbol);
}

function recorrerArbol(nodo) {
    var hijos = nodo.childNodes;
    for (var i = 0; i < hijos.length; i++) {
        if (hijos[i].nodeType === Node.ELEMENT_NODE) {
            alert(hijos[i].textContent.trim());
            hijos[i].style.color = 'gray';
            recorrerArbol(hijos[i]);
        }
    }
}
