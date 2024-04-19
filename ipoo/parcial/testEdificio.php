<?php

// Incluir la definición de las clases necesarias
require_once 'Edificio.php';
require_once 'Persona.php';

// Crear una instancia de Persona para el administrador del edificio
$administrador = new Persona('DNI', '27432561', 'Carlos', 'Martinez', '154321233');

// Crear una instancia de Edificio con los datos proporcionados
$edificio = new Edificio('Juan B. Justo 3456', $administrador);
$persona1 = new Persona('dni', 'i2333456', 'Pepe', 'Suarez', '4456722');
$persona2 = new Persona('dni', '12333422', 'Pedro', 'Suarez', '445578');

$inmueble1 = new Inmueble('I1', 1, 'local comercial', 50000, $persona1);
$inmueble2 = new Inmueble('I2', 1, 'local comercial', 50000, null);
$inmueble3 = new Inmueble('I3', 2, 'departamento', 35000, $persona2);
$inmueble4 = new Inmueble('I4', 2, 'departamento', 35000, null);
$inmueble5 = new Inmueble('I5', 3, 'departamento', 35000, null);
// Mostrar información del edificio utilizando el método __toString

// Agregar los inmuebles al edificio
$edificio->agregarInmueble($inmueble1);
$edificio->agregarInmueble($inmueble2);
$edificio->agregarInmueble($inmueble3);
$edificio->agregarInmueble($inmueble4);
$edificio->agregarInmueble($inmueble5);

$inmueblesDisponibles = $edificio->darInmueblesDisponibles("departamento", 550000);
$objPersona = new Persona("DNI", 28765436, "Mariela", "Suarez", "25543562");


if ($edificio->registrarAlquilerInmueble("departamento", 550000, $objPersona)) {
    echo "El alquiler del inmueble pudo ser concretado.\n";
} else {
    echo "El alquiler del inmueble no pudo ser concretado.\n";
}

echo "Información del Edificio:\n";
echo $edificio->__toString();

echo "Inmuebles disponibles:\n";
foreach ($inmueblesDisponibles as $inmueble) {
    echo $inmueble . "\n";
}


$costoTotal = $edificio->calculaCostoEdificio();

echo "El costo total del edificio es: $costoTotal";
echo $edificio;
?>