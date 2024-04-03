<?php
include 'Calculadora.php';
include 'reloj.php';
include 'fecha.php';
//calculadora test
$calculadora = new Calculadora(10, 5);

echo "Número 1: " . $calculadora->getNumero1() . "\n"; 
echo "Número 2: " . $calculadora->getNumero2() . "\n"; 

echo "Suma: " . $calculadora->sumar() . "\n"; 
echo "Resta: " . $calculadora->restar() . "\n"; 
echo "Multiplicación: " . $calculadora->multiplicar() . "\n";

echo "Estado de la calculadora: " . $calculadora . "\n"; 

//reloj test
/*$reloj = new Reloj();

echo "Hora actual: " . $reloj . "\n"; 

$reloj->incremento();
echo "Hora después del incremento: " . $reloj . "\n"; 

while ($reloj !== "23:59:59") {
    $reloj->incremento();
}

echo "Hora antes de la medianoche: " . $reloj . "\n"; 

$reloj->incremento();
echo "Hora después de la medianoche: " . $reloj . "\n"; */



// Test de la clase Fecha
$fecha = new Fecha(15, 2, 2022);


echo "Día: " . $fecha->getDia() . "\n"; 
echo "Mes: " . $fecha->getMes() . "\n"; 
echo "Año: " . $fecha->getAnio() . "\n"; 


$fecha->setDia(20);
$fecha->setMes(6);
$fecha->setAnio(2023);
echo "Nueva fecha: " . $fecha->obtenerFechaExtendida() . "\n"; 

$fecha->incremento(5);
echo "Fecha después de incrementar 5 días: " . $fecha->obtenerFechaAbreviada() . "\n"; 


echo "Fecha como cadena: " . $fecha . "\n"; 

?>
