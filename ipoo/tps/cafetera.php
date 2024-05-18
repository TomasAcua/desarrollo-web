<?php
class Cafetera {
    private $capacidadMaxima;
    private $cantidadActual;

    public function __construct($capacidadMaxima, $cantidadActual) {
        $this->capacidadMaxima = $capacidadMaxima;
        $this->cantidadActual = $cantidadActual;
    }

    public function getCapacidadMaxima() {
        return $this->capacidadMaxima;
    }

    public function setCapacidadMaxima($capacidadMaxima) {
        $this->capacidadMaxima = $capacidadMaxima;
    }

    public function getCantidadActual() {
        return $this->cantidadActual;
    }

    public function setCantidadActual($cantidadActual) {
        $this->cantidadActual = $cantidadActual;
    }

    public function llenarCafetera() {
        $this->setCantidadActual($this->getCapacidadMaxima());
    }

    public function servirTaza($cantidad) {
        if ($cantidad <= $this->getCantidadActual()) {
            $this->setCantidadActual($this->getCantidadActual() - $cantidad);
        } 
    }

    public function vaciarCafetera() {
        $this->setCantidadActual(0);
    }

    public function agregarCafe($cantidad) {
        $lleno = false;
        $nuevaCantidad = $this->getCantidadActual() + $cantidad;
        if ($nuevaCantidad <= $this->getCapacidadMaxima()) {
            $this->setCantidadActual($nuevaCantidad);
            $lleno = true;
        } 
        return $lleno;
    }

    public function __toString() {
        $info = "Capacidad máxima: " . $this->getCapacidadMaxima() . " ml\n" .
        "Cantidad actual: " . $this->getCantidadActual() . " ml";
        return $info;
    }
}

