<?php
// Programa para intercambiar valores de dos variables

echo "Ingrese el primer número: ";
$a = trim(fgets(STDIN));

echo "Ingrese el segundo número: ";
$b = trim(fgets(STDIN));

// Mostrar los valores originales
echo "El valor del primer número ingresado es $a y el valor del segundo número es $b\n";

// Intercambiar valores usando una variable temporal
$temp = $b;
$b = $a;
$a = $temp;

// Mostrar los nuevos valores intercambiados
echo "Después del intercambio, el nuevo valor del primer número es $a y el nuevo valor del segundo número es $b\n";
?>