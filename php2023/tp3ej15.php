<?php
// Programa para calcular la distancia recorrida en línea recta
//float $a, $b, $c

echo "Ingrese la cantidad de metros hasta el punto A: ";

$a = (trim(fgets(STDIN))); 

echo "Ingresar la cantidad de metros luego de girar 90 grados y llegar hasta el punto B: ";

$b = (trim(fgets(STDIN))); 

$c = $a * $a + $b * $b;
$c = sqrt($c);

echo "La cantidad de metros en línea recta es de $c\n";
?>
