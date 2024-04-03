<?php
// Módulo para calcular el perímetro de un triángulo equilátero
// @param int $perimetro $lado
//return int
function calcularPerimetroTrianguloEquilatero($lado) {
    $perimetro = 3 * $lado;
    return $perimetro;
}

// Módulo para calcular la altura de un triángulo equilátero
// @param int $lado $altura
//return int 
function calcularAlturaTrianguloEquilatero($lado) {
    $altura = (sqrt(3) / 2) * $lado;
    return $altura;
}

// Módulo para calcular el área de un triángulo equilátero
// @param int $lado $area
// return int
function calcularAreaTrianguloEquilatero($lado) {
    $area = (sqrt(3) / 4) * pow($lado, 2);
    return $area;
}
// Programa principal
// int $perimetro $altura $area $ladoTriangulo
    echo "ingrese el lado del triangulo equilatero: ";
    $ladoTriangulo = trim(fgets(STDIN));
    $perimetro = calcularPerimetroTrianguloEquilatero($ladoTriangulo);
    $altura = calcularAlturaTrianguloEquilatero($ladoTriangulo);
    $area = calcularAreaTrianguloEquilatero($ladoTriangulo);

    echo "Dado un triángulo equilátero de lado $ladoTriangulo cm, su perímetro es $perimetro cm y su área es $area cm2";
