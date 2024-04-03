<?php
/*este algoritmo calcula a partir de una cantidad de segundos, pasándolo a horas, minutos, segundos*/
//*int $seg, $min, $horas

echo "coloque la cantidad de segundos totales: ";
$seg = trim(fgets(STDIN));
$min = $seg / 60;
$seg = $seg % 60;
$horas = $min / 60;
$min = $min % 60;
echo "esto equivale a: " . (int)$horas . " horas " . (int)$min . " minutos y " . $seg . " segundos";

/*fin de programa*/