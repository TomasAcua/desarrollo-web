<?php
/* Este programa recibe un numero entero de cuatro o menos digitos y lo encripta */
//int $entero, $restoUno, $restoDos, $restoTres, $restoCuatro, $nuevoNum, $temporal, $numFinal


//separa el numero entero en 4 digitos
echo "Ingrese el entero a encriptar: ";
$entero = trim(fgets(STDIN));
$restoUno = $entero/1000;
$entero = $entero%1000;
$restoDos = $entero/100;
$entero = $entero%100;
$restoTres = $entero/10;
$restoCuatro = $entero%10;
echo"Los numeros son: \n".
(int)$restoUno."\n".
(int)$restoDos. "\n".
(int)$restoTres. "\n".
(int)$restoCuatro;


//Hace la cuenta para encriptar los numeros.
$restoUno = ($restoUno + 7)%10;
$restoDos = ($restoDos + 7)%10;
$restoTres = ($restoTres + 7)%10;
$restoCuatro = ($restoCuatro + 7)%10;
echo "\nLuego los nuevos numeros son: \n".
(int)$restoUno. "\n".
(int)$restoDos. "\n".
(int)$restoTres. "\n".
(int)$restoCuatro;


//Intercambia los valores de posicion.
$temporal = $restoTres;
$restoTres = $restoUno;
$restoUno = $temporal;
$temporal = $restoCuatro;
$restoCuatro = $restoDos;
$restoDos = $temporal;


 //Recompone los digitos en un solo numero
$entero = ($restoUno * 1000) + ($restoDos * 100) + ($restoTres * 10) + ($restoCuatro * 1);
echo "\nEl numero encriptado es: ".$entero;

