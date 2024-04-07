<?php 
include 'pasajero.php';
include 'responsableV.php';
include 'viaje.php';

function solicitarDato($mensaje) {
    echo $mensaje;
    return trim(fgets(STDIN));
}

$responsable = new ResponsableV(4444, 'kk5555', 'Tomas', 'Acuña');

$viaje = new Viaje('01', 'Polonia', 30, $responsable);

do {
    echo "\n1. Agregar Pasajero\n";
    echo "2. Ver Viaje\n";
    echo "3. Salir\n";
    $opcion = solicitarDato("Seleccione una opción: ");

    switch ($opcion) {
        case 1:
            $nombre = solicitarDato("Nombre del pasajero: ");
            $apellido = solicitarDato("Apellido del pasajero: ");
            $documento = solicitarDato("Documento del pasajero: ");
            $telefono = solicitarDato("Teléfono del pasajero: ");
            $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono);
            if($viaje->añadirPasajero($pasajero)){
                echo "pasajero agregado. \n";
            } else {
                echo "el pasajero ya esta abordo o se alcanzo el maximo de pasajeros";
            }
            break;
        case 2:
            echo $viaje;
            break;
        case 3:
            echo "Saliendo...\n";
            break;
        default:
            echo "Opción no válida.\n";
    }
} while ($opcion != 3);


