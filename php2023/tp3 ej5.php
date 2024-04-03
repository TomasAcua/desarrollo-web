<?php 
/*programa aumento
este programa calcula el porcentaje de aumento que se solicita
int sueldoInc sueldoDes float porcentaje */
echo "Ingrese su sueldo inicial";
$sueldoInc = trim(fgets(STDIN));
echo "Ingrese su sueldo deseado";
$sueldoDes = trim(fgets(STDIN));
$porcentaje = (($sueldoDes * 100)/ $sueldoInc)-100;
echo "el procentaje de aumento que se solicita es de %". $porcentaje;