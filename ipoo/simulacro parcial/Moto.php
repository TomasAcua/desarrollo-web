<?php
class Moto
{

    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa){

        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function setCosto($costo) {
        $this->costo = $costo;
    }

    public function getAnioFabricacion() {
        return $this->anioFabricacion;
    }

    public function setAnioFabricacion($anioFabricacion) {
        $this->anioFabricacion = $anioFabricacion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getPorcentajeIncrementoAnual() {
        return $this->porcentajeIncrementoAnual;
    }

    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual) {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }

    public function estaActiva() {
        return $this->activa;
    }

    public function setActiva($activa) {
        $this->activa = $activa;
    }

    public function __toString() {
        $estado = "disponible";
        if($this->activa == false){
            $estado = "no disponible";
        
        }
        return "Código:".$this->codigo. "Costo: ".$this->costo. "Año de fabricación: ". $this->anioFabricacion. "Descripción: ". $this->descripcion." Estado:". $estado;
    }

   
    public function darPrecioVenta() {
        if ($this->activa) {
            $anioTranscurrido = 2024 - $this->anioFabricacion;
            return $this->costo + $this->costo * ($anioTranscurrido * $this->porcentajeIncrementoAnual);
        } else {
            return -1; 
        }
    }

}
