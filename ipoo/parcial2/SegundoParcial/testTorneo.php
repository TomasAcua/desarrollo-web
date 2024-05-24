<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("futbol.php");
include_once("Basket.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

$torneo = new Torneo([], 100000);


$partido1 = new Basket(11, '2024-05-05', $objE7, 80, $objE8, 120, 7);
$partido2 = new Basket(12, '2024-05-06', $objE9, 81, $objE10, 110, 8);
$partido3 = new Basket(13, '2024-05-07', $objE11, 115, $objE12, 85, 9);


$partido4 = new Futbol(14, '2024-05-07', $objE1, 3, $objE2, 2);
$partido5 = new Futbol(15, '2024-05-08', $objE3, 0, $objE4, 1);
$partido6 = new Futbol(16, '2024-05-09', $objE5, 2, $objE6, 3);

echo "Resultado de ingresarPartido(objE5, objE11, '2024-05-23', 'Futbol'):\n";
echo $torneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'futbol') . "\n";
echo "Cantidad de equipos en el torneo: " . count($torneo->getPartidos()) . "\n\n";

echo "Resultado de ingresarPartido(objE11, objE11, '2024-05-23', 'basquetbol'):\n";
echo $torneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basket') . "\n";
echo "Cantidad de equipos en el torneo: " . count($torneo->getPartidos()) . "\n\n";

echo "Resultado de ingresarPartido(objE9, objE10, '2024-05-25', 'basquetbol'):\n";
echo $torneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basket') . "\n";
echo "Cantidad de equipos en el torneo: " . count($torneo->getPartidos()) . "\n\n";

echo "Ganadores de basket:\n";
print_r($torneo->darGanadores('basket'));
echo "\n";

echo "Ganadores de futbol:\n";
print_r($torneo->darGanadores('futbol'));
echo "\n";

echo "Premio del partido 1 de basket:\n";
print_r($torneo->calcularPremioPartido($partido1));
echo "\n";

echo "Premio del partido 4 de futbol:\n";
print_r($torneo->calcularPremioPartido($partido4));
echo "\n";

echo "Objeto Torneo:\n";
echo $torneo;
