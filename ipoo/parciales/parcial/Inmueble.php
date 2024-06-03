<?php
class Inmueble
{
    private $codigoReferencia;
    private $numeroPiso;
    private $tipoUso;
    private $costoMensual;
    private $inquilino;

    // Constructor
    public function __construct($codigo, $nropiso, $tipouso, $costomensual, $objInquilino)
    {
        $this->codigoReferencia = $codigo;
        $this->numeroPiso = $nropiso;
        $this->tipoUso = $tipouso;
        $this->costoMensual = $costomensual;
        $this->inquilino = $objInquilino;
    }

    // Getters y Setters
    public function getCodigo()
    {
        return $this->codigoReferencia;
    }

    public function setCodigo($codigoReferencia)
    {
        $this->codigoReferencia = $codigoReferencia;
    }

    public function getNumeroPiso()
    {
        return $this->numeroPiso;
    }

    public function setNumeroPiso($numeroPiso)
    {
        $this->numeroPiso = $numeroPiso;
    }

    public function getTipoUso()
    {
        return $this->tipoUso;
    }

    public function setTipoUso($tipoUso)
    {
        $this->tipoUso = $tipoUso;
    }

    public function getCostoMensual()
    {
        return $this->costoMensual;
    }

    public function setCostoMensual($costoMensual)
    {
        $this->costoMensual = $costoMensual;
    }

    public function getInquilino()
    {
        return $this->inquilino;
    }

    public function setInquilino($objInquilino)
    {
        $this->inquilino = $objInquilino;
    }

    public function estaDisponible($tipouso, $costoMaximo)
    {
        $disponibilidad = false;
        if ($this->getInquilino() == null) {
            if ($this->getTipoUso() == $tipouso && $this->getCostoMensual() <= $costoMaximo) {
                $disponibilidad = true;
            }
        }
        return $disponibilidad;
    }
    public function __toString()
    {
        $estado = $this->getInquilino() ? "Alquilado" : "Disponible";
        return "Código: " . $this->getCodigo() . ", Piso: " . $this->getNumeroPiso() . ", Tipo de uso: " . $this->getTipoUso() . ", Costo mensual: " . $this->getCostoMensual() . ", Estado: " . $estado;
    }
    public function alquilar($objPersona)
{
    if ($this->getInquilino() === null) {
        $this->setInquilino($objPersona);
        return true;
    } else {
        return false;
    }
}
}
