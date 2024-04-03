<?php
//este algoritmo desencripta un numero de 4 digitos
//int $encriptado $digito1 $digito2 $digito3 $digito4 $numerodesencriptado $desencriptadodigito1 $desencriptadodigito2 $desencriptadodigito3 $desencriptadodigito4
echo "Ingrese un número encriptado de cuatro dígitos: ";
$encriptado = trim(fgets(STDIN));

// Obtener los dígitos individuales del número encriptado
$digito4 = $encriptado % 10;
$encriptado = (int)($encriptado / 10);
$digito3 = $encriptado % 10;
$encriptado = (int)($encriptado / 10);
$digito2 = $encriptado % 10;
$digito1 = (int)($encriptado / 10);

// Desencriptar los dígitos
$desencriptadoDigito1 = ($digito1 + 3) % 10;
$desencriptadoDigito2 = ($digito2 + 3) % 10;
$desencriptadoDigito3 = ($digito3 + 3) % 10;
$desencriptadoDigito4 = ($digito4 + 3) % 10;

// Formar el número desencriptado
$numeroDesencriptado = $desencriptadoDigito3 * 1000 + $desencriptadoDigito4 * 100 + $desencriptadoDigito1 * 10 + $desencriptadoDigito2;

echo "Número desencriptado: $numeroDesencriptado";