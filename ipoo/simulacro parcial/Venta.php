<?php
class Venta {
    private $numero;
    private $fecha;
    private $cliente; 
    private $motos; 
    private $precioFinal;

    public function __construct($numero, $fecha, $cliente) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->motos = [];
        $this->precioFinal = 0;
    }

   
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getMotos() {
        return $this->motos;
    }

    public function getPrecioFinal() {
        return $this->precioFinal;
    }

    public function setPrecioFinal($precioFinal) {
        $this->precioFinal = $precioFinal;
    }


    public function incorporarMoto($moto) {
        if ($moto->estaActiva()) {
            $precioVenta = $moto->darPrecioVenta();
            if ($precioVenta >= 0) {
                $this->motos[] = $moto;
                $this->precioFinal += $precioVenta;
            }
        }
    }

    public function __toString() {
        $infoMotosStr = "";
        foreach ($this->motos as $moto) {
            $infoMotosStr .= $moto->__toString() . ", ";
        }
        return "Número de Venta: {$this->numero}, Fecha: {$this->fecha}, Cliente: {$this->cliente}, Motos: [{$infoMotosStr}], Precio Final: {$this->precioFinal}";
    }   
}

