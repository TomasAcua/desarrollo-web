<?php
//este programa lee un número X y, luego utilizando un ciclo interactivo, lee una secuencia de números.
// y Muestra cuál es el porcentaje de números leídos que fueron múltiplos de X.
echo "Ingrese un número X: ";
$x = (trim(fgets(STDIN)));

if ($x == 0) {
    echo "El número X no puede ser 0.\n";
} else {
    $totalNumeros = 0;
    $numerosMultiplos = 0;

    echo "Ingrese una secuencia de números (escriba 'fin' para terminar): ";
    $entrada = trim(fgets(STDIN));

    while ($entrada !== 'fin') {
        $numero = ($entrada);
        $totalNumeros++;

        if ($numero % $x === 0) {
            $numerosMultiplos++;
        }

        echo "Ingrese otro número (o escriba 'fin' para terminar): ";
        $entrada = trim(fgets(STDIN));
    }

    if ($totalNumeros > 0) {
        $porcentaje = ($numerosMultiplos / $totalNumeros) * 100;
        echo "{$porcentaje}% de los $totalNumeros números son múltiplos de $x\n";
    } else {
        echo "No se ingresaron números válidos.\n";
    }
}
