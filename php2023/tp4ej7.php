<?php
// Función para convertir tiempo a segundos
// @param int $horas $minutos $segundos $totalSegundos 
// return int
function convertirTiempoASegundos($horas, $minutos, $segundos) {
    $totalSegundos = ($horas * 3600) + ($minutos * 60) + $segundos;
    return $totalSegundos;
}

// Función para calcular velocidad en m/seg
// @param int $distancia $tiempoSegundos $velocidad
// return int
function calcularVelocidad($distancia, $tiempoSegundos) {
    $velocidad = $distancia / $tiempoSegundos;
    return $velocidad;
}

// Programa principal
// int $distancia $tiempoSegundos1 $tiempoSegundos2 $velocidad1 $velocidad2 $horas1 $horas2 $minutos1 $minutos2 $segundos1 $segundos2
echo "Ingrese la distancia de la carrera en metros: ";
$distancia = trim(fgets(STDIN));

echo "Ingrese el tiempo del 1° puesto:\n";
echo "Horas: ";
$horas1 = trim(fgets(STDIN));
echo "Minutos: ";
$minutos1 = trim(fgets(STDIN));
echo "Segundos: ";
$segundos1 = trim(fgets(STDIN));

echo "Ingrese el tiempo del 2° puesto:\n";
echo "Horas: ";
$horas2 = trim(fgets(STDIN));
echo "Minutos: ";
$minutos2 = trim(fgets(STDIN));
echo "Segundos: ";
$segundos2 = trim(fgets(STDIN));

$tiempoSegundos1 = convertirTiempoASegundos($horas1, $minutos1, $segundos1);
$tiempoSegundos2 = convertirTiempoASegundos($horas2, $minutos2, $segundos2);

$velocidad1 = calcularVelocidad($distancia, $tiempoSegundos1);
$velocidad2 = calcularVelocidad($distancia, $tiempoSegundos2);

echo "Velocidad del 1° puesto: $velocidad1 m/seg\n";
echo "Velocidad del 2° puesto: $velocidad2 m/seg";