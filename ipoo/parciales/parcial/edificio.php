<?php
require_once 'Inmueble.php';
class Edificio
{
    private $direccion;
    private $inmuebles;
    private $administrador;

    public function __construct($direccion, $objadministrador)
    {
        $this->direccion = $direccion;
        $this->administrador = $objadministrador;
        $this->inmuebles = [];
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getInmuebles()
    {
        return $this->inmuebles;
    }

    public function setInmuebles($inmuebles)
    {
        $this->inmuebles = $inmuebles;
    }

    public function getAdministrador()
    {
        return $this->administrador;
    }

    public function setAdministrador($objadministrador)
    {
        $this->administrador = $objadministrador;
    }

    public function agregarInmueble($inmueble)
    {
        $this->inmuebles[] = $inmueble;
    }

    public function __toString()
    {
        $datos = "Dirección del Edificio: " . $this->getDireccion() . "\n";
        $datos .= "Administrador: " . $this->getAdministrador() . "\n";
        $datos .= "Inmuebles en el Edificio:\n";
        foreach ($this->getInmuebles() as $inmueble) {
            $datos .= $inmueble . "\n";
        }
        return $datos;
    }
    public function darInmueblesDisponibles($tipoUso, $costoMaximo)
{
    $inmueblesDisponibles = [];

    foreach ($this->getInmuebles() as $inmueble) {
        if ($inmueble->estaDisponible($tipoUso, $costoMaximo)) {
            $inmueblesDisponibles[] = $inmueble;
        }
    }

    return $inmueblesDisponibles;
}
public function buscarInmueble($obj)
{
    $indice = -1;
    $inmuebles = $this->getInmuebles();
    $totalInmuebles = count($inmuebles);
    $i = 0;

    while ($i < $totalInmuebles && $indice == -1) {
        if ($inmuebles[$i] == $obj) {
            $indice = $i;
        }
        $i++;
    }

    return $indice;
}
public function registrarAlquilerInmueble($tipoUso, $montoMaximo, $objPersona)
{
    $alquilerRegistrado = false;
    $i = 0;
    $inmueblesDisponibles = $this->darInmueblesDisponibles($tipoUso, $montoMaximo);
    $ultimoPisoDisponible = 0;
    
    $cantidadInmuebles = count($inmueblesDisponibles);
    while ($alquilerRegistrado == false && $i < $cantidadInmuebles) {
        $inmueble = $inmueblesDisponibles[$i];
        if ($inmueble->estaDisponible($tipoUso, $montoMaximo)) {
            $inmueble->alquilar($objPersona);
            $alquilerRegistrado = true;
            if ($inmueble->getNroPiso() > $ultimoPisoDisponible) {
                $ultimoPisoDisponible = $inmueble->getNroPiso();
            }

        }
        $i++;
    }

    return $alquilerRegistrado;
}
public function calculaCostoEdificio()
{
    $costoTotal = 0;

    foreach ($this->getInmuebles() as $inmueble) {
        if ($inmueble->getInquilino() !== null) {
            $costoTotal += $inmueble->getCostoMensual();
        }
    }

    return $costoTotal;
}


}
